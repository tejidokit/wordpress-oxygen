<?php
	// TODO review the security aspect
	if (!is_user_logged_in() || !oxygen_vsb_current_user_can_access()) {
	    die();
		}

	$nonce  	= $_REQUEST['nonce'];
	$post_id 	= $_REQUEST['post_id'];

	// check nonce
	if ( ! wp_verify_nonce( $nonce, 'oxygen-nonce-' . $post_id ) ) {
	    // This nonce is not valid.
	    die( 'Security check' );
	}

	global $post;
	// if we set it to an array containing keys as the selective class names, only the css of those classes will be rendered

	ob_start();

	$ct_render_post_using = get_post_meta( $post->ID, 'ct_render_post_using', true );
	$ct_use_inner_content = get_post_meta( $post->ID, 'ct_use_inner_content', true );

	$shortcodes = get_post_meta( $post->ID, 'ct_builder_shortcodes', true );
	
	if (!$shortcodes || ((!$ct_render_post_using && $ct_render_post_using == 'custom_template') && (! $ct_use_inner_content || $ct_use_inner_content == 'content' ))) {

	    // Use WordPress post content as inner content
	    // RENDER default content

		// find the template that has been assigned to innercontent
		$template = ct_get_inner_content_template();

		if($template) {
			$shortcodes = get_post_meta($template->ID, 'ct_builder_shortcodes', true);
		}

		if($shortcodes) {

			// obfuscate [oxygen shortcodes, as they will be deobfuscated and resolved as the component shortcodes are rendered, from the add_shortcode function of a component class
		
			$count = 0; // safety switch
			while(strpos($shortcodes, '[oxygen ') !== false && $count < 9) {
				$count++;
				$shortcodes = preg_replace_callback('/(\")(url|src|map_address|alt|background-image)(\":\"[^\"]*)\[oxygen ([^\]]*)\]([^\"\[\s]*)/i', 'ct_obfuscate_oxy_url', $shortcodes);
			}

			echo do_shortcode($shortcodes);
		}
		else {
			if(function_exists('is_woocommerce') && is_woocommerce()) {
				woocommerce_content();
				?>
				<script type="text/javascript">
					jQuery('body').addClass('woocommerce');
				</script>
				<style>
					.woocommerce-product-gallery {
						opacity: 1 !important;
					}

					.woocommerce-Tabs-panel:not(:nth-child(2)) {
						display: none;
					}

				</style>
				<?php
			}
			else {
		        while ( have_posts() ) {
		            the_post();
		            the_content();
		        }
		    }
		}
    } else if($shortcodes) {

    	// obfuscate [oxygen shortcodes, as they will be deobfuscated and resolved as the component shortcodes are rendered, from the add_shortcode function of a component class
		
		$count = 0; // safety switch
		while(strpos($shortcodes, '[oxygen ') !== false && $count < 9) {
			$count++;
			$shortcodes = preg_replace_callback('/(\")(url|src|map_address|alt|background-image)(\":\"[^\"]*)\[oxygen ([^\]]*)\]([^\"\[\s]*)/i', 'ct_obfuscate_oxy_url', $shortcodes);
		}

    	// Use Oxygen designed inner content
    	echo do_shortcode($shortcodes);	    
    }


    $content = ob_get_clean();

    
    if(empty($content)) {
    	the_content();
    } else {
    	echo $content;


?>
<style>
<?php
	remove_action("ct_footer_styles", "ct_css_styles"); // we do not need default css styles or classes being rendered here
	do_action("ct_footer_styles");
?>
</style>
<?php

	}