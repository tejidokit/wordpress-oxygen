<?php 

Class CT_Component {

	var $options;
	var $css = "";
	var $font_families = array ();
	var $advanced_defaults = array (

			'positioning' => array (

				// margin padding
				"margin-top" 			=> "0",
				"margin-right" 			=> "0",
				"margin-bottom" 		=> "0",
				"margin-left" 			=> "0",

				"margin-top-unit" 		=> "px",
				"margin-right-unit" 	=> "px",
				"margin-bottom-unit" 	=> "px",
				"margin-left-unit" 		=> "px",
				
				"padding-top" 			=> "0",
				"padding-right" 		=> "0",
				"padding-bottom" 		=> "0",
				"padding-left" 			=> "0",

				"padding-top-unit" 		=> "px",
				"padding-right-unit" 	=> "px",
				"padding-bottom-unit" 	=> "px",
				"padding-left-unit" 	=> "px",

				// position
				"float"			=> "none",
				"overflow" 		=> "visible",
				"visibility"	=> "visible",
				"display"		=> "block",
				"clear"			=> "none",
				"position"		=> "static",

				"top" 			=> "",
				"left"			=> "",
				"right" 		=> "",
				"bottom" 		=> "",

				"top-unit" 		=> "px",
				"left-unit"		=> "px",
				"right-unit" 	=> "px",
				"bottom-unit" 	=> "px",

				// size
				"width" 			=> "",
				"min-width" 		=> "",
				"max-width" 		=> "",
	
				"height" 			=> "",
				"min-height" 		=> "",
				"max-height" 		=> "",

				"width-unit" 		=> "px",
				"min-width-unit" 	=> "px",
				"max-width-unit" 	=> "px",
	
				"height-unit" 		=> "px",
				"min-height-unit" 	=> "px",
				"max-height-unit" 	=> "px",

				),

			'border' => array (
				"border-top-width" 			=> "0",
				"border-top-width-unit"		=> "px",
				"border-top-style" 			=> "none",
				"border-top-color" 			=> "",
				
				"border-right-width" 		=> "0",
				"border-right-width-unit"	=> "px",
				"border-right-style" 		=> "none",
				"border-right-color" 		=> "",
				
				"border-bottom-width" 		=> "0",
				"border-bottom-width-unit"	=> "px",
				"border-bottom-style" 		=> "none",
				"border-bottom-color" 		=> "",
				
				"border-left-width" 		=> "0",
				"border-left-width-unit"	=> "px",
				"border-left-style" 		=> "none",
				"border-left-color" 		=> "",

				// fake property
				"border-all-width" 			=> "0",
				"border-all-width-unit"		=> "px",
				"border-all-style" 			=> "none",
				"border-all-color" 			=> "",

				// radius
				"border-radius" 					=> "0",
				"border-top-right-radius" 			=> "0",
				"border-top-left-radius" 			=> "0",
				"border-bottom-right-radius" 		=> "0",
				"border-bottom-left-radius" 		=> "0",

				"border-radius-unit" 				=> "px",
				"border-top-right-radius-unit" 		=> "px",
				"border-top-left-radius-unit" 		=> "px",
				"border-bottom-right-radius-unit" 	=> "px",
				"border-bottom-left-radius-unit" 	=> "px",
				),

			'typography' => array (
				'font-family' 			=> 'Inherit',
				
				'font-size' 			=> '',
				'font-size-unit' 		=> 'px',
				
				'font-weight' 			=> '400',
				'font-style' 			=> 'normal',

				'text-align' 			=> '',
				'direction' 			=> 'ltr',
				
				'line-height' 			=> '',

				'letter-spacing' 		=> '',
				'letter-spacing-unit' 	=> 'px',
				
				'list-style-type' 		=> 'disc',
				'text-decoration' 		=> 'none',
				'text-transform' 		=> 'none',

				'-webkit-font-smoothing'=> 'subpixel-antialiased',
				),

			'background' => array (
				// color
				'background-color' 				=> '',
				
				// image
				'background-image' 				=> '',
				'background-size' 				=> 'auto',
				'background-repeat' 			=> 'repeat',
				'background-attachment' 		=> 'scroll',
				'overlay-color' 				=> '',

				'background-size-width'			=> '',
				'background-size-height'		=> '',
				'background-size-width-unit'	=> 'px',
				'background-size-height-unit'	=> 'px',
				
				// position
				'background-position-top' 		=> '',
				'background-position-left' 		=> '',
				'background-position-top-unit' 	=> 'px',
				'background-position-left-unit' => 'px',
				'background-blend-mode' 		=> 'normal',
				'mix-blend-mode' 				=> 'normal',
				),

			'custom-css' => array (
				'custom-css' 	=> '',
				'custom-js' 	=> ''
				),
			'conditional-logic' => array(
				'conditions'	=> '',
				'conditionsresult' => 1,
				'conditionspreview' => 2,
				),
			'flex' => array(
				'flex-direction' => 'column',
				'align-items' 	 => 'center',
				'justify-content'=> 'center',
				'flex-wrap' 	 => 'wrap'
				),

			'effects' => array(
				// opacity
				'opacity' => '',
				// transition
				'transition-duration' 			=> '',
				'transition-duration-unit' 		=> 's',
				'transition-timing-function' 	=> '',
				'transition-delay' 				=> '',
				'transition-delay-unit' 		=> 's',
				'transition-property' 			=> '',
				'filter-amount-blur' 			=> '',
				'filter-amount-brightness' 		=> '',
				'filter-amount-contrast' 		=> '',
				'filter-amount-grayscale' 		=> '',
				'filter-amount-hue-rotate' 		=> '',
				'filter-amount-invert' 			=> '',
				'filter-amount-saturate' 		=> '',
				'filter-amount-sepia' 			=> '',
				'filter-amount-blur-unit' 		=> 'px',
				'filter-amount-brightness-unit' => '%',
				'filter-amount-contrast-unit' 	=> '%',
				'filter-amount-grayscale-unit' 	=> '%',
				'filter-amount-hue-rotate-unit' => 'deg',
				'filter-amount-invert-unit' 	=> '%',
				'filter-amount-saturate-unit' 	=> '%',
				'filter-amount-sepia-unit' 		=> '%',
				'aos-type' 						=> '',
				'aos-duration' 					=> '',
				'aos-easing' 					=> '',
				'aos-offset' 					=> '',
				'aos-delay' 					=> '',
				'aos-anchor' 					=> '',
				'aos-anchor-placement' 			=> '',
				'aos-once' 						=> '',
				'aos-enable'					=> '',
				'translateX-unit'				=> 'px',
				'translateY-unit'				=> 'px',
				'translateZ-unit'				=> 'px',
				'perspective-unit'				=> 'px',
			)

		);

	/**
	 * Options that may be defined for classes, media queries 
	 * and states other then default
	 * Extend with "oxy_options_white_list" filter
	 *
	 * @since 2.0
	 */

	static public $options_white_list = array (

			"margin-top" ,
			"margin-right" ,
			"margin-bottom",
			"margin-left",
			"margin-top-unit",
			"margin-right-unit",
			"margin-bottom-unit",
			"margin-left-unit",
			
			"padding-top" ,
			"padding-right" ,
			"padding-bottom",
			"padding-left",
			"padding-top-unit",
			"padding-right-unit",
			"padding-bottom-unit",
			"padding-left-unit",

			"container-padding-top" ,
			"container-padding-right" ,
			"container-padding-bottom",
			"container-padding-left",
			"container-padding-top-unit",
			"container-padding-right-unit",
			"container-padding-bottom-unit",
			"container-padding-left-unit",

			"float",
			"overflow",
			"visibility",
			"z-index",
			"display",
			"clear",
			"position",

			"top",
			"left",
			"right",
			"bottom",
			"top-unit",
			"left-unit",
			"right-unit",
			"bottom-unit",

			"width",
			"min-width",
			"max-width",
			"width-unit",
			"min-width-unit",
			"max-width-unit",

			"height",
			"min-height",
			"max-height",
			"height-unit",
			"min-height-unit",
			"max-height-unit",

			"border-top-width",
			"border-top-width-unit",
			"border-top-style",
			"border-top-color",
			
			"border-right-width",
			"border-right-width-unit",
			"border-right-style",
			"border-right-color",
			
			"border-bottom-width",
			"border-bottom-width-unit",
			"border-bottom-style",
			"border-bottom-color",
			
			"border-left-width",
			"border-left-width-unit",
			"border-left-style",
			"border-left-color",

			"border-all-width",
			"border-all-width-unit",
			"border-all-style",
			"border-all-color",

			"border-radius",
			"border-top-right-radius",
			"border-top-left-radius",
			"border-bottom-right-radius",
			"border-bottom-left-radius",

			"border-radius-unit",
			"border-top-right-radius-unit",
			"border-top-left-radius-unit",
			"border-bottom-right-radius-unit",
			"border-bottom-left-radius-unit",

			'color',
			'font-family',
			'font-size',
			'font-size-unit',
			'font-weight',
			'font-style',

			'text-align',
			'direction',
			'line-height',
			'letter-spacing',
			'letter-spacing-unit',
			'list-style-type',
			'text-decoration',
			'text-transform',

			'-webkit-font-smoothing',

			'background',
			'background-color',
			'background-image',
			'background-size',
			'background-repeat',
			'background-attachment',
			'background-clip',
			'overlay-color',
			'gradient',

			'background-size-width',
			'background-size-height',
			'background-size-width-unit',
			'background-size-height-unit',
			
			'background-position-top',
			'background-position-left',
			'background-position-top-unit',
			'background-position-left-unit',
			'background-blend-mode',
			'mix-blend-mode',

			'flex-direction',
			'align-items',
			'justify-content',
			'align-content',
			'flex-wrap',
			'flex-reverse',
			'order',
			'flex-grow',
			'flex-shrink',

			'content',
			'custom-css',

			// Icon special properties
			'icon-size',
			'icon-color',
			'icon-background-color',
			'icon-padding',

			// Button special properties
			'button-size',
			'button-color',
			'button-hover_color',
			'button-text-color',

			// Effects
			'opacity',
			'transition-duration',
			'transition-duration-unit',
			'transition-timing-function',
			'transition-delay',
			'transition-delay-unit',
			'transition-property',
			'box-shadow-inset',
			'box-shadow-color',
			'box-shadow-horizontal-offset',
			'box-shadow-vertical-offset',
			'box-shadow-blur',
			'box-shadow-spread',
			'text-shadow-color',
			'text-shadow-horizontal-offset',
			'text-shadow-vertical-offset',
			'text-shadow-blur',
			'filter',
			'filter-amount-blur',
			'filter-amount-brightness',
			'filter-amount-contrast',
			'filter-amount-grayscale',
			'filter-amount-hue-rotate',
			'filter-amount-invert',
			'filter-amount-saturate',
			'filter-amount-sepia',
			'transform',
			// aos
			'aos-type',
			'aos-duration',
			'aos-easing',
			'aos-offset',
			'aos-delay',
			'aos-anchor',
			'aos-anchor-placement',
			'aos-once',
			'aos-enable',
	);


	/**
	 * Options that may be defined for classes
	 * and states other then default, but not for media
	 * Extend with "oxy_options_white_list_no_media" filter
	 *
	 * @since 2.0
	 */

	static public $options_white_list_no_media = array (
		'icon-style',
		'button-style',
		'testimonial_vertical_layout_below',
        'testimonial_mobile_content_alignment',
        "icon_box_vertical_layout_below",
        "icon_box_mobile_content_alignment",
        'slider-arrow-color',
        'slider-dot-color',
        'slider-remove-padding',
		'slider-dots-overlay',
		'slider-stretch-slides',
		'slider-slide-padding',
		'slider-slide-padding-unit',
	);

	
	/**
	 * Options that may be unset to be empty
	 * Extend with "oxy_allowed_empty_options_list" filter
	 *
	 * @since 2.0
	 */

	static public $allowed_empty_options_list = array (
		"code-css",
		"code-js",
		"code-php",
		"custom-css",
		"custom-js",
		"testimonial_author_info",
		"progress_bar_right_text",
	);

	/**
	 * Constructor
	 * 
	 */

	function __construct( $options ) {

		// run initialization
		$this->init( $options );
	}


	/**
	 * Component init
	 *
	 * @since 0.1.4
	 */
	
	function init( $options ) {
		
		$this->options = $options;

		if ( !( isset($options['advanced']) && is_array( $options['advanced'] ) )) {
			$options['advanced'] = array();
		}

		if ( $options['advanced'] !== false ) {

			$this->options['advanced'] = array_merge_recursive(
												array(
													"background" => array(
														"heading" 	=> __("Background", "component-theme"),
													),
													"positioning" => array(
														"heading" 	=> __("Position", "component-theme"),
													),
													"typography" => array(
														"heading" 	=> __("Typography", "component-theme")
													),
													"border" => array(
														"heading" 	=> __("Border", "component-theme")
													),
													"effects" => array(
														"heading" 	=> __("Effects", "component-theme")
													),
													"custom-css" => array(
														"heading" 	=> __("Custom CSS", "component-theme")
													),
													"conditional-logic" => array(
														"heading"	=> __("Conditional Logic", "component-theme")
													)
												),
												$options['advanced']
											);
		} else {
			$this->options['advanced'] = array();
		}

		// collect all component css styles in footer
		if ( ! isset( $_GET['ct_builder'] ) || ! $_GET['ct_builder'] ) {
			add_action( "ct_footer_styles", array( $this, 'output_css' ) );
		}

		// add custom js
		add_action( "wp_footer", array( $this, 'add_custom_js' ) );

		// output main toolbar elements
		add_action("ct_toolbar_fundamentals_list", 		array( $this, "component_button") );
		add_action("ct_toolbar_component_settings", 	array( $this, "component_params") );
		add_action("ct_toolbar_component_settings", 	array( $this, "component_tabs") );

		add_filter("ct_component_default_values",  		array( $this, "init_default_values") );
		add_filter("ct_component_default_params",  		array( $this, "init_default_params") );
		add_filter("ct_not_css_options",  				array( $this, "not_css_options") );
		add_filter("ct_components_nice_names",  		array( $this, "component_nice_name") );

		// add to the list of tabs
		add_filter("oxygen_component_with_tabs", array( $this, "component_with_tabs"));
	}


	/**
	 * Add to tabs list if has tabs
	 *
	 * @since 2.0 
	 */

	function component_with_tabs($list) {

		if (isset($this->options['tabs'])&&is_array($this->options['tabs'])){
			$list[] = $this->options['tag'];
		}
		
		return $list;
	}


	/**
	 * Add a toolbar button
	 *
     * For client-side searching, we add additional attribute
     * data-search-id that is escaped, lowercased name with spaces
     * replaced with '_'                                          	 * 
	 * @since 0.1 
	 */

	function component_button() { 
		$icon = str_replace(" ", "", (strtolower($this->options['name']))); ?>

		<div class='oxygen-add-section-element'
			data-searchid="<?php echo strtolower( preg_replace('/\s+/', '_', sanitize_text_field( $this->options['name'] ) ) ) ?>"
			ng-click="iframeScope.addComponent('<?php echo esc_attr( $this->options['tag'] ); ?>')">
			<img src='<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/add-icons/<?php echo $icon; ?>.svg' />
			<img src='<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/add-icons/<?php echo $icon; ?>-active.svg' />
			<?php echo sanitize_text_field( $this->options['name'] ); ?>
		</div>
	
	<?php }


	/**
	 * Echo ng attributes needed for component settings
	 *
	 * @since 0.1.7
	 */
	
	function ng_attributes( $param_name, $attributes = "class,model,change") { 

		$param_name = sanitize_text_field($param_name);
		
		if ( isset($this->options['shortcode']) && $this->options['shortcode'] ) {
			$shortcode_arg = ", true";
		}

		$attributes = explode(',', $attributes );
		
		if ( in_array('class-fake', $attributes) ) { ?>
			ng-class="iframeScope.checkOptionChanged(iframeScope.component.active.id,'<?php echo esc_attr( $param_name ); ?>')"
		<?php }

		if ( in_array('model', $attributes) ) { ?>
			ng-model="iframeScope.component.options[iframeScope.component.active.id]['model']['<?php echo esc_attr( $param_name ); ?>']" 
			ng-model-options="{ debounce: 10 }"
		<?php }

		if ( in_array('change', $attributes) ) { ?>
			ng-change="iframeScope.setOption(iframeScope.component.active.id,'<?php echo isset($this->options['tag'])?esc_attr($this->options['tag']):''; ?>','<?php echo isset($param_name)?esc_attr($param_name):''; ?>'<?php echo isset($shortcode_arg)?$shortcode_arg:''; ?>)"
		<?php }
				
	}

	function dropDownData($data) {
		$dataCopy = array();
		foreach($data as $key => $value) {
			$dataCopy[esc_attr($key)] = sanitize_text_field($value);
		}

		return json_encode($dataCopy);
	}

	/**
	 * Output Basic Styles tabs. Is 3 levels deep enough? Do we need a recursion here? 
	 *
	 * @since 2.0 
	 * @author Ilya K.
	 */

	function component_tabs() { 

		if (!isset($this->options['tabs'])||!is_array($this->options['tabs'])){
			return;
		} ?>
		
		<div class="oxygen-sidebar-flex-panel"
            ng-hide="!isActiveName('<?php echo $this->options['tag']; ?>')">

		<?php foreach ($this->options['tabs'] as $id => $tab) { ?>

			<div class="oxygen-sidebar-advanced-subtab" 
                ng-click="switchTab('<?php echo $this->options['tag']; ?>', '<?php echo $id; ?>')" 
                ng-show="!hasOpenTabs('<?php echo $this->options['tag']; ?>')">
                    <img src="<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/panelsection-icons/general-config.svg">
                    <?php echo $tab['heading'] ?>
                    <img src="<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/advanced/open-section.svg">
            </div><!-- .oxygen-sidebar-advanced-subtab -->

            <div class="oxygen-sidebar-flex-panel oxygen-basic-styles-tab-content"
                ng-if="isShowTab('<?php echo $this->options['tag']; ?>', '<?php echo $id; ?>')">

                <div class="oxygen-sidebar-breadcrumb oxygen-sidebar-subtub-breadcrumb">
                    <div class="oxygen-sidebar-breadcrumb-icon" 
                        ng-click="tabs.<?php echo $this->options['tag']; ?>=[]">
                        <img src="<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/advanced/back.svg">
                    </div>
                    <div class="oxygen-sidebar-breadcrumb-all-styles" 
                        ng-click="tabs.<?php echo $this->options['tag']; ?>=[]"><?php echo $this->options['name']; ?></div>
                    <div class="oxygen-sidebar-breadcrumb-separator">/</div>
                    <div class="oxygen-sidebar-breadcrumb-current"><?php echo $tab['heading']; ?></div>
                
                </div><!-- .oxygen-sidebar-breadcrumb -->

                <?php 
	                if (isset($tab['params'])&&is_array($tab['params'])) {
						$this->component_params($tab['params']);
					} 

	                do_action('ct_subtab_level_1_component_settings');

					if (isset($tab['tabs'])&&is_array($tab['tabs'])) {
						foreach ($tab['tabs'] as $child_id => $child_tab) { ?>

							<div class="oxygen-sidebar-advanced-subtab" 
				                ng-click="switchTab('<?php echo $this->options['tag']; ?>', '<?php echo $child_id; ?>')">
				                    <img src="<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/panelsection-icons/general-config.svg">
				                    <?php echo $child_tab['heading'] ?>
				                    <img src="<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/advanced/open-section.svg">
				            </div><!-- .oxygen-sidebar-advanced-subtab -->

						<?php }
					}

				?>

			</div><!-- .oxygen-basic-styles-tab-content -->

			<?php if (isset($tab['tabs'])&&is_array($tab['tabs'])) {
				foreach ($tab['tabs'] as $child_id => $child_tab) { ?>

				    <div class="oxygen-sidebar-flex-panel oxygen-basic-styles-tab-content"
				        ng-if="isShowTab('<?php echo $this->options['tag']; ?>', '<?php echo $child_id; ?>')">

				        <div class="oxygen-sidebar-breadcrumb oxygen-sidebar-subtub-breadcrumb">
				            <div class="oxygen-sidebar-breadcrumb-icon" 
				                ng-click="switchTab('<?php echo $this->options['tag']; ?>', '<?php echo $id; ?>')">
				                <img src="<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/advanced/back.svg">
				            </div>
				            <div class="oxygen-sidebar-breadcrumb-all-styles" 
				                ng-click="switchTab('<?php echo $this->options['tag']; ?>', '<?php echo $id; ?>')"><?php echo $tab['heading']; ?></div>
				            <div class="oxygen-sidebar-breadcrumb-separator">/</div>
				            <div class="oxygen-sidebar-breadcrumb-current"><?php echo $child_tab['heading']; ?></div>
				                
				        </div><!-- .oxygen-sidebar-breadcrumb -->

				        <?php if(isset($child_tab['params'])) $this->component_params($child_tab['params']);?>

				        <?php if (isset($child_tab['tabs'])&&is_array($child_tab['tabs'])) {
							foreach ($child_tab['tabs'] as $grand_child_id => $grand_child_tab) { ?>

								<div class="oxygen-sidebar-advanced-subtab" 
					                ng-click="switchTab('<?php echo $this->options['tag']; ?>', '<?php echo $grand_child_id; ?>')">
					                    <img src="<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/panelsection-icons/general-config.svg">
					                    <?php echo $grand_child_tab['heading'] ?>
					                    <img src="<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/advanced/open-section.svg">
					            </div><!-- .oxygen-sidebar-advanced-subtab -->

							<?php }
						} ?>

		            </div>

		            <?php if (isset($child_tab['tabs'])&&is_array($child_tab['tabs'])) {
						foreach ($child_tab['tabs'] as $grand_child_id => $grand_child_tab) { ?>

				        <div class="oxygen-sidebar-flex-panel oxygen-basic-styles-tab-content"
					        ng-if="isShowTab('<?php echo $this->options['tag']; ?>', '<?php echo $grand_child_id; ?>')">

					        <div class="oxygen-sidebar-breadcrumb oxygen-sidebar-subtub-breadcrumb">
					            <div class="oxygen-sidebar-breadcrumb-icon" 
					                ng-click="switchTab('<?php echo $this->options['tag']; ?>', '<?php echo $child_id; ?>')">
					                <img src="<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/advanced/back.svg">
					            </div>
					            <div class="oxygen-sidebar-breadcrumb-all-styles" 
					                ng-click="switchTab('<?php echo $this->options['tag']; ?>', '<?php echo $child_id; ?>')"><?php echo $child_tab['heading']; ?></div>
					            <div class="oxygen-sidebar-breadcrumb-separator">/</div>
					            <div class="oxygen-sidebar-breadcrumb-current"><?php echo $grand_child_tab['heading']; ?></div>
					                
					        </div><!-- .oxygen-sidebar-breadcrumb -->

					        <?php $this->component_params($grand_child_tab['params']);?>

					    </div>

						<?php }
					} ?>

				<?php } 
			} ?>

		<?php } ?>

		</div>

	<?php }


	/**
	 * Add component Basic Styles tab settings
	 *
	 * @since 0.1 
	 * @author Ilya K.
	 */

	function component_params($params_array) {

		global $oxygen_toolbar;

		if ( isset($this->options['shortcode']) && $this->options['shortcode'] ) {
			$shortcode_arg = ", true";
		}
		
		// if no $params_array passed use Class property and output ng-if wrapper
		// @since 2.0
		if ( !isset($params_array) || !is_array($params_array) ) {
			
			$params = isset($this->options['params'])?$this->options['params']:array(); 
			$tabs = '';
			// if we have tabs added for this component don't show regular params if any tab is opened 		
			if (isset($this->options['tabs']) && is_array($this->options['tabs'])) {
				$tabs = "&&!hasOpenTabs('".esc_attr( $this->options['tag'] )."')";
			}
			// flag for custom generated tabs, as used in the dynamic List component
			if (isset($this->options['tabs']) && is_string($this->options['tabs'])) {
				$tabs = "&&!hasOpenTabs('".esc_attr( $this->options['tabs'] )."')";
			}

			if ( isset($params) && $params ) { ?>

			<div ng-if="isActiveName('<?php echo esc_attr( $this->options['tag'] ); ?>')<?php echo $tabs; ?>">
		
			<?php }
		}
		else {
			// pass the function param to the old variable
			$params = $params_array;
		}

		$options_white_list 			= apply_filters( "oxy_options_white_list", CT_Component::$options_white_list );
		$options_white_list_no_media 	= apply_filters( "oxy_options_white_list_no_media", CT_Component::$options_white_list_no_media );

		if ( isset($params) && $params ) : 

			foreach ( $params as $param ) : 
				
				$ng_show = "";
				
				if ( isset($param['hidden']) && $param['hidden'] ) 
					continue;

				if ( isset($param['type']) && $param['type'] == "content" ) 
					continue;

				if ( isset($param['condition']) && $param['condition'] ) { 

					if ( strpos( $param['condition'], "&&" ) > -1 ) {
						$conditions = explode("&&", $param['condition']);
						
						if (is_array($conditions)) {
							$ng_show = 'ng-show="';

							foreach ($conditions as $key => $value) {
								
								if ( strpos( $value, "!=" ) > -1 ) {

									$condition = explode("!=", $value);
									$key 	= esc_attr( $condition[0] );
									$value 	= sanitize_text_field( $condition[1] );

									$ng_show .= "iframeScope.component.options[iframeScope.component.active.id]['model']['$key']!='$value'&&";
								}
								else {
									$condition = explode("=", $value);
									$key 	= esc_attr( $condition[0] );
									$value 	= sanitize_text_field( $condition[1] );
									
									$ng_show .= "iframeScope.component.options[iframeScope.component.active.id]['model']['$key']=='$value'&&";
								}
							}
							$ng_show = rtrim($ng_show,"&");
							$ng_show .= '"';
						}
					}
					else
					if ( strpos( $param['condition'], "||" ) > -1 ) {
						$conditions = explode("||", $param['condition']);
						
						if (is_array($conditions)) {
							$ng_show = 'ng-show="';

							foreach ($conditions as $key => $value) {
								
								if ( strpos( $value, "!=" ) > -1 ) {

									$condition = explode("!=", $value);
									$key 	= esc_attr( $condition[0] );
									$value 	= sanitize_text_field( $condition[1] );

									$ng_show .= "iframeScope.component.options[iframeScope.component.active.id]['model']['$key']!='$value'||";
								}
								else {
									$condition = explode("=", $value);
									$key 	= esc_attr( $condition[0] );
									$value 	= sanitize_text_field( $condition[1] );
									
									$ng_show .= "iframeScope.component.options[iframeScope.component.active.id]['model']['$key']=='$value'||";
								}
							}
							$ng_show = rtrim($ng_show,"|");
							$ng_show .= '"';
						}
					}
					else
					if ( strpos( $param['condition'], "!=" ) > -1 ) {

						$condition = explode("!=", $param['condition']);
						$key 	= esc_attr( $condition[0] );
						$value 	= sanitize_text_field( $condition[1] );

						$ng_show = "ng-show=\"iframeScope.component.options[iframeScope.component.active.id]['model']['$key'] != '$value'\"";
					}
					else {
						$condition = explode("=", $param['condition']);
						$key 	= esc_attr( $condition[0] );
						$value 	= isset($condition[1]) ? sanitize_text_field( $condition[1] ): '';
						
						$ng_show = "ng-show=\"iframeScope.component.options[iframeScope.component.active.id]['model']['$key'] == '$value'\"";	
					}
				}

				if ( isset($param['parent_condition']) && $param['parent_condition'] ) { 
					
					if ( strpos( $param['parent_condition'], "!=" ) > -1 ) {

						$condition = explode("!=", $param['parent_condition']);
						$key 	= $condition[0];
						$value 	= $condition[1];
						
						$ng_show = "ng-show=\"iframeScope.component.options[iframeScope.component.active.parent.id]['model']['$key'] != '$value'\"";
					}
					else {
						$condition = explode("=", $param['parent_condition']);
						$key 	= $condition[0];
						$value 	= $condition[1];
						
						$ng_show = "ng-show=\"iframeScope.component.options[iframeScope.component.active.parent.id]['model']['$key'] == '$value'\"";
					}
				}

				if ( isset($param['state_condition']) && $param['state_condition'] ) {
					
					if ( strpos( $param['state_condition'], "!=" ) > -1 ) {
						$state = str_replace("!=", "", $param['state_condition']);
						$ng_show = "ng-show=\"iframeScope.currentState != '$state'\"";
					}
					else {
						$state = str_replace("=", "", $param['state_condition']);
						$ng_show = "ng-show=\"iframeScope.currentState == '$state'\"";
					}
				}

				if ( isset($param['ng_show']) && $param['ng_show'] ) {
					$ng_show = "ng-show=\"{$param['ng_show']}\"";
				}

				$ct_class = "oxygen-" . (isset($this->options['tag'])?$this->options['tag']:'') . "-" . (isset($param['param_name'])?$param['param_name']:'');
				
				/** 
				 * Custom options with own wrappers
				 *
				 */
				
				if ( $param['type'] == 'font-family' ) : ?>
					
					<div class="oxygen-control-row" <?php echo $ng_show; ?>>
						<?php $oxygen_toolbar->font_family_dropdown(); ?>
					</div>

				<?php elseif ( $param['type'] == 'heading' ) : ?>

					<div class="oxygen-control-row" <?php echo $ng_show; ?>>
						<div class="oxygen-settings-section-heading"><?php echo esc_attr( $param['heading'] ); ?></div>
					</div>

				<?php elseif ( $param['type'] == 'typography' ) :

					if (isset($param['param_values']) && is_array($param['param_values'])) :

						foreach ($param['param_values'] as $key => $value) {
										
							if ($key=='font-family') {
								$oxygen_toolbar->font_family_dropdown($param['param_name'].'_font-family');
							}

							if ($key=='font-size') {
								$default = $this->get_width($value); ?>
						
								<div class='oxygen-control-row'>
							 	 <?php $oxygen_toolbar->slider_measure_box_with_wrapper($param['param_name'].'_font-size', __("Font Size", "oxygen"),'px,em,%', 8, 72, $default['value']); ?>
							 	</div>
						
							<?php }

							if ($key=='text-transform') { ?>
						
								<div class='oxygen-control-row'>
									<div class='oxygen-control-wrapper'>
										<label class='oxygen-control-label'><?php _e("Text Transform","oxygen"); ?></label>
										<div class='oxygen-control'>
											<div class='oxygen-button-list'>
												<?php $oxygen_toolbar->button_list_button($param['param_name'].'_text-transform','none'); ?>
												<?php $oxygen_toolbar->button_list_button($param['param_name'].'_text-transform','capitalize'); ?>
												<?php $oxygen_toolbar->button_list_button($param['param_name'].'_text-transform','uppercase'); ?>
												<?php $oxygen_toolbar->button_list_button($param['param_name'].'_text-transform','lowercase'); ?>
											</div>
										</div>
									</div>
								</div>
						
							<?php }

							if ($key=='color') { ?>
						
								<div class="oxygen-control-row">
									<?php $oxygen_toolbar->colorpicker_with_wrapper($param['param_name']."_color", __("Color", "oxygen"), 'oxygen-typography-font-color'); ?>
								</div>
						
							<?php }

							if ($key=='font-weight') { ?>
							
								<div class="oxygen-control-row" ng-repeat="data in [{paramName:'<?php echo $param['param_name'];?>_font-weight', idName:'oxygen-typography-font-family'}]" ng-include="'ctFontWeightTemplate'">

								</div>
						
							<?php }

							if ($key=='line-height') { ?>
						
								<div class='oxygen-control-row'>
				                    <div class='oxygen-control-wrapper'>
				                        <label class='oxygen-control-label'><?php _e("Line Height", "oxygen"); ?></label>
									 	<div class='oxygen-input'
											ng-class="{'oxygen-option-default':iframeScope.isInherited(iframeScope.component.active.id, '<?php echo esc_attr( $param['param_name'].'_line-height' ); ?>')}">
											<input type="text" spellcheck="false"
											<?php $this->ng_attributes($param['param_name'].'_line-height'); ?>/>
										</div>
									</div>
								
						
							<?php }

							if ($key=='letter-spacing') { ?>
						
									<?php $oxygen_toolbar->measure_box_with_wrapper($param['param_name'].'_letter-spacing',__('Letter Spacing','oxygen')); ?>
								</div>
						
							<?php }

							if ($key=='text-decoration') { ?>
						
								<div class='oxygen-control-row oxygen-control-row-text-decoration-font-style'>

									<div class='oxygen-control-wrapper'>
										<label class='oxygen-control-label'><?php _e("Text Decoration"); ?></label>
										<div class='oxygen-control'>
											<div class='oxygen-button-list'>

												<?php $oxygen_toolbar->button_list_button($param['param_name'].'_text-decoration','none','none'); ?>
												<?php $oxygen_toolbar->button_list_button($param['param_name'].'_text-decoration','underline','U', 'oxygen-text-decoration-underline'); ?>
												<?php $oxygen_toolbar->button_list_button($param['param_name'].'_text-decoration','overline','O', 'oxygen-text-decoration-overline'); ?>
												<?php $oxygen_toolbar->button_list_button($param['param_name'].'_text-decoration','line-through','S', 'oxygen-text-decoration-linethrough'); ?>

											</div>
										</div>
									</div>

							<?php }

							if ($key=='font-style') { ?>
						
									<div class='oxygen-control-wrapper'>
										<label class='oxygen-control-label'><?php _e("Font Style"); ?></label>
										<div class='oxygen-control'>
											<div class='oxygen-button-list'>

												<?php $oxygen_toolbar->button_list_button($param['param_name'].'_font-style','normal','normal'); ?>
												<?php $oxygen_toolbar->button_list_button($param['param_name'].'_font-style','italic','I', 'oxygen-font-style-italic'); ?>
												
											</div>
										</div>
									</div>
								</div>
						
							<?php }

							if ($key=='-webkit-font-smoothing') { ?>

								<div class='oxygen-control-row'>
									<div class='oxygen-control-wrapper'>
										<label class='oxygen-control-label'><?php _e("Font Smoothing","oxygen"); ?></label>
										<div class='oxygen-control'>
											<div class='oxygen-button-list'>
												<?php $oxygen_toolbar->button_list_button($param['param_name'].'_-webkit-font-smoothing','initial'); ?>
												<?php $oxygen_toolbar->button_list_button($param['param_name'].'_-webkit-font-smoothing','antialiased'); ?>
												<?php $oxygen_toolbar->button_list_button($param['param_name'].'_-webkit-font-smoothing','subpixel-antialiased'); ?>
											</div>
										</div>
									</div>
								</div>
							
							<?php }
						}
				
					endif;
				
				elseif ( $param['type'] == 'border' ) : ?>

						<div class='oxygen-control-row'>
							<div class='oxygen-control-wrapper'>
								<label class='oxygen-control-label'><?php _e("Currently Editing","oxygen"); ?></label>
								<div class='oxygen-control'>
									<div class="oxygen-select oxygen-select-box-wrapper">
										<div class="oxygen-select-box"
											ng-class="{'oxygen-option-default':currentBorder=='all'}">
											<div class="oxygen-select-box-current">{{currentBorder}}</div>
											<div class="oxygen-select-box-dropdown"></div>
										</div>
										<div class="oxygen-select-box-options">
											
											<div class="oxygen-select-box-option"
												ng-click="currentBorder='all'"
												ng-class="{'oxygen-select-box-option-active':currentBorder=='all'}">
												<?php _e("all borders", "component-theme"); ?>
											</div>
											<div class="oxygen-select-box-option"
												ng-click="currentBorder='top'"
												ng-class="{'oxygen-select-box-option-active':currentBorder=='top'}">
												<?php _e("top", "component-theme"); ?>
											</div>
											<div class="oxygen-select-box-option"
												ng-click="currentBorder='right'"
												ng-class="{'oxygen-select-box-option-active':currentBorder=='right'}">
												<?php _e("right", "component-theme"); ?>
											</div>
											<div class="oxygen-select-box-option"
												ng-click="currentBorder='bottom'"
												ng-class="{'oxygen-select-box-option-active':currentBorder=='bottom'}">
												<?php _e("bottom", "component-theme"); ?>
											</div>
											<div class="oxygen-select-box-option"
												ng-click="currentBorder='left'"
												ng-class="{'oxygen-select-box-option-active':currentBorder=='left'}">
												<?php _e("left", "component-theme"); ?>
											</div>

										</div>
									</div>

								</div>
							</div>
						</div>
						<!-- color and size -->
						<div class='oxygen-control-row'>
							<?php $oxygen_toolbar->colorpicker_with_wrapper($param['param_name']."_border-all-color",__("Color","oxygen"),"oxygen-typography-font-color", "currentBorder=='all'"); ?>
							<?php $oxygen_toolbar->colorpicker_with_wrapper($param['param_name']."_border-top-color",__("Color","oxygen"),"oxygen-typography-font-color", "currentBorder=='top'"); ?>
							<?php $oxygen_toolbar->colorpicker_with_wrapper($param['param_name']."_border-left-color",__("Color","oxygen"),"oxygen-typography-font-color", "currentBorder=='left'"); ?>
							<?php $oxygen_toolbar->colorpicker_with_wrapper($param['param_name']."_border-bottom-color",__("Color","oxygen"),"oxygen-typography-font-color", "currentBorder=='bottom'"); ?>
							<?php $oxygen_toolbar->colorpicker_with_wrapper($param['param_name']."_border-right-color",__("Color","oxygen"),"oxygen-typography-font-color", "currentBorder=='right'"); ?>
							<?php $oxygen_toolbar->measure_box_with_wrapper($param['param_name']."_border-'+currentBorder+'-width", __("Width", "oxygen"), 'px,em'); ?>
						</div>
						<!-- border style -->
						<div class='oxygen-control-row'>
							<div class='oxygen-control-wrapper'>
								<label class='oxygen-control-label'><?php _e("Style","oxygen"); ?></label>
								<div class='oxygen-control'>
									<div class='oxygen-button-list'>

										<?php $oxygen_toolbar->button_list_button($param['param_name']."_border-'+currentBorder+'-style",'none'); ?>
										<?php $oxygen_toolbar->button_list_button($param['param_name']."_border-'+currentBorder+'-style",'solid'); ?>
										<?php $oxygen_toolbar->button_list_button($param['param_name']."_border-'+currentBorder+'-style",'dashed'); ?>
										<?php $oxygen_toolbar->button_list_button($param['param_name']."_border-'+currentBorder+'-style",'dotted'); ?>

									</div>
								</div>
							</div>
						</div>
						<div class='oxygen-control-row' style='margin-bottom: 20px;'>
							<a href='#' id='oxygen-control-borders-unset-button'
								ng-click="iframeScope.unsetAllBorders()">
								<?php _e("unset all borders","oxygen"); ?></a>
						</div>

				<?php else :
				
				/** 
				 * Regular options 
				 *
				 */

				?>

				<?php if ( !isset($param['hide_wrapper_start']) || $param['hide_wrapper_start']!==true ) : ?>
				<div class="oxygen-control-row" <?php echo $ng_show; ?>>
				<?php endif; ?>

				<div class='oxygen-control-wrapper <?php echo esc_attr($ct_class); ?>'
					<?php if ( isset($param['hide_wrapper_start']) && $param['hide_wrapper_start']===true) echo $ng_show; ?>>

					<?php echo (isset($param['heading'])) ? "<label class='oxygen-control-label'>".sanitize_text_field($param['heading'])."</label>" : ""; ?>
					<div class='oxygen-control <?php if ( isset($param['css']) && $param['css'] === false ) echo "oxygen-special-property"; ?><?php if ( isset($param['responsive']) && $param['responsive'] === true ) echo " oxygen-responsive-property"; ?><?php if ( !isset($param['param_name']) || (!in_array($param['param_name'], $options_white_list) && !in_array($param['param_name'], $options_white_list_no_media))) echo " not-available-for-classes"; ?><?php if ( !isset($param['param_name']) || !in_array($param['param_name'], $options_white_list)) echo " not-available-for-media"; ?>'>
					
						<?php switch ( $param['type'] ) {

							case 'dropdown' : ?>

								<div class="oxygen-select oxygen-select-box-wrapper" ng-include="'ctDropDownTemplate'"
									ng-repeat='data in [{paramName:"<?php echo esc_attr( $param['param_name'] ); ?>", pairs:<?php echo $this->dropDownData($param['value']);?>}]'>
								</div>

								<?php break;

							case 'dropdown_dynamic' : ?>

                                <div class="oxygen-select oxygen-select-box-wrapper">
                                    <div class="oxygen-select-box"
                                         ng-class="{'oxygen-option-default':iframeScope.isInherited(iframeScope.component.active.id, '<?php echo esc_attr( $param['param_name'] ); ?>')}">
                                        <div class="oxygen-select-box-current">{{iframeScope.getOption('<?php echo esc_attr( $param['param_name'] ); ?>')}}</div>
                                        <div class="oxygen-select-box-dropdown"></div>
                                    </div>
                                    <div class="oxygen-select-box-options">
                                        <?php if ( $param['dynamic'] && $param['dynamic'] == true  ) : ?>
                                            <div class="oxygen-select-box-option" ng-repeat="<?php echo $param['ngrepeat_value']; ?>" <?php if(isset($param['ngclick_value'])):?> ng-click="<?php echo $param['ngclick_value']; ?>"<?php endif;?>>
                                                {{option}}
                                            </div>
                                        <?php else: ?>
                                            <?php foreach ( $param['value'] as $value => $name ) : ?>
                                                <div class="oxygen-select-box-option" ng-click="iframeScope.setOptionModel('<?php echo esc_attr( $param['param_name'] ); ?>','<?php echo esc_attr( $value ); ?>')">
                                                    <?php echo sanitize_text_field( $name ); ?>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <?php break;

                            case 'view_dropdown' : ?>

                                <div class="oxygen-select oxygen-select-box-wrapper">
                                    <div class="oxygen-select-box"
                                         ng-class="{'oxygen-option-default':iframeScope.isInherited(iframeScope.component.active.id, '<?php echo esc_attr( $param['param_name'] ); ?>')}">
                                        <div class="oxygen-select-box-current">{{iframeScope.getOption('<?php echo esc_attr( $param['param_name'] ); ?>')}}</div>
                                        <div class="oxygen-select-box-dropdown"></div>
                                    </div>
                                    <div class="oxygen-select-box-options">
                                        <?php foreach ( $param['value'] as $value => $name ) : ?>
                                            <div class="oxygen-select-box-option" ng-click="iframeScope.setOptionModel('<?php echo esc_attr( $param['param_name'] ); ?>','<?php echo esc_attr( $value ); ?>'); iframeScope.renderShortcode(iframeScope.component.active.id, iframeScope.component.active.name)">
                                                <?php echo sanitize_text_field( $name ); ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php break;

							case 'radio' : ?>

								<div class="oxygen-button-list"
									ng-class="{'oxygen-option-default':iframeScope.isInherited(iframeScope.component.active.id, '<?php echo esc_attr( $param['param_name'] ); ?>')}">
									<?php foreach ( $param['value'] as $value => $name ) : ?>
										<?php $oxygen_toolbar->button_list_button($param['param_name'],$value, $name); ?>
									<?php endforeach; ?>
								</div>
								<?php break;

							case 'hide_show_in_sticky' : ?>

								<div class="oxygen-button-list">

										<?php $oxygen_toolbar->button_list_button('show_in_sticky_only','yes', 'only show in sticky'); ?>
										<?php $oxygen_toolbar->button_list_button('hide_in_sticky','yes', 'hide in sticky'); ?>
									
								</div>
								<?php break;

							case 'checkbox' : ?>

								<label class="oxygen-checkbox">
									<input type="checkbox"
										ng-true-value="'<?php echo $param['true_value']; ?>'" 
										ng-false-value="'<?php echo $param['false_value']; ?>'"
										<?php $this->ng_attributes($param['param_name']); ?>> 
									<div class='oxygen-checkbox-checkbox'
										ng-class="{'oxygen-checkbox-checkbox-active':iframeScope.getOption('<?php echo esc_attr( $param['param_name'] ); ?>')=='<?php echo $param['true_value']; ?>','oxygen-option-default':iframeScope.isInherited(iframeScope.component.active.id, '<?php echo esc_attr( $param['param_name'] ); ?>')}">
										<?php if(isset($param['label'])) echo $param['label']; ?>
									</div>
								</label>
								<?php break;

							case 'colorpicker' : ?>

								<?php $oxygen_toolbar->colorpicker($param['param_name']); ?>
								<?php break;

							case 'tag' : ?>

								<div class="oxygen-select oxygen-select-box-wrapper">
									<div class="oxygen-select-box"
										ng-class="{'oxygen-option-default':iframeScope.isInherited(iframeScope.component.active.id, '<?php echo esc_attr( $param['param_name'] ); ?>')}">
										<div class="oxygen-select-box-current">{{iframeScope.getOption('<?php echo esc_attr( $param['param_name'] ); ?>')}}</div>
										<div class="oxygen-select-box-dropdown"></div>
									</div>
									<div class="oxygen-select-box-options">
										<?php foreach ( $param['value'] as $value => $name ) : ?>
										<div class="oxygen-select-box-option" ng-click="iframeScope.setOptionModel('<?php echo esc_attr( $param['param_name'] ); ?>','<?php echo esc_attr( $value ); ?>');iframeScope.changeTag(<?php if ($this->options['tag']=='ct_shortcode') echo "'shortcode'"; else if (isset($this->options['data_type']) && $this->options['data_type']===true) echo "'data'"; else if (isset($param['rebuild']) && $param['rebuild']===true) echo "'rebuild'"; ?>)">
											<?php echo sanitize_text_field( $name ); ?>
										</div>
										<?php endforeach; ?>
									</div>
								</div>
								<?php break;

							case 'measurebox' : ?>

								<?php
									if(!isset($param['param_units'])) {
										$param['param_units'] = '';
									}
								 	$oxygen_toolbar->measure_box($param['param_name'],$param['param_units']); ?>
								<?php break;

							case 'slider-measurebox' : ?>
								
								<?php 
									if(!isset($param['param_units'])) {
										$param['param_units'] = '';
									}
									$oxygen_toolbar->slider_measure_box($param['param_name'],$param['param_units'],isset($param['min'])?$param['min']:0,isset($param['max'])?$param['max']:100, true, isset($param['step'])?$param['step']:1); ?>
								<?php break;

							case 'hyperlink' : ?>

								<?php $oxygen_toolbar->hyperlink($param['param_name'], $param); ?>
								<?php break;

							case 'textfield' : ?>

								<div class='oxygen-input <?php if ( isset ( $param["class"] ) ) echo esc_attr( $param["class"] );?>'
									ng-class="{'oxygen-option-default':iframeScope.isInherited(iframeScope.component.active.id, '<?php echo esc_attr( $param['param_name'] ); ?>')}">
									<input type="text" spellcheck="false"
										<?php if(isset($param['placeholder'])) {
												echo 'placeholder="'.$param['placeholder'].'"';
										} ?>
										<?php $this->ng_attributes($param['param_name']); ?>/>
									<?php if(isset($param['dynamicdatacode'])) {
											echo $param['dynamicdatacode'];
									} ?>
								</div>
								<?php if(isset($param['postfix'])) echo $param['postfix']; ?>
								<?php break;

							case 'mediaurl' :

                                $attachment = !empty($param['attachment']) ? $param['attachment'] : false;
                                $oxygen_toolbar->mediaurl($param['param_name'], $attachment);
                                break;

                            case 'selector' :

                                $oxygen_toolbar->selector($param['param_name']);
                                break;

							case 'flex-layout' : ?>
								
								<div class="oxygen-icon-button-list oxygen-icon-button-list-big oxygen-icon-button-list-equal">
									
									<label class='oxygen-icon-button-list-option'
										ng-class="{'oxygen-icon-button-list-option-active':iframeScope.getOption('<?php echo esc_attr($param['param_name'])?>')=='column','oxygen-icon-button-list-button-default':iframeScope.isInherited(iframeScope.component.active.id,'<?php echo esc_attr($param['param_name'])?>','column')==true}">
											<div class='oxygen-icon-button-list-option-icon-wrapper'>
												<img src='<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/flex/stack_vertically_icon.svg' />
												<input type="radio" name="<?php echo esc_attr($param['param_name'])?>" value="column"
												ng-model="iframeScope.component.options[iframeScope.component.active.id]['model']['<?php echo esc_attr($param['param_name'])?>']"
												ng-model-options="{ debounce: 10 }"
												ng-change="iframeScope.setOption(iframeScope.component.active.id,'<?php echo esc_attr( $this->options['tag'] ) ?>','<?php echo esc_attr($param['param_name'])?>');"
												ng-click="radioButtonClick(iframeScope.component.active.name, '<?php echo esc_attr($param['param_name'])?>', 'column'); iframeScope.setTextAlign()"/>
												<img src='<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/flex/stack_vertically_icon--active.svg' />
											</div>
											<div class='oxygen-icon-button-list-option-label'>
												<?php if (!isset($param['vertical_text']) || !$param['vertical_text']) { 
													_e("Stack Child Elements Vertically");
												} else {
													echo $param['vertical_text'];
												} ?>
											</div>
									</label>

									<label class='oxygen-icon-button-list-option'
										ng-class="{'oxygen-icon-button-list-option-active':iframeScope.getOption('<?php echo esc_attr($param['param_name'])?>')=='row','oxygen-icon-button-list-button-default':iframeScope.isInherited(iframeScope.component.active.id,'<?php echo esc_attr($param['param_name'])?>','row')==true}">
											<div class='oxygen-icon-button-list-option-icon-wrapper'>
												<img src='<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/flex/stack_horizontally_icon.svg' />
												<input type="radio" name="<?php echo esc_attr($param['param_name'])?>" value="row"
													ng-model="iframeScope.component.options[iframeScope.component.active.id]['model']['<?php echo esc_attr($param['param_name'])?>']"
													ng-model-options="{ debounce: 10 }" 
													ng-change="iframeScope.setOption(iframeScope.component.active.id,'<?php echo esc_attr( $this->options['tag'] ) ?>','<?php echo esc_attr($param['param_name'])?>');"
													ng-click="radioButtonClick(iframeScope.component.active.name, '<?php echo esc_attr($param['param_name'])?>', 'row'); iframeScope.setTextAlign()"/>
												<img src='<?php echo CT_FW_URI; ?>/toolbar/UI/oxygen-icons/flex/stack_horizontally_icon--active.svg' />
											</div>
											<div class='oxygen-icon-button-list-option-label'>
												<?php if (!isset($param['horizontal_text']) || !$param['horizontal_text']) { 
													_e("Stack Child Elements Horizontally");
												} else {
													echo $param['horizontal_text'];
												} ?>
											</div>
									</label>
									
								</div>
								<?php break;

							case 'textarea' : ?>

								<div class="oxygen-textarea <?php if ( isset ( $param["class"] ) ) echo esc_attr( $param["class"] );?>">
									<textarea class="oxygen-textarea-textarea"
										ng-class="{'oxygen-option-default':iframeScope.isInherited(iframeScope.component.active.id, '<?php echo esc_attr( $param['param_name'] ); ?>')}"
										<?php $this->ng_attributes($param['param_name']); ?>></textarea>
								</div>
								<?php break;

							case 'columnwidth' : ?>

								<div class='oxygen-measure-box'
									ng-class="{'oxygen-option-default':iframeScope.isInherited(iframeScope.component.active.id, '<?php echo esc_attr( $param['param_name'] ); ?>')}">
									<input type="text" spellcheck="false"
										ng-change="iframeScope.setOption(iframeScope.component.active.id,'<?php echo esc_attr( $this->options['tag'] ); ?>','<?php echo esc_attr( $param['param_name'] ); ?>'); iframeScope.updateColumnsOnChange(iframeScope.component.active.id,'{{iframeScope.component.options[iframeScope.component.active.id]['model']['width']||0}}')"
										<?php self::ng_attributes($param['param_name'],"class,model"); ?>/>
									<div class='oxygen-measure-box-unit-selector'
										ng-show="(isActiveParentName('ct_columns')||isActiveParentName('ct_new_columns'))&&!$parent.iframeScope.isEditing('class')">
										<div class='oxygen-measure-box-selected-unit'>%</div>
									</div>
									<div class='oxygen-measure-box-unit-selector'
										ng-show="(!isActiveParentName('ct_columns')&&!isActiveParentName('ct_new_columns'))||$parent.iframeScope.isEditing('class')">
										<div class='oxygen-measure-box-selected-unit'>{{iframeScope.getOptionUnit('<?php echo esc_attr( $param['param_name'] ); ?>')}}</div>
										<?php $oxygen_toolbar->measure_type_select($param['param_name']); ?>
									</div>
								</div>
								<?php break;

							case 'positioning' : ?>

								<?php include( CT_FW_PATH . '/toolbar/views/position/position.axis.view.php');?>
								<?php break;

							case 'medialist' : ?>

								<?php $oxygen_toolbar->media_queries_list($param['param_name'],$param['heading']); ?>
								<?php break;
	
							case 'medialist_above' : ?>

								<?php $oxygen_toolbar->media_queries_list($param['param_name'],$param['heading'], true, $param['always_option'], $param['never_option']); ?>
								<?php break;

							case 'padding' : ?> 
								
								<div class='oxygen-four-sides-measure-box'>
									<?php $oxygen_toolbar->measure_box($param['param_name'].'-top','px,%,em',true); ?>
									<div class='oxygen-four-sides-measure-box-left-right'>
										<?php $oxygen_toolbar->measure_box($param['param_name'].'-left','px,%,em',true); ?>
										<?php $oxygen_toolbar->measure_box($param['param_name'].'-right','px,%,em',true); ?>
									</div>
									<?php $oxygen_toolbar->measure_box($param['param_name'].'-bottom','px,%,em',true); ?>
									<div class="oxygen-apply-all-trigger"><?php _e("apply all »", "oxygen"); ?></div>
								</div>

								<?php break;

							case 'border' : ?> 
								
								<div class='oxygen-four-sides-measure-box'>
									<?php $oxygen_toolbar->measure_box($param['param_name'].'-top','px,%,em',true); ?>
									<div class='oxygen-four-sides-measure-box-left-right'>
										<?php $oxygen_toolbar->measure_box($param['param_name'].'-left','px,%,em',true); ?>
										<?php $oxygen_toolbar->measure_box($param['param_name'].'-right','px,%,em',true); ?>
									</div>
									<?php $oxygen_toolbar->measure_box($param['param_name'].'-bottom','px,%,em',true); ?>
									<div class="oxygen-apply-all-trigger"><?php _e("apply all »", "oxygen"); ?></div>
								</div>

								<?php break;

							case 'text' : ?>

								<div class="oxygen-text <?php echo $param['class']; ?>">
									<?php echo $param['text']; ?>
								</div>
								<?php break;

							// OLD UI

							case 'dropdowncombo' : ?>
								<div class="ct-selectbox">
									<ul class="ct-select <?php if ( $param['css'] === false ) echo "oxygen-special-property"; ?><?php if ( isset($param['responsive']) && $param['responsive'] === true ) echo " oxygen-responsive-property"; ?>">
										<li class="ct-selected"
											ng-class="iframeScope.isInherited(iframeScope.component.active.id, '<?php echo esc_attr( $param['param_name'] ); ?>')">
												<input class="<?php if ( $param['css'] === false ) echo "oxygen-special-property"; ?><?php if ( isset($param['responsive']) && $param['responsive'] === true ) echo " oxygen-responsive-property"; ?>" type="text" spellcheck="false"
											ng-class="iframeScope.isInherited(iframeScope.component.active.id, '<?php echo esc_attr( $param['param_name'] ); ?>')"
											<?php $this->ng_attributes($param['param_name']); ?>/>
												<span class="ct-icon ct-dropdown-icon"></span>
										</li>
										<li>
											<ul class="ct-dropdown-list">
												<?php foreach ( $param['value'] as $value => $name ) : ?>
													<li	ng-click="iframeScope.setOptionModel('<?php echo esc_attr( $param['param_name'] ); ?>','<?php echo esc_attr( $value ); ?>')">
														<?php echo sanitize_text_field( $name ); ?>
													</li>
												<?php endforeach; ?>
											</ul>
										</li>									
								    </ul>

								</div>
								<?php break;

							case 'slider' : ?>

								<input type="range" min="<?php echo isset($param['min']) ? $param['min'] : '0' ?>" max="<?php echo isset($param['max']) ? $param['max'] : '5' ?>" 
								<?php $this->ng_attributes($param['param_name']); ?>>
								<?php break;
					
							case 'metakeyscombo' : ?>

								<div class="ct-selectbox">
									<ul class="ct-select <?php if ( $param['css'] === false ) echo "oxygen-special-property"; ?><?php if ( isset($param['responsive']) && $param['responsive'] === true ) echo " oxygen-responsive-property"; ?>">
										<li class="ct-selected"
											ng-class="iframeScope.isInherited(iframeScope.component.active.id, '<?php echo esc_attr( $param['param_name'] ); ?>')">
												<input class="<?php if ( $param['css'] === false ) echo "oxygen-special-property"; ?><?php if (isset($param['responsive']) && $param['responsive'] === true ) echo " oxygen-responsive-property"; ?>" type="text" spellcheck="false"
											ng-class="iframeScope.isInherited(iframeScope.component.active.id, '<?php echo esc_attr( $param['param_name'] ); ?>')"
											<?php $this->ng_attributes($param['param_name']); ?>/>
												<span class="ct-icon ct-dropdown-icon"></span>
										</li>
										<li>
											<ul class="ct-dropdown-list">
												<li ng-repeat="meta_key in current_post_meta_keys"
													ng-click="iframeScope.setOptionModel('<?php echo esc_attr( $param['param_name'] ); ?>', meta_key)">
													{{meta_key}}
												</li>
											</ul>
										</li>									
								    </ul>

								</div>
								<?php break;

							default : ?>

								<span><?php printf( __( 'Wrong parameter type: %s', 'component-theme' ), $param['type'] ); ?></span>
								<?php break;
						} ?>
					</div><!-- .oxygen-control -->
				</div><!-- .oxygen-control-wrapper -->
				<?php if (!isset($param['hide_wrapper_end']) || $param['hide_wrapper_end']!==true) : ?>
				</div><!-- .oxygen-control-row -->
				<?php endif; ?>
				
				<?php endif; ?>

			<?php endforeach; ?>

			<?php  
			// if no $params_array passed to function output ng-if wrapper closing tag
			if ( !isset($params_array) || !is_array($params_array) ) {
				?></div><!-- isActiveName() --><?php
			}?>
		
		<?php endif; ?>

	<?php }


	/**
	 * Get only not CSS options default values
	 * 
	 * @since 2.0
	 * @author Gagan
	 */

	function get_default_values() {

		$params = array();

		if ( isset($this->options['params']) && is_array( $this->options['params'] ) ) {
		
			foreach ( $this->options['params'] as $param ) {
				
				// add name:value from each parameter
				if ( isset( $param['param_name'] ) && isset( $param['css'] ) && $param['css'] === false ) {

					if(isset($param['value']) ) {
						if ( isset($param['default']) ) {
							$params[$param['param_name']] = $param['default'];
						}
						elseif (is_array($param['value']) ) {
							reset( $param['value'] );
							$params[$param['param_name']] = key($param['value']);
						}
						else {
							$params[$param['param_name']] = $param['value'];
						}
					}
				}
				
			}
		}

		return $params;
	}


	/**
	 * Get Component name-value pairs from options
	 * 
	 * @since 0.1.2
	 */

	function get_default_params($not_css = false) {

		$params = array();
		$advanced_params = array();
		$tabs_params = array();

		if(isset($this->options['params'])) {
			$params = $this->get_default_params_helper($this->options['params'], $not_css);
		}

		foreach ( $this->options['advanced'] as $key => $param ) {

			if ( isset($param['exclude']) && $param['exclude'] ) {
				continue;
			} 

			// add from defaults if this parameter exist
			if ( isset($this->advanced_defaults[$key]) ) {
				
				$advanced_params = array_merge( 
									$advanced_params,
									$this->advanced_defaults[$key]
								);
			}
			
			// use values if provided by developer
			if ( isset($param['values']) && is_array($param['values']) ) {
				
				$advanced_params = array_merge( 
									$advanced_params,
									$param['values']
								);
			}

		}

		if ( isset($this->options['tabs']) && is_array($this->options['tabs'])) {
			foreach ( $this->options['tabs'] as $key => $tab ) {

				$tabs_params = array_merge( 
									$tabs_params,
									$this->get_default_params_helper($tab['params'], $not_css)
								);

				if ( isset($tab['tabs']) && is_array($tab['tabs'])) {
					foreach ( $tab['tabs'] as $key => $child_tab ) {

						$tabs_params = array_merge( 
											$tabs_params,
											$this->get_default_params_helper(isset($child_tab['params'])?$child_tab['params']:array(), $not_css)
										);

						if ( isset($child_tab['tabs']) && is_array($child_tab['tabs'])) {
							foreach ( $child_tab['tabs'] as $key => $grand_child_tab ) {
								
								$tabs_params = array_merge( 
													$tabs_params,
													$this->get_default_params_helper($grand_child_tab['params'], $not_css)
												);

							}
						}
					}
				}
			}
		}

		return array_merge( $params, $advanced_params, $tabs_params );
	}


	/**
	 * Get name-value pairs from passed params array
	 * 
	 * @since 2.0
	 * @author Ilya K.
	 */

	function get_default_params_helper($params_array, $not_css) {

		$params = array();

		if ( isset( $params_array ) && is_array( $params_array ) ) {

			foreach ( $params_array as $param ) {

				if ( $not_css && $param['css'] !== false ) {
					continue;
				}
				
				// add name:value from each parameter
				if ( isset( $param['param_name'] ) && isset( $param['value'] ) ) {

					if ( isset($param['default']) ) {
						$params[$param['param_name']] = $param['default'];
					}
					elseif ( is_array($param['value']) ) {
						reset( $param['value'] );
						$params[$param['param_name']] = key($param['value']);
					}
					else {
						$params[$param['param_name']] = $param['value'];
					}
				}
				// if combined option
				elseif ( isset( $param['values'] ) ) {
					
					foreach ( $param['values'] as $name => $value ) {
						$params[$name] 	= $value;
					}
				}
				// options to be prefixed with param_name like typography array
				elseif ( isset( $param['param_values'] ) ) {
					
					foreach ( $param['param_values'] as $name => $value ) {
						$params[$param['param_name']."_".$name] = $value;
					}
				}
				// add from defaults if this parameter exist
				if ( isset($param['type']) && isset( $this->advanced_defaults[$param['type']] ) ) {

					$params = array_merge( 
						$this->advanced_defaults[$param['type']],
						$params
					);
				}
			}
		}

		return $params;
	}


	/**
	 * 
	 *
	 * @since 2.0
	 * @author Gagan 
	 */

	function init_default_values( $params ) {

		$defaults[$this->options['tag']] = $this->get_default_values();

		$combined = array_merge_recursive( $params, $defaults );

		return $combined;
	}


	/**
	 * Add default Component (shortocode) parameters 
	 * for Angular trough 'ct_component_default_params' filter hook
	 *
	 * @since 0.1 
	 */

	function init_default_params( $params ) {

		$defaults[$this->options['tag']] = $this->get_default_params();

		$combined = array_merge_recursive( $params, $defaults );

		return $combined;
	}


	/**
	 * Add not CSS options for each component to a list
	 * via add_filter("ct_not_css_options")
	 *
	 * @since 0.3.2
	 */
	
	function not_css_options( $params ) {

		if ( isset($this->options['params']) && is_array( $this->options['params'] ) ) {
		
			foreach ( $this->options['params'] as $param ) {

				if (isset($param['css']) && $param['css'] === false && isset($param['param_name'])) {
					$params[$this->options['tag']][] = $param['param_name'];
				}
			}
		}

		if ( isset($this->options['not_css_params']) && is_array( $this->options['not_css_params'] ) ) {

			foreach ( $this->options['not_css_params'] as $param ) {
				$params[$this->options['tag']][] = $param;
			}
		}

		// add not css options defined in tabs
		if ( isset($this->options['tabs']) && is_array($this->options['tabs'])) {
			foreach ( $this->options['tabs'] as $key => $tab ) {

				foreach ( $tab['params'] as $param ) {

					if (isset($param['css']) && $param['css'] === false && isset($param['param_name'])) {
						$params[$this->options['tag']][] = $param['param_name'];
					}
				}
			}
		}

		return $params;
	}


	/**
	 * Replace "-" in array keys with "_"
	 * 
	 *
	 * @since 0.1.1
	 */

	function keys_dash_to_underscore( $array ) {

		$new_array = array();

		if ( is_array($array) ) {

			foreach ( $array as $key => $value ) {

				$new_key = str_replace( "-", "_", $key);
				$new_array[$new_key] = $value;
			}
		}

		return $new_array;
	}


	/**
	 * Replace "_" in array keys with "-"
	 * 
	 *
	 * @since 0.1.4
	 */

	static function keys_underscore_to_dash( $array ) {

		$new_array = array();

		if ( is_array($array) ) {

			foreach ( $array as $key => $value ) {

				$new_key = str_replace( "_", "-", $key);
				$new_array[$new_key] = $value;
			}
		}

		return $new_array;
	}


	/**
	 * Add component nicename to ng-init
	 *
	 * @since 0.1.2
	 */

	function component_nice_name( $names ) {

		$name[$this->options['tag']] = $this->options['name'];

		$combined = array_merge( $names, $name );

		return $combined;
	}

	function filter_empty_values($item) {
		return !empty($item);
	}

	function ct_parse_oxy_url($matches) {
			
		$result = do_shortcode($matches[4]);

		if(strpos($matches[3], 'http://') !== false || strpos($matches[1], 'https://') !== false) {
			$result = str_replace('https://', '', $result);
			$result = str_replace('http://', '', $result);
		}

		return $matches[1].$matches[2].$matches[3].$result.$matches[5];
	}

	/**
	 * Get combined atributes and CSS styles
	 *
	 * @since 0.1.4
	 */
	
	function set_options( $atts ) {

		$atts['ct_options'] = str_replace("\n", "\\n", $atts['ct_options']);
		$atts['ct_options'] = str_replace("\r", "\\r", $atts['ct_options']);
		$atts['ct_options'] = str_replace("\t", "\\t", $atts['ct_options']);

		// deobfuscate oxy dynamic shortcodes in the properties (they are obfuscated in templates.php )
		$count = 0; //safety switch
		while(strpos($atts['ct_options'], '+oxygen') !== false && $count < 9) {
			$count++;
			$atts['ct_options'] = preg_replace_callback('/\+oxygen(.+?)\+/i', 'ct_deobfuscate_oxy_url', $atts['ct_options']);
		}


		// resolve oxy dynamic shortcodes in the properties, these are being done after the signature has been verified
		$count = 0; //safety switch
		while(strpos($atts['ct_options'], '[oxygen') !== false && $count < 9) {
			$count++;
			$atts['ct_options'] = preg_replace_callback('/(\")(url|src|map_address|alt)(\":\"[^\"]*)(\[oxygen[^\]]*\])([^\"\[\s]*)/i', array($this, 'ct_parse_oxy_url'), $atts['ct_options']);
		}

		$atts = json_decode( $atts['ct_options'], true );

		// check if decoded properly
		if ( !$atts ) {
			return false;
		}


		
		$id 		= isset($atts["ct_id"])?$atts["ct_id"]:false;
		$selector 	= isset($atts['selector'])?$atts["selector"]:false;
		$states 	= array();

		// get states styles (original, :hover, ...) from shortcode atts
		foreach ( $atts as $key => $state_params ) {
			if ( is_array( $state_params ) ) {
				$states[$key] = $state_params;
			}
		}

		// lets base64 decode only custom-js and custom-css before rendering out the script and styles
		foreach($states as $key => $state) {

			if($key == 'classes')
				continue;

			if($key == 'media') {

				foreach($state as $mediakey => $mediaoption) {
					foreach($mediaoption as $mediastatekey => $mediastate) {
						if(isset($mediastate['custom-css']) && !strpos($mediastate['custom-css'], ' ')) {
							
							$states[$key][$mediakey][$mediastatekey]['custom-css'] = base64_decode($mediastate['custom-css']);
							
						}
						if(isset($mediastate['custom-js'])) {
							
							if(!strpos($mediastate['custom-js'], ' '))
								$states[$key][$mediakey][$mediastatekey]['custom-js'] = base64_decode($mediastate['custom-js']);

							// also add custom-js to the footer
							// no custom js for media
							/*$this->custom_js[implode("_", array($id, $key, $mediakey, $mediastatekey))] = array(
								"code" => $states[$key][$mediakey][$mediastatekey]['custom-js'],
								"selector" => $selector,
								);*/
						}
						if(is_pseudo_element($mediastatekey)) {
							$states[$key][$mediakey][$mediastatekey]['content'] = isset($mediastate['content'])?base64_decode($mediastate['content']):'';
						}
					}
				}
			}
			elseif(is_pseudo_element($key)) {
				//if(isset($states[$key]['content']) && !strpos($states[$key]['content'], ' '))
					$states[$key]['content'] = isset($states[$key]['content'])?base64_decode($states[$key]['content']):'';

				if(isset($states[$key]['custom-css']) && !strpos($states[$key]['custom-css'], ' '))
					$states[$key]['custom-css'] = base64_decode($states[$key]['custom-css']);
			}
			else {
				
				if(isset($states[$key]['custom-css']) && !strpos($states[$key]['custom-css'], ' '))
					$states[$key]['custom-css'] = base64_decode($states[$key]['custom-css']);
				
				if(isset($states[$key]['custom-js'])) {

					if(!strpos($states[$key]['custom-js'], ' '))
						$states[$key]['custom-js'] = base64_decode($states[$key]['custom-js']);

					// also add custom-js to the footer
					
					//$this->custom_js[implode("_", array($id, $key))] = array(
					// there shoudn't be custom js for states
					$this->custom_js[$id] = array(
						"code" => $states[$key]['custom-js'],
						"selector" => $selector,
						);
				}
			}
		}
		
		// copy states to use to build CSS
		$css_states = $states;

		// get defaults
		$default_atts = $this->get_default_params();

		// encode text defaults to base64 to be correctly decoded in shortcode
		foreach ($default_atts as $key => $value) {
			if (in_array($key, ['testimonial_text','testimonial_author','testimonial_author_info',
								'icon_box_heading','icon_box_text',
								'progress_bar_left_text','progress_bar_right_text',
								'pricing_box_package_title','pricing_box_package_subtitle','pricing_box_content','pricing_box_package_regular'])) {
				$default_atts[$key] = base64_encode($value);
			}
		}

		if ( !isset($states['original']) || ! is_array( $states['original'] ) ) {
			$states['original'] = array();
		}

		$default_vals = $this->get_default_values();

		$default_vals = array_filter( $default_vals, array($this, 'filter_empty_values'));

		$css_states['original'] = array_merge($default_vals, $states['original']);
		$this->css_states = $css_states;
		$this->states = $states;

		// merge with defaults for shortcodes
		$states['original'] = array_merge( $default_atts, $states['original'] );

		// build regular CSS

		$styles = $this->build_css($css_states, $selector);

		// build media queries CSS
		if ( isset($css_states['media']) && is_array($css_states['media']) ) {
			foreach ( $css_states['media'] as $media_name => $css_states) {
				$media_css = $this->build_css($css_states, $selector, $media_name);
				if ( $media_css ) {
					$this->media_queries[$selector][$media_name] = $media_css;
				}
			}
		}

		// add to instance
		$this->css .= $styles;

		$states['original'] = $this->keys_dash_to_underscore( $states['original'] );

		// add classes to return and use in shortcodes
		$states['original']['classes'] = str_replace( "_", "-", $this->options['tag'] );

		if ( isset($states['classes']) && is_array( $states['classes'] ) ) {
			$states['original']['classes'] .= " " . join($states['classes'], " ");
		}

		// add selector and id
		$states['original']['selector'] = $selector;
		$states['original']['id'] 		= $id;

		return $states['original'];
	}


	/**
	 * Build CSS string from states array
	 *
	 * @return string
	 * @since 0.3.2
	 */
	
	function build_css($states, $selector, $is_media = false) {

		global $ct_template_id;
		global $media_queries_list;
		global $media_queries_list_above;

		$global_settings 	= ct_get_global_settings();

		// add page-width media
		$media_queries_list["page-width"]["maxSize"] 		= oxygen_vsb_get_page_width($ct_template_id).'px';
		$media_queries_list_above["page-width"]["minSize"] 	= (oxygen_vsb_get_page_width($ct_template_id)+1).'px';

		// get defaults
		$default_atts = $this->get_default_params();

		$paragraph = '';
		// add to css selector if paragraph
		if ( $this->options['tag'] == "ct_paragraph" ) {
			$paragraph = " p";
		}

		$fake_properties = array( 
			'overlay-color',
			'background-position-left', 
			'background-position-top',
			'background-size-width',
			'background-size-height',
			"container-padding-top",
			"container-padding-right",
			"container-padding-bottom",
			"container-padding-left",
			"section-width",
			"custom-width",
			"header-width",
			"header-custom-width",
			"header-row-width",
			"header-row-custom-width",
			'ct-content',
			"custom-css",
			"custom-js",
			"code-css",
			"code-php",
			"code-js",

			"conditionsresult",
			"conditions",
			// ct_video related
			"video-padding-bottom",
			"use-custom",
			"custom-code",
			"embed-src",
			// ct_link_button related
			"button-style",
			"button-size",
			"button-color",
			"button-text-color",

			// background related
			"gradient",
			"background",
			"overlay-color",

			// ct_icon related
			"icon-size",
			"icon-style",
			"icon-color",
			"icon-background-color",

			// oxy_dynamic_list related
			"use-acf-repeater",
			"acf-repeater",

			// condition builder related
			"globalConditionsResult",
			"conditionspreview",
			"conditionstype",
			
			'target',
			'icon-id',
			"gutter",
			'separator',
			'date_format',
			'size',
			'meta_key',
			'tag',
			'url',
			'src',
			'alt',
			'hover-color',
			'border-all-color',
			'border-all-style',
			'border-all-width',
			'function-name',
			'friendly-name',
			'flex-reverse',

			// new columns
			'reverse-column-order',
			'set-columns-width-50',
			'stack-columns-vertically',

			// header
			'stack-header-vertically',
			'hide-row',
			'sticky-media',
			'overlay-header-above',

			// nav menu
			'menu-id',

			// video background
			"video-background",
			"video-background-media",
			"video-background-hide",

			// shadows
			"box-shadow-horizontal-offset",
    		"box-shadow-vertical-offset",
    		"box-shadow-blur",
    		"box-shadow-spread",
    		"box-shadow-color",
    		"box-shadow-inset",
    		"text-shadow-horizontal-offset",
    		"text-shadow-vertical-offset",
    		"text-shadow-blur",
    		"text-shadow-color",

    		// filter
    		'filter-amount-blur',
			'filter-amount-brightness',
			'filter-amount-contrast',
			'filter-amount-grayscale',
			'filter-amount-hue-rotate',
			'filter-amount-invert',
			'filter-amount-saturate',
			'filter-amount-sepia',
			'filter-amount-blur-unit',
			'filter-amount-brightness-unit',
			'filter-amount-contrast-unit',
			'filter-amount-grayscale-unit',
			'filter-amount-hue-rotate-unit',
			'filter-amount-invert-unit',
			'filter-amount-saturate-unit',
			'filter-amount-sepia-unit',

			// tabs
			'tabs-wrapper',
			'tabs-contents-wrapper',
			'active-tab-class',

			// pricing box
			'amount-main',
			'amount-decimal',
			'amount-currency',
			'amount-term',
			'layout',
			'sale-space-below',
			'amount-currency-typography-font-size',
			'amount-main-typography-font-size',
			'amount-main-typography-line-height',
			'amount-decimal-typography-font-size',
			'amount-term-typography-font-size',
			'sale-typography-font-size',
			'sale-typography-color',

			// toggle
        	'toggle-active-class',

			// aos
			'aos-type',
			'aos-duration',
			'aos-easing',
			'aos-offset',
			'aos-delay',
			'aos-anchor',
			'aos-anchor-placement',
			'aos-once',
			'aos-enable',

            // ct_image SRCSET related options
			'attachment-url',
			'attachment-height',
			'attachment-width',
		);

		$not_css_options = apply_filters( "ct_not_css_options", array() );

		// init styles variable
		$styles = "";

		// default 
		if (sizeof($states) < 1 && $this->options['tag'] == "ct_new_columns") {
			$styles .= "@media (max-width: ".$media_queries_list[$default_atts['stack-columns-vertically']]['maxSize'].") {";
			$styles .= '#' . $selector . "> .ct-div-block {width: 100% !important;}";
			$styles .= "}";
		}

		/**
		 * Filter to add specific component styles from component Class
		 * to keep this function clean and logical
		 *
		 * @since 2.0
		 */

		$styles = apply_filters("oxy_component_css_styles", $styles, $states, $selector, $this, $default_atts);
		
		// make menu icon same color as links color
		if (($this->options['tag'] == "oxy_nav_menu") && 
			 isset($states['original']["menu_color"]) && $states['original']["menu_color"]) {
			$styles .= '#' . $selector . " .oxy-nav-menu-hamburger-line{";
			$styles .= " background-color:" . oxygen_vsb_get_global_color_value($states['original']["menu_color"]) . ";";
			$styles .= "}";
		}

		// make open menu bg same as header/row bg
		if (($this->options['tag'] == "oxy_header" || $this->options['tag'] == "oxy_header_row") && isset($states['original']["background-color"])) {
			$styles .= '#' . $selector . " .oxy-nav-menu-open,";
			$styles .= '#' . $selector . " .oxy-nav-menu:not(.oxy-nav-menu-open) .sub-menu{";
			$styles .= "background-color:".oxygen_vsb_get_global_color_value($states['original']["background-color"]).";";
			$styles .= "}";
		}

		// loop trough states (original, :hover, ...) to get all CSS params
		foreach ( $states as $key => $atts ) {

			//echo $key."\n";
			if ( in_array($key, array("classes", "media", "name", "selector") ) ) {
				continue;
			}

			// convert "_" back to "-"
			$atts = $this->keys_underscore_to_dash( $atts );
			$key = str_replace("_", "-", $key);

			// start selector CSS
			$full_selector = ( $key != 'original') ? "#$selector$paragraph:$key{\r\n" : "#$selector $paragraph{\r\n";

			/**
			 * Oxy Nav Menu
			 */

			if ( $this->options['tag'] == "oxy_nav_menu" ) {
				$oxy_nav_menu_selector 			= ( $key != 'original') ? "#$selector .oxy-nav-menu-list:$key{\r\n" : "#$selector .oxy-nav-menu-list{\r\n";
				$oxy_nav_menu_selector_item		= ( $key != 'original') ? "#$selector .menu-item:$key a{\r\n" : "#$selector .menu-item a{\r\n";
				$oxy_nav_menu_selector_active 	= ( $key != 'original') ? "#$selector .current-menu-item a:$key{\r\n" : "#$selector .current-menu-item a{\r\n";
				$oxy_nav_menu_selector_dropdowns 		= ( $key != 'original') ? "#$selector.oxy-nav-menu:not(.oxy-nav-menu-open) .sub-menu:$key{\r\n" : "#$selector.oxy-nav-menu:not(.oxy-nav-menu-open) .sub-menu{\r\n";
				$oxy_nav_menu_selector_dropdowns_items 	= ( $key != 'original') ? "#$selector.oxy-nav-menu:not(.oxy-nav-menu-open) .sub-menu .menu-item a:$key{\r\n" : "#$selector.oxy-nav-menu:not(.oxy-nav-menu-open) .sub-menu .menu-item a{\r\n";
				$oxy_nav_menu_selector_not_open_items 	= ( $key != 'original') ? "#$selector.oxy-nav-menu:not(.oxy-nav-menu-open) .menu-item a:$key{\r\n" : "#$selector.oxy-nav-menu:not(.oxy-nav-menu-open) .menu-item a{\r\n";
				$oxy_nav_menu_selector_dropdowns_items_hover 	= "#$selector.oxy-nav-menu:not(.oxy-nav-menu-open) .oxy-nav-menu-list .sub-menu .menu-item a:hover{\r\n";

				$oxy_nav_menu_styles 					= "";
				$oxy_nav_menu_styles_item				= "";
				$oxy_nav_menu_styles_active 			= "";
				$oxy_nav_menu_styles_dropdowns_items_hover = "";
				$oxy_nav_menu_styles_not_open_items 	= "";


				if (!isset($states['original']['menu_dropdowns_background-color'])){
					$states['original']['menu_dropdowns_background-color'] = false;
				}
				
				if (isset($states['original']['menu_hover_background-color'])&&(!isset($states['original']['menu_dropdowns_background-color']) || !$states['original']['menu_dropdowns_background-color'])) {
					$oxy_nav_menu_styles_dropdowns = "background-color:" . oxygen_vsb_get_global_color_value($states['original']['menu_hover_background-color']) . ";";
				}

				$oxy_nav_menu_styles_dropdowns_items = "border: 0;";

				if (isset($states['original']['menu_justify-content'])&&$states['original']['menu_justify-content']) {
					$oxy_nav_menu_styles_not_open_items = "justify-content: " . $states['original']['menu_justify-content'];
				}

				if (isset($states['original']['menu_flex-direction']) && $states['original']['menu_flex-direction']=="column") {
					$oxy_nav_menu_styles_dropdowns_items 	.= "padding-left: " . $states['original']['menu_padding-top'] . "px;";
					$oxy_nav_menu_styles_dropdowns_items 	.= "padding-right: " . $states['original']['menu_padding-bottom'] . "px;";	
				}
				else {
					if(isset($states['original']['menu_padding-top'])) $oxy_nav_menu_styles_dropdowns_items 	.= "padding-top: " . $states['original']['menu_padding-top'] . "px;";
					if(isset($states['original']['menu_padding-bottom'])) $oxy_nav_menu_styles_dropdowns_items 	.= "padding-bottom: " . $states['original']['menu_padding-bottom'] . "px;";
				}

				if (isset($atts['menu-responsive'])&&$atts['menu-responsive']!='never') {

					if (isset($atts['menu-responsive']) && $atts['menu-responsive']!='always') {
					$styles .= "@media (max-width: " . $media_queries_list[$atts['menu-responsive']]['maxSize'] . ") {";
					}
					$styles .= "#" . $selector . " .oxy-nav-menu-list {display: none;}";
					$styles .= "#" . $selector . " .oxy-menu-toggle {display: initial;}";
					$styles .= "#" . $selector . ".oxy-nav-menu.oxy-nav-menu-open .oxy-nav-menu-list {display: initial;}";
					if ($atts['menu-responsive']!='always') {
					$styles .= "}";
					}
				}

				$menuWidth 		= (isset($states['original']['menu_responsive_icon_size']) && $states['original']['menu_responsive_icon_size']) ? intval($states['original']['menu_responsive_icon_size']) : 40;
				$menuPadding 	= (isset($states['original']['menu_responsive_padding_size']) && $states['original']['menu_responsive_padding_size']) ? intval($states['original']['menu_responsive_padding_size']) : 0;
				$menuWrapSize 	= $menuWidth + ($menuPadding*2);
				$menuHeight 	= intval($menuWidth * 0.8);
				$lineHeight 	= intval($menuWidth * 0.15);
				$top 			= ($menuHeight / 2) - ($lineHeight / 2);

				if ( $key=="original" && !$is_media ) {

					$padding_top = ((isset($states['original']['menu_responsive_padding_top'])&&$states['original']['menu_responsive_padding_top']) ? $states['original']['menu_responsive_padding_top'] : $states['original']['menu_padding-top']);
					$padding_bottom = ((isset($states['original']['menu_responsive_padding_bottom'])&&$states['original']['menu_responsive_padding_bottom']) ? $states['original']['menu_responsive_padding_bottom'] : $states['original']['menu_padding-bottom']);
					$padding_left = ((isset($states['original']['menu_responsive_padding_left'])&&$states['original']['menu_responsive_padding_left']) ? $states['original']['menu_responsive_padding_left'] : $states['original']['menu_padding-left']);
					$padding_right = ((isset($states['original']['menu_responsive_padding_right'])&&$states['original']['menu_responsive_padding_right']) ? $states['original']['menu_responsive_padding_right'] : $states['original']['menu_padding-right']);

				$styles 
					.= '#' . $selector . ".oxy-nav-menu.oxy-nav-menu-open {";
				
				if (isset($states['original']['menu_responsive_background_color'])){
					$styles 
						.= "background-color:" . oxygen_vsb_get_global_color_value($states['original']['menu_responsive_background_color']) . ";"; 
				}

				$styles 
					.=  "margin-top: 0 !important;" .
						"margin-right: 0 !important;" .
						"margin-left: 0 !important;" .
						"margin-bottom: 0 !important;" .

					'} #' . $selector . ".oxy-nav-menu.oxy-nav-menu-open .menu-item a {";
					
					if (isset($states['original']['menu_responsive_link_color'])&&$states['original']['menu_responsive_link_color']!=="") { 
						$styles .=  "color:" . oxygen_vsb_get_global_color_value($states['original']['menu_responsive_link_color']) . ";";
					}
					if (isset($padding_top)&&$padding_top!=="") { 
						$styles .= "padding-top:" . $padding_top . "px;";
					}
					if (isset($padding_bottom)&&$padding_bottom!=="") { 
						$styles .= "padding-bottom:" . $padding_bottom . "px;";
					}
					if (isset($padding_left)&&$padding_left!=="") { 
						$styles .= "padding-left:" . $padding_left . "px;";
					}
					if (isset($padding_right)&&$padding_right!=="") { 
						$styles .= "padding-right:" . $padding_right . "px;";
					}

				if (isset($states['original']['menu_responsive_hover_link_color'])) {
					$styles .='} #' . $selector . ".oxy-nav-menu.oxy-nav-menu-open .menu-item a:hover {" .
							"color:" . oxygen_vsb_get_global_color_value($states['original']['menu_responsive_hover_link_color']) . ";";
				}

				if (isset($states['original']['menu_text-decoration'])) {
					$styles .='} #' . $selector . ".oxy-nav-menu .menu-item a:hover {" .
						"text-decoration:" . $states['original']['menu_text-decoration'] . ";";
				}

				$styles 
					.= '} #' . $selector . " .oxy-nav-menu-hamburger-wrap {".
						"width:" 			. $menuWrapSize . "px;" .
						"height:"	 		. $menuWrapSize . "px;" .
						((isset($states['original']['menu_responsive_icon_margin']) && $states['original']['menu_responsive_icon_margin']) ? ("margin-top:" . $states['original']['menu_responsive_icon_margin'] . "px;" .
							"margin-bottom:" . $states['original']['menu_responsive_icon_margin'] . "px;"): '');

				if (isset($states['original']['menu_responsive_padding_color'])) {
					$styles .= "background-color:" . oxygen_vsb_get_global_color_value($states['original']['menu_responsive_padding_color']). ";";
				}

				$styles .= '}'; 
				
				if (isset($states['original']['menu_responsive_padding_hover_color'])) {
					$styles .= '#' . $selector . " .oxy-nav-menu-hamburger-wrap:hover {".
						"background-color:" . oxygen_vsb_get_global_color_value($states['original']['menu_responsive_padding_hover_color']). "; }";
				}
					
				$styles 
					.= '#' . $selector . " .oxy-nav-menu-hamburger {" .
						"width:"  . $menuWidth . "px;" .
						"height:" . $menuHeight . "px;" .
					
					'} #' . $selector . " .oxy-nav-menu-hamburger-line {" .
						"height:" . $lineHeight . "px;";
				
				if (isset($states['original']['menu_responsive_icon_color'])) {
					$styles .= "background-color:" . oxygen_vsb_get_global_color_value($states['original']['menu_responsive_icon_color']) . ";";
				}

				$styles .= '}';

				if (isset($states['original']['menu_responsive_icon_hover_color'])) {
					$styles 
						.= '#' . $selector . " .oxy-nav-menu-hamburger-wrap:hover .oxy-nav-menu-hamburger-line {" .
							"background-color:" . oxygen_vsb_get_global_color_value($states['original']['menu_responsive_icon_hover_color']) . ";" .
						'}';
				}

				$styles 
					.= '#' . $selector . ".oxy-nav-menu-open .oxy-nav-menu-hamburger .oxy-nav-menu-hamburger-line:first-child {" .
						"top:" . $top . "px;" .
					'} #' . $selector . ".oxy-nav-menu-open .oxy-nav-menu-hamburger .oxy-nav-menu-hamburger-line:last-child {" .
						"top:-". $top . "px;}";
				
				if (isset($states['original']['menu_transition-duration'])) {
					$styles 
						.='#' . $selector . " .menu-item > .sub-menu {" .
							'transition-duration:' . $states['original']['menu_transition-duration'] . 's; }';

					}
				}

			}

			$selector_css = "";
			$default_stack_columns_vert = "";

			// default 
			if (!isset($atts['stack-columns-vertically']) && $this->options['tag'] == "ct_new_columns") {
				$default_stack_columns_vert .= "@media (max-width: ".$media_queries_list[$default_atts['stack-columns-vertically']]['maxSize'].") {";
				$default_stack_columns_vert .= '#' . $selector . "> .ct-div-block {width: 100% !important;}";
				$default_stack_columns_vert .= "}";
			}

			if ( sizeof($atts) < 1 ) {
				$styles .= $default_stack_columns_vert;
			}

			// handle units
			foreach ( $atts as $param => $value ) {
				
				// set menu prefix back to same as defaults
				$default_param = str_replace("menu-dropdowns-", "menu_dropdowns_", $param);
				$default_param = str_replace("menu-active-", "menu_active_", $default_param);
				$default_param = str_replace("menu-", "menu_", $default_param);

				// handle unit options
				if ( isset($default_atts[$default_param.'-unit']) && $default_atts[$default_param.'-unit'] ) {
					
					// check if unit set by user
					if ( isset( $atts[$param.'-unit'] ) ) {
						
						// set to auto
						if ( $atts[$param.'-unit'] == 'auto' ) {
							$atts[$param] = 'auto';
						}
						// set to saved or default
                    	else {
	                        $atts[$param] .= $atts[$param.'-unit'];
	                    }
					}
					// add default unit
					else {
						$atts[$param] .= $default_atts[$default_param.'-unit'];
					}
				}
				else {
                    if ( $atts[$param] == 'auto' ) {
                    	$param = str_replace("-unit", "", $param);
                        $atts[$param] = 'auto';
                    }
                    if ($param == 'container-padding-top'||
                        $param == 'container-padding-bottom'||
                        $param == 'container-padding-left'||
                        $param == 'container-padding-right') {
                        $unit = isset( $atts[$param.'-unit'] ) ? $atts[$param.'-unit'] : $global_settings['sections'][$param.'-unit'];
                        if ( $atts[$param] ) {
                            $atts[$param] .= $unit;
                        }
                    }
				}
			}

			// handle columns gutter (margin-right)
			if ( $this->options['tag'] == "ct_columns" ) {

				$gutter = $this->get_width($atts['gutter']);

				$styles .= ( $key != 'original') ? "#$selector .ct-column:$key{\r\n" : "#$selector .ct-column{\r\n";
				$styles .= "margin-left:" . ($gutter['value']/2) . $gutter['units'] . ";\r\n";
				$styles .= "margin-right:" . ($gutter['value']/2) . $gutter['units'] . ";\r\n";
				$styles .= "}\r\n";

			}


			/**
			 * Oxy Video
			 */

			if ( $this->options['tag'] == "ct_video" ) {

				$styles .= ( $key != 'original') ? "#$selector:$key >.oxygen-vsb-responsive-video-wrapper {\r\n" : "#$selector >.oxygen-vsb-responsive-video-wrapper {\r\n";		
					
					if ( isset($atts['video-padding-bottom']) ) {
						$styles .= "padding-bottom:" . $atts['video-padding-bottom'] . ";";
					}

				$styles  .= "}";
			}


			/**
			 * Oxy New Columns
			 */

			if ( $this->options['tag'] == "ct_new_columns" && isset($atts['set-columns-width-50'])
														  && $atts['set-columns-width-50'] != 'never') {

				$styles .= "@media (max-width: ".$media_queries_list[$atts['set-columns-width-50']]['maxSize'].") {";
				$styles .= '#' . $selector . "> .ct-div-block {width: 50% !important;}";
				$styles .= "}";
			}
			
			if ( $this->options['tag'] == "ct_new_columns" ) {

				if(isset($atts['reverse-column-order']))
					$reverseColumnOrder 			= isset($media_queries_list[$atts['reverse-column-order']]) ? intval($media_queries_list[$atts['reverse-column-order']]['maxSize']) : 0;
				
				if(isset($atts['stack-columns-vertically']))
					$stackColumnsVertically 		= intval($media_queries_list[$atts['stack-columns-vertically']]['maxSize']);
				
				$reverseColumnOrderStyles 	 	= "";
				$stackColumnsVerticallyStyles 	= "";

				if (!isset($atts['stack-columns-vertically']) && $this->options['tag'] == "ct_new_columns") {
					$stackColumnsVertically = intval($media_queries_list[$default_atts['stack-columns-vertically']]['maxSize']);
				}

				if (isset($atts['reverse-column-order']) && $atts['reverse-column-order']=="always") {
					$reverseColumnOrder = 9999999999;
				}

				if ( isset($atts['stack-columns-vertically']) && 
					 $atts['stack-columns-vertically'] != 'never') {
					$stackColumnsVerticallyStyles .= "@media (max-width: ".$media_queries_list[$atts['stack-columns-vertically']]['maxSize'].") {";
						$stackColumnsVerticallyStyles .= '#' . $selector . "> .ct-div-block {";
						$stackColumnsVerticallyStyles .= "width: 100% !important;";
						$stackColumnsVerticallyStyles .= "}";
						
						$stackColumnsVerticallyStyles .= '#' . $selector . "{";
						if (!isset($reverseColumnOrder) || $stackColumnsVertically>$reverseColumnOrder) {
							$stackColumnsVerticallyStyles .= "flex-direction: column;";
						}
						else {
							$stackColumnsVerticallyStyles .= "flex-direction: column-reverse;";
						}
						$stackColumnsVerticallyStyles .= "}";
					$stackColumnsVerticallyStyles .= "}";
				}

				$styles .= $default_stack_columns_vert;
				
				if ( isset($atts['reverse-column-order']) && 
					 $atts['reverse-column-order'] != 'never' && 
					 $atts['reverse-column-order'] != 'always' ) {

					$reverseColumnOrderStyles .= "@media (max-width: ".$media_queries_list[$atts['reverse-column-order']]['maxSize'].") {";
					$reverseColumnOrderStyles .= '#' . $selector . "{";
					if ($stackColumnsVertically < $reverseColumnOrder) {
						$reverseColumnOrderStyles .= "flex-direction: row-reverse;";
					}
					else {
						$reverseColumnOrderStyles .= "flex-direction: column-reverse;";
					}
					$reverseColumnOrderStyles .= "}";
					$reverseColumnOrderStyles .= "}";
				}

				if ( isset($atts['reverse-column-order']) && $atts['reverse-column-order'] == 'always') {

					$styles .= '#' . $selector . "{flex-direction: row-reverse;}";
				}

				if (isset($reverseColumnOrder) && isset($stackColumnsVertically) && $stackColumnsVertically < $reverseColumnOrder) {
					$styles .= $reverseColumnOrderStyles;
					$styles .= $stackColumnsVerticallyStyles;
				}
				else {
					$styles .= $stackColumnsVerticallyStyles;
					$styles .= $reverseColumnOrderStyles;
				}

			}


			/**
			 * Oxy Header
			 */

			if ( $this->options['tag'] == "oxy_header" ) {

				$pre_styles = '';

				if ( isset($atts['header-width']) && $atts['header-width'] == "custom" && isset($atts['header-custom-width']) && $atts['header-custom-width'] ) {
					$pre_styles .= "max-width" . ": " . $atts['header-custom-width'] . ";\r\n";
				}
				if ( isset($atts['header-width']) && $atts['header-width'] == "full-width" ) {
					$pre_styles .= "max-width" . ": 100%;\r\n";
				}

				if($pre_styles != '') {
					$styles .= ( $key != 'original') ? "#$selector .oxy-header-container:$key{\r\n" : "#$selector .oxy-header-container{\r\n";
					$styles .= $pre_styles;
					$styles .= "}\r\n";
				}

				$zindex = "2147483640";
				if ( isset($atts['sticky-zindex']) && $atts['sticky-zindex'] != "" ) {
					$zindex = $atts['sticky-zindex'];
				}

				$stickyStyles = "";

				if ( isset($atts['sticky-header']) && isset($atts['sticky-media']) && 
					 $atts['sticky-header'] == 'yes' && $atts['sticky-media'] != 'never' ) {
					
					if ($atts['sticky-media'] != 'always') {
					$stickyStyles .= "@media (min-width: ".$media_queries_list_above[$atts['sticky-media']]['minSize'].") {";
					}
						$stickyStyles .= '#' . $selector . ".oxy-header-wrapper.oxy-header.oxy-sticky-header.oxy-sticky-header-active {";
						$stickyStyles .= "position: fixed; top: 0; left: 0; right: 0; z-index: ".$zindex.";";
						$stickyStyles .= isset($atts['sticky-background-color']) ? "background-color:" . oxygen_vsb_get_global_color_value($atts['sticky-background-color']) . ";" : "";
						if (isset($atts['sticky-box-shadow'])) {
							$stickyStyles .= "box-shadow:" . $atts['sticky-box-shadow'] . ";";
						}
						else {
							$stickyStyles .= "box-shadow:" . $default_atts['sticky-box-shadow'] . ";";
						}
						$stickyStyles .= "}";

						$stickyStyles .= '#' . $selector . ".oxy-header.oxy-sticky-header-active .oxygen-hide-in-sticky {";
						$stickyStyles .= "display: none;";
						$stickyStyles .= "}";

						$stickyStyles .= '#' . $selector . ".oxy-header.oxy-header .oxygen-show-in-sticky-only {";
						$stickyStyles .= "display: none;";
						$stickyStyles .= "}";
					if ($atts['sticky-media'] != 'always') {
					$stickyStyles .= "}";
					}
				}

				if ( $stickyStyles ) {
					$styles .= $stickyStyles;
				}
			}

			if ( $this->options['tag'] == "oxy_header" || $this->options['tag'] == "oxy_header_row" ) {

				$stackHeaderVerticallyStyles = "";
			
				if ( isset($atts['stack-header-vertically']) && 
					 $atts['stack-header-vertically'] != 'never') {
					
					$stackHeaderVerticallyStyles .= "@media (max-width: ".$media_queries_list[$atts['stack-header-vertically']]['maxSize'].") {";
						$stackHeaderVerticallyStyles .= '#' . $selector . " .oxy-header-container {";
						$stackHeaderVerticallyStyles .= "flex-direction: column;";
						$stackHeaderVerticallyStyles .= "}";
						$stackHeaderVerticallyStyles .= '#' . $selector . " .oxy-header-container > div{";
						$stackHeaderVerticallyStyles .= "justify-content: center;";
						$stackHeaderVerticallyStyles .= "}";
					$stackHeaderVerticallyStyles .= "}";
				}

				if ( $stackHeaderVerticallyStyles ) {
					$styles .= $stackHeaderVerticallyStyles;
				}
			}


			if ( $this->options['tag'] == "oxy_header_row" ) {

				$pre_styles = '';

				if ( isset($atts['header-row-width']) && $atts['header-row-width'] == "custom" && isset($atts['header-row-custom-width']) && $atts['header-row-custom-width'] ) {
					$pre_styles .= "max-width" . ": " . $atts['header-row-custom-width'] . ";\r\n";
				}
				if ( isset($atts['header-row-width']) && $atts['header-row-width'] == "full-width" ) {
					$pre_styles .= "max-width" . ": 100%;\r\n";
				}
				if ( isset($atts['header-row-width']) && $atts['header-row-width'] == "page-width" ) {
					global $ct_template_id;
					$max_width = oxygen_vsb_get_page_width($ct_template_id);
					$pre_styles .= "max-width" . ": " . $max_width. "px;\r\n";
				}

				if($pre_styles != '') {
					$styles .= ( $key != 'original') ? "#$selector.oxy-header-row .oxy-header-container:$key{\r\n" : "#$selector.oxy-header-row .oxy-header-container{\r\n";
					$styles .= $pre_styles;
					$styles .= "}\r\n";
				}

				$hideRowStyles = "";
				$showRowStyles = "";
			
				if ( isset($atts['hide-row']) && 
					 $atts['hide-row'] != 'never') {
					
					$hideRowStyles .= "@media (max-width: ".$media_queries_list[$atts['hide-row']]['maxSize'].") {";
						$hideRowStyles .= '#' . $selector . " {";
						$hideRowStyles .= "display: none;";
						$hideRowStyles .= "}";
					$hideRowStyles .= "}";
				}

				if ( $hideRowStyles ) {
					$styles .= $hideRowStyles;
				}

				$display = (isset($atts['display'])) ? $atts['display'] : "block";
					
				$showRowStyles .= '.oxy-header.oxy-sticky-header-active > #' . $selector . ".oxygen-show-in-sticky-only {";
				$showRowStyles .= "display: " . $display . ";";
				$showRowStyles .= "}";

				$styles .= $showRowStyles;
			}


			/**
			 * Oxy Link Button
			 */

			if ($this->options['tag'] == "ct_link_button") {

				if (!$is_media && $key == "original") {
					$buttonStyle 		= $atts['button-style'];
					if(isset($this->states[$key]['button-color']))
						$buttonColor 		= oxygen_vsb_get_global_color_value($this->states[$key]['button-color']);
					if(isset($this->states[$key]['button-text-color']))
						$buttonTextColor 	= oxygen_vsb_get_global_color_value($this->states[$key]['button-text-color']);
					if(isset($this->states[$key]['button-size']))
						$buttonSize 		= $this->states[$key]['button-size'];
				}
				else if (!$is_media) {
					$buttonStyle 		= $this->css_states['original']['button-style'];
					$buttonColor 		= oxygen_vsb_get_global_color_value($this->states[$key]['button-color']);
					$buttonTextColor 	= oxygen_vsb_get_global_color_value($this->states[$key]['button-text-color']);
					$buttonSize 		= $this->states[$key]['button-size'];
				}
				else {
					$buttonStyle 		= $this->css_states['original']['button-style'];
					$buttonColor 		= oxygen_vsb_get_global_color_value($this->states['media'][$is_media][$key]['button-color']);
					$buttonTextColor 	= oxygen_vsb_get_global_color_value($this->states['media'][$is_media][$key]['button-text-color']);
					$buttonSize 		= $this->states['media'][$is_media][$key]['button-size'];
				}
				
				$styles .= ( $key != 'original') ? "#$selector:$key  {\r\n" : "#$selector {\r\n";		
				
				if ( $buttonStyle == 1 && isset($buttonColor)) {
					if(isset($buttonColor)) {
						$styles .= "background-color: " . $buttonColor . ";\r\n";
						$styles .= "border: 1px solid " .  $buttonColor . ";\r\n";
					}
					if(isset($buttonTextColor)) {
						$styles .= "color: " . $buttonTextColor . ";\r\n";
					}
				}

				if ( $buttonStyle == 2 ) {
					$styles .= "background-color: transparent;\r\n";
					if (isset($buttonColor)) {
						$styles .= "border: 1px solid " . $buttonColor . ";\r\n";
						$styles .= "color: " . $buttonColor . ";\r\n";
					}
					else {
						$styles .= "color: " . $default_atts['button-color'] . ";\r\n";
					}
				}

				if ( isset($buttonSize) ) {
					$substracted = $buttonStyle == 2 ? 1 : 0;
					$styles .= "padding: " . (intval($buttonSize)-$substracted) . 'px ' . (intval($buttonSize)*1.6-$substracted) . "px;\r\n";
				}

				$styles .= "}";
			}

			/**
			 * Oxy Icon
			 */

			if ($this->options['tag'] == "ct_fancy_icon") {

				if (!$is_media && $key == "original") {
					$iconStyle 			= $atts['icon-style'];
					$iconColor 			= isset($this->states[$key]['icon-color']) ? oxygen_vsb_get_global_color_value($this->states[$key]['icon-color']) : false;
					$iconBackgroundColor= isset($atts['icon-background-color']) ? oxygen_vsb_get_global_color_value($atts['icon-background-color']) : false;
					$iconPadding 		= $atts['icon-padding'];
					$iconSize 			= isset($this->states[$key]['icon-size']) ? $this->states[$key]['icon-size']."px" : "";
				}
				else {
					$iconStyle 			= $this->css_states['original']['icon-style'];
					$iconColor 			= oxygen_vsb_get_global_color_value($this->states['media'][$is_media][$key]['icon-color']);
					$iconBackgroundColor= oxygen_vsb_get_global_color_value($this->states['media'][$is_media][$key]['icon-background-color']);
					$iconPadding 		= (isset($this->states['media'][$is_media][$key]['icon-padding']) && $this->states['media'][$is_media][$key]['icon-padding']) ? $this->states['media'][$is_media][$key]['icon-padding']."px" : "";
					$iconSize 			= (isset($this->states['media'][$is_media][$key]['icon-size']) && $this->states['media'][$is_media][$key]['icon-size']) ? $this->states['media'][$is_media][$key]['icon-size']."px" : "";
				}

				//var_dump($atts); die();

				$css = "";
				
				if ( $iconStyle == "1" ) {
					$css .= "border: 1px solid;\r\n";
				}
					
				if ( $iconStyle == "2" ) {
					if ( isset($iconBackgroundColor) && $iconBackgroundColor ) {
						$css .= "background-color: " . $iconBackgroundColor . ";\r\n";
						$css .= "border: 1px solid " . $iconBackgroundColor . ";\r\n";
					}
				}

				if ( $iconStyle == "1" || $iconStyle == "2" ) {
					if(isset($iconPadding)) {
					 	$css .= "padding: " . $iconPadding . ";";
					}
				}

				if ( $iconColor ) {
				 	$css .= "color: " . $iconColor . ";";
				}

				if ( $css !== "" ) {
					$styles .= ( $key != 'original') ? "#$selector:$key  {\r\n" : "#$selector {\r\n";
					$styles .= $css;
					$styles .= "}";
				}

				if ( $iconSize ) {
					$styles = $styles . (( $key != 'original') ? "#$selector:$key>svg {\r\n" : "#$selector>svg {\r\n");
				 	$styles .= "width: " . $iconSize . ";";
				 	$styles .= "height: " . $iconSize . ";";
				 	$styles .= "}";
				}
			}

			
			/**
			 * Oxy Section
			 */

			if ( $this->options['tag'] == "ct_section" ) {
					
				$pre_styles = '';
				
				if ( isset($atts['section-width']) && $atts['section-width'] == "custom" && isset($atts['custom-width']) && $atts['custom-width'] ) {
					$pre_styles .= "max-width" . ": " . $atts['custom-width'] . ";\r\n";
				}
				if ( isset($atts['section-width']) && $atts['section-width'] == "full-width" ) {
					$pre_styles .= "max-width" . ": 100%;\r\n";
				}

				// handle container padding
				if ( isset($atts['container-padding-top']) ) {
					$pre_styles .= "padding-top" . ": " . $atts['container-padding-top'] . ";\r\n";
				}
				if ( isset($atts['container-padding-right']) ) {
					$pre_styles .= "padding-right" . ": " . $atts['container-padding-right'] . ";\r\n";
				}
				if ( isset($atts['container-padding-bottom']) ) {
					$pre_styles .= "padding-bottom" . ": " . $atts['container-padding-bottom'] . ";\r\n";
				}
				if ( isset($atts['container-padding-left']) ) {
					$pre_styles .= "padding-left" . ": " . $atts['container-padding-left'] . ";\r\n";
				}

				// flex options since 2.0
				if ( isset($atts['display']) ) {
					$pre_styles .= "display:" . $atts['display'] . ";\r\n";
				}
				$reverse = (isset($atts['flex-reverse']) && $atts['flex-reverse'] == 'reverse') ? "-reverse" : "";
				if ( isset($atts['flex-direction']) ) {
					$pre_styles .= "flex-direction:" . $atts['flex-direction'] . $reverse . ";\r\n";
				}
				if ( isset($atts['flex-wrap']) ) {
					$pre_styles .= "flex-wrap:" . $atts['flex-wrap'] . ";\r\n";
				}
				if ( isset($atts['align-items']) ) {
					$pre_styles .= "align-items:" . $atts['align-items'] . ";\r\n";
				}
				if ( isset($atts['align-content']) ) {
					$pre_styles .= "align-content:" . $atts['align-content'] . ";\r\n";
				}
				if ( isset($atts['justify-content']) ) {
					$pre_styles .= "justify-content:" . $atts['justify-content'] . ";\r\n";
				}
				
				if($pre_styles != '') {
					$styles .= ( $key != 'original') ? "#$selector > .ct-section-inner-wrap:$key{\r\n" : "#$selector > .ct-section-inner-wrap{\r\n";
					$styles .= $pre_styles;
					$styles .= "}\r\n";
				}

				if ( isset($atts['video-background-hide']) ) {
					$styles .= "@media (max-width: ".$media_queries_list[$atts['video-background-hide']]['maxSize'].") {";
					$styles .= '#' . $selector . " .oxy-video-container { display: none; }";
					$styles .= "}";
				}

				if ( isset($atts['video-background-overlay']) ) {
					$styles .= '#' . $selector . " .oxy-video-overlay { background-color: " . oxygen_vsb_get_global_color_value($atts['video-background-overlay']) . "; }";
				}

			}
			
			// handle background-position option
			if ( (isset($atts['background-position-left']) && $atts['background-position-left']) || (isset($atts['background-position-top']) && $atts['background-position-top']) ) {

				$left = (isset($atts['background-position-left']) && $atts['background-position-left']) ? $atts['background-position-left'] : "0%";
				$top  = (isset($atts['background-position-top']) && $atts['background-position-top']) ? $atts['background-position-top'] : "0%";
				$atts['background-position'] = $left . " " . $top;
			}

			// handle background-size option
			if ( isset($atts['background-size']) && $atts['background-size'] == "manual" ) {

				$width = isset($atts['background-size-width']) ? $atts['background-size-width'] : "auto";
				$height = isset($atts['background-size-height']) ? $atts['background-size-height'] : "auto";
				$atts['background-size'] = $width . " " . $height;
			}

			// handle box-shadow options
			if ( isset($atts['box-shadow-color']) ) {

				$inset 	= (isset($atts['box-shadow-inset']) && $atts['box-shadow-inset']=='inset') 				? "inset " : "";
				$hor 	= (isset($atts['box-shadow-horizontal-offset'])) 	? $atts['box-shadow-horizontal-offset']."px " : "";
				$ver 	= (isset($atts['box-shadow-vertical-offset'])) 		? $atts['box-shadow-vertical-offset']."px " : "";
				$blur 	= (isset($atts['box-shadow-blur'])) 				? $atts['box-shadow-blur']."px " : "0px ";
				$spread = (isset($atts['box-shadow-spread'])) 				? $atts['box-shadow-spread']."px " : "";
				
				$atts['box-shadow'] = $inset.$hor.$ver.$blur.$spread.oxygen_vsb_get_global_color_value($atts['box-shadow-color']);
			}

			// handle text-shadow options
			if ( isset($atts['text-shadow-color']) ) {

				$hor 	= (isset($atts['text-shadow-horizontal-offset'])) 	? $atts['text-shadow-horizontal-offset']."px " : "";
				$ver 	= (isset($atts['text-shadow-vertical-offset'])) 	? $atts['text-shadow-vertical-offset']."px " : "";
				$blur 	= (isset($atts['text-shadow-blur'])) 				? $atts['text-shadow-blur']."px " : "0px ";
				
				$atts['text-shadow'] = $hor.$ver.$blur.oxygen_vsb_get_global_color_value($atts['text-shadow-color']);
			}

			$content_included = false;
			// generate background layers only if no dynamic "[oxygen data..." shortcodes used for background image
			if ( isset($atts['background-image']) ) {
				if ( strpos(($atts['background-image']),'[oxygen') === false ) {
					$selector_css .= ct_getBackgroundLayersCSS($atts, $default_atts);
				}
			}
			else {
				$selector_css .= ct_getBackgroundLayersCSS($atts, $default_atts);
			}

			$selector_css .= self::getTransformCSS($atts, $default_atts);

			// loop trough properties (background, color, ...)
			foreach ( $atts as $prop => $value ) {	

				// skip units
				if ( strpos( $prop, "-unit") ) {
					continue;
				}

				// skip fake hover options
				if ( strpos( $prop, "hover-") ) {
					continue;
				}

				// skip fake responsive options
				if ( strpos( $prop, "responsive") !== false ) {
					continue;
				}

				// skip fake slider options
				if ( strpos( $prop, "slider") !== false ) {
					continue;
				}

				// skip fake icon options
				if ( strpos( $prop, "icon") !== false ) {
					continue;
				}

				// skip fake soundcloud options
				if ( strpos( $prop, "soundcloud") !== false ) {
					continue;
				}

				// skip gutter
				if ( $prop == "gutter" && $this->options['tag'] == "ct_columns" )
					continue;

				// skip background color for fancy icons, its taken care of above
				if ($this->options['tag'] == "ct_fancy_icon" && 
					(
						$prop=="background" ||
						$prop=="icon-background-color" ||
						$prop=="icon-color" ||
						$prop=="padding" ||
						$prop=="icon-size"

					) ) {
					continue;
				}

				// skip flex for sections. since 2.0
				if ( in_array($prop, ["display","flex-direction","flex-wrap","align-items","align-content","justify-content"]) 
					 && $this->options['tag'] == "ct_section" )
					continue;

				if ( is_array( $value ) ) {
					// handle global fonts
					if ( ($prop == "font-family"||strpos($prop, "font-family")!== false) && $value[0] == 'global' ) {
						
						$settings 	= get_option("ct_global_settings"); 
						$value 		= $settings['fonts'][$value[1]];
					}
				}
				else {
					$value = htmlspecialchars_decode($value, ENT_QUOTES);
				}

				// skip empty values
				if ( $value === "" ) {
					continue;
				}

				if ( $prop != "custom-css" && $prop != "background-layers") {

					if ( $prop == "background-image" || $prop == "background-size" ) {
						continue; // this is taken care of by the ct_getBackgroundLayerCSS function
					}

					// handle background image
					// if ( $prop == "background-image" ) {
						
					// 	$value = "url($value)";

					// 	// trick for overlay
					// 	if ( isset( $atts['overlay-color'] ) ) {
					// 		$value = "linear-gradient(" . oxygen_vsb_get_global_color_value($atts['overlay-color']) . "," . oxygen_vsb_get_global_color_value($atts['overlay-color']) . "), " . $value;
					// 	}
					// }

					// skip fake properties
					if ( in_array( $prop, $fake_properties ) ) {
						continue;
					}

					if ( $prop == 'flex-direction' ) {
						$reverse = (isset($atts['flex-reverse']) && $atts['flex-reverse'] == 'reverse') ? "-reverse" : "";
						$selector_css .= "flex-direction:" . $atts['flex-direction'] . $reverse . ";\r\n";
						continue;
					}
				
					if ( $prop == "font-family" ) {
						//$this->font_families[] = "$value";
						if ( strpos($value, ",") === false && strtolower($value) !== "inherit") {
							$value = "'$value'";
						}
					}

					if(is_string($value)) {
						$value = oxygen_vsb_get_global_color_value($value);
					}

					// add quotes for content for :before and :after
					if ( $prop == "content" ) {
						//$value = addslashes( $value );
						$value = str_replace('"', '\"', $value);
						$value = "\"$value\"";
						$content_included = true;
					}

					// css filter property
					if ( $prop == "filter" && $atts["filter-amount-".$value] ) {
						$value .= "(".$atts["filter-amount-".$value].")";
					}
					else if ( $prop == "filter" ) {
						continue;
					}

					// finally add property:value
					if(!is_array($value)) {
						
						// handle "menu_dropdowns..." options that applies to submenu items
						if ( $this->options['tag'] == "oxy_nav_menu" && strpos($prop, "menu-dropdowns-")!== false) {
							if ($prop == "menu-dropdowns-background-color" && $key != "hover") {
								$oxy_nav_menu_styles_dropdowns .= "  ". str_replace("menu-dropdowns-", "", $prop) . ":" . $value . ";\r\n";
							}
							else {
								$oxy_nav_menu_styles_dropdowns_items .= "  ". str_replace("menu-dropdowns-", "", $prop) . ":" . $value . ";\r\n";
							}

							if (strpos($prop,"menu-dropdowns-padding") === 0 ) {
								$oxy_nav_menu_styles_dropdowns_items_hover .= "  ". str_replace("menu-dropdowns-", "", $prop) . ":" . $value . ";\r\n";
							}
							
						}
						// handle "menu_active..." options that applies to active menu items
						else if ( $this->options['tag'] == "oxy_nav_menu" && strpos($prop, "menu-active-")!== false) {
						
							if ($prop == "menu-active-border-bottom-width" && isset($states['original']['menu_padding-bottom']) ) {
								// subtrac border from padding
								$new_padding = intval($states['original']['menu_padding-bottom']) - intval($atts['menu-active-border-bottom-width']);
								$new_padding = ($new_padding > 0) ? $new_padding : 0;
								$oxy_nav_menu_styles_active .= "padding-bottom:" . $new_padding . "px;";
							}

							if ($prop == "menu-active-border-top-width" && isset($states['original']['menu_padding-top']) ) {
								// subtrac border from padding
								$new_padding = intval($states['original']['menu_padding-top']) - intval($atts['menu-active-border-top-width']);
								$new_padding = ($new_padding > 0) ? $new_padding : 0;
								$oxy_nav_menu_styles_active .= "padding-top:" . $new_padding . "px;";
							}
							
							$oxy_nav_menu_styles_active .= "  ".str_replace("menu-active-", "", $prop) . ":" . $value . ";\r\n";
						}
						// handle "menu_..." options that applies to menu items
						else if ( $this->options['tag'] == "oxy_nav_menu" && strpos($prop, "menu")!== false) {

							if ($prop == "menu-flex-direction") {
								$oxy_nav_menu_styles .= "flex-direction:" . $value;
								continue;
							}

							if ($prop == "menu-justify-content"||$prop == "menu-dropdown-arrow") {
								continue;
							}

							if ($prop == "menu-border-bottom-width" && $key == "hover" && isset($states['original']['menu_padding-bottom']) ) {
								// subtrac border from padding
								$new_padding = intval($states['original']['menu_padding-bottom']) - intval($atts['menu-border-bottom-width']);
								$new_padding = ($new_padding > 0) ? $new_padding : 0;
								if (isset($states['original']['menu_flex-direction']) && $states['original']['menu_flex-direction']=="column") {
									$padding_prop = "padding-right:";
									$prop = "border-right-width";
								}
								else {
									$padding_prop = "padding-bottom:";
								}
								$oxy_nav_menu_styles_item .= $padding_prop . $new_padding . "px;";
							}

							if ($prop == "menu-border-top-width" && $key == "hover" && isset($states['original']['menu_padding-top']) ) {
								// subtrac border from padding
								$new_padding = intval($states['original']['menu_padding-top']) - intval($atts['menu-border-top-width']);
								$new_padding = ($new_padding > 0) ? $new_padding : 0;
								if (isset($states['original']['menu_flex-direction']) && $states['original']['menu_flex-direction']=="column") {
									$padding_prop = "padding-left:";
									$prop = "border-left-width";
								}
								else {
									$padding_prop = "padding-top:";
								}
								$oxy_nav_menu_styles_item .= $padding_prop . $new_padding . "px;";
							}

							if ($prop == "menu-transition-duration") {
								$value .= "s";
							}
							
							$oxy_nav_menu_styles_item .= "  ".str_replace("menu-", "", $prop) . ":" . $value . ";\r\n";
							
							if ($prop == "menu--webkit-font-smoothing") {
								$oxy_nav_menu_styles_item .=  '-moz-osx-font-smoothing' . ":" . ($value === 'antialiased' ? 'greyscale' : 'unset') . ";";
							}
						} 
						
						else {
							if ( isset($not_css_options[$this->options['tag']]) && is_array($not_css_options[$this->options['tag']]) && in_array( str_replace("-", "_", $prop), $not_css_options[$this->options['tag']] ) ) {
								// do nothing
							}
							else {
								$selector_css .= "  ". $prop . ":" . $value . ";\r\n";
							}
						}
					}
				}

				if ($prop == "-webkit-font-smoothing") {
					$selector_css .=  '-moz-osx-font-smoothing' . ":" . ($value === 'antialiased' ? 'greyscale' : 'unset') . ";";
				}

			} // endforeach

			if ( !$content_included && ( $key=="before" || $key=="after" ) && !$is_media ) {
				$selector_css .= "  content:\"\";\r\n";
			}

			// add custom CSS to the end
			//$selector_css .= base64_decode( $atts["custom-css"] );
			if (isset($atts["custom-css"])){
				$atts["custom-css"] = preg_replace_callback(
				            "/color\(\d+\)/",
				            "oxygen_vsb_parce_global_colors_callback",
				            $atts["custom-css"]);
			}
			$selector_css .= isset($atts["custom-css"])?$atts["custom-css"]:'';

			// add to styles if has any rules
			if ( $selector_css ) {
				$styles .=  $full_selector . $selector_css . "}\r\n";
			}

			// add special Nav Menu styles that applies to menu items
			if ( $this->options['tag'] == "oxy_nav_menu" ) {
				$styles .= (isset( $oxy_nav_menu_styles ) && $oxy_nav_menu_styles)				? $oxy_nav_menu_selector 				. $oxy_nav_menu_styles . "}\r\n" : "";
				$styles .= (isset( $oxy_nav_menu_styles_item ) && $oxy_nav_menu_styles_item) 			? $oxy_nav_menu_selector_item   		. $oxy_nav_menu_styles_item . "}\r\n" : "";
				$styles .= (isset( $oxy_nav_menu_styles_active ) && $oxy_nav_menu_styles_active) 			? $oxy_nav_menu_selector_active 		. $oxy_nav_menu_styles_active . "}\r\n" : "";
				$styles .= (isset( $oxy_nav_menu_styles_dropdowns ) && $oxy_nav_menu_styles_dropdowns) 		? $oxy_nav_menu_selector_dropdowns 		. $oxy_nav_menu_styles_dropdowns . "}\r\n" : "";
				$styles .= (isset( $oxy_nav_menu_styles_not_open_items ) && $oxy_nav_menu_styles_not_open_items) ? $oxy_nav_menu_selector_not_open_items . $oxy_nav_menu_styles_not_open_items . "}\r\n" : "";
				$styles .= (isset( $oxy_nav_menu_styles_dropdowns_items ) && $oxy_nav_menu_styles_dropdowns_items) ? $oxy_nav_menu_selector_dropdowns_items . $oxy_nav_menu_styles_dropdowns_items . "}\r\n" : "";
				$styles .= (isset( $oxy_nav_menu_styles_dropdowns_items_hover ) && $oxy_nav_menu_styles_dropdowns_items_hover) ? $oxy_nav_menu_selector_dropdowns_items_hover . $oxy_nav_menu_styles_dropdowns_items_hover . "}\r\n" : "";
			}
		}
		
		return $styles;
	}


	/**
	 * Echo all components CSS styles and Media Queries
	 *
	 * @since 0.1.6
	 */

	function output_css() {

		global $media_queries_list;
		
		// output regular CSS
		echo $this->css;
		
		// output Media Queries CSS
		if ( isset($this->media_queries) && $this->media_queries ) {

			echo "\n/* Media Queries Start */\n\n";

			$sorted_media_queries_list = ct_sort_media_queries();

			foreach ( $sorted_media_queries_list as $media_name => $media ) {

				global $ct_template_id;

				if ($media_name == "page-width") {
					$max_width = oxygen_vsb_get_page_width($ct_template_id).'px';
				}
				else {
					$max_width = $media_queries_list[$media_name]['maxSize'];
				}

				foreach ( $this->media_queries as $selector => $media ) {

					if ( isset($media[$media_name]) ) {

						echo "@media (max-width: $max_width) {\n";
							echo $media[$media_name];
						echo "}\n\n";
					}
				}
			}

			echo "/* Media Queries End */\r\n\n";
		}
	}


	/**
	 * Echo custom JS code added by user
	 *
	 * @since 0.3.1
	 */

	function add_custom_js() {

		if ( isset($this->custom_js) && is_array( $this->custom_js ) ) {

			foreach ( $this->custom_js as $component_id => $custom_js ) {

				$default_atts = $this->get_default_params();
				
				if ( isset($default_atts['custom-js']) && isset($custom_js['code']) && $default_atts['custom-js'] == $custom_js['code'] ) {
					continue;
				}
				
				if ( ! defined("SHOW_CT_BUILDER") ) {
					//$selector 	= $this->options['selector']; ????
					$code 	= $custom_js['code'];
					$code 	= str_replace("%%ELEMENT_ID%%", $custom_js['selector'], $code);
					echo "<script type=\"text/javascript\" id=\"ct_custom_js_".sanitize_text_field($component_id)."\">";
						echo $code;
					echo "</script>\r\n";
				}
			}
		}
	}


	/**
	 * Get CSS width parameter and return value and units
	 *
	 * @since 0.2.3
	 */

	function get_width( $width ) {

		$value = $this->int_val( $width );
		$units = '';
						
		if ( strpos( $width, "px") !== false ) {
			$units = "px";
		}

		if ( strpos( $width, "%") !== false ) {
			$units = "%";
		}

		if ( strpos( $width, "em") !== false ) {
			$units = "em";
		}

		if ( strpos( $width, "rem") !== false ) {
			$units = "rem";
		}

		if ( strpos( $width, "vh") !== false ) {
			$units = "vh";
		}

		if ( strpos( $width, "vw") !== false ) {
			$units = "vw";
		}

		return array(
			"value" => $value,
			"units" => $units
		);
	}

	function int_val( $str ) {
		return (int) preg_replace('/[^\-\d]*(\-?\d*).*/', '$1', $str );
	}

	function validate_shortcode( $atts, $content, $name ) {

	    global $oxygen_signature;

	    // deobfuscate oxy dynamic shortcodes in the properties (they are obfuscated in templates.php )
	   
		$count = 0; // safety switch
		while(strpos($atts['ct_options'], '+oxygen') !== false && $count < 9) {
			$count++;
			$atts['ct_options'] = preg_replace_callback('/\+oxygen(.+?)\+/i', 'ct_deobfuscate_oxy_url', $atts['ct_options']);
		}

		// deobfuscate oxy dynamic shortcodes in the inner content
		$content = preg_replace_callback('/\+oxygen(.+?)\+/i', 'ct_deobfuscate_oxy_url', $content);

		// deobfuscate oxy dynamic conditions
		$atts['ct_options'] = json_decode($atts['ct_options'], true);

		
		global $oxygen_vsb_css_caching_active; // if its css caching in process, ignore the conditions

		$verfOptions = $atts['ct_options'];
		
		if( (!isset($oxygen_vsb_css_caching_active) || $oxygen_vsb_css_caching_active === false) && isset($atts['ct_options']['original']) ) {

			if(isset($atts['ct_options']['original']['globalconditions']) && is_array($atts['ct_options']['original']['globalconditions'])) {

				// base64 decode the values. These were encoded in order to acoomodate special characters
				foreach($atts['ct_options']['original']['globalconditions'] as $conditionKey => $condition) {
					$atts['ct_options']['original']['globalconditions'][$conditionKey]['value'] = base64_decode($condition['value']);
				}

				$result = oxy_vsb_globalConditionsResult(array('conditions' => $atts['ct_options']['original']['globalconditions'], 'type' => isset($atts['ct_options']['original']['conditionstype'])?$atts['ct_options']['original']['conditionstype']:''));

				if(!$result) {
					return false;
				}
			}

		}

		$atts['ct_options'] = json_encode( $verfOptions, JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT );

	    $isValid = $oxygen_signature->verify_signature( $name, $atts, $content );

	    if(!$isValid) {
	    	global $oxygen_signature_error_message;

	    	if(!isset($oxygen_signature_error_message) && (!isset($oxygen_vsb_css_caching_active) || $oxygen_vsb_css_caching_active === false)) {
	    		$oxygen_signature_error_message = '<div style="background-color: #ff2c2c; border: 1px solid #270707; color: white; font-size: 16px; font-family: monospace; line-height: 1.4; padding: 20px; max-width: 500px;">Oxygen Error: Your shortcodes lack a valid signature - most likely because a migration has taken place. Please re-sign your shortcodes inside the WordPress admin panel, at Oxygen &gt; Settings &gt; Security.</div>';
	    		echo $oxygen_signature_error_message;
	    	}
	    }

	    return $isValid;

    }

    function filter_component( $component = false ) {
        $allowed_html = $this->options['advanced']['allowed_html'];
        if ( isset( $allowed_html ) ) {
            // Only allow specific HTML elements in content
            // $allowed_html can either be an array of tags that are allowed (see: https://codex.wordpress.org/Function_Reference/wp_kses)
            // or it can be a string that specifies a default set of tags (see: https://codex.wordpress.org/Function_Reference/wp_kses_allowed_html)
            $component['content'] = wp_kses( $component['content'], $allowed_html );
        }

        $allow_shortcodes = $this->options['advanced']['allow_shortcodes'];
        if ( isset( $allow_shortcodes ) ) {
            if ( true === $allow_shortcodes ) {
                if ( method_exists( $this, 'filter_shortcodes' ) ) {
                    // Allow each component class to control what shortcodes are allowed to be included in the content.
                    // Default is all available shortcodes are allowed unless the 'filter_shortcodes' function is implemented
	                add_filter( 'strip_shortcodes_tagnames', array( $this, 'filter_shortcodes' ) );
	                $component['content'] = strip_shortcodes( $component['content'] );
	                remove_filter( 'strip_shortcodes_tagnames', array( $this, 'filter_shortcodes' ) );
                }
            } else {
	            // If shortcodes are not allowed in this specific component, remove all
	            $component['content'] = strip_shortcodes( $component['content'] );
            }
        }

        if ( method_exists( $this, 'filter_item' ) ) {
            // Allow each component class to filter specific items without having to override this function
            $component = $this->filter_item( $component );
        }

        return $component;
    }


	/**
     * This function hijacks the template to return special template that renders the code results
     * for the element to load the content into the builder for preview
     * 
     * @since 0.4.0
     * @author gagan goraya
     */
    
    function single_template( $template ) {

        $new_template = '';

        if( isset($_REQUEST['action']) && stripslashes($_REQUEST['action']) == $this->action_name) {
            
            if ( file_exists(CT_FW_PATH . '/components/layouts/' . $this->template_file) ) {
                $new_template = CT_FW_PATH . '/components/layouts/' . $this->template_file;
            }
        }

        if ( '' != $new_template ) {
            return $new_template ;
        }

        return $template;
    }


    /**
     * Output single propert:value line with check for empty values 
     * 
     * @since 2.0
     * @author Ilya
     */

    function output_single_css_property($property_name, $value, $unit="") {
        
        echo $this->get_single_css_property($property_name, $value, $unit);
    }


    /**
     * Return single propert:value line with check for empty values 
     * 
     * @since 2.1
     * @author Ilya
     */

    function get_single_css_property($property_name, $value, $unit="") {
        
        if ( isset($value) && trim($value) != "") {
            return $property_name . ": " . $value . $unit . ";";
        }
    }


    /**
     * Get param unit from current passed params or global
     * 
     * @since 2.0
     * @author Ilya
     */

    function get_css_unit($param, $params, $defaults) {
	    
	    //check if unit is already added
    	if(isset($params[$param])) {
    		
	    	$parsed_param = $this->get_width($params[$param]);

	    	if ($parsed_param['units']!=''){
	    		return "";
	    	}
	    }

        $unit = isset( $params[$param.'-unit'] ) ? $params[$param.'-unit'] : (isset($defaults[$param.'-unit']) ? $defaults[$param.'-unit'] : '');
        
        if (!$unit) {
             $unit = isset( $params[$param.'_unit'] ) ? $params[$param.'_unit'] : (isset($defaults[$param.'_unit']) ? $defaults[$param.'_unit']: '');
        }

        return $unit;
    }


    /**
     * Generate CSS for arrays parameters only
     * 
     * @since 2.0
     * @author Louis & Ilya
     */

    function typography_to_css($array, $name = "", $defaults = array()) {

        ob_start();

        foreach ($array as $property => $value) {

            if (strpos($property, "unit")) {
                continue;
            }
            
            if (strpos($property, $name) !== false && $value != '') {
                
                $unit           = $this->get_css_unit($property, $array, $defaults);
                $property_name  = str_replace($name."_", "", $property);
                $property_name  = str_replace("_", "-", $property_name);

                // handle global fonts
				if ( $property_name == "font-family" && $value[0] == 'global' ) {
						
					$settings 	= get_option("ct_global_settings"); 
					$value 		= $settings['fonts'][$value[1]];
				}

				if ( $property_name == "color" ) {
					$value = oxygen_vsb_get_global_color_value($value);
				}

                echo $property_name.": ".$value.$unit.";\n";
            }
        }

        return ob_get_clean();
    }

    /**
     * Generate CSS for arrays parameters only
     * 
     * @since 2.0
     * @author Louis & Ilya
     */

    function options_array_to_css($array, $name = "", $defaults = array()) {

    	global $fake_properties;

		ob_start();

        foreach ($array as $property => $value) {

            if (strpos($property, "unit")) {
                continue;
            }
            if (strpos($property, $name) !== false && $value != '') {
                
                $unit           = $this->get_css_unit($property, $array, $defaults);
                $property_name  = str_replace($name."_", "", $property);
                $property_name  = str_replace("_", "-", $property_name);

                if ( in_array( $property_name, $fake_properties ) ) {
					continue;
				}

                echo $property_name.": ".$value.$unit.";\n";
            }
        }

        return ob_get_clean();
    }


 	/**
     * Parse shortcodes from content and output only builtin or regular 
     * 
     * @since 2.0
     * @author Ilya
     */

    function output_builtin_shortcodes($content="", $builtin=true) {

    	$pattern = get_shortcode_regex();
        preg_match_all( "/".$pattern."/", $content, $matches );

        if (is_array($matches[0])) {
            foreach ($matches[0] as $shortcode) {
        	    
        	    // not sure if this is the best way to detect if component is builtin, but it should work
                if ($builtin && strpos($shortcode, '"oxy_builtin":"true"')!==false) {
                    echo do_shortcode($shortcode);
                }
                if (!$builtin && strpos($shortcode, '"oxy_builtin":"true"')===false) {
                    echo do_shortcode($shortcode);
                }
            }
        }
    }


	/**
     * Parse shortcodes from content and output only builtin or regular 
     * 
     * @since 2.0
     * @author Ilya
     */

    static function getTransformCSS($options, $defaults) {

    	if (!isset($options['transform']) || !is_array($options['transform'])) {
    		return "";
    	}
    	
    	$css = "transform:";

    	foreach ($options['transform'] as $key => $transform) { 

			// Skew
			if ($transform['transform-type']=='skew') {
				if (isset($transform['skewX']) && isset($transform['skewY']) &&
					$transform['skewX']!=="" && $transform['skewY']!=="") {
					$css .= $transform['transform-type'] . "(" . $transform['skewX'] . 'deg,' . $transform['skewY'] . "deg)";
				}
				else if (isset($transform['skewX']) && $transform['skewX']!=="") {
					$css .= $transform['transform-type'] . "(" . $transform['skewX'] . "deg)";
				}
			}

			// Translate
			if ($transform['transform-type']=='translate') {
				if ($transform['translateX'] && $transform['translateY'] && $transform['translateZ']) {
					$css .= "translate3d("
						. $transform['translateX'] . (isset($transform['translateX-unit']) ? $transform['translateX-unit'] : $defaults['translateX-unit']) . "," 
						. $transform['translateY'] . (isset($transform['translateY-unit']) ? $transform['translateY-unit'] : $defaults['translateY-unit']) . ","
						. $transform['translateZ'] . (isset($transform['translateZ-unit']) ? $transform['translateZ-unit'] : $defaults['translateZ-unit']) . ")";
				}
				else if ($transform['translateX'] && $transform['translateY']) {
					$css .= $transform['transform-type'] . "(" 
						. $transform['translateX'] . (isset($transform['translateX-unit']) ? $transform['translateX-unit'] : $defaults['translateX-unit']) . ',' 
						. $transform['translateY'] . (isset($transform['translateY-unit']) ? $transform['translateY-unit'] : $defaults['translateY-unit']) . ")";
				}
				else if ($transform['translateX']) {
					$css .= $transform['transform-type'] . "(" 
						. $transform['translateX'] . (isset($transform['translateX-unit']) ? $transform['translateX-unit'] : $defaults['translateX-unit']) . ")";
				}
				else if ($transform['translateY']) {
					$css .= "translateY" . "(" 
						. $transform['translateY'] . (isset($transform['translateY-unit']) ? $transform['translateY-unit'] : $defaults['translateY-unit']) . ")";
				}
			}

			// Rotate
			if ($transform['transform-type']=='rotate' && isset($transform['rotateAngle']) && $transform['rotateAngle']!=='') {
				$css .= $transform['transform-type'] . "(" . $transform['rotateAngle'] . "deg)";
			}

			// Rotate X
			if ($transform['transform-type']=='rotateX' && isset($transform['rotateXAngle']) && $transform['rotateXAngle']!=='') {
				$css .= $transform['transform-type'] . "(" . $transform['rotateXAngle'] . "deg)";
			}

			// Rotate Y
			if ($transform['transform-type']=='rotateY' && isset($transform['rotateYAngle']) && $transform['rotateYAngle']!=='') {
				$css .= $transform['transform-type'] . "(" . $transform['rotateYAngle'] . "deg)";
			}

			// Perspective
			if ($transform['transform-type']=='perspective' && isset($transform['perspective']) && $transform['perspective']!=='') {
				$css .= $transform['transform-type'] . "(" 
						. $transform['perspective'] . (isset($transform['perspective-unit']) ? $transform['perspective-unit'] : $defaults['perspective-unit']) . ")";
			}

			// Rotate 3D
			if ($transform['transform-type']=='rotate3d') {
				if (isset($transform['rotate3dX']) && isset($transform['rotate3dY']) && isset($transform['rotate3dZ']) && isset($transform['rotate3dAngle']) &&
					$transform['rotate3dX'] && $transform['rotate3dY'] && $transform['rotate3dZ'] && $transform['rotate3dAngle']) {
					$css .= $transform['transform-type'] . "(" 
							. $transform['rotate3dX'] . "," 
							. $transform['rotate3dY'] . ","
							. $transform['rotate3dZ'] . ","
							. $transform['rotate3dAngle'] . "deg)";
				}
			}

			// Scale
			if ($transform['transform-type']=='scale') {
				if ( isset($transform['scaleX']) && isset($transform['scaleY']) && isset($transform['scaleZ']) &&
					$transform['scaleX'] !== "" && $transform['scaleY'] !== "" && $transform['scaleZ'] !== "" ) {
					$css .= "scale3d(" 
							. $transform['scaleX'] . "," 
							. $transform['scaleY'] . ","
							. $transform['scaleZ'] . ")";
				}
				else if (isset($transform['scaleX']) && isset($transform['scaleY']) &&
						 $transform['scaleX'] !== "" && $transform['scaleY'] !== "") {
					$css .= $transform['transform-type'] . "(" 
						. $transform['scaleX'] . "," 
						. $transform['scaleY'] . ")";
				}
				else {

					if (isset($transform['scaleX']) &&
							 $transform['scaleX'] !== "") {
						$css .= " scaleX(" . $transform['scaleX'] . ")";
					}

					if (isset($transform['scaleY']) &&
							 $transform['scaleY'] !== "") {
						$css .= " scaleY(" . $transform['scaleY'] . ")";
					}

					if (isset($transform['scaleZ']) &&
							 $transform['scaleZ'] !== "") {
						$css .= " scaleZ(" . $transform['scaleZ'] . ")";
					}
				}
			}

			if ($key < sizeof($options['transform'])-1 ) {
				$css .= " ";
			}
			else {
				$css .= ";";
			}
		}

		if ( $css!=="transform:") {
			return $css;
		}

		return "";
    }

    /**
     * Clear properties that accumulate CSS related data and may cause extra CSS output
     *
     * @since 2.2
     * @author Ilya K.
     */

    public function clearCSS() {

    	$this->css = "";
    	$this->media_queries = false;
    	$this->param_array = false;
    }

// End CT_Component class	
}
