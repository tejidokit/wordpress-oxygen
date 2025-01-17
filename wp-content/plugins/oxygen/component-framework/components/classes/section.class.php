<?php 

Class CT_Section extends CT_Component {

	function __construct( $options ) {

		// run initialization
		$this->init( $options );

		// Add shortcodes
		add_shortcode( $this->options['tag'], array( $this, 'add_shortcode' ) );

		for ( $i = 2; $i <= 16; $i++ ) {
			add_shortcode( $this->options['tag'] . "_" . $i, array( $this, 'add_shortcode' ) );
		}

		// change component button place
		remove_action("ct_toolbar_fundamentals_list", array( $this, "component_button" ) );
		add_action("oxygen_basics_components_containers", array( $this, "component_button" ) );
	}


	/**
	 * Add a [ct_section] shortcode to WordPress
	 *
	 * @since 0.1
	 */

	function add_shortcode( $atts, $content, $name ) {

		if ( ! $this->validate_shortcode( $atts, $content, $name ) ) {
			return '';
		}

		$options = $this->set_options( $atts );

		$video_class = "";
		$video_html = "";

		if (isset($options["video_background"])) {
			$video_class = "oxy-video-background";
			$video_html = "<div class='oxy-video-container'><video autoplay loop playsinline muted><source src='".esc_attr($options['video_background'])."'></video><div class='oxy-video-overlay'></div></div>";
		}

		$page_settings = ct_get_page_settings();

		ob_start();
		
		?><<?php echo esc_attr($options['tag'])?> id="<?php echo esc_attr($options['selector']) ?>" class="<?php echo $video_class; ?> <?php if(isset($options['classes'])) echo esc_attr($options['classes']); ?>" <?php do_action("oxygen_vsb_component_attr", $options, $this->options['tag']); ?>><?php echo $video_html; ?><div class="ct-section-inner-wrap"><?php echo do_shortcode( $content ); ?></div></<?php echo esc_attr($options['tag'])?>><?php

		return ob_get_clean();
	}

// End CT_Section class
}


// Create section instance
global $oxygen_vsb_components;
$oxygen_vsb_components['section'] = new CT_Section( array( 
			'name' 		=> 'Section',
			'tag' 		=> 'ct_section',
			'params' 	=> array(
					array(
						"param_name" 	=> "custom-width-unit",
						"value" 		=> "auto",
						"hidden" 		=> true
					),
					array(
						"type" 			=> "colorpicker",
						"heading" 		=> __("Text Color", "oxygen"),
						"param_name" 	=> "color",
					),
					array(
						"type" 			=> "colorpicker",
						"heading" 		=> __("Background Color", "oxygen"),
						"param_name" 	=> "background-color",
					),
					array(
						"type" 			=> "flex-layout",
						"heading" 		=> __("Child Element Layout", "oxygen"),
						"param_name" 	=> "flex-direction",
						"css" 			=> true,
					),
					array(
						"type" => "positioning",
					),
					array(
						"type" 			=> "tag",
						"heading" 		=> __("Tag", "oxygen"),
						"param_name" 	=> "tag",
						"value" 		=> array (
											"section" 	=> "section",
											"div" 		=> "div",
											"footer" 	=> "footer",
											"header" 	=> "header",
											"article" 	=> "article",
											"main" 		=> "main",
										),
						"css" 			=> false,
						"rebuild" 		=> true,
					),
				),
				/* set defaults */
				'advanced' 	=> array(
						'flex' => array(
							'values' 	=> array (
									'display' 		 => 'flex',
									'flex-direction' => 'column',
									'align-items' 	 => 'flex-start',
									'justify-content'=> '',
									'text-align' 	 => '',
									'flex-wrap' 	 => 'nowrap',
								)
						),
						'size' => array(
							'values' 	=> array (
									'section-width'	 				=> 'page-width',
									'width' 		 				=> '100',
									'width-unit' 					=> '%',
									/*'container-padding-top' 		=> '50',
									'container-padding-bottom' 		=> '50',
									'container-padding-left' 		=> '20',
									'container-padding-right' 		=> '20',*/
									'container-padding-top-unit' 	=> '',
									'container-padding-bottom-unit' => '',
									'container-padding-left-unit' 	=> '',
									'container-padding-right-unit' 	=> '',
								)
						),
						'background' => array(
							'values' 	=> array (
									'background-size' 	=> 'cover',
								)
						),
						'allow_shortcodes'  => true,
				),
		)
);