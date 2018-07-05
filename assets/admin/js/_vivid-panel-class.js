(function ($) {
	
	var panelUI = function (data) {
				
		this.init = function() {
			
			console.log('Vivid panel class initialized');	
						
		};//end of init
		
		this.panel_options = {
			
			container : '#vivid-templates > .vivid-container',
			panel_window : '.vivid-ui-panel-window',
			css_animation : 'fadeInLeft',
			panel_data_container : '#vivid-ui-data-container',
			panel_top_position : ($(window).height() / 2) - 300,
			panel_left_position : ($(window).width() / 2) - 300
			
		}//end of panel_options
		
		this.activate_panel_ui = function(panel_type, id) {
			
			var parent = this,
			panel_window = $( parent.panel_options.panel_window );
		
			if( !panel_window.hasClass('active') ) {					
				panel_window.addClass('active');			
				panel_window.css({
					'top' : parent.panel_options.panel_top_position,
					'left' : parent.panel_options.panel_left_position	
				});				
			}
			
			//Add title to panel ui
			
			switch(panel_type) {
			
				case 'row' :
				
					$('.vivid-ui-panel-window-title').html('Row ' + id + ' Settings');
					
					//Display Save Changes button for panel - required
					$('.vivid-ui-panel-window-footer-buttons > a:last-child').show();
					
				break
				
				case 'column' :
				
					$('.vivid-ui-panel-window-title').html('Column ' + id + ' Settings');
					
					//Display Save Changes button for panel - required
					$('.vivid-ui-panel-window-footer-buttons > a:last-child').show();
					
				break
				
				case 'custom-css' :
				
					$('.vivid-ui-panel-window-title').html('Custom CSS');
					
					//Display Save Changes button for panel - required
					$('.vivid-ui-panel-window-footer-buttons > a:last-child').show();
					
				break
				
				case 'import-template' :
				
					$('.vivid-ui-panel-window-title').html('Import Template');
					
					//Hide Save Changes button for panel - not required
					$('.vivid-ui-panel-window-footer-buttons > a:last-child').hide();
					
				break
				
				case 'export-template' :
				
					$('.vivid-ui-panel-window-title').html('Export Template');
					
					//Hide Save Changes button for panel - not required
					$('.vivid-ui-panel-window-footer-buttons > a:last-child').hide();
					
				break
				
				case 'save-template' :
				
					$('.vivid-ui-panel-window-title').html('Save Template');
					
					//Hide Save Changes button for panel - not required
					$('.vivid-ui-panel-window-footer-buttons > a:last-child').hide();
					
				break
				
				case 'load-template' :
				
					$('.vivid-ui-panel-window-title').html('Load Template');
					
					//Hide Save Changes button for panel - not required
					$('.vivid-ui-panel-window-footer-buttons > a:last-child').hide();
					
				break
				
				case 'elements' :
				
					$('.vivid-ui-panel-window-title').html('Add Element');
					
					//Hide Save Changes button for panel - not required
					$('.vivid-ui-panel-window-footer-buttons > a:last-child').hide();
					
				break
				
				
			}
			
			
		}
		
		this.load_panel_ui = function(panel_type, row_id, column_id) {
			
			var parent = this,
			ajax_url = pm_ln_register_vars.pm_ln_ajax_url;
			
			//Reset panel ui
			this.reset_panel_ui();
						
			//Reset preset menu
			this.reset_preset_menu();
												
			//Load panel content
			$.post(ajax_url, {action:'pm_ln_load_panel_ui', nonce:pm_ln_register_vars.pm_ln_nonce, panel_type:panel_type, row_id:row_id, column_id:column_id}, function(data, status){
			
				if( status === 'success' ) {
					
					$('#vivid-ui-panel-preloader').hide();
					
					var content = $(data.content);
					
					//Empty container first
					$(parent.panel_options.panel_data_container).html('');
					
					//Append data
					$(parent.panel_options.panel_data_container).append(content);
					
					//Activate UI Panel buttons
					parent.vivid_ui_panel_buttons();
					
					//Activate UI Panel drag
					parent.vivid_ui_panel_draggable();
					
					//Activate CSS select list animation 
					parent.vivid_ui_panel_css_animation();
					
					//Activate panel ui controls
					parent.activate_panel_ui_controls(panel_type);	
										
					//Activate preset menu
					parent.activate_preset_menu();
					
					if( panel_type === 'custom-css' ) {
						
						//Load CSS editor
						var editor = ace.edit("vivid-css-editor");
						
					}
					
				} else {
					$(this.panel_options.panel_data_container).append('An error occurred.');
				}
											
				
			},'json');
			
		}//end of load_panel_ui
		
		this.activate_preset_menu = function() {
		
			var parent = this;
						
			//unbind any existing events
			$('.vivid-ui-panel-menu-list > li > button').unbind('click');
			
			//re-bind events
			$('.vivid-ui-panel-menu-list > li > button').on('click', function(e) {
				
				e.preventDefault();
				
				var $this = $(this),
				id = $this.attr('id');
				
				//Hide all tabs
				$('.vivid-ui-panel-window-tab').hide();
				
				//Hide all preset windows
				$('.vivid-ui-panel-window-preset').removeClass('active');
				
				switch (id) {
				
					case 'vivid-save-preset-btn' :
					
						$('#vivid-ui-panel-window-save-preset-window').addClass('active');
					
					break;
					
					case 'vivid-default-preset-btn' :
					
						alert('Set as default');
					
					break;
					
					case 'vivid-restore-preset-btn' :
					
						alert('Restore default');
					
					break;
					
					case 'vivid-view-presets-btn' :
					
						$('#vivid-ui-panel-window-view-presets-window').addClass('active');						
					
					break;
					
					
				}//end switch
							
							
				//Reset preset menu			
				parent.reset_preset_menu();	
				
				//Hide tab buttons
				$('.vivid-ui-panel-window-tab-buttons').hide();
	
			});
			
			
			//Apply smooth scroll
			$('.vivid-ui-panel-window-preset').mCustomScrollbar({
				 theme : "dark"	
			});
					
							
			//Bind preset close window button
			$('.vivid-close-preset-window').on('click', function(e) {
				
				e.preventDefault();
				
				var $this = $(this);		
				
				$('.vivid-ui-panel-window-preset').removeClass('active');			
				
				//Reactive tab buttons and tab content
				$('.vivid-ui-panel-window-tab').show();
				$('.vivid-ui-panel-window-tab-buttons').show();
				
				//Remove inline styles
				$('.vivid-ui-panel-window-tab').css('display', '');
				$('.vivid-ui-panel-window-tab-buttons').css('display', '');
				
				
			});
			
			//Bind "presets" button events
			$('.vivid-presets-list-action-buttons > a').on('click', function(e) {
				
				e.preventDefault();
				
				var $this = $(this),
				action = $this.attr('href').replace('#', '');
				
				switch(action) {
					
					case 'apply' :
						alert('apply preset');
					break;
					
					case 'default' :
						alert('set preset as default');
					break;
					
					case 'delete' :
						alert('delete preset');
					break;
					
				}
				
				
				
				
			});
			
			//Bind Save Preset changes event
			$('#vivid-save-preset-title-btn').on('click', function(e) {
				
				e.preventDefault();
				
				var $this = $(this),
				title_field = $('#vivid_form_save_preset_title');
				
				if( title_field.val().length === 0 ) {
					//alert('Please enter a title');
					
					title_field.addClass('vivid-field-invalid');
					
				} else {
					alert('Save title');	
				}
				
				
				
				//Make ajax call for action
				
				
			});
			
			
		}
		
		this.reset_preset_menu = function() {
			
			//alert('reset preset menu');
			
			//Reset preset button
			$('#vivid-ui-panel-save-preset').removeClass('active');
			$('#vivid-ui-panel-save-preset').removeClass('dashicons-no-alt');
			$('#vivid-ui-panel-save-preset').addClass('dashicons-edit');
			
			//Close preset menu
			$('#vivid-ui-panel-preset-menu').removeClass('active');
			
		}
		
		this.vivid_ui_panel_buttons = function() {
			
			var parent = this;
			
			//unbind any existing events
			$('.vivid-ui-panel-window-action-buttons > a').unbind('click');
		
			//re-bind events
			$('.vivid-ui-panel-window-action-buttons > a').on('click', function(e) {
				
				e.preventDefault();
				
				var $this = $(this),
				id = $this.attr('id');
				
				switch (id) {
					
					case 'vivid-ui-panel-save-preset': 
						
						if( !$this.hasClass('active') ) {
							
							$this.addClass('active');
							$this.removeClass('dashicons-edit');
							$this.addClass('dashicons-no-alt');
							$('#vivid-ui-panel-preset-menu').addClass('active');
							
						} else {
								
							$this.removeClass('active');
							$this.removeClass('dashicons-no-alt');
							$this.addClass('dashicons-edit');
							$('#vivid-ui-panel-preset-menu').removeClass('active');
								
						}
						
						
					break;
					
					case 'vivid-ui-panel-minimize': 
						
						if( !$this.hasClass('active') ) {
							
							$this.addClass('active');
							$(parent.panel_options.panel_window).addClass('minimize-panel');
							$this.removeClass('dashicons-minus');
							$this.addClass('dashicons-editor-expand');
							
						} else {
							
							$this.removeClass('active');
							$(parent.panel_options.panel_window).removeClass('minimize-panel');
							$this.addClass('dashicons-minus');
							$this.removeClass('dashicons-editor-expand');
							
						}						
						
					break;
					
					case 'vivid-ui-panel-close': 
						
						$(parent.panel_options.panel_window).removeClass('active');
						
						//Reset panel window
						//parent.reset_panel_ui();
						
						//Reset panel data
						parent.reset_panel_data();
						
					break;
					
					default:
						//do nothing
					break;	
					
					
				}//end of switch
				
			});
			
			//unbind any existing events
			$('.vivid-ui-panel-window-tab-buttons > a').unbind('click');
			
			//re-bind events
			$('.vivid-ui-panel-window-tab-buttons > a').on('click', function(e) {
				
				e.preventDefault();
				
				var $this = $(this),
				tab = $this.data("tab");
				
				$('.vivid-ui-panel-window-tab-buttons > a').removeClass('active');
				$this.addClass('active');
				
				//Hide all tabs
				$('.vivid-ui-panel-window-tab').removeClass('active');
				
				switch (tab) {
					
					case 'general': 
						
						$('#vivid-ui-panel-window-general-settings-tab').addClass('active');
						
					break;
					
					case 'design': 
						
						$('#vivid-ui-panel-window-design-settings-tab').addClass('active');
						
					break;
					
					case 'responsive': 
						
						$('#vivid-ui-panel-window-responsive-settings-tab').addClass('active');
						
					break;
					
					case 'all-elements': 
						
						$('#vivid-ui-panel-window-all-elements-tab').addClass('active');
						
					break;
					
					case 'content-elements': 
						
						$('#vivid-ui-panel-window-content-elements-tab').addClass('active');
						
					break;
					
					case 'wordpress-elements': 
						
						$('#vivid-ui-panel-window-wordpress-elements-tab').addClass('active');
						
					break;
					
					default:
						//do nothing
					
				}//end of switch
				
			});
			
			//unbind any existing events
			$('.vivid-ui-panel-window-footer-buttons > a').unbind('click');
			
			//re-bind events
			$('.vivid-ui-panel-window-footer-buttons > a').on('click', function(e) {
				
				e.preventDefault();
				
				var $this = $(this),
				action = $this.data("action"),
				panel_type = $('.vivid-ui-panel-window').data('panel-type'),
				row_id = $('.vivid-ui-panel-window').data('row'),
				column_id = $('.vivid-ui-panel-window').data('column');
				
				switch (action) {
					
					case 'close': 
					
						//Close panel
						$(parent.panel_options.panel_window).removeClass('active');
						
						//Reset panel data
						parent.reset_panel_data();
						
					break;
					
					case 'save': 
					
						switch (panel_type) {
							
							case 'row' :
							
								//Save Row settings
								if(row_id > 0) {
									alert('Save settings for Row ' + row_id);
									
									//Ajax call required to save data
									
								}
							
							break;
							
							case 'column' :
							
								//Save Column settings
								if(column_id > 0) {
									alert('Save settings for Column ' + column_id);
									
									//Ajax call required to save data
									
								}								
							
							break;
							
							case 'custom-css' :
							
								//Save Column settings
								alert('Save custom css');	
								
								//Ajax call required to save data							
							
							break;
							
						}//end switch
										
						
					break;
					
					default:
						//do nothing
					
				}//end of switch
				
			});
			
		}
		
		this.vivid_ui_panel_draggable = function() {
			
			$( '.vivid-ui-panel-window' ).draggable({
				handle: '.vivid-ui-panel-window-handle',
				cursor: 'grabbing',
			});
			
			$( '.vivid-ui-panel-window' ).resizable({
				  maxHeight: 250,
				  maxWidth: 1400,
				  minHeight: 150,
				  minWidth: 400	
			});
			
		}
		
		this.vivid_ui_panel_css_animation = function() {
			
			var parent = this;
			
			if( $('#vivid_css_animation').length > 0 ) {
								
				$('#vivid_css_animation').on('change', function(e) {
					
					var val = $(this).val();
					
					parent.panel_options.css_animation = val;
					
					//Assign animation class
					$('.vivid-panel-btn-animation-style-trigger').addClass(parent.panel_options.css_animation + ' animated');
					
					//Remove animation class after 500ms
					setTimeout(parent.vivid_ui_panel_remove_css_animation.bind(parent), 500);
					
				});
				
				$('.vivid-panel-btn-animation-style-trigger').on('click', function(e) {
					
					e.preventDefault();
					
					var $this = $(this);
					
					//Add animation class
					$this.addClass(parent.panel_options.css_animation + ' animated');
					
					//Remove animation class after 500ms
					setTimeout(parent.vivid_ui_panel_remove_css_animation.bind(parent), 500);
					
				});
				
			}
			
		}
		
		this.vivid_ui_panel_remove_css_animation = function() {
												
			$('.vivid-panel-btn-animation-style-trigger').removeClass(this.panel_options.css_animation + ' animated');
		}
		
		this.reset_panel_ui = function() {
		
			$('#vivid-ui-panel-preloader').show();
			$('#vivid-ui-data-container').html('');
			$('#vivid-ui-panel-save-preset').show();
				
		}
		
		this.reset_panel_data = function() {
			
			$('.vivid-ui-panel-window').data("panel-type", "null");
			$('.vivid-ui-panel-window').data("row", 0);
			$('.vivid-ui-panel-window').data("column", 0);
				
		}
		
		this.activate_panel_ui_controls = function(panel_type) {
			
			//Color picker
			if( $('.cs-wp-color-picker').length > 0 ){
				$('.cs-wp-color-picker').cs_wpColorPicker();
			}
			
			if( panel_type != 'custom-css' ) {
				//Custom scrollbar
				$(".vivid-ui-panel-window-tabs").mCustomScrollbar({
					 theme : "dark"	
				});
			}
			
			//Import template button
			if( $('#vivid-import-template-btn').length > 0 ) {
					
				$('#vivid-import-template-btn').on('click', function(e) {
					
					e.preventDefault();
					
					var $this = $(this),
					file_field = $('#vivid_selected_template_file');
					
					if( file_field.val().length === 0 ) {						
						alert('Please choose a .json file to import.');						
					} else {
						alert('Import template');
					}
					
					
				});
				
			}//end if
			
			//Save template button
			if( $('#vivid-save-template-btn').length > 0 ) {
					
				$('#vivid-save-template-btn').on('click', function(e) {
					
					e.preventDefault();
					
					var $this = $(this),
					title_field = $('#vivid_save_template_title');
					
					if( title_field.val().length === 0 ) {						
						title_field.addClass('vivid-field-invalid');						
					} else {
						alert('Save template');
					}
					
				});
				
			}//end if
			
			
			//Export template button
			if( $('#vivid-export-template-btn').length > 0 ) {
					
				$('#vivid-export-template-btn').on('click', function(e) {
					
					e.preventDefault();
					
					var $this = $(this),
					title_field = $('#vivid_export_template_title');
					
					if( title_field.val().length === 0 ) {						
						title_field.addClass('vivid-field-invalid');						
					} else {
						alert('Export template');
					}
					
					
					
				});
				
			}//end if
			
			
			//Load Template action buttons
			if( $('.vivid-templates-list-action-buttons').length > 0 ) {
					
				$('.vivid-templates-list-action-buttons > a').on('click', function(e) {
					
					e.preventDefault();
					
					var $this = $(this),
					action = $this.attr('href').replace('#', '');
										
					switch(action) {
					
						case 'apply' :
							alert('apply template');
						break;
						
						case 'delete' :
							alert('delete template');
						break;
						
					}
					
				});
				
			}//end if
			
			
			//Hidden fields for General (Row) tab
			if( $('#vivid_full_height').length > 0 ) {
					
				$('#vivid_full_height').change(function(e) {					
					if(this.checked) {				
						$('#vivid_form_columns_position_field').show();					
					} else {					
						$('#vivid_form_columns_position_field').hide();					
					}					
				});
				
			}//end if
			
			if( $('#vivid_video_background').length > 0 ) {
					
				$('#vivid_video_background').change(function(e) {					
					if(this.checked) {				
						$('#vivid_form_video_fields').show();					
					} else {					
						$('#vivid_form_video_fields').hide();					
					}					
				});
				
			}//end if
			
			if( $('#vivid_parallax_selection').length > 0 ) {
					
				$('#vivid_parallax_selection').on('change', function(e) {
					
					var val = $(this).val();
										
					if(val == 'on') {						
						$('#vivid_parallax_speed_field').show();						
					} else {						
						$('#vivid_parallax_speed_field').hide();						
					}
					
				});
				
			}//end if
			
			//Design Options tab
			if( $('#vivid_box_controls').length > 0 ) {
					
				$('#vivid_box_controls').change(function(e) {					
					if(this.checked) {				
						$('#vivid-layout-onion').addClass('vivid-simplified');					
					} else {					
						$('#vivid-layout-onion').removeClass('vivid-simplified');					
					}					
				});
				
			}//end if
			
			
			//Background field image uploader
			if(wp.media !== undefined){
						
				if( $('.vivid-add-image').length > 0 ){
					
					var image_custom_uploader;
				
					$('.vivid-add-image').click(function(e) {
														
						 e.preventDefault();
			
						 //If the uploader object has already been created, reopen the dialog
						 if (image_custom_uploader) {
							 image_custom_uploader.open();
							 return;
						 }
						
					});
							
					 //Extend the wp.media object
					 image_custom_uploader = wp.media.frames.file_frame = wp.media({
						title: 'Choose Image',
						button: {
						text: 'Choose Image'
						},
						 multiple: false
					 });
					 
					 //When a file is selected, grab the URL and set it as the text field's value
					 image_custom_uploader.on('select', function() {
						 
						var attachment = image_custom_uploader.state().get('selection').first().toJSON(),
						url = attachment['url'];
						
						$('#vivid_background_image').val(url);
						$('.vivid-image').html('<li class="added"><div class="inner"><img src="'+ url +'" /></div><a href="#" class="vivid-icon-remove"><i class="vivid-icon-close dashicons"></i></a></li>');
						
						$('.vivid-icon-remove').on('click', function(e) {
							e.preventDefault();
							$('.vivid-image').html('');
							$('#vivid_background_image').val('');
						 });
			
					 });					 
					
				}//end if
				
			}//end of wp.media
			
		}		
		
	}//end of uploader
	
	window.VividPanels = panelUI;
	
})(jQuery);