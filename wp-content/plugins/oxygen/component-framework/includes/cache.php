<?php


/**
 * Get all non-page styles and cache as Universal CSS
 * 
 * @since 2.0
 * @author Ilya K. 
 */

function oxygen_vsb_cache_universal_css() {

	if (get_option("oxygen_vsb_universal_css_cache")=='true') {

		$universal_css  = oxygen_vsb_get_defaults_styles();
		$universal_css .= oxygen_vsb_get_global_styles();
		$universal_css .= oxygen_vsb_get_classes_styles();
		$universal_css .= oxygen_vsb_get_stylesheet_styles();
		$universal_css .= oxygen_vsb_get_custom_selectors_styles();
		
		$universal_css = oxygen_css_minify($universal_css);
		$result = oxygen_vsb_save_unvirsal_css($universal_css);
		update_option("oxygen_vsb_last_save_time", time());
		update_option("oxygen_vsb_universal_css_latest_version", "2.1");

		return $result;
  	}
}


/**
 * Write Universal CSS to uploads/oxygen/universal.css
 * 
 * @since 2.0
 * @author Ilya K. 
 */

function oxygen_vsb_save_unvirsal_css($content) {

	if (!$content) {
		return false;
	}

	// assume fail by default
	update_option("oxygen_vsb_universal_css_cache_success", false);
	
	// write to the disk	
	$upload_dir = wp_upload_dir();
	$oxy_dirname = $upload_dir['basedir'] . '/oxygen/css';
	
	if ( !file_exists($oxy_dirname) ) {
		wp_mkdir_p($oxy_dirname);
	}
	
	$result = file_put_contents($oxy_dirname.'/universal.css', $content);
	
	// if write is successful continue
	if ($result !== false) {

		$saved_content = file_get_contents($oxy_dirname.'/universal.css');

		// if read is successful continue
		if ($saved_content !== false) {
			
			// check hash
			$hash_before = md5($content);
			$hash_after = md5($saved_content);

			// if hash is equal
			if ($hash_before===$hash_after){
				// success
				update_option("oxygen_vsb_universal_css_cache_success", true);
				$file_url = $upload_dir['baseurl'] . '/oxygen/css/universal.css';
				// strip the protocol
			    $file_url = str_replace(array('http://','https://'), '//', $file_url);
				update_option("oxygen_vsb_universal_css_url", $file_url);

				return true;
			}
		}
	}

	return false;
}


/**
 * Get page styles and cache as a CSS file
 * 
 * @since 2.0
 * @author Ilya K. 
 */

function oxygen_vsb_cache_page_css($post_id, $shortcodes=false) {

	if (get_option("oxygen_vsb_universal_css_cache")=='true') {
	
		// some aspects of css generation depend upon the current post, make it available to the oxy dynamic shortcodes
		global $oxygen_preview_post_id;
		$oxygen_preview_post_id = $post_id;

		if ($shortcodes===false) {
			$shortcodes = get_post_meta($post_id, 'ct_builder_shortcodes', true);
		}

		if ($shortcodes===''||$shortcodes===null) {
			oxygen_vsb_delete_css_file($post_id);
			return false;
		}

		global $fake_properties;

		// clear components CSS before next iteration
		global $oxygen_vsb_components;

		foreach ($oxygen_vsb_components as $key => $component) {
			$oxygen_vsb_components[$key]->clearCSS();
		}

		// start buffer
		ob_start();

		global $oxygen_vsb_css_caching_active;
		$oxygen_vsb_css_caching_active = true;

		// manually set to 'true' to skip classes and global styles in output
		$_REQUEST['nouniversal'] = 'true';

		// obfuscate [oxygen shortcodes, as they will be deobfuscated and resolved as the component shortcodes are rendered, from the add_shortcode function of a component class
		// these will also be deobfuscated before verifying the signatures, from the add_shortcode function of a component class

		$count = 0; // safety switch
		while(strpos($shortcodes, '[oxygen ') !== false && $count < 9) {
			$count++;
			$shortcodes = preg_replace_callback('/(\")(url|src|map_address|alt|background-image|oxycode|value)(\":\"[^\"]*)\[oxygen ([^\]]*)\]([^\"\[\s]*)/i', 'ct_obfuscate_oxy_url', $shortcodes);
		}
		
		// run shortcodes to attach all 'ct_footer_styles' actions
		do_shortcode($shortcodes);

		// output shortcode styles
		do_action('ct_footer_styles');

		$oxygen_vsb_css_caching_active = false;

		// end buffer and save
		$page_css = ob_get_clean();
		$page_css = oxygen_css_minify($page_css);
		$result = oxygen_vsb_save_css_file($page_css, $post_id);

		return $result;
  	}
}


/**
 * Write CSS file to 'uploads/oxygen/' catalog and update state meta
 * 
 * @since 2.2
 * @author Ilya K. 
 */

function oxygen_vsb_save_css_file($content, $post_id) {

	if (!$post_id) {
		return false;
	}

	$slug = get_post_field( 'post_name', $post_id );	
	$files_meta = get_option("oxygen_vsb_css_files_state", array());
		
	// delete file if exist
	if ( $files_meta[$post_id]['path'] ) {
		unlink($files_meta[$post_id]['path']);
	}

	// assume fail by default
	$files_meta[$post_id] = array();
	
	// write to the disk	
	$upload_dir = wp_upload_dir();
	$oxy_dirname = $upload_dir['basedir'] . '/oxygen/css';
	
	if ( !file_exists($oxy_dirname) ) {
		wp_mkdir_p($oxy_dirname);
	}
	
	$result = file_put_contents($oxy_dirname.'/'.$slug.'-'.$post_id.'.css', $content);
	
	// if write is successful continue
	if ($result !== false) {

		$saved_content = file_get_contents($oxy_dirname.'/'.$slug.'-'.$post_id.'.css');

		// if read is successful continue
		if ($saved_content !== false) {
			
			// check hash
			$hash_before = md5($content);
			$hash_after = md5($saved_content);

			// if hash is equal
			if ($hash_before===$hash_after){
				// success
				$files_meta[$post_id]['success'] = true;
				$file_url = $upload_dir['baseurl'] . '/oxygen/css/'.$slug.'-'.$post_id.'.css';
				// strip the protocol
			    $file_url = str_replace(array('http://','https://'), '//', $file_url);
				$files_meta[$post_id]['url'] = $file_url;
				$files_meta[$post_id]['path'] = $oxy_dirname.'/'.$slug.'-'.$post_id.'.css';
				$files_meta[$post_id]['last_save_time'] = time();
				update_option("oxygen_vsb_css_files_state", $files_meta);

				return true;
			}
		}
	}

	return false;
}


/**
 * Delete CSS file from 'uploads/oxygen/' catalog and unset meta value
 * 
 * @since 2.2
 * @author Ilya K. 
 */

function oxygen_vsb_delete_css_file($post_id) {
	
	$files_meta = get_option("oxygen_vsb_css_files_state", array());
		
	if ( !isset($files_meta[$post_id]) ) {
		return true;
	}

	// delete file if exist
	if ( $files_meta[$post_id]['path'] ) {
		$status = unlink($files_meta[$post_id]['path']);
	}

	// remove refenrence
	unset($files_meta[$post_id]);

	// udpate meta
	update_option("oxygen_vsb_css_files_state", $files_meta);
	
	return $status;
}


/**
 * Enqueue all cached CSS files
 * 
 * @since 2.2
 * @author Ilya K.
 */

function oxygen_vsb_load_cached_css_files() {

	// check Oxygen > Settings
	if (get_option("oxygen_vsb_universal_css_cache")!='true' || isset($_REQUEST['oxy_preview_revision'])) {
		return false;
	}
	
	global $oxygen_vsb_css_styles;
	global $oxygen_vsb_css_files_to_load;

	if (!is_array($oxygen_vsb_css_files_to_load)) {
		return false;
	}

	$oxygen_vsb_css_files_to_load = array_unique($oxygen_vsb_css_files_to_load);
	$oxygen_vsb_css_files_to_load = array_reverse($oxygen_vsb_css_files_to_load);
	//var_dump($oxygen_vsb_css_files_to_load);

	$files_meta = get_option("oxygen_vsb_css_files_state", array());

	// finally enqueue styles
	foreach ($oxygen_vsb_css_files_to_load as $post_id) {

		if ( isset($files_meta[$post_id]) && isset($files_meta[$post_id]['success']) ) {

			// cache file is present for this post
			
			$url = $files_meta[$post_id]['url'];
			$url = add_query_arg("cache", $files_meta[$post_id]['last_save_time'], $url);
			$oxygen_vsb_css_styles->add("oxygen-cache-".$post_id,  $url);
			$oxygen_vsb_css_styles->enqueue(array("oxygen-cache-".$post_id));

		}

		// no cache file for this post, load xlink=css instead
		
		else {
			// check whether to load universal css or not
			if ( get_option("oxygen_vsb_universal_css_cache")=='true' && 
				 get_option("oxygen_vsb_universal_css_cache_success")==true 
				 // TODO: check if other cases may load universal CSS into builder
				 && (!isset($_REQUEST['action']) || stripslashes($_REQUEST['action']) !== 'ct_render_widget') ) {
				
				// don't load xlink for posts that has no shortcodes or Page Settings saved
				$shortcodes 	= get_post_meta( $post_id, "ct_builder_shortcodes", true);
				$page_settings 	= get_post_meta( $post_id, "ct_page_settings", true);

				if ( $shortcodes || 
					 (is_array($page_settings) && !empty(array_filter($page_settings))) // TODO: this won't work for Page settings with defaults like AOS
					) 
				{ 
					$url = add_query_arg( array(
						'post_id' => $post_id,
					    'xlink' => 'css',
					    'nouniversal' => 'true',
					), get_permalink($post_id) );
					$oxygen_vsb_css_styles->add("oxygen-styles-" . $post_id, $url );
					$oxygen_vsb_css_styles->enqueue(array("oxygen-styles-" . $post_id));

				}
			}
			else {
				$url = add_query_arg( array(
					'post_id' => $post_id,
				    'xlink' => 'css',
				), get_permalink($post_id) );
				$oxygen_vsb_css_styles->add("oxygen-styles-" . $post_id, $url );
					$oxygen_vsb_css_styles->enqueue(array("oxygen-styles-" . $post_id));

			}
		}
		
	}

	// all is well and styles has been added
	return true;
}


/**
 * Delete attached CSS cache when on post delete
 *
 * @author Ilya K.
 * @since 2.2
 */

function oxygen_vsb_delete_post_css_cache($id) {

	// remove cached CSS file if exist
	oxygen_vsb_delete_css_file($id);
}
add_action( 'delete_post', 'oxygen_vsb_delete_post_css_cache', 10 );


/**
 * AJAX callback to generate universal.css
 * 
 * @since 2.2
 * @author Ilya K. 
 */

function oxygen_vsb_generate_universal_css_by_ajax() {

	if ( ! oxygen_vsb_current_user_can_access() ) {
		die ( 'Security check' );
	}

    $result = oxygen_vsb_cache_universal_css();
    if ($result) {
    	$message = __("Universal CSS cache generated successfully.","oxygen");
    }
    else {
    	$message = __("Universal CSS cache not generated.","oxygen");
    }
    echo "<div>" . $message . "</div>";
	wp_die();
}
add_action( 'wp_ajax_oxygen_vsb_generate_universal_css_by_ajax', 'oxygen_vsb_generate_universal_css_by_ajax' );


/**
 * AJAX callback to update page cache CSS
 * 
 * @since 2.2
 * @author Ilya K. 
 */

function oxygen_vsb_cache_page_by_ajax() {
	
	if ( ! oxygen_vsb_current_user_can_access() ) {
		die ( 'Security check' );
	}
	
	global $oxy_ajax_post_id;
	$oxy_ajax_post_id = intval($_REQUEST['post_id']);
    
    $result = oxygen_vsb_cache_page_css(intval( $_REQUEST['post_id'] ));
    if ($result) {
    	$message = __("CSS cache generated successfully.","oxygen");
    }
    else {
    	$message = __("CSS cache not generated.","oxygen");
    }
    echo "<div>" . $message . " Post ID: " . intval($_REQUEST['post_id'])." - " . get_the_title(intval($_REQUEST['post_id'])) . "</div>";
	wp_die();
}
add_action( 'wp_ajax_oxygen_vsb_cache_page_by_ajax', 'oxygen_vsb_cache_page_by_ajax' );


/**
 * AJAX callback for CSS cache generated event
 * 
 * @since 2.2
 * @author Ilya K. 
 */

function oxygen_vsb_cache_generated() {
	if ( ! oxygen_vsb_current_user_can_access() ) {
		die ( 'Security check' );
	}

	echo update_option("oxygen_global_colors_cache_update_required", false);
	echo update_option("oxygen_vsb_css_cache_generated_2_2", "true");
	wp_die(); // this is required to terminate immediately and return a proper response
}
add_action( 'wp_ajax_oxygen_vsb_cache_generated', 'oxygen_vsb_cache_generated' );


/**
 * Adds a JS code to regenerate all Oxygen designed posts to update CSS cache via AJAX
 *
 * @author Ilya K.
 * @since 2.2
 */

function oxygen_css_cache_generation_script() { 

	$posts = array();

	$query = new WP_Query(array( 
		'posts_per_page' => -1,
		'post_type' => 'any',
		'meta_query' => array(
			array(
				'key'     => 'ct_builder_shortcodes',
				'value'   => '',
				'compare' => '!=',
			),
		),
	));
		
	foreach ($query->posts as $post) {
		$posts[] = $post->ID; 
	}

	$query = new WP_Query(array( 
		'posts_per_page' => -1,
		'post_type' => array('ct_template'),
		'meta_query' => array(
			array(
				'key'     => 'ct_builder_shortcodes',
				'value'   => '',
				'compare' => '!=',
			),
		),
	));

	foreach ($query->posts as $post) {
		$posts[] = $post->ID; 
	};
	
	?>
	<script type="text/javascript" >
	jQuery(document).ready(function($) {
		var resultContainer = jQuery("#oxy-cache-result");
		
		function oxygenRegenerateCache() {
		
			var _this = jQuery("#oxy-cache-generate");
			
			if (_this.hasClass('oxy-button-disabled')) {
				return;
			}

			_this.addClass('oxy-button-disabled')
			resultContainer.html("").append("<div>CSS Generation Process Started</div>");
			
			var posts = [<?php echo implode(",", $posts); ?>];
				results = [];

		    // generate universal.css
			var data = {
				'action': 'oxygen_vsb_generate_universal_css_by_ajax',
			};
		    jQuery.post(ajaxurl, data, function(response) {
				resultContainer.append(response);
			})
			
				 
			function batchPromiseRecursive() {

				var batch = posts.splice(0, 1);
				 
				if (batch.length == 0) {
					return jQuery.Deferred().resolve().promise();
				}

				var postID = batch[0];
				var data = {
					'action': 'oxygen_vsb_cache_page_by_ajax',
					'post_id': postID
				};
					 
				return jQuery.post(ajaxurl, data)
					.fail(function(e) {
						resultContainer.append("<div>AJAX request failed. Post ID: "+postID+"</div>");
					})
					.then(
					    //success
					    function(response) {
                            resultContainer.append(response);
						    return batchPromiseRecursive();
				 	    },
                        //failure
                        function(){
                            return batchPromiseRecursive();
                        }
                    );
			}
			
			// Run recursive AJAX requests	 
			batchPromiseRecursive().then(function() {

				// All done
				resultContainer.append("<div>All done!</div>");
				_this.removeClass('oxy-button-disabled')
				var data = {'action': 'oxygen_vsb_cache_generated'};
				jQuery.post(ajaxurl, data, function(response) {}); 
			});
		}

		jQuery("#oxy-cache-generate").click(function(){
			oxygenRegenerateCache();
		});

		<?php if (isset($_REQUEST['start_cache_generation'])&&$_REQUEST['start_cache_generation']==="true") : ?>
			oxygenRegenerateCache();
		<?php endif ; ?>
	});
	</script> <?php
}
add_action( 'admin_footer', 'oxygen_css_cache_generation_script' );


/**
 * Show admin notice to update CSS cache if global colors updated
 *
 * @since 2.2
 * @author Ilya K.
 */ 

function global_colors_cache_notice() { 

	if (!get_option("oxygen_global_colors_cache_update_required",false)) {
		return;
	}

	if (get_option("oxygen_vsb_universal_css_cache")!='true') {
		return;
	}

	// don't show if cache tab is open
	$tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : false;
	$page = isset($_GET['page']) ? sanitize_text_field($_GET['page']) : false;

	if ($page == 'oxygen_vsb_settings' && $tab == 'cache') {
		return;
	}

	?>
    <div class="notice notice-warning">
        <p><?php _e( 'Oxygen\'s Global Colors have changed.', 'oxygen' );
         		echo ' <a href="'.get_admin_url().'admin.php?page=oxygen_vsb_settings&tab=cache&start_cache_generation=true">';
         		_e( 'Please click here to regenerate the CSS cache.', 'oxygen' ); 
         		echo "</a>";
         	?>
        </p>
    </div>
<?php }
add_action( 'admin_notices', 'global_colors_cache_notice' );


/**
 * Show admin notice to update CSS cache after upgrade from 2.1 to 2.2
 *
 * @since 2.2
 * @author Ilya K.
 */ 

function oxygen_vsb_update_2_2_notice() {

	if (get_option("oxygen_vsb_universal_css_cache")!='true') {
		return;
	}

	if (get_option("oxygen_vsb_css_cache_generated_2_2")=="true") {
		return;
	}

	// don't show if cache tab is open
	$tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : false;
	$page = isset($_GET['page']) ? sanitize_text_field($_GET['page']) : false;

	if ($page == 'oxygen_vsb_settings' && $tab == 'cache') {
		return;
	}

	?>
    <div class="notice notice-warning">
        <p><?php _e( 'Oxygen has been upgraded.', 'oxygen' );
         		echo ' <a href="'.get_admin_url().'admin.php?page=oxygen_vsb_settings&tab=cache&start_cache_generation=true">';
         		_e( 'Please click here to regenerate the CSS cache.', 'oxygen' ); 
         		echo "</a>";
         	?>
        </p>
    </div>
<?php }
add_action( 'admin_notices', 'oxygen_vsb_update_2_2_notice' );


/**
 * Perform a check if this is a fresh Oxygen 2.2 install or upgrade
 *
 * @since 2.2
 * @author Ilya K.
 */ 

function oxygen_vsb_2_2_check() {

	if ( !oxygen_vsb_is_touched_install() ) {
		// assume the cache is generated
	 	update_option("oxygen_vsb_css_cache_generated_2_2", "true");
	}

}
add_action( 'init', 'oxygen_vsb_2_2_check' );


/**
 * Add component inline styles. Required for dynamic data
 *
 * @since 2.2
 * @author Ilya K.
 */

function oxygen_vsb_element_inline_styles($options) {

	$states = "";

	$options = CT_Component::keys_underscore_to_dash( $options );

	// handle background image
	if ( isset($options['background-image']) && !empty($options['background-image']) && strpos(($options['background-image']),'[oxygen') !== false ) {
	    $styles = ct_getBackgroundLayersCSS($options);
	}
	//var_dump($options);

	if ( !empty( $styles ) ) {
		echo "style=\"$styles\" ";
	}
}
add_action("oxygen_vsb_component_attr", "oxygen_vsb_element_inline_styles");