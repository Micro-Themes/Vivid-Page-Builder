(function($){
	
	'use strict';

	$(document).ready(function(e) {
				
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
					
					$('#vivid_row_background_image').val(url);
					$('.vivid-image').html('<li class="added"><div class="inner"><img src="'+ url +'" /></div><a href="#" class="vivid-icon-remove"><i class="vivid-icon-close dashicons"></i></a></li>');
		
				 });
				
			}
			
			
			 
		}
		
		
	});

})(jQuery);