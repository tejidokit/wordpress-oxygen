<?php 

/**
 * Interface to transform Components Tree JSON object to
 * WordPress shortcodes and vice versa.
 *  
 */


/**
 * Transform JSON Components Tree to WordPress nested shortcodes
 * 
 * @return string
 * @since 0.1
 */

function components_json_to_shortcodes( $json, $reusable = false ) {

	$components_tree = json_decode( $json, true );

	if ( $reusable ) {
		$components_tree['children'] = ct_update_ids( $components_tree['children'], 1, $components_tree );
	};

	if ( is_null ( $components_tree ) )
		return false;

	$output = parse_components_tree( $components_tree['children'] );

	return $output;
}


/**
 * Recursive function that actually transform an Object to WordPress shortcodes
 *
 * @since 0.1
 */

function parse_components_tree( $components_tree ) {

	global $oxygen_signature;

	if ( !is_array( $components_tree ) ) {
		return false;
	}

	$output = "";

	foreach( $components_tree as $id => $item ) {
		$name = sanitize_text_field( $item['name'] );
		$ct_options = null;
		$shortcode_atts = array();
		$ct_options_string = null;
		$ct_content = '';
		$nested = false;

		$full_shortcode = false;

		// go deeper into the tree if item has children and have no options
		// if ( $item['children'] && $item['name'] == "ct_reusable" ) {
			
		// 	$content = parse_components_tree( $item['children'] );
			
		// 	// update view
		// 	update_post_meta( $item['options']['view_id'], 'ct_builder_shortcodes', $content );

		// 	$view_options = array (
		// 			"view_id" 	=> $item['options']['view_id'],
		// 			"ct_id" 	=> $item['options']['ct_id'],
		// 			"ct_parent" => $item['options']['ct_parent'],
		// 		);

		// 	$view_json = json_encode( $view_options );

		// 	// add to shortcodes
		// 	$output .= "[{$item['name']} ct_options='$view_json']";

		// 	// move to next component
		// 	continue;
		// }

		// handle 'Shortcode' component
		if ( $item['name'] == "ct_shortcode" ) {

			// get 'original' options
			$original = $item['options']['original'];

			if ( $original['full_shortcode'] ) {


				$full_shortcode = $original['full_shortcode'];

				/*$executed_shortcode = do_shortcode( $full_shortcode );

				// TODO: better check for broken shortcodes like "[gallery"
				if ( $executed_shortcode == $full_shortcode ) {
					$full_shortcode = "";
				}*/

				$original = array();
				$item['options']['original']['full_shortcode'] = true;

			}


			// // start opening shortcode tag
			// $output .= "[" . $item['name'];
			
			// // add params
			// $ct_options = array ( "ct_id", "ct_parent", "selector", "ct_shortcode", "original" );
			// if ( is_array( $original ) ) {
			// 	foreach ( $original as $key => $value ) {

			// 		if ( in_array($key, $ct_options) ) {
			// 			continue;
			// 		}
					
			// 		$output .= " $key='$value'";
			// 	}
			// }
		}
		// else {
		// 	// start opening shortcode tag
		// 	$output .= "[" . $item['name'];
		// }
		
		// check if nested column or section
		if ( $item['depth'] > 1 && in_array( $item['name'], array( 'ct_link', 'ct_section', 'ct_container', 'ct_inner_content', 'ct_columns', 'ct_column', 'ct_new_columns', 'ct_div_block', 'ct_nestable_shortcode', 'oxy_superbox', 'oxy_toggle', 'oxy_tab', 'oxy_tabs', 'oxy_tab_content', 'oxy_tabs_contents' ) ) ) {
			$nested = true;
		}

		// add depth suffix if needed
		if ( $nested ) {
			$name .= '_' . $item['depth'];
		}

		// add shortcode parameters
		if ( is_array( $item['options'] ) ) {
			
			foreach ( $item['options'] as $key => $value ) {
	
				if ( $key == "url" && $item['name'] == "embed" ) {
					unset( $item['options']['url'] );
				}

				if ( $key == "classes" ) {
					continue;
				}

				if ( is_array( $value ) ) {

					if ( ! empty( $value ) ) {

						foreach ( $value as $array_key => $array_value ) {

							// make sure widget parameters won't brake the shortcode with quotes
							if ( $item['name'] == "ct_widget" && $array_key == "instance" ) {
								$item['options'][$key][$array_key] = ct_encode_widget_instance($array_value);
								$item['options'][$key]['paramsBase64'] = true;
							}

							if ( $array_key == "custom-css" ) {
								$item['options'][$key][$array_key] = normalize_custom_css( $array_value );
							}

							$options_to_encode = ["code-php","code-css","code-js","alt",
												  "testimonial_text","testimonial_author","testimonial_author_info",
												  "icon_box_heading","icon_box_text",
												  "progress_bar_left_text","progress_bar_right_text",
												  'pricing_box_package_title','pricing_box_package_subtitle','pricing_box_content','pricing_box_package_regular'];

							if ( in_array($array_key, $options_to_encode) ) {
								$item['options'][$key][$array_key] = base64_encode( $item['options'][$key][$array_key] );
							}

							if($array_key == 'globalconditions') {
								foreach($item['options'][$key][$array_key] as $conditionKey => $condition) {
									$item['options'][$key][$array_key][$conditionKey]['value'] = base64_encode($condition['value']);
								}
							}
						}
					}
					else {
						unset( $item['options'][$key] );
					}
				}
				elseif ( $key == "ct_content" ) {
					
					$ct_content = $item['options']['ct_content'];

					unset($item['options'][$key]);// = htmlspecialchars( $value, ENT_QUOTES );
				}
			}

			$value = json_encode( $item['options'], JSON_FORCE_OBJECT );

			$value = ct_unicode_decode( $value );
			$shortcode_atts['ct_options'] = $value;
			$ct_options_string = "ct_options='{$value}'";
		}

		// // handle full shortcode
		// if ( $full_shortcode ) {
		// 	$output .= $full_shortcode;
		// }
		
		// handle embed URL
		if ( isset( $item['options']['url'] ) && $item['name'] == "embed" ) {
			$output .= $item['options']['url'];
		}

		$ct_content = oxygen_vsb_filter_shortcode_content_encode($ct_content);

		if ( isset($item['children']) ) {
			if ( !empty( $ct_content ) ) {
				// if we have content and children at the same time
				$temp_content = $ct_content;

				$shortcodes = array();

				// get shortcodes for each child
				foreach( $item['children'] as $id => $child ) {
					// check if placeholder is in the outer template
					$placeholder_id = ($child['id']>=100000) ? $child['id']-100000 : $child['id'];
					$shortcodes["<span id=\"ct-placeholder-{$placeholder_id}\"></span>"] = parse_components_tree( array( $id => $child ) );
				}
				// replace placeholders with shortcodes
				foreach($shortcodes as $key => $val) {
					$temp_content = str_replace($key,  $val, $temp_content);
				}

				// output
				$ct_content = $temp_content;
			} else {
				// go deeper into the tree if item has children and have no content
				$ct_content .= parse_components_tree( $item['children'] );
			}
		}

		// Component classes aren't coupled here, so leverage WordPress filters for validation
		if ( false !== $component = apply_filters( "oxygen_vsb_filter_{$item['name']}", array( 'item' => $item, 'content' => $ct_content ) ) ) {
			if ( $item['name'] == "ct_shortcode" && $full_shortcode) {
				$component['content'] = $full_shortcode;
			}
			
			// sign oxy shortcodes inside the content
			$component['content'] = preg_replace_callback('/\[oxygen ([^\]]*)\]/i', 'ct_sign_oxy_dynamic_shortcode', $component['content']);
			
			// sign oxy shortcodes inside the properties
			if(isset($shortcode_atts['ct_options'])) {

				$shortcode_atts['ct_options'] = preg_replace_callback('/\[oxygen ([^\]]*)\]/i', 'ct_sign_oxy_dynamic_shortcode', $shortcode_atts['ct_options']);
				$ct_options_string = "ct_options='".$shortcode_atts['ct_options']."'";

			}
			
			// Generate signature
			$signature = $oxygen_signature->generate_signature_shortcode_string( $name, $shortcode_atts, $component['content'] );
			// Generate output
			$output .= "[{$name} {$signature} {$ct_options_string}]{$component['content']}[/{$name}]";
		}

	}
	
	return $output;
}


function ct_sign_oxy_dynamic_shortcode($results) {
	
	global $oxygen_signature;
	
	$signature_arg = $oxygen_signature->get_shortcode_signature_arg();

	$pattern = get_shortcode_regex( array('oxygen') );
	$result = str_replace('\"', '"', $results[0]);
 	preg_match_all( "/$pattern/", $result, $m );

 	$tag = $m[2][0];
 	
 	$attr = shortcode_parse_atts( $m[3][0] );

 	if(isset($attr[$signature_arg])) {
 		unset($attr[$signature_arg]);
 	}

  	$signature = $oxygen_signature->generate_signature_shortcode_string( $tag, $attr, null );

 	$options_string = "";

 	foreach($attr as $key => $val) {
 		$options_string .= "{$key}='{$val}' "; 
 	}

	return "[{$tag} {$signature} {$options_string}]";

}

/**
 * Update IDs for Re-usable parts start from $counter
 *
 * @since 0.2.3
 */

function ct_update_ids( $components_tree, $count, &$parent ) {

	global $counter;

	$counter = $count;

	foreach ( $components_tree as $key => $child ) {
		// update placeholder id's
		if(isset($parent['options']['ct_content'])) {
			$parent['options']['ct_content'] = str_replace("ct-placeholder-" . $components_tree[$key]['options']['ct_id'], 
												"ct-placeholder-" . $counter, 
												$parent['options']['ct_content']);
		}
		
		$components_tree[$key]['id'] 					= $counter;
		$components_tree[$key]['options']['ct_id'] 		= $counter;
		$components_tree[$key]['options']['ct_parent'] 	= $parent['id'];

		$counter++;

		if ( $components_tree[$key]['children'] ) {
			$components_tree[$key]['children'] = ct_update_ids( $components_tree[$key]['children'], $counter, $components_tree[$key] );
		}
	}

	return $components_tree;
}


/**
 * Transform WordPress post content to JSON Components Tree
 * 
 * @return JSON or false
 * @since 0.1
 */

function content_to_components_json( $content ) {

	$shortcodes = parse_shortcodes( $content );

	if ( $shortcodes['is_shortcode'] === false && $content != "" ) {
		return json_encode( false );
	}

	$root = array ( 
		"id"	=> 0,
		"name" 	=> "root",
		"depth"	=> 0 
	);
	
	$root['children'] = $shortcodes['content'];

	$components_tree = json_encode( $root );

	if ( is_null( $components_tree ) ) {
		return false;
	}
	else {
		return $components_tree;
	}
}



/**
 * Recursive function that actually transform WordPress shortcodes to Array
 *
 * @return Array
 * @since 0.1
 */

function parse_shortcodes( $content, $is_first = true, $verify_signature = true ) {

	$content = preg_replace_callback('/(\")(url|src|map_address|alt|background-image|oxycode|value)(\":\"[^\"]*)\[oxygen ([^\]]*)\]([^\"\[\s]*)/i', 'ct_obfuscate_oxy_url', $content);


	$pattern = get_shortcode_regex();
	preg_match_all( '/'. $pattern .'/s', $content, $matches );

	$tags 			= $matches[0];
	$names 			= $matches[2];
	
	$args 			= $matches[3];
	$inner_content 	= $matches[5];


	if ( ! $args ) {
		return array(
			'is_shortcode' => false,
			'content' => $content );
	}

	if ( $is_first ) {
		
		// check if 
		$total_length = 0;
		foreach ( $tags as $tag ) {
			$total_length += strlen($tag);
		}

		if ( $total_length != strlen($content) ) {
			return array(
				'is_shortcode' => false,
				'content' => $content );
		}
	}

	$shortcodes = array();

	foreach ( $args as $key => $value ) {

		$shortcode 	= array();
		$depth 		= false;
		
		$options 	= shortcode_parse_atts( $value );

		// skip shortcode if no shortcode params
		if ( ! is_array( $options ) ) {
			continue;
		}

		/*$options['ct_options'] = str_replace("\n", "\\n", $options['ct_options']);
		$options['ct_options'] = str_replace("\r", "\\r", $options['ct_options']);
		$options['ct_options'] = str_replace("\t", "\\t", $options['ct_options']);*/

		$verfOptions = $options; // keep a copy to verify the signature later

		$options 	= json_decode( $options['ct_options'], true );

		$id = $options['ct_id'];
		$shortcode['id'] 		= $id;
		$shortcode['name'] 		= $names[$key];

		if(is_array($options)) {
			foreach($options as $optionKey => $option) {
				if(in_array($optionKey,  array('selector', 'activeselector', 'ct_id', 'ct_parent'))) {
					continue;
				}

				if($optionKey === 'media') {
					foreach($options['media'] as $bpKey => $breakpoint) {
						foreach($breakpoint as $stateKey => $state) {
							foreach(array('src', 'url', 'map_address', 'alt', 'background-image') as $param) {
								if(isset($options['media'][$bpKey][$stateKey][$param])) {
									$count = 0; // safety switch
									while(strpos($options['media'][$bpKey][$stateKey][$param], '+oxygen') !== false && $count < 9) {
										$count++;
										$options['media'][$bpKey][$stateKey][$param] = preg_replace_callback('/\+oxygen(.+?)\+/i', 'ct_deobfuscate_oxy_url', $options['media'][$bpKey][$stateKey][$param]);
									}
								}
							}
						}
					}
					continue;
				}

				foreach(array('src', 'url', 'map_address', 'alt', 'background-image') as $param) {
					if(isset($options[$optionKey][$param])) {
						$count = 0; // safety switch
						while(strpos($options[$optionKey][$param], '+oxygen') !== false && $count < 9) {
							$count++;
							$options[$optionKey][$param] = preg_replace_callback('/\+oxygen(.+?)\+/i', 'ct_deobfuscate_oxy_url', $options[$optionKey][$param]);
						}
					}
				}

				if($optionKey === 'original' && isset($options[$optionKey]['globalconditions'])) {
					foreach($options[$optionKey]['globalconditions'] as $conditionKey => $condition) {
						if(isset($condition['oxycode'])) {
							$options[$optionKey]['globalconditions'][$conditionKey]['oxycode'] = preg_replace_callback('/\+oxygen(.+?)\+/i', 'ct_deobfuscate_oxy_url', $options[$optionKey]['globalconditions'][$conditionKey]['oxycode']);
						}

						if(isset($condition['value']) && strpos($condition['value'], '+oxygen') !== false) {
							$options[$optionKey]['globalconditions'][$conditionKey]['value'] = preg_replace_callback('/\+oxygen(.+?)\+/i', 'ct_deobfuscate_oxy_url', $options[$optionKey]['globalconditions'][$conditionKey]['value']);
						}
					}
				}

				
			}
		}

		global $oxygen_signature;

		$verfOptions['ct_options'] 	= json_encode( $options, JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT );
		
		$verfInnercontent = $inner_content[ $key ];

		// the inner content being used in the oxygen signature verification should have deobfuscated oxy dynamic shortcode strings
		if(strpos($verfInnercontent, '+oxygen') !== false) {
			$verfInnercontent = preg_replace_callback('/\+oxygen(.+?)\+/i', 'ct_deobfuscate_oxy_url', $verfInnercontent);
		}
		
		// Skip shortcodes that are not properly signed, it has to be done here only after ct_deobfuscate_oxy_url has been applied on the options
		if ( $verify_signature && ! $oxygen_signature->verify_signature( $names[ $key ], $verfOptions, $verfInnercontent ) ) {
			continue;
		}

		$sanitized_options = array();
		
		// sanitize option names
		if ( $options ) {
			foreach ( $options as $name => $value ) {

				$array = $value;

				if ( is_array( $array ) && ! empty( $array ) && $name != "classes" ) {

					foreach ( $array as $array_key => $array_value) {

						// make sure widget parameters won't brake the shortcode with quotes
						if ( $names[$key] == "ct_widget" && $array_key == "instance" ) {
							if(isset($array['paramsBase64'])) {

								$array[$array_key] = ct_decode_widget_instance($array_value);
							}
						}

						// TODO: add a filter here to add new options from Class
						$options_to_decode = ["code-php","code-css","code-js","alt",
											  "testimonial_text","testimonial_author","testimonial_author_info",
											  "icon_box_heading","icon_box_text",
											  "progress_bar_left_text","progress_bar_right_text",
											  'pricing_box_package_title','pricing_box_package_subtitle','pricing_box_content','pricing_box_package_regular'];

						if ( in_array($array_key, $options_to_decode) ) {
							$array[$array_key] = base64_decode( $array_value );
						}

						if ( $array_key == "custom-css" ) {
							$array[$array_key] = prettify_custom_css( $array[$array_key] );
						}

						if($array_key == 'globalconditions') {
							foreach($array[$array_key] as $conditionKey => $condition) {
								$array[$array_key][$conditionKey]['value'] = base64_decode($condition['value']);
							}
						}
					}

					$value = $array;
				}
				
				$sanitized_options[$name] = $value;
			}
		}
		
		
		$shortcode['options'] 	= $sanitized_options;

		// handle 'Shortcode' component
		if ( isset($shortcode['options']) && isset($shortcode['options']['ct_shortcode']) && $shortcode['options']['ct_shortcode'] == "true" ) {
			
			if ( isset( $shortcode['options']['original']['full_shortcode'] ) ) {
				$shortcode['options']['original']['full_shortcode'] = $inner_content[$key];
				
			}
			unset($inner_content[$key]);
		}

		// add depth 1 
		if ( $shortcode['name'] == "ct_column" || 
			 $shortcode['name'] == "ct_columns" || 
			 $shortcode['name'] == "ct_new_columns" || 
			 $shortcode['name'] == "ct_container" || 
			 $shortcode['name'] == "ct_section" ||
			 $shortcode['name'] == "ct_div_block" || 
			 $shortcode['name'] == "ct_nestable_shortcode" || 
			 $shortcode['name'] == "ct_inner_content" ||
			 $shortcode['name'] == "ct_link" ||
			 $shortcode['name'] == 'oxy_superbox' || 
			 $shortcode['name'] == 'oxy_toggle' || 
			 $shortcode['name'] == 'oxy_tab' || 
			 $shortcode['name'] == 'oxy_tabs' || 
			 $shortcode['name'] == 'oxy_tab_content' || 
			 $shortcode['name'] == 'oxy_tabs_contents' ) {

			$depth = 1;
		}

		// strip from depth postfix
		if ( strpos( $shortcode['name'], "ct_section_" ) !== false ) {
			
			$depth = substr( $shortcode['name'], 11 );
			$shortcode['name'] 	= "ct_section";
		}

		if ( strpos( $shortcode['name'], "ct_columns_" ) !== false ) {

			$depth = substr( $shortcode['name'], 11 );
			$shortcode['name'] 	= "ct_columns";
		}

		if ( strpos( $shortcode['name'], "ct_new_columns_" ) !== false ) {

			$depth = substr( $shortcode['name'], 15 );
			$shortcode['name'] 	= "ct_new_columns";
		}

		if ( strpos( $shortcode['name'], "ct_column_" ) !== false ) {

			$depth = substr( $shortcode['name'], 10 );
			$shortcode['name'] 	= "ct_column";
		}

		if ( strpos( $shortcode['name'], "ct_div_block_" ) !== false ) {

			$depth = substr( $shortcode['name'], 13 );
			$shortcode['name'] 	= "ct_div_block";
		}

		if ( strpos( $shortcode['name'], "ct_nestable_shortcode_" ) !== false ) {

			$depth = substr( $shortcode['name'], 13 );
			$shortcode['name'] 	= "ct_nestable_shortcode";
		}

		if ( strpos( $shortcode['name'], "ct_inner_content_" ) !== false ) {

			$depth = substr( $shortcode['name'], 17 );
			$shortcode['name'] 	= "ct_inner_content";
		}

		if ( strpos( $shortcode['name'], "ct_link_" ) !== false && (strpos( $shortcode['name'], "ct_link_text" ) === false && strpos( $shortcode['name'], "ct_link_button" ) === false)) {

			$depth = substr( $shortcode['name'], 8 );
			$shortcode['name'] 	= "ct_link";
		}

		if ( strpos( $shortcode['name'], "ct_slider_" ) !== false ) {

			$depth = substr( $shortcode['name'], 10 );
			$shortcode['name'] 	= "ct_slider";
		}

		if ( strpos( $shortcode['name'], "ct_slide_" ) !== false ) {

			$depth = substr( $shortcode['name'], 9 );
			$shortcode['name'] 	= "ct_slide";
		}

		if ( strpos( $shortcode['name'], "oxy_superbox_" ) !== false ) {

			$depth = substr( $shortcode['name'], 13 );
			$shortcode['name'] 	= "oxy_superbox";
		}

		if ( strpos( $shortcode['name'], "oxy_toggle_" ) !== false ) {

			$depth = substr( $shortcode['name'], 11 );
			$shortcode['name'] 	= "oxy_toggle";
		}

		if ( strpos( $shortcode['name'], "oxy_tab_" ) !== false && strpos( $shortcode['name'], "oxy_tab_content" ) === false ) {

			$depth = substr( $shortcode['name'], 8 );
			$shortcode['name'] 	= "oxy_tab";
		}

		if ( strpos( $shortcode['name'], "oxy_tabs_" ) !== false && strpos( $shortcode['name'], "oxy_tabs_contents" ) === false ) {

			$depth = substr( $shortcode['name'], 9 );
			$shortcode['name'] 	= "oxy_tabs";
		}

		if ( strpos( $shortcode['name'], "oxy_tab_content_" ) !== false ) {

			$depth = substr( $shortcode['name'], 16 );
			$shortcode['name'] 	= "oxy_tab_content";
		}

		if ( strpos( $shortcode['name'], "oxy_tabs_contents_" ) !== false ) {

			$depth = substr( $shortcode['name'], 18 );
			$shortcode['name'] 	= "oxy_tabs_contents";
		}

		// parse inner content shortcodes
		if ( isset($inner_content[$key]) ) {
			
			if(strpos($inner_content[$key], '[oxygen ') === 0) {
				$nested_content['content'] = $inner_content[$key];
			}
			else {
				$nested_content = parse_shortcodes( $inner_content[$key], false, $verify_signature );
			}
				
			
			if ( isset($nested_content['is_shortcode']) && $nested_content['is_shortcode']) {
				$shortcode['children'] = $nested_content['content'];
				
				// get shortcodes inside content
				if ( $shortcode['name'] == "ct_paragraph" || 
					 $shortcode['name'] == "ct_text_block" || 
					 $shortcode['name'] == "ct_headline" ||
					 $shortcode['name'] == "ct_link_text" ||
					 $shortcode['name'] == "ct_link_button" ||
					 $shortcode['name'] == "ct_li") {

					preg_match_all( '/'. $pattern .'/s', $inner_content[$key], $inner_matches );

					$inner_shortcodes 			= $inner_matches[0];
					$inner_shortcodes_atts		= $inner_matches[3];
					$inner_shortcodes_parsed 	= $inner_content[$key];

					foreach ( $inner_shortcodes as $key => $inner_shortcode ) {
						
						// parse "ct_options" parameter
						$atts = shortcode_parse_atts( $inner_shortcodes_atts[$key] );
						$atts = json_decode( $atts['ct_options'], true );

						$inner_shortcodes_parsed 	= str_replace( $inner_shortcode, "<span id=\"ct-placeholder-{$atts['ct_id']}\"></span>", $inner_shortcodes_parsed );

					}

					if ($inner_shortcodes) {
						$inner_shortcodes_parsed = oxygen_vsb_filter_shortcode_content_decode($inner_shortcodes_parsed);
						$shortcode['options']['ct_content'] = $inner_shortcodes_parsed;	
					}
				}

			} else {
				
				$nested_content['content'] = trim($nested_content['content']);
				
				if(!($shortcode['name'] == 'ct_inner_content' && empty($nested_content['content']))) {
					$nested_content['content'] = oxygen_vsb_filter_shortcode_content_decode($nested_content['content']);
					$shortcode['options']['ct_content'] = $nested_content['content'];
				}
			}
		}

		if ( isset ( $depth ) )
			$shortcode['depth'] = $depth;

		$shortcodes[] = $shortcode;
	}

	return array(
			'is_shortcode' 	=> true,
			'content' 		=> $shortcodes );
}


/**
 * Update custom css variable so it can be 
 * used in shortcode attribute
 *
 * @since 0.1.4
 */

function normalize_custom_css( $css ) {

	if ( $css ) {
		$css = str_replace("\n",'', $css);
		$css = str_replace("\r",'', $css);
		$css = str_replace("\t",'', $css);
	}

	return $css;
}


/**
 * Prettify custom CSS code
 *
 * @since 0.1.8
 */

function prettify_custom_css( $css ) {

	if ( $css ) {
		$css = str_replace(";",";\n", $css);
	}

	return $css;
}


/**
 * Helper function to decode Unicode to UTF-8 characters
 *
 * @since 0.1.7
 */
function ct_unicode_decode($str) {
    return preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'ct_replace_unicode_escape_sequence', $str);
}

function ct_replace_unicode_escape_sequence($match) {
    return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
}

/**
 * Encode/decode widget params to make sure these won't brake shortocdes with quotes or similar
 *
 * @author Ilya K.
 * @since 2.0
 */

function ct_encode_widget_instance($array_value) {
	return array_map(function($value) {
		if ( is_array($value) ) {
			return ct_encode_widget_instance($value);
		}
		elseif ( is_bool($value) ) {
			return $value;
		}
		else {
			return base64_encode($value);
		}
	}, $array_value );
}

function ct_decode_widget_instance($array_value) {
	return array_map(function($value) {
	 	if ( is_array($value) ) {
			return ct_decode_widget_instance($value);
	 	}
	 	elseif ( is_bool($value) ) {
	 		return $value;
	 	}
	 	else {
			return base64_decode($value);
		}
	}, $array_value );
}


/**
 * Encode [] brackets to special _OXY_..._BRACKET_ string 
 * so the shortcodes doesn't render inside text components
 * 
 * @author Ilya K.
 * @since 2.1
 */

function oxygen_vsb_filter_shortcode_content_encode($content) {

	// exclude [oxygen data=""] shortcodes
	preg_match_all('/\[oxygen[^\]]*\]/m', $content, $matches);
	if (is_array($matches)) {
		foreach ($matches as $key => $match) {
			if (isset($match[0])){
				$content = str_replace($match[0], "_OXYGEN_DATA_".$key."_", $content);
			}
		}
	}
	
	$content = str_replace("[", "_OXY_OPENING_BRACKET_", $content);
	$content = str_replace("]", "_OXY_CLOSING_BRACKET_", $content);

	// include [oxygen data=""] shortcodes back
	if (is_array($matches)) {
		foreach ($matches as $key => $match) {
			if (isset($match[0])){
				$content = str_replace("_OXYGEN_DATA_".$key."_", $match[0], $content);
			}
		}
	}

	return $content;
}


/**
 * Decode special _OXY_..._BRACKET_ srtings back to []
 * so the shortcodes doesn't render inside text components
 * 
 * @author Ilya K.
 * @since 2.1
 */

function oxygen_vsb_filter_shortcode_content_decode($content) {

	$content = str_replace("_OXY_OPENING_BRACKET_", "[", $content);
	$content = str_replace("_OXY_CLOSING_BRACKET_", "]", $content);

	return $content;
}
