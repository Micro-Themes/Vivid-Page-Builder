<?php
/* Panel UI Factory Class */

if ( !class_exists( 'Panel_Factory' ) ) {
	
	class Panel_Factory {
		
		//Creates the Panel UI wrapper
		public function get_ui_panel( $panel_type = '', $data = null ) { //$panel_type accepts a value of either "row" or "column"
			
			$panel = '';	
				
			//Tab buttons
			if($panel_type !== 'custom-css' && $panel_type !== 'import-template' && $panel_type !== 'export-template' && $panel_type !== 'load-template' && $panel_type !== 'save-template') {
				
				$panel .= '<div class="vivid-ui-panel-window-tab-buttons">';
			
					if( $panel_type === 'column' || $panel_type === 'row' ) {
						$panel .= '<a href="#" class="vivid-ui-panel-tab-button active" id="vivid-ui-panel-tab-button-general" data-tab="general">'. esc_attr__('General', 'vivid-page-builder') .'</a>';
						$panel .= '<a href="#" class="vivid-ui-panel-tab-button" id="vivid-ui-panel-tab-button-design" data-tab="design">'. esc_attr__('Design Options', 'vivid-page-builder') .'</a>';
					}
					
					if( $panel_type === 'column' ) {
						$panel .= '<a href="#" class="vivid-ui-panel-tab-button" id="vivid-ui-panel-tab-button-responsive" data-tab="responsive">'. esc_attr__('Responsive Options', 'vivid-page-builder') .'</a>';		
					}
					
					if( $panel_type === 'elements' ) {
						$panel .= '<a href="#" class="vivid-ui-panel-tab-button active" id="vivid-ui-panel-tab-button-add-element-all" data-tab="all-elements">'. esc_attr__('All', 'vivid-page-builder') .'</a>';	
						$panel .= '<a href="#" class="vivid-ui-panel-tab-button" id="vivid-ui-panel-tab-button-add-element-content" data-tab="content-elements">'. esc_attr__('Content', 'vivid-page-builder') .'</a>';
						$panel .= '<a href="#" class="vivid-ui-panel-tab-button" id="vivid-ui-panel-tab-button-add-element-wp-widgets" data-tab="wordpress-elements">'. esc_attr__('WordPress Widgets', 'vivid-page-builder') .'</a>';
					}
					
				$panel .= '</div>';
				
			}
			
			//Preset content
			$panel .= '<div class="vivid-ui-panel-window-preset" id="vivid-ui-panel-window-save-preset-window">';				
				$panel .= '<a class="vivid-close-preset-window dashicons dashicons-no-alt" title="'. esc_attr__('Close', 'vivid-page-builder') .'"></a>';				
				$panel .= '<div class="vivid-ui-panel-window-tab-content-container">';
					$panel .= $this->get_panel_content('save-preset', $data);
				$panel .= '</div>';
			$panel .= '</div>';
			
			//View Presets
			$panel .= '<div class="vivid-ui-panel-window-preset" id="vivid-ui-panel-window-view-presets-window">';			
				$panel .= '<a class="vivid-close-preset-window dashicons dashicons-no-alt" title="'. esc_attr__('Close', 'vivid-page-builder') .'"></a>';			
				$panel .= '<div class="vivid-ui-panel-window-tab-content-container">';
					$panel .= $this->get_panel_content('view-presets', $data);
				$panel .= '</div>';
			$panel .= '</div>';
			
			
			//Tab content containers
			$panel .= '<div class="vivid-ui-panel-window-tabs '. ($panel_type === 'custom-css' || $panel_type === 'import-template' || $panel_type === 'export-template' || $panel_type === 'save-template' || $panel_type === 'load-template' ? 'top-spacing' : '') .'">';
							
				if($panel_type === 'row' || $panel_type === 'column') {
					
					//General settings for Row and Column
					$panel .= '<div class="vivid-ui-panel-window-tab active" id="vivid-ui-panel-window-general-settings-tab">';
						$panel .= '<div class="vivid-ui-panel-window-tab-content-container">';
										
							 if($panel_type === 'row') {
								 $panel .= $this->get_panel_content('general-row', $data);
							 } elseif($panel_type === 'column') {
								 $panel .= $this->get_panel_content('general-column', $data);
							 }
							 
						$panel .= '</div>';
					$panel .= '</div>';
					
					//Design settings
					$panel .= '<div class="vivid-ui-panel-window-tab" id="vivid-ui-panel-window-design-settings-tab">';
						$panel .= '<div class="vivid-ui-panel-window-tab-content-container">';
							$panel .= $this->get_panel_content('design', $data);
						$panel .= '</div>';
					$panel .= '</div>';
										
				}
				
				//Responsive settings
				if($panel_type === 'column') {
					$panel .= '<div class="vivid-ui-panel-window-tab" id="vivid-ui-panel-window-responsive-settings-tab">';
						$panel .= '<div class="vivid-ui-panel-window-tab-content-container">';						 
							$panel .= $this->get_panel_content('responsive', $data);
						$panel .= '</div>';
					$panel .= '</div>';
				}
				
				//Add Element
				if($panel_type === 'elements') {
					
					//All Elements
					$panel .= '<div class="vivid-ui-panel-window-tab active" id="vivid-ui-panel-window-all-elements-tab">';
						$panel .= '<div class="vivid-ui-panel-window-tab-content-container">';						 
							$panel .= $this->get_panel_content('all-elements', $data);
						$panel .= '</div>';
					$panel .= '</div>';
					
					//Content Elements
					$panel .= '<div class="vivid-ui-panel-window-tab" id="vivid-ui-panel-window-content-elements-tab">';
						$panel .= '<div class="vivid-ui-panel-window-tab-content-container">';						 
							$panel .= $this->get_panel_content('content-elements', $data);
						$panel .= '</div>';
					$panel .= '</div>';
					
					//WordPress Widget Elements
					$panel .= '<div class="vivid-ui-panel-window-tab" id="vivid-ui-panel-window-wordpress-elements-tab">';
						$panel .= '<div class="vivid-ui-panel-window-tab-content-container">';						 
							$panel .= $this->get_panel_content('wordpress-elements', $data);
						$panel .= '</div>';
					$panel .= '</div>';
					
				}
				
				//Custom CSS
				if($panel_type === 'custom-css') {
					
					//Add HTML wrapper
					$panel .= $this->get_panel_content('custom-css', $data);
					
				}
				
				//Import Template
				if($panel_type === 'import-template') {
					
					//Add HTML wrapper
					$panel .= $this->get_panel_content('import-template', $data);
					
				}
				
				//Export Template
				if($panel_type === 'export-template') {
					
					//Add HTML wrapper
					$panel .= $this->get_panel_content('export-template', $data);
					
				}
				
				//Save Template
				if($panel_type === 'save-template') {
					
					//Add HTML wrapper
					$panel .= $this->get_panel_content('save-template', $data);
					
				}
				
				//Load Template
				if($panel_type === 'load-template') {
					
					//Add HTML wrapper
					$panel .= $this->get_panel_content('load-template', $data);
					
				}
				
				
				
				
			$panel .= '</div>';
				
			
			return $panel;
		
	}
	 
	//Retrieve panel tabs
	private function get_panel_content( $panel_tab = '', $data = null ) {
		
		$panel = '';
 
		switch( strtolower( $panel_tab ) ) {
 
			case 'general-row':
				
				//Row Stretch
				$panel .= '<div class="vivid-form-column">';
					
						$panel .= '<label for="vivid_row_stretch">'. esc_attr__('Row Stretch', 'vivid-page-builder') .'</label>';
						
						$panel .= '<select name="vivid_row_stretch" id="vivid_row_stretch">';
							$panel .= '<option value="default">'. esc_attr__('Default', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="stretch_row">'. esc_attr__('Stretch Row', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="stretch_row_content">'. esc_attr__('Stretch Row and Content', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="stretch_row_content_no_padding">'. esc_attr__('Stretch Row and Content (No paddings)', 'vivid-page-builder') .'</option>';
						$panel .= '</select>';
						
						$panel .= '<p class="vivid_form_message">'. esc_attr__('Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'vivid-page-builder') .'</p>';
					
					$panel .= '</div>';
					
					//Columns gap
					$panel .= '<div class="vivid-form-column">';
					
						$panel .= '<label for="vivid_columns_gap">'. esc_attr__('Columns gap', 'vivid-page-builder') .'</label>';
					
						$panel .= '<select name="vivid_columns_gap" id="vivid_columns_gap">';
							$panel .= '<option value="0">0px</option>';
							$panel .= '<option value="1">1px</option>';
							$panel .= '<option value="2">2px</option>';
							$panel .= '<option value="3">3px</option>';
							$panel .= '<option value="4">4px</option>';
							$panel .= '<option value="5">5px</option>';
							$panel .= '<option value="10">10px</option>';
							$panel .= '<option value="15">15px</option>';
							$panel .= '<option value="20">20px</option>';
							$panel .= '<option value="25">25px</option>';
							$panel .= '<option value="30">30px</option>';
							$panel .= '<option value="35">35px</option>';
						$panel .= '</select>';
						
						$panel .= '<p class="vivid_form_message">'. esc_attr__('Select gap between columns in row.', 'vivid-page-builder') .'</p>';
					
					$panel .= '</div>';
					
					//Full height row
					$panel .= '<div class="vivid-form-column">';
						
						$panel .= '<label for="vivid_full_height_field">'. esc_attr__('Full height row?', 'vivid-page-builder') .'</label>';
					
						$panel .= '<label for="vivid_full_height"><input value="yes" name="vivid_full_height" id="vivid_full_height" type="checkbox" /><span>'. esc_attr__('Yes', 'vivid-page-builder') .'</span></label>';
						
						$panel .= '<p class="vivid_form_message">'. esc_attr__('If checked row will be set to full height.', 'vivid-page-builder') .'</p>';
						
						$panel .= '<div class="vivid_form_hidden_field" id="vivid_form_columns_position_field">';
												
							$panel .= '<label for="vivid_form_columns_position">'. esc_attr__('Columns position', 'vivid-page-builder') .'</label>';
						
							$panel .= '<select name="vivid_form_columns_position" id="vivid_form_columns_position">';
								$panel .= '<option value="middle">'. esc_attr__('Middle', 'vivid-page-builder') .'</option>';
								$panel .= '<option value="top">'. esc_attr__('Top', 'vivid-page-builder') .'</option>';
								$panel .= '<option value="bottom">'. esc_attr__('Bottom', 'vivid-page-builder') .'</option>';
								$panel .= '<option value="stretch">'. esc_attr__('Stretch', 'vivid-page-builder') .'</option>';
							$panel .= '</select>';
						
						$panel .= '</div>';
					
					$panel .= '</div>';
					
					
					
					//Equal height
					$panel .= '<div class="vivid-form-column">';
					
						$panel .= '<label for="vivid_equal_height_field">'. esc_attr__('Equal height?', 'vivid-page-builder') .'</label>';
					
						$panel .= '<label for="vivid_equal_height"><input value="yes" name="vivid_equal_height" id="vivid_equal_height" type="checkbox" /><span>'. esc_attr__('Yes', 'vivid-page-builder') .'</span></label>';
						
						$panel .= '<p class="vivid_form_message">'. esc_attr__('If checked columns will be set to equal height.', 'vivid-page-builder') .'</p>';
						
						//Content position
						$panel .= '<label for="vivid_content_position">'. esc_attr__('Content position', 'vivid-page-builder') .'</label>';
						
						$panel .= '<select name="vivid_content_position" id="vivid_content_position">';
							$panel .= '<option value="default">Default</option>';
							$panel .= '<option value="top">Top</option>';
							$panel .= '<option value="middle">Middle</option>';
							$panel .= '<option value="bottom">Bottom</option>';
						$panel .= '</select>';
						
						$panel .= '<p class="vivid_form_message">'. esc_attr__('Select content position within columns.', 'vivid-page-builder') .'</p>';
					
					$panel .= '</div>';
					
					
					//Use video background
					$panel .= '<div class="vivid-form-column">';
						
						$panel .= '<label for="vivid_video_background_field">'. esc_attr__('Video background?', 'vivid-page-builder') .'</label>';
					
						$panel .= '<label for="vivid_video_background"><input value="yes" name="vivid_video_background" id="vivid_video_background" type="checkbox" /><span>'. esc_attr__('Yes', 'vivid-page-builder') .'</span></label>';
						
						$panel .= '<p class="vivid_form_message">'. esc_attr__('If checked, video will be used as row background.', 'vivid-page-builder') .'</p>';
						
						$panel .= '<div class="vivid_form_hidden_field" id="vivid_form_video_fields">';
						
							$panel .= '<label for="vivid_form_video_youtube">'. esc_attr__('Youtube URL', 'vivid-page-builder') .'</label>';
						
							$panel .= '<input type="text" name="vivid_form_video_youtube" id="vivid_form_video_youtube" value="" placeholder="https://www.youtube.com/watch?v=lMJXxhRFO1k" />';
						
						$panel .= '</div>';
					
					$panel .= '</div>';
					
					
					//Parallax
					$panel .= '<div class="vivid-form-column">';
					
						$panel .= '<label for="vivid_parallax_selection">'. esc_attr__('Parallax', 'vivid-page-builder') .'</label>';
					
						$panel .= '<select name="vivid_parallax_selection" id="vivid_parallax_selection">';
							$panel .= '<option value="off">OFF</option>';
							$panel .= '<option value="on">ON</option>';
						$panel .= '</select>';
						
						$panel .= '<p class="vivid_form_message">'. esc_attr__('Apply a parallax effect to the background for row.', 'vivid-page-builder') .'</p>';
						
						$panel .= '<div class="vivid_form_hidden_field" id="vivid_parallax_speed_field">';
						
							$panel .= '<label for="vivid_parallax_speed">'. esc_attr__('Parallax speed', 'vivid-page-builder') .'</label>';
						
							$panel .= '<input type="text" name="vivid_parallax_speed" id="vivid_parallax_speed" value="" placeholder="1.5" />';
							
							$panel .= '<p class="vivid_form_message">'. esc_attr__('Enter parallax speed ratio (Note: Default value is 1.5, min value is 1).', 'vivid-page-builder') .'</p>';
						
						$panel .= '</div>';
					
					$panel .= '</div>';
					
					
					//CSS Animation
					$panel .= '<div class="vivid-form-column">';
					
						$panel .= '<label for="vivid_css_animation">'. esc_attr__('CSS Animation', 'vivid-page-builder') .'</label>';

						$panel .= '<select name="vivid_css_animation" id="vivid_css_animation">';
							
								$panel .= '<optgroup label="Attention Seekers">';
								 $panel .= ' <option value="bounce">bounce</option>';
								  $panel .= '<option value="flash">flash</option>';
								  $panel .= '<option value="pulse">pulse</option>';
								  $panel .= '<option value="rubberBand">rubberBand</option>';
								  $panel .= '<option value="shake">shake</option>';
								  $panel .= '<option value="swing">swing</option>';
								  $panel .= '<option value="tada">tada</option>';
								  $panel .= '<option value="wobble">wobble</option>';
								  $panel .= '<option value="jello">jello</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Bouncing Entrances">';
								  $panel .= '<option value="bounceIn">bounceIn</option>';
								  $panel .= '<option value="bounceInDown">bounceInDown</option>';
								  $panel .= '<option value="bounceInLeft">bounceInLeft</option>';
								  $panel .= '<option value="bounceInRight">bounceInRight</option>';
								  $panel .= '<option value="bounceInUp">bounceInUp</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Bouncing Exits">';
								  $panel .= ' <option value="bounceOut">bounceOut</option>';
								  $panel .= '<option value="bounceOutDown">bounceOutDown</option>';
								  $panel .= '<option value="bounceOutLeft">bounceOutLeft</option>';
								  $panel .= '<option value="bounceOutRight">bounceOutRight</option>';
								  $panel .= '<option value="bounceOutUp">bounceOutUp</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Fading Entrances">';
								  $panel .= '<option value="fadeIn">fadeIn</option>';
								  $panel .= '<option value="fadeInDown">fadeInDown</option>';
								  $panel .= '<option value="fadeInDownBig">fadeInDownBig</option>';
								  $panel .= '<option value="fadeInLeft">fadeInLeft</option>';
								  $panel .= '<option value="fadeInLeftBig">fadeInLeftBig</option>';
								  $panel .= '<option value="fadeInRight">fadeInRight</option>';
								  $panel .= '<option value="fadeInRightBig">fadeInRightBig</option>';
								  $panel .= ' <option value="fadeInUp">fadeInUp</option>';
								  $panel .= '<option value="fadeInUpBig">fadeInUpBig</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Fading Exits">';
								  $panel .= '<option value="fadeOut">fadeOut</option>';
								  $panel .= '<option value="fadeOutDown">fadeOutDown</option>';
								  $panel .= '<option value="fadeOutDownBig">fadeOutDownBig</option>';
								  $panel .= '<option value="fadeOutLeft">fadeOutLeft</option>';
								  $panel .= '<option value="fadeOutLeftBig">fadeOutLeftBig</option>';
								  $panel .= '<option value="fadeOutRight">fadeOutRight</option>';
								  $panel .= '<option value="fadeOutRightBig">fadeOutRightBig</option>';
								  $panel .= '<option value="fadeOutUp">fadeOutUp</option>';
								  $panel .= '<option value="fadeOutUpBig">fadeOutUpBig</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Flippers">';
								  $panel .= '<option value="flip">flip</option>';
								  $panel .= '<option value="flipInX">flipInX</option>';
								  $panel .= '<option value="flipInY">flipInY</option>';
								  $panel .= '<option value="flipOutX">flipOutX</option>';
								  $panel .= '<option value="flipOutY">flipOutY</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Lightspeed">';
								  $panel .= '<option value="lightSpeedIn">lightSpeedIn</option>';
								  $panel .= '<option value="lightSpeedOut">lightSpeedOut</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Rotating Entrances">';
								  $panel .= '<option value="rotateIn">rotateIn</option>';
								  $panel .= '<option value="rotateInDownLeft">rotateInDownLeft</option>';
								  $panel .= '<option value="rotateInDownRight">rotateInDownRight</option>';
								  $panel .= '<option value="rotateInUpLeft">rotateInUpLeft</option>';
								  $panel .= '<option value="rotateInUpRight">rotateInUpRight</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Rotating Exits">';
								  $panel .= '<option value="rotateOut">rotateOut</option>';
								  $panel .= '<option value="rotateOutDownLeft">rotateOutDownLeft</option>';
								  $panel .= '<option value="rotateOutDownRight">rotateOutDownRight</option>';
								  $panel .= '<option value="rotateOutUpLeft">rotateOutUpLeft</option>';
								  $panel .= '<option value="rotateOutUpRight">rotateOutUpRight</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Sliding Entrances">';
								  $panel .= '<option value="slideInUp">slideInUp</option>';
								  $panel .= '<option value="slideInDown">slideInDown</option>';
								  $panel .= '<option value="slideInLeft">slideInLeft</option>';
								  $panel .= '<option value="slideInRight">slideInRight</option>';
								$panel .= '</optgroup>';
								
								$panel .= '<optgroup label="Sliding Exits">';
								  $panel .= '<option value="slideOutUp">slideOutUp</option>';
								  $panel .= '<option value="slideOutDown">slideOutDown</option>';
								  $panel .= '<option value="slideOutLeft">slideOutLeft</option>';
								  $panel .= '<option value="slideOutRight">slideOutRight</option>';
								$panel .= '</optgroup>';
								
								$panel .= '<optgroup label="Zoom Entrances">';
								  $panel .= '<option value="zoomIn">zoomIn</option>';
								  $panel .= '<option value="zoomInDown">zoomInDown</option>';
								  $panel .= '<option value="zoomInLeft">zoomInLeft</option>';
								  $panel .= '<option value="zoomInRight">zoomInRight</option>';
								  $panel .= '<option value="zoomInUp">zoomInUp</option>';
								$panel .= '</optgroup>';
								
								$panel .= '<optgroup label="Zoom Exits">';
								  $panel .= '<option value="zoomOut">zoomOut</option>';
								  $panel .= '<option value="zoomOutDown">zoomOutDown</option>';
								  $panel .= '<option value="zoomOutLeft">zoomOutLeft</option>';
								  $panel .= '<option value="zoomOutRight">zoomOutRight</option>';
								  $panel .= '<option value="zoomOutUp">zoomOutUp</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Specials">';
								  $panel .= '<option value="hinge">hinge</option>';
								  $panel .= '<option value="rollIn">rollIn</option>';
								  $panel .= '<option value="rollOut">rollOut</option>';
								$panel .= '</optgroup>';
							
						$panel .= '</select>';						
						
						$panel .= '<p class="vivid_form_message">'. esc_attr__('Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'vivid-page-builder') .'</p>';
						
						$panel .= '<div><button class="vivid-panel-btn-grey vivid-panel-btn-small vivid-panel-btn-animation-style-trigger">'. esc_attr__('Animate it', 'vivid-page-builder') .'</button></div>';
					
					$panel .= '</div>';
					
					
					//Row ID
					$panel .= '<div class="vivid-form-column">';
						
						$panel .= '<label for="vivid_row_id">'. esc_attr__('Row ID', 'vivid-page-builder') .'</label>';
						
						$panel .= '<input type="text" name="vivid_row_id" id="vivid_row_id" value="" />';
						
						$panel .= '<p class="vivid_form_message">'. esc_attr__('Enter row ID (Note: make sure it is unique and valid according to', 'vivid-page-builder') .' <a href="https://www.w3schools.com/tags/att_global_id.asp" target="_blank">'. esc_attr__('W3C specification', 'vivid-page-builder') .'</a>)</p>';
					
					$panel .= '</div>';
					
					
					//Disable Row?
					$panel .= '<div class="vivid-form-column">';
						
						$panel .= '<label for="vivid_disable_row_field">'. esc_attr__('Disable Row?', 'vivid-page-builder') .'</label>';
					
						$panel .= '<label for="vivid_disable_row"><input value="yes" name="vivid_disable_row" id="vivid_disable_row" type="checkbox" /><span>'. esc_attr__('Yes', 'vivid-page-builder') .'</span></label>';
						
						$panel .= '<p class="vivid_form_message">'. esc_attr__("If checked the row won't be visible on the public side of your website. You can switch it back any time.", 'vivid-page-builder') .'</p>';
					
					$panel .= '</div>';
					
					
					//Extra Class name
					$panel .= '<div class="vivid-form-column">';
						
						$panel .= '<label for="vivid_extra_class_name">'. esc_attr__('Extra class name', 'vivid-page-builder') .'</label>';
						
						$panel .= '<input type="text" name="vivid_extra_class_name" id="vivid_extra_class_name" value="" />';
						
						$panel .= '<p class="vivid_form_message">'. esc_attr__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'vivid-page-builder') .'</p>';
					
					$panel .= '</div>';
					
					
				break;
				
				
				case 'general-column':
										
					//CSS Animation
					$panel .= '<div class="vivid-form-column">';
					
						$panel .= '<label for="vivid_css_animation">'. esc_attr__('CSS Animation', 'vivid-page-builder') .'</label>';

						$panel .= '<select name="vivid_css_animation" id="vivid_css_animation">';
							
								$panel .= '<optgroup label="Attention Seekers">';
								 $panel .= ' <option value="bounce">bounce</option>';
								  $panel .= '<option value="flash">flash</option>';
								  $panel .= '<option value="pulse">pulse</option>';
								  $panel .= '<option value="rubberBand">rubberBand</option>';
								  $panel .= '<option value="shake">shake</option>';
								  $panel .= '<option value="swing">swing</option>';
								  $panel .= '<option value="tada">tada</option>';
								  $panel .= '<option value="wobble">wobble</option>';
								  $panel .= '<option value="jello">jello</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Bouncing Entrances">';
								  $panel .= '<option value="bounceIn">bounceIn</option>';
								  $panel .= '<option value="bounceInDown">bounceInDown</option>';
								  $panel .= '<option value="bounceInLeft">bounceInLeft</option>';
								  $panel .= '<option value="bounceInRight">bounceInRight</option>';
								  $panel .= '<option value="bounceInUp">bounceInUp</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Bouncing Exits">';
								  $panel .= ' <option value="bounceOut">bounceOut</option>';
								  $panel .= '<option value="bounceOutDown">bounceOutDown</option>';
								  $panel .= '<option value="bounceOutLeft">bounceOutLeft</option>';
								  $panel .= '<option value="bounceOutRight">bounceOutRight</option>';
								  $panel .= '<option value="bounceOutUp">bounceOutUp</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Fading Entrances">';
								  $panel .= '<option value="fadeIn">fadeIn</option>';
								  $panel .= '<option value="fadeInDown">fadeInDown</option>';
								  $panel .= '<option value="fadeInDownBig">fadeInDownBig</option>';
								  $panel .= '<option value="fadeInLeft">fadeInLeft</option>';
								  $panel .= '<option value="fadeInLeftBig">fadeInLeftBig</option>';
								  $panel .= '<option value="fadeInRight">fadeInRight</option>';
								  $panel .= '<option value="fadeInRightBig">fadeInRightBig</option>';
								  $panel .= ' <option value="fadeInUp">fadeInUp</option>';
								  $panel .= '<option value="fadeInUpBig">fadeInUpBig</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Fading Exits">';
								  $panel .= '<option value="fadeOut">fadeOut</option>';
								  $panel .= '<option value="fadeOutDown">fadeOutDown</option>';
								  $panel .= '<option value="fadeOutDownBig">fadeOutDownBig</option>';
								  $panel .= '<option value="fadeOutLeft">fadeOutLeft</option>';
								  $panel .= '<option value="fadeOutLeftBig">fadeOutLeftBig</option>';
								  $panel .= '<option value="fadeOutRight">fadeOutRight</option>';
								  $panel .= '<option value="fadeOutRightBig">fadeOutRightBig</option>';
								  $panel .= '<option value="fadeOutUp">fadeOutUp</option>';
								  $panel .= '<option value="fadeOutUpBig">fadeOutUpBig</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Flippers">';
								  $panel .= '<option value="flip">flip</option>';
								  $panel .= '<option value="flipInX">flipInX</option>';
								  $panel .= '<option value="flipInY">flipInY</option>';
								  $panel .= '<option value="flipOutX">flipOutX</option>';
								  $panel .= '<option value="flipOutY">flipOutY</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Lightspeed">';
								  $panel .= '<option value="lightSpeedIn">lightSpeedIn</option>';
								  $panel .= '<option value="lightSpeedOut">lightSpeedOut</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Rotating Entrances">';
								  $panel .= '<option value="rotateIn">rotateIn</option>';
								  $panel .= '<option value="rotateInDownLeft">rotateInDownLeft</option>';
								  $panel .= '<option value="rotateInDownRight">rotateInDownRight</option>';
								  $panel .= '<option value="rotateInUpLeft">rotateInUpLeft</option>';
								  $panel .= '<option value="rotateInUpRight">rotateInUpRight</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Rotating Exits">';
								  $panel .= '<option value="rotateOut">rotateOut</option>';
								  $panel .= '<option value="rotateOutDownLeft">rotateOutDownLeft</option>';
								  $panel .= '<option value="rotateOutDownRight">rotateOutDownRight</option>';
								  $panel .= '<option value="rotateOutUpLeft">rotateOutUpLeft</option>';
								  $panel .= '<option value="rotateOutUpRight">rotateOutUpRight</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Sliding Entrances">';
								  $panel .= '<option value="slideInUp">slideInUp</option>';
								  $panel .= '<option value="slideInDown">slideInDown</option>';
								  $panel .= '<option value="slideInLeft">slideInLeft</option>';
								  $panel .= '<option value="slideInRight">slideInRight</option>';
								$panel .= '</optgroup>';
								
								$panel .= '<optgroup label="Sliding Exits">';
								  $panel .= '<option value="slideOutUp">slideOutUp</option>';
								  $panel .= '<option value="slideOutDown">slideOutDown</option>';
								  $panel .= '<option value="slideOutLeft">slideOutLeft</option>';
								  $panel .= '<option value="slideOutRight">slideOutRight</option>';
								$panel .= '</optgroup>';
								
								$panel .= '<optgroup label="Zoom Entrances">';
								  $panel .= '<option value="zoomIn">zoomIn</option>';
								  $panel .= '<option value="zoomInDown">zoomInDown</option>';
								  $panel .= '<option value="zoomInLeft">zoomInLeft</option>';
								  $panel .= '<option value="zoomInRight">zoomInRight</option>';
								  $panel .= '<option value="zoomInUp">zoomInUp</option>';
								$panel .= '</optgroup>';
								
								$panel .= '<optgroup label="Zoom Exits">';
								  $panel .= '<option value="zoomOut">zoomOut</option>';
								  $panel .= '<option value="zoomOutDown">zoomOutDown</option>';
								  $panel .= '<option value="zoomOutLeft">zoomOutLeft</option>';
								  $panel .= '<option value="zoomOutRight">zoomOutRight</option>';
								  $panel .= '<option value="zoomOutUp">zoomOutUp</option>';
								$panel .= '</optgroup>';
						
								$panel .= '<optgroup label="Specials">';
								  $panel .= '<option value="hinge">hinge</option>';
								  $panel .= '<option value="rollIn">rollIn</option>';
								  $panel .= '<option value="rollOut">rollOut</option>';
								$panel .= '</optgroup>';
							
						$panel .= '</select>';						
						
						$panel .= '<p class="vivid_form_message">'. esc_attr__('Select type of animation for element to be animated when it "enters" the browsers viewport (Note: works only in modern browsers).', 'vivid-page-builder') .'</p>';
						
						$panel .= '<div><button class="vivid-panel-btn-grey vivid-panel-btn-small vivid-panel-btn-animation-style-trigger">'. esc_attr__('Animate it', 'vivid-page-builder') .'</button></div>';
					
					$panel .= '</div>';
												
					
					//Extra Class name
					$panel .= '<div class="vivid-form-column">';
						
						$panel .= '<label for="vivid_extra_class_name">'. esc_attr__('Extra class name', 'vivid-page-builder') .'</label>';
						
						$panel .= '<input type="text" name="vivid_extra_class_name" id="vivid_extra_class_name" value="" />';
						
						$panel .= '<p class="vivid_form_message">'. esc_attr__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'vivid-page-builder') .'</p>';
					
					$panel .= '</div>';
					
					
				break;
	 
				case 'design':
								
					$panel .= '<div class="vivid-form-column">';
					
						$panel .= '<label for="vivid_css_box">'. esc_attr__('CSS box', 'vivid-page-builder') .'</label>';
										
						$panel .= '<div class="vivid-layout-onion" id="vivid-layout-onion">';
						
							$panel .= '<div class="vivid-css-margin">';	
							
								$panel .= '<label>margin</label>';	
								$panel .= '<input name="vivid_row_margin_top" data-name="margin-top" class="vivid-css-top" placeholder="-" data-attribute="margin" value="" type="text">';	
								$panel .= '<input name="vivid_row_margin_right" data-name="margin-right" class="vivid-css-right" placeholder="-" data-attribute="margin" value="" type="text">';	
								$panel .= '<input name="vivid_row_margin_bottom" data-name="margin-bottom" class="vivid-css-bottom" placeholder="-" data-attribute="margin" value="" type="text">';	
								$panel .= '<input name="vivid_row_margin_left" data-name="margin-left" class="vivid-css-left" placeholder="-" data-attribute="margin" value="" type="text">';	
								
									$panel .= '<div class="vivid-css-border">';	
										$panel .= '<label>border</label>';	
										$panel .= '<input name="vivid_row_border_top_width" data-name="border-width-top" class="vivid-css-top" placeholder="-" data-attribute="border" value="" type="text">';	
										$panel .= '<input name="vivid_row_border_right_width" data-name="border-width-right" class="vivid-css-right" placeholder="-" data-attribute="border" value="" type="text">';	
										$panel .= '<input name="vivid_row_border_bottom_width" data-name="border-width-bottom" class="vivid-css-bottom" placeholder="-" data-attribute="border" value="" type="text">';	
										$panel .= '<input name="vivid_row_border_left_width" data-name="border-width-left" class="vivid-css-left" placeholder="-" data-attribute="border" value="" type="text">';	        
										
											$panel .= '<div class="vivid-css-padding">';	
												$panel .= '<label>padding</label>';	
												$panel .= '<input name="vivid_row_padding_top" data-name="padding-top" class="vivid-css-top" placeholder="-" data-attribute="padding" value="" type="text">';	
												$panel .= '<input name="vivid_row_padding_right" data-name="padding-right" class="vivid-css-right" placeholder="-" data-attribute="padding" value="" type="text">';	
												$panel .= '<input name="vivid_row_padding_bottom" data-name="padding-bottom" class="vivid-css-bottom" placeholder="-" data-attribute="padding" value="" type="text">';	
												$panel .= '<input name="vivid_row_padding_left" data-name="padding-left" class="vivid-css-left" placeholder="-" data-attribute="padding" value="" type="text">';	           
												$panel .= '<div class="vivid-css-content"><i></i></div>';	         
											$panel .= '</div>';	    
											  
									$panel .= '</div>';	
									   
							$panel .= '</div>';	
							
						$panel .= '</div>';	
					
					$panel .= '</div>';					
					
					//Box controls
					$panel .= '<div class="vivid-form-column">';
						
						$panel .= '<label for="vivid_box_controls_field">'. esc_attr__('Box controls', 'vivid-page-builder') .'</label>';
					
						$panel .= '<label for="vivid_box_controls"><input value="yes" name="vivid_box_controls" id="vivid_box_controls" type="checkbox" /><span>'. esc_attr__('Simplify controls', 'vivid-page-builder') .'</span></label>';
					
					$panel .= '</div>';
					
					//Border color
					$panel .= '<div class="vivid-form-column">';
						
						$panel .= '<label for="vivid_border_color">'. esc_attr__('Border color', 'vivid-page-builder') .'</label>';
					
						$panel .= '<input type="text" data-default-color="#cccccc" value="#cccccc" class="cs-wp-color-picker" id="vivid_row_border_color">';
					
					$panel .= '</div>';
										
					//Border style
					$panel .= '<div class="vivid-form-column">';
					
						$panel .= '<label for="vivid_border_style">'. esc_attr__('Border style', 'vivid-page-builder') .'</label>';
					
						$panel .= '<select name="vivid_border_style" id="vivid_border_style">';
							$panel .= '<option value="none">'. esc_attr__('None', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="solid">'. esc_attr__('Solid', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="dotted">'. esc_attr__('Dotted', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="dashed">'. esc_attr__('Dashed', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="hidden">'. esc_attr__('Hidden', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="double">'. esc_attr__('Double', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="groove">'. esc_attr__('Groove', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="ridge">'. esc_attr__('Ridge', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="inset">'. esc_attr__('Inset', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="outset">'. esc_attr__('Outset', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="initial">'. esc_attr__('Initial', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="inherit">'. esc_attr__('Inherit', 'vivid-page-builder') .'</option>';
						$panel .= '</select>';
											
					$panel .= '</div>';
					
					
					//Border radius
					$panel .= '<div class="vivid-form-column">';
					
						$panel .= '<label for="vivid_border_radius">'. esc_attr__('Border Radius', 'vivid-page-builder') .'</label>';
					
						$panel .= '<select name="vivid_border_radius" id="vivid_border_radius">';
							$panel .= '<option value="0">0px</option>';
							$panel .= '<option value="1">1px</option>';
							$panel .= '<option value="2">2px</option>';
							$panel .= '<option value="3">3px</option>';
							$panel .= '<option value="4">4px</option>';
							$panel .= '<option value="5">5px</option>';
							$panel .= '<option value="10">10px</option>';
							$panel .= '<option value="15">15px</option>';
							$panel .= '<option value="20">20px</option>';
							$panel .= '<option value="25">25px</option>';
							$panel .= '<option value="30">30px</option>';
							$panel .= '<option value="35">35px</option>';
						$panel .= '</select>';
											
					$panel .= '</div>';
					
					//Background options
					$panel .= '<div class="vivid-form-column">';
						
						$panel .= '<label for="vivid_background_color">'. esc_attr__('Background color', 'vivid-page-builder') .'</label>';
						$panel .= '<input type="text" data-default-color="#ffffff" value="#ffffff" class="cs-wp-color-picker" id="vivid_background_color">';
					
					$panel .= '</div>';
					
					$panel .= '<div class="vivid-form-column">';
						
						$panel .= '<label for="vivid_background_image">'. esc_attr__('Background image', 'vivid-page-builder') .'</label>';
						
						$panel .= '<div class="vivid-background-image">';
							$panel .= '<ul class="vivid-image"></ul>';
							$panel .= '<a href="#" class="vivid-add-image"><i class="dashicons dashicons-plus"></i>'. esc_attr__('Add image', 'vivid-page-builder') .'</a>';
							$panel .= '<div class="vivid-clearfix"></div>';
							$panel .= '<input type="hidden" name="vivid_background_image" id="vivid_background_image" value="" />';
						$panel .= '</div>';
						
					$panel .= '</div>';
					
					$panel .= '<div class="vivid-form-column">';
						
						$panel .= '<label for="vivid_background_size">'. esc_attr__('Background size', 'vivid-page-builder') .'</label>';
						
						$panel .= '<select name="vivid_background_size" id="vivid_background_size">';
							$panel .= '<option value="default">'. esc_attr__('Theme defaults', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="auto">'. esc_attr__('Auto', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="contain">'. esc_attr__('Contain', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="cover">'. esc_attr__('Cover', 'vivid-page-builder') .'</option>';
						$panel .= '</select>';
						
					$panel .= '</div>';
					
					
					$panel .= '<div class="vivid-form-column">';
						
						$panel .= '<label for="vivid_background_repeat">'. esc_attr__('Background repeat', 'vivid-page-builder') .'</label>';
						
						$panel .= '<select name="vivid_background_repeat" id="vivid_background_repeat">';
							$panel .= '<option value="default">'. esc_attr__('Theme defaults', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="no-repeat">'. esc_attr__('No Repeat', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="repeat">'. esc_attr__('Repeat', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="repeat-x">'. esc_attr__('Repeat X', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="repeat-y">'. esc_attr__('Repeat Y', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="round">'. esc_attr__('Round', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="space">'. esc_attr__('Space', 'vivid-page-builder') .'</option>';
						$panel .= '</select>';
						
					$panel .= '</div>';
					
					$panel .= '<div class="vivid-form-column">';
						
						$panel .= '<label for="vivid_background_position">'. esc_attr__('Background position', 'vivid-page-builder') .'</label>';
						
						$panel .= '<select name="vivid_background_position" id="vivid_background_position">';
							$panel .= '<option value="default">'. esc_attr__('Theme defaults', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="bottom">'. esc_attr__('Bottom', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="center">'. esc_attr__('Center', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="left">'. esc_attr__('Left', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="right">'. esc_attr__('Right', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="top">'. esc_attr__('Top', 'vivid-page-builder') .'</option>';
							$panel .= '<option value="inherit">'. esc_attr__('Inherit', 'vivid-page-builder') .'</option>';
						$panel .= '</select>';	
						
					$panel .= '</div>';
					
					
				break;
	 
				case 'responsive':
										
					//Border radius
					$panel .= '<div class="vivid-form-column">';
					
						$panel .= '<label for="vivid_responsive_width">'. esc_attr__('Width', 'vivid-page-builder') .'</label>';
					
						$panel .= '<select name="vivid_responsive_width" id="vivid_responsive_width">';
							$panel .= '<option value="box-lg-1">100%</option>';
							$panel .= '<option value="box-lg-6">66%</option>';
							$panel .= '<option value="box-lg-2">50%</option>';
							$panel .= '<option value="box-lg-3">33%</option>';
							$panel .= '<option value="box-lg-4">25%</option>';
							$panel .= '<option value="box-lg-5">20%</option>';
						$panel .= '</select>';
											
					$panel .= '</div>';
					
					//Responsiveness
					$panel .= '<div class="vivid-form-column">';
					
						$panel .= '<label for="vivid_responsive_settings">'. esc_attr__('Responsiveness', 'vivid-page-builder') .'</label>';
							
							$panel .= '<table class="vivid-responsive-settings-table">';
							  $panel .= '<tr>';
								$panel .= '<th>Device</th>';
								$panel .= '<th>Width</th>';
								$panel .= '<th>Hide on device?</th>';
							  $panel .= '</tr>';
							  $panel .= '<tr class="vivid-col-size-lg">';
							  
								$panel .= '<td class="vivid-screen-icon"><i class="dashicons dashicons-desktop"></i></td>';
								
								$panel .= '<td>';
								
									$panel .= '<select name="vivid_col_size_lg" id="vivid_col_size_lg">';
										$panel .= '<option value="box-lg-1">100%</option>';
										$panel .= '<option value="box-lg-6">66%</option>';
										$panel .= '<option value="box-lg-2">50%</option>';
										$panel .= '<option value="box-lg-3">33%</option>';
										$panel .= '<option value="box-lg-4">25%</option>';
										$panel .= '<option value="box-lg-5">20%</option>';
									$panel .= '</select>';
								
								$panel .= '</td>';
								
								$panel .= '<td><input name="vivid_col_lg_hidden" value="" type="checkbox"></td>';
								
							  $panel .= '</tr>';
							  $panel .= '<tr class="vivid-col-size-md">';
								
								$panel .= '<td class="vivid-screen-icon"><i class="dashicons dashicons-laptop"></i></td>';
								
								$panel .= '<td>';
								
									$panel .= '<select name="vivid_col_size_md" id="vivid_col_size_md">';
										$panel .= '<option value="box-lg-1">100%</option>';
										$panel .= '<option value="box-lg-6">66%</option>';
										$panel .= '<option value="box-lg-2">50%</option>';
										$panel .= '<option value="box-lg-3">33%</option>';
										$panel .= '<option value="box-lg-4">25%</option>';
										$panel .= '<option value="box-lg-5">20%</option>';
									$panel .= '</select>';
								
								$panel .= '</td>';
								
								$panel .= '<td><input name="vivid_col_md_hidden" value="" type="checkbox"></td>';
								
							 $panel .= ' </tr>';
							  $panel .= '<tr class="vivid-col-size-sm">';
								
								$panel .= '<td class="vivid-screen-icon"><i class="dashicons dashicons-tablet"></i></td>';
								
								$panel .= '<td>';
								
									$panel .= '<select name="vivid_col_size_sm" id="vivid_col_size_sm">';
										$panel .= '<option value="box-lg-1">100%</option>';
										$panel .= '<option value="box-lg-6">66%</option>';
										$panel .= '<option value="box-lg-2">50%</option>';
										$panel .= '<option value="box-lg-3">33%</option>';
										$panel .= '<option value="box-lg-4">25%</option>';
										$panel .= '<option value="box-lg-5">20%</option>';
									$panel .= '</select>';
								
								$panel .= '</td>';
								
								$panel .= '<td><input name="vivid_col_sm_hidden" value="" type="checkbox"></td>';
								
							  $panel .= ' </tr>';
							  $panel .= '<tr class="vivid-col-size-xs">';
								
								$panel .= '<td class="vivid-screen-icon"><i class="dashicons dashicons-smartphone"></i></td>';
								
								$panel .= '<td>';
								
									$panel .= '<select name="vivid_col_size_xs" id="vivid_col_size_xs">';
										$panel .= '<option value="box-lg-1">100%</option>';
										$panel .= '<option value="box-lg-6">66%</option>';
										$panel .= '<option value="box-lg-2">50%</option>';
										$panel .= '<option value="box-lg-3">33%</option>';
										$panel .= '<option value="box-lg-4">25%</option>';
										$panel .= '<option value="box-lg-5">20%</option>';
									$panel .= '</select>';
								
								$panel .= '</td>';
								
								$panel .= '<td><input name="vivid_col_xs_hidden" value="" type="checkbox"></td>';
								
							  $panel .= '</tr>';
							$panel .= '</table>';
											
					$panel .= '</div>';
					
				break;
				
				case 'save-preset' :
				
					$panel .= '<div class="vivid-form-column">';					
						$panel .= '<label for="vivid_responsive_settings">'. esc_attr__('Preset Title', 'vivid-page-builder') .'</label>';				
						$panel .= '<input type="text" name="vivid_form_save_preset_title" id="vivid_form_save_preset_title" value="" />';						
						$panel .= '<p class="vivid_form_message">'. esc_attr__('Enter element preset title.') .'</p>';						
						$panel .= '<a href="#" class="vivid-ui-panel-button" id="vivid-save-preset-title-btn">'. esc_attr__('Save changes', 'vivid-page-builder') .'</a>';						
					$panel .= '</div>';
				
				break;
				
				case 'view-presets' :
				
					//Get "presets" data and loop through it with .vivid-presets-list menu
				
					$panel .= '<div class="vivid-form-column">';
					
						$panel .= '<label for="vivid_presets_list">'. esc_attr__('Presets', 'vivid-page-builder') .'</label>';
				
						$panel .= '<ul class="vivid-presets-list">';
						
							$panel .= '<li>';
								$panel .= '<p>Preset title goes here</p>';
								$panel .= '<div class="vivid-presets-list-action-buttons">';
									$panel .= '<a href="#apply" class="dashicons dashicons-plus" title="'. esc_attr__('Apply preset') .'"></a>';
									$panel .= '<a href="#default" class="dashicons dashicons-lock" title="'. esc_attr__('Set as default preset') .'"></a>';
									$panel .= '<a href="#delete" class="dashicons dashicons-trash" title="'. esc_attr__('Delete preset') .'"></a>';
								$panel .= '</div>';
							$panel .= '</li>';
							
						$panel .= '</ul>';
						
						
					$panel .= '</div>';
				
				break;
	 
	 			case 'custom-css' : 
				
					$panel .= '<div class="vivid-form-column">';					
						$panel .= '<label for="vivid_responsive_settings">'. esc_attr__('Custom CSS Settings', 'vivid-page-builder') .'</label>';				
						$panel .= '<div id="vivid-css-editor"></div>';						
						$panel .= '<p class="vivid_form_message">'. esc_attr__('Enter custom CSS (Note: it will be outputted only on this particular page).') .'</p>';						
					$panel .= '</div>';
				
				break;
				
				case 'import-template' : 
				
					$panel .= '<div class="vivid-form-column">';					
						$panel .= '<label for="vivid_selected_template_file">'. esc_attr__('Choose a template file to import', 'vivid-page-builder') .'</label>';
						$panel .= '<input name="vivid_selected_template_file" id="vivid_selected_template_file" type="file">';	
						$panel .= '<p class="vivid_form_message">'. esc_attr__('(.json formatted file only)') .'</p>';						
					$panel .= '</div>';
					
					$panel .= '<div class="vivid-form-column">';					
						$panel .= '<a href="#" class="vivid-ui-panel-button" id="vivid-import-template-btn">'. esc_attr__('Import Template', 'vivid-page-builder') .'</a>';	
						$panel .= '<p class="vivid_form_message">'. esc_attr__('This file will be loaded in the page builder layout.') .'</p>';						
					$panel .= '</div>';
				
				break;
				
				case 'export-template' : 
				
					$panel .= '<div class="vivid-form-column">';					
						$panel .= '<label for="vivid_export_template_title">'. esc_attr__('Enter a file name', 'vivid-page-builder') .'</label>';				
						$panel .= '<input type="text" name="vivid_export_template_title" id="vivid_export_template_title" value="" />';		
						$panel .= '<br><br><a href="#" class="vivid-ui-panel-button" id="vivid-export-template-btn">'. esc_attr__('Export Template', 'vivid-page-builder') .'</a>';
						$panel .= '<p class="vivid_form_message">'. esc_attr__('This tool will generate a .json file which can be saved to your hard drive.') .'</p>';								
					$panel .= '</div>';
				
				break;
				
				case 'save-template' : 
				
					$panel .= '<div class="vivid-form-column">';										
						$panel .= '<label for="vivid_save_template">'. esc_attr__('Template title', 'vivid-page-builder') .'</label>';				
						$panel .= '<input type="text" name="vivid_save_template_title" id="vivid_save_template_title" value="" />';	
					$panel .= '</div>';
					
					$panel .= '<div class="vivid-form-column">';										
						$panel .= '<label for="vivid_save_template_thumbnail">'. esc_attr__('Template thumbnail', 'vivid-page-builder') .'</label>';
						$panel .= '<div class="vivid-background-image">';
							$panel .= '<ul class="vivid-image"></ul>';
							$panel .= '<a href="#" class="vivid-add-image"><i class="dashicons dashicons-plus"></i>'. esc_attr__('Add image', 'vivid-page-builder') .'</a>';
							$panel .= '<div class="vivid-clearfix"></div>';
							$panel .= '<input type="hidden" name="vivid_save_template_thumbnail" id="vivid_save_template_thumbnail" value="" />';
						$panel .= '</div>';
					$panel .= '</div>';
					
					$panel .= '<a href="#" class="vivid-ui-panel-button" id="vivid-save-template-btn">'. esc_attr__('Save Template', 'vivid-page-builder') .'</a>';	
					
					$panel .= '<p class="vivid_form_message">'. esc_attr__('This tool will save your current page builder layout into the database.') .'</p>';	
				
				break;
				
				case 'load-template' : 
				
					//Fetch existing template files from database and loop through array in menu list below
				
					$panel .= '<div class="vivid-form-column">';
					
						$panel .= '<label for="vivid_templates_list">'. esc_attr__('Current Templates', 'vivid-page-builder') .'</label>';
				
						$panel .= '<ul class="vivid-templates-list">';
						
							//Loop here
							$panel .= '<li>';
								$panel .= '<div class="vivid-templates-list-info">';
									$panel .= '<span>Thumb</span>';
									$panel .= '<p>Template title goes here</p>';
								$panel .= '</div>';
								$panel .= '<div class="vivid-templates-list-action-buttons">';
									$panel .= '<a href="#apply" class="dashicons dashicons-plus" title="'. esc_attr__('Load template') .'"></a>';
									$panel .= '<a href="#delete" class="dashicons dashicons-trash" title="'. esc_attr__('Delete template') .'"></a>';
								$panel .= '</div>';
							$panel .= '</li>';
							
							
						$panel .= '</ul>';
						
						
					$panel .= '</div>';
				
				break;
				
				case 'all-elements' : 
				
					$panel .= 'All Elements loaded';
				
				break;
				
				case 'content-elements' : 
				
					$panel .= 'Content Elements loaded';
				
				break;
				
				case 'wordpress-elements' : 
				
					$panel .= 'WordPress Elements loaded';
				
				break;
	 
				default:
				
					$panel = null;
					
				break;
	 
			}
	 
			return $panel;
	 
		}
	 
	}
	
}



?>