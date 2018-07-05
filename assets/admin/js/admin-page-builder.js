(function($) {
	
	'use strict';
	
	$(document).ready(function(e) {
		
		//Make Rows Sortable
		builder_methods.vivid_rows_sortable();
		
		//Make Columns sortable
		builder_methods.vivid_columns_sortable();
		
		//Panel UI class
		var panelUI = new VividPanels();
		//panelUI.init();
	
		//Add Row
		$( '.vivid-add-row', '#vivid-page-builder' ).on('click', function(e){
	
			e.preventDefault();
				 
			//Clone the container template and add it.
			$( builder_options.container ).clone().appendTo( '.vivid-rows' );
		 
			//Hide empty row message
			$( '.vivid-rows-message' ).hide();
	
			//Update order
			builder_methods.vivid_update_order();
	
		});
	
	
		//Delete Row
		$( 'body' ).on( 'click', '.vivid-remove', function(e){
	
			e.preventDefault();
		 
			//Delete Row
			$(this).parents( '.vivid-container' ).remove();
			
			//Show empty message when applicable
			if( ! $( '.vivid-rows > .vivid-container' ).length ){
				$( '.vivid-rows-message' ).show();
			}
	
			//Update order
			builder_methods.vivid_update_order();
	
		});
		
		//Add Widget or Shortcode to column
		$( 'body' ).on( 'click', '.vivid-column-container', function(e){
			
			e.preventDefault();
					
			var $this = $(this);			
			
			//Activate Panel
			panelUI.activate_panel_ui('elements', 0);
			
			//Load panel data
			panelUI.load_panel_ui('elements', 0, 0);	
			
			//Hide Panel Preset button - not needed
			$('#vivid-ui-panel-save-preset').hide();
			
			
		});
		
		
		//Standard Columns button activator
		$( 'body' ).on( 'click', '.vivid-add-cols', function(e){
			
			e.preventDefault();
					
			var $this = $(this),
			rowID = $this.data("order"),
			targetContainer = '#vivid-container-'+rowID+'';
			
			var colBtns = $(targetContainer).find('.vivid-colum-buttons');
			
			if(!colBtns.hasClass('active')) {
				colBtns.addClass('active');
				
				$this.removeClass('dashicons-editor-justify');
				$this.addClass('dashicons-no-alt');
				
			} else {
				colBtns.removeClass('active');
				
				$this.removeClass('dashicons-no-alt');
				$this.addClass('dashicons-editor-justify');
			}
			
		});
		
		//Magazine Columns button activator
		$( 'body' ).on( 'click', '.vivid-add-magazine-cols', function(e){
			
			e.preventDefault();
								
			var $this = $(this),
			rowID = $this.data("order"),
			targetContainer = '#vivid-container-'+rowID+'';
			
			var colBtns = $(targetContainer).find('.vivid-magazine-column-buttons');
			
			if(!colBtns.hasClass('active')) {
				colBtns.addClass('active');
				
				$this.removeClass('dashicons-align-left');
				$this.addClass('dashicons-no-alt');
				
			} else {
				colBtns.removeClass('active');
				
				$this.removeClass('dashicons-no-alt');
				$this.addClass('dashicons-align-left');
			}
			
		});
		
		//Minimize/Maximize Row 
		$( 'body' ).on( 'click', '.vivid-minimize-cols', function(e){
			
			e.preventDefault();
					
			var $this = $(this),
			rowID = $this.data("order"),
			targetContainer = '#vivid-container-'+rowID+'';
						
			if(!$(targetContainer).hasClass('vivid-container-collapse')) {
				
				$(targetContainer).addClass('vivid-container-collapse');
				
				$this.removeClass('dashicons-editor-contract');
				$this.addClass('dashicons-editor-expand');
				
				$this.attr('title', 'Maximize Row');
				
			} else {
				
				$(targetContainer).removeClass('vivid-container-collapse');
				
				$this.addClass('dashicons-editor-contract');
				$this.removeClass('dashicons-editor-expand');
				
				$this.attr('title', 'Minimize Row');
				
			}
			
		});
		
		//Clone Row
		$( 'body' ).on( 'click', '.vivid-clone-row', function(e){
			
			e.preventDefault();
					
			var $this = $(this),
			rowID = $this.data("order"),
			targetCopy = $('#vivid-container-'+rowID+''),
			targetContainer = '#vivid-rows';
						
			$(targetCopy).clone().insertAfter('#vivid-rows > #vivid-container-'+ rowID +'');
			
			//Update order
			builder_methods.vivid_update_order();
						
			//Re-assign sortable listener
			builder_methods.vivid_columns_sortable();
			
		});
		
		//Clone Column
		$( 'body' ).on( 'click', '.vivid-clone-col', function(e){			
			
			e.preventDefault();
								
			var $this = $(this),
			rowID = $this.parents('.vivid-container').data("row"),
			targetContainer = '#vivid-container-'+rowID+'',
			targetCopy = $this.parents('.vivid-row').attr("id");
												
			$('#'+targetCopy+'').clone().insertAfter( $this.parents('.vivid-row') );
			
			//Update row order number
			builder_methods.vivid_order_rows(targetContainer);
			
			//Update names to columns for data capture
			builder_methods.vivid_name_columns();
						
			//Update sortable listener
			builder_methods.vivid_columns_sortable();
						
		});
		
		
		//Add column to container
		$( 'body' ).on( 'click', '.vivid-column-button', function(e){
			
			e.preventDefault();
			
			var $this = $(this),
			layout = $this.data("layout"),
			rowID = $this.parents('.vivid-container').data("row"),
			targetContainer = '#vivid-container-'+rowID+'';
			
			//Hide defailt message			
			$(targetContainer).find('.vivid-default-message').hide();
			
			//Copy and append column structure to container target
			$( '#vivid-templates > .vivid-row.'+layout+'' ).clone().appendTo( $(targetContainer) );
			
			//Assign names to columns for data capture
			builder_methods.vivid_name_columns();
			
			//Update row order number
			builder_methods.vivid_order_rows(targetContainer);
			
			//Assign sortable listener
			builder_methods.vivid_columns_sortable();
			
		});
		
		//Delete column from container
		$( 'body' ).on( 'click', '.vivid-row-remove', function(e){
	
			e.preventDefault();
		 
			var $this = $(this),
			rowID = $this.parents('.vivid-container').data("row"),
			targetContainer = '#vivid-container-'+rowID+'';
		 
			//Delete row
			$this.parents( '.vivid-row' ).remove();
			
			//Show empty message when applicable
			if( !$('#vivid-container-'+rowID+' > .vivid-row').length ){
				$('#vivid-container-'+rowID+'').find('.vivid-default-message').show();
			}
			
			//Update row order number
			builder_methods.vivid_order_rows(targetContainer);
			
			//Re-assign names to columns for data capture
			builder_methods.vivid_name_columns();
	
		});
		
				
		//alert(pm_ln_register_vars.pm_ln_ajax_url);
		
		//Load Row panel
		$( 'body' ).on( 'click', '.vivid-row-options', function(e){
	
			e.preventDefault();
		 
			var $this = $(this),
			rowID = $this.data("order");
			
			//Assign panel type and row id to panel window data
			$('.vivid-ui-panel-window').data("panel-type", "row");
			$('.vivid-ui-panel-window').data("row", rowID);
			
			//Reset preset menu
			panelUI.reset_preset_menu();
			
			//Activate Panel
			panelUI.activate_panel_ui('row', rowID);
			
			//Load Panel data via ajax
			panelUI.load_panel_ui('row', rowID, 0);		
			
			
	
		});
		
		//Load column panel
		$( 'body' ).on( 'click', '.vivid-col-options', function(e){
	
			e.preventDefault();
		 
			var $this = $(this),
			columnID = $this.data("column-id");
			
			//Assign panel type and column id to panel window data
			$('.vivid-ui-panel-window').data("panel-type", "column");
			$('.vivid-ui-panel-window').data("column", columnID);
			
			//Reset preset menu
			panelUI.reset_preset_menu();
			
			//Activate Panel
			panelUI.activate_panel_ui('column', columnID);
			
			//Load Panel data via ajax
			panelUI.load_panel_ui('column', 0, columnID);			
	
		});
		
		
		
	});//end of document ready


	/* Store methods here */
	var builder_methods = {

		vivid_update_order : function (){
 
		    /* In each of rows */
		    $('.vivid-rows > .vivid-container').each( function(i){
		 
		        /* Increase index by 1 to avoid "0" as first number. */
		        var $this =  $(this),
				num = i + 1;
				
				/* Update order number on container */
				$this.data("row", num);
				$this.attr('id', 'vivid-container-'+num+'');
								
				/* Update order number on add columns button */
				$this.find( '.vivid-add-cols' ).data("order", num);
				
				/* Update order number on add magazine columns button */
				$this.find( '.vivid-add-magazine-cols' ).data("order", num);
				
				/* Update order number on row options button */
				$this.find( '.vivid-row-options' ).data("order", num);
				
				/* Update order number on minimize columns button */
				$this.find( '.vivid-minimize-cols' ).data("order", num);
				
				/* Update order number on row clone button */
				$this.find( '.vivid-clone-row' ).data("order", num);
		 
		        /* Update order number in row title */
		        $this.find( '.vivid-order' ).text( num );

				/* Assign order number to name value of each vivid-container wrapper input field */				
				$this.find( '.vivid-container-input' ).each( function(i) {
		 		 
		            /* Update name attribute with order and field name.  */
		            $(this).attr( 'name', 'vivid-container[' + num + ']');
					
		        });
				
				//Re-assign names to columns for data capture
				builder_methods.vivid_name_columns();

		    });

		},
		
		vivid_name_columns : function() {
									
			$('.vivid-container').each( function(i){
				
				$(this).find('.vivid-row').each( function(i) {
					
					var num = i + 1,
					rowID = $(this).parents('.vivid-container').data("row");
				
					/* Assign order number to name value of each input field within each row */
					$(this).find( '.vivid-row-input' ).each( function(i) {
			 
						/* Get field id for this input */
						var field = $(this).attr( 'data-field' );
			 
						/* Update name attribute with order and field name. */
						$( this ).attr( 'name', 'vivid-container-'+rowID+'-columns[' + num + '][' + field + ']');
	
					});
					
					$(this).find( '.vivid-row-content' ).each( function(i) {
			 
						/* Get field id for this input */
						var field = $(this).attr( 'data-field' );
			 
						/* Update name attribute with order and field name. */
						$(this).attr( 'name', 'vivid-container-'+rowID+'-content[' + num + '][' + field + ']');
	
					});
					
				});
				
			});
			
		},
		
		vivid_order_rows : function(targetContainer) {
			
			$(targetContainer).find( '.vivid-row' ).each( function(i) {
			 
	 			var num = i + 1,
				targetContainerID = $(targetContainer).attr('id');
				//alert('targetContainerID = ' + targetContainerID);
				
				/* Update row order number */
				$(this).attr('id', targetContainerID + '-vivid-row-'+num+'');

			});
			
		},
		
		vivid_rows_sortable : function() {
			
			$( '.vivid-rows' ).sortable({
				handle: '.vivid-handle',
				cursor: 'grabbing',
				axis: "y",
				stop: function( e, ui ) {
					builder_methods.vivid_update_order();
				},
			});
			
		},
		
		vivid_columns_sortable : function() {
			
			$( '.vivid-container' ).sortable({
				handle: '.vivid-row-handle',
				cursor: 'grabbing',
				axis: "y",
				items: '.vivid-row',
				stop: function( e, ui ) {
					builder_methods.vivid_name_columns();
					builder_methods.vivid_order_rows($(this));
				},
			});
			
		},
		
		

	}//end of builder_methods

	/* Store global variables here */
	var builder_options = {
		container : '#vivid-templates > .vivid-container',
		panel_window : '.vivid-ui-panel-window',
		css_animation : 'fadeInLeft',
		panel_data_container : '#vivid-ui-data-container',
		panel_top_position : ($(window).height() / 2) - 300,
		panel_left_position : ($(window).width() / 2) - 300
	}//end of builder_options

})(jQuery);