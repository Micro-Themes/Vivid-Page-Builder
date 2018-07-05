(function($) {
	
	'use strict';

	$(document).ready(function(e) {
		
		//Panel UI class
		var panelUI = new VividPanels();
		//panelUI.init();
		
		//alert(pm_ln_register_vars.pm_ln_ajax_url);
		
		/* Toggle Vivid Page Builder */
		$('#vivid_pb_toggle').on('click', function(e) {
	
			e.preventDefault();
	
			var $this = $(this);
	
			if( !$this.hasClass('active') ) {
	
				$this.addClass('active');
				editor_methods.vivid_activate_editor();
	
				$this.html('Disable Classic Editor');
				$('#page_builder_active').val('active');
				
				//Display import/export buttons
				$('#vivid_pb_export').addClass('active');
				$('#vivid_pb_import').addClass('active');
				$('#vivid_pb_save_template').addClass('active');
				$('#vivid_pb_load_template').addClass('active');
				
	
			} else {
	
				$this.removeClass('active');
				editor_methods.vivid_disable_editor();
	
				$this.html('Vivid Classic Editor');
				$('#vivid-page-builder').removeClass('active');
				
				$('#page_builder_active').val('inactive');
				
				//Hide import/export buttons
				$('#vivid_pb_export').removeClass('active');
				$('#vivid_pb_import').removeClass('active');
				$('#vivid_pb_save_template').removeClass('active');
				$('#vivid_pb_load_template').removeClass('active');
	
			}
	
		});
		
		//Import Template
		$('#vivid_pb_import').on('click', function(e) {
	
			e.preventDefault();
	
			var $this = $(this);
			
			//Reset Panel data
			panelUI.reset_panel_data();
								
			//Assign panel type to panel window data
			$('.vivid-ui-panel-window').data("panel-type", 'import-template');	
			
			//Activate Panel
			panelUI.activate_panel_ui('import-template', 0);
			
			//Load panel data
			panelUI.load_panel_ui('import-template', 0, 0);	
			
			//Hide Panel Preset button - not needed
			$('#vivid-ui-panel-save-preset').hide();
			
		});
		
		//Export Template
		$('#vivid_pb_export').on('click', function(e) {
	
			e.preventDefault();
	
			var $this = $(this);
			
			//Reset Panel data
			panelUI.reset_panel_data();
								
			//Assign panel type to panel window data
			$('.vivid-ui-panel-window').data("panel-type", 'export-template');	
			
			//Activate Panel
			panelUI.activate_panel_ui('export-template', 0);
			
			//Load panel data
			panelUI.load_panel_ui('export-template', 0, 0);	
			
			//Hide Panel Preset button - not needed
			$('#vivid-ui-panel-save-preset').hide();
			
		});
		
		//Save Template
		$('#vivid_pb_save_template').on('click', function(e) {
	
			e.preventDefault();
	
			var $this = $(this);
			
			//Reset Panel data
			panelUI.reset_panel_data();
								
			//Assign panel type to panel window data
			$('.vivid-ui-panel-window').data("panel-type", 'save-template');	
			
			//Activate Panel
			panelUI.activate_panel_ui('save-template', 0);
			
			//Load panel data
			panelUI.load_panel_ui('save-template', 0, 0);	
			
			//Hide Panel Preset button - not needed
			$('#vivid-ui-panel-save-preset').hide();
			
		});
		
		//Load Template
		$('#vivid_pb_load_template').on('click', function(e) {
	
			e.preventDefault();
	
			var $this = $(this);
			
			//Reset Panel data
			panelUI.reset_panel_data();
								
			//Assign panel type to panel window data
			$('.vivid-ui-panel-window').data("panel-type", 'load-template');		
			
			//Activate Panel
			panelUI.activate_panel_ui('load-template', 0);
			
			//Load panel data
			panelUI.load_panel_ui('load-template', 0, 0);	
			
			//Hide Panel Preset button - not needed
			$('#vivid-ui-panel-save-preset').hide();
			
		});
		
		//Custom CSS
		$('#vivid_pb_custom_css').on('click', function(e) {
	
			e.preventDefault();
	
			var $this = $(this);
								
			//Reset Panel data
			panelUI.reset_panel_data();
								
			//Assign panel type to panel window data
			$('.vivid-ui-panel-window').data("panel-type", 'custom-css');			
												
			//Activate Panel
			panelUI.activate_panel_ui('custom-css', 0);
			
			//AJAX CALL TO LOAD DATA VIA CLASS
			panelUI.load_panel_ui('custom-css', 0, 0);	
			
			//Hide Panel Preset button - not neede
			$('#vivid-ui-panel-save-preset').hide();
			
		});

		
		
		
	});//end of ready


	/* Store functions here */
	var editor_methods = {

		/* Editor Toggle Function */
		vivid_activate_editor : function() {

			$( '#postdivrich' ).hide();
			$( '#vivid-page-builder' ).show();

		},

		vivid_disable_editor : function() {

			$( '#postdivrich' ).show().css({ 'display' : 'inline', 'width' : '100%' });
			$( '#vivid-page-builder' ).hide();

		}


	}

	/* Store variables here */
	var editor_options = {
		'default' : 0
	}

})(jQuery);