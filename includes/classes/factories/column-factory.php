<?php
/* Column Factory Class */

if ( !class_exists( 'Column_Factory' ) ) {
	
	class Column_Factory {
		
		public function get_column_controls($row_id = 0) {
			
			$controls = '';
			
			$controls .= '<div class="vivid-row-title">';
					
				$controls .= '<span class="vivid-handle dashicons dashicons-move"></span>';
				$controls .= '<span class="vivid-row-title-text">'. esc_attr__('Row', 'vivid-page-builder') .'</span>';
				$controls .= '<span class="vivid-order">'. esc_attr($row_id) .'</span>	';
				$controls .= '<span class="vivid-remove dashicons dashicons-trash" title="'. esc_attr__('Delete row', 'vivid-page-builder') .'"></span>';
				$controls .= '<span class="vivid-clone-row dashicons dashicons-admin-page" data-order="'. esc_attr($row_id) .'" title="'. esc_attr__('Clone row', 'vivid-page-builder') .'"></span>';
				$controls .= '<span class="vivid-minimize-cols dashicons dashicons-editor-contract" data-order="'. esc_attr($row_id) .'" title="'. esc_attr__('Minimize Row', 'vivid-page-builder') .'"></span>';
				$controls .= '<span class="vivid-row-options dashicons dashicons-admin-settings" data-order="'. esc_attr($row_id) .'" title="'. esc_attr__('Edit Row', 'vivid-page-builder') .'"></span>';
				$controls .= '<span class="vivid-add-magazine-cols dashicons dashicons-align-left" data-order="'. esc_attr($row_id) .'" title="'. esc_attr__('Magazine Columns', 'vivid-page-builder') .'"></span>';
				$controls .= '<span class="vivid-add-cols dashicons dashicons-editor-justify" data-order="'. esc_attr($row_id) .'" title="'. esc_attr__('Standard Columns', 'vivid-page-builder') .'"></span>';
				
				$controls .= '<div class="vivid-colum-buttons">';
				
					$controls .= '<a href="#" class="vivid-column-button tooltip" data-layout="col-1" data-tooltip="'. esc_attr__('1 Column', 'vivid-page-builder') .'">';
						$controls .= '<img src="'. (VIVID_ASSETS_URL . '/admin/img/col-1-btn.png') .'" alt="'. esc_attr__('1', 'vivid-page-builder') .'" />';
					$controls .= '</a>';
					
					$controls .= '<a href="#" class="vivid-column-button tooltip" data-layout="col-2" data-tooltip="'. esc_attr__('2 Columns', 'vivid-page-builder') .'">';
						$controls .= '<img src="'. (VIVID_ASSETS_URL . '/admin/img/col-2-btn.png') .'" alt="'. esc_attr__('2', 'vivid-page-builder') .'" />';
					$controls .= '</a>';
					
					$controls .= '<a href="#" class="vivid-column-button tooltip" data-layout="col-3" data-tooltip="'. esc_attr__('3 Columns', 'vivid-page-builder') .'">';
						$controls .= '<img src="'. (VIVID_ASSETS_URL . '/admin/img/col-3-btn.png') .'" alt="'. esc_attr__('3', 'vivid-page-builder') .'" />';
					$controls .= '</a>';
					
					$controls .= '<a href="#" class="vivid-column-button tooltip" data-layout="col-4" data-tooltip="'. esc_attr__('4 Columns', 'vivid-page-builder') .'">';
						$controls .= '<img src="'. (VIVID_ASSETS_URL . '/admin/img/col-4-btn.png') .'" alt="'. esc_attr__('4', 'vivid-page-builder') .'" />';
					$controls .= '</a>';
					
					$controls .= '<a href="#" class="vivid-column-button tooltip" data-layout="col-5" data-tooltip="'. esc_attr__('5 Columns', 'vivid-page-builder') .'">';
						$controls .= '<img src="'. (VIVID_ASSETS_URL . '/admin/img/col-5-btn.png') .'" alt="'. esc_attr__('5', 'vivid-page-builder') .'" />';
					$controls .= '</a>';
					
					$controls .= '<a href="#" class="vivid-column-button tooltip" data-layout="col-6" data-tooltip="'. esc_attr__('6/3 Columns', 'vivid-page-builder') .'">';
						$controls .= '<img src="'. (VIVID_ASSETS_URL . '/admin/img/col-6-btn.png') .'" alt="'. esc_attr__('6/3', 'vivid-page-builder') .'" />';
					$controls .= '</a>';
					
					$controls .= '<a href="#" class="vivid-column-button tooltip" data-layout="col-8" data-tooltip="'. esc_attr__('7/4 Columns', 'vivid-page-builder') .'">';
						$controls .= '<img src="'. (VIVID_ASSETS_URL . '/admin/img/col-7-btn.png') .'" alt="'. esc_attr__('7/4', 'vivid-page-builder') .'" />';
					$controls .= '</a>';
					
					$controls .= '<a href="#" class="vivid-column-button tooltip" data-layout="col-7" data-tooltip="'. esc_attr__('3/6 Columns', 'vivid-page-builder') .'">';
						$controls .= '<img src="'. (VIVID_ASSETS_URL . '/admin/img/col-8-btn.png') .'" alt="'. esc_attr__('3/6', 'vivid-page-builder') .'" />';
					$controls .= '</a>';
					
					$controls .= '<a href="#" class="vivid-column-button tooltip" data-layout="col-9" data-tooltip="'. esc_attr__('4/7 Columns', 'vivid-page-builder') .'">';
						$controls .= '<img src="'. (VIVID_ASSETS_URL . '/admin/img/col-9-btn.png') .'" alt="'. esc_attr__('4/7', 'vivid-page-builder') .'" />';
					$controls .= '</a>';
					
				$controls .= '</div>';
				
				$controls .= '<div class="vivid-magazine-column-buttons">';
					
					$controls .= '<a href="#" class="vivid-column-button tooltip" data-layout="col-10" data-tooltip="'. esc_attr__('Magazine layout 1', 'vivid-page-builder') .'">';
						$controls .= '<img src="'. (VIVID_ASSETS_URL . '/admin/img/col-10-btn.png') .'" alt="'. esc_attr__('Layout 1', 'vivid-page-builder') .'" />';
					$controls .= '</a>';
					
					$controls .= '<a href="#" class="vivid-column-button tooltip" data-layout="col-11" data-tooltip="'. esc_attr__('Magazine layout 2', 'vivid-page-builder') .'">';
						$controls .= '<img src="'. (VIVID_ASSETS_URL . '/admin/img/col-11-btn.png') .'" alt="'. esc_attr__('Layout 2', 'vivid-page-builder') .'" />';
					$controls .= '</a>';
					
					$controls .= '<a href="#" class="vivid-column-button tooltip" data-layout="col-12" data-tooltip="'. esc_attr__('Magazine layout 3', 'vivid-page-builder') .'">';
						$controls .= '<img src="'. (VIVID_ASSETS_URL . '/admin/img/col-12-btn.png') .'" alt="'. esc_attr__('Layout 3', 'vivid-page-builder') .'" />';
					$controls .= '</a>';
					
					$controls .= '<a href="#" class="vivid-column-button tooltip" data-layout="col-13" data-tooltip="'. esc_attr__('Magazine layout 4', 'vivid-page-builder') .'">';
						$controls .= '<img src="'. (VIVID_ASSETS_URL . '/admin/img/col-13-btn.png') .'" alt="'. esc_attr__('Layout 4', 'vivid-page-builder') .'" />';
					$controls .= '</a>';
					
					$controls .= '<a href="#" class="vivid-column-button tooltip" data-layout="col-14" data-tooltip="'. esc_attr__('Magazine layout 5', 'vivid-page-builder') .'">';
						$controls .= '<img src="'. (VIVID_ASSETS_URL . '/admin/img/col-14-btn.png') .'" alt="'. esc_attr__('Layout 5', 'vivid-page-builder') .'" />';
					$controls .= '</a>';
					
					$controls .= '<a href="#" class="vivid-column-button tooltip" data-layout="col-15" data-tooltip="'. esc_attr__('Magazine layout 6', 'vivid-page-builder') .'">';
						$controls .= '<img src="'. (VIVID_ASSETS_URL . '/admin/img/col-15-btn.png') .'" alt="'. esc_attr__('Layout 6', 'vivid-page-builder') .'" />';
					$controls .= '</a>';
					
				$controls .= '</div>';
				
			$controls .= '</div>';
            
            return $controls;
			
		}
		
 
		public function get_column( $col_type, $row_id = 0, $row_counter = 1, $row_data = '' ) {
			
			$columns = '';
	 
			switch( strtolower( $col_type ) ) {
	 
				case 'col-1':
					
					$columns .= '<div class="vivid-row col-1" data-template="col-1" id="vivid-container-'. esc_attr($row_id) .'-vivid-row-'. esc_attr($row_counter) .'">';	
								
						$columns .= '<div class="vivid-row-controls">';
							$columns .= '<span class="vivid-row-handle dashicons dashicons-move"></span>';
							$columns .= '<span class="vivid-row-remove dashicons dashicons-trash" title="'. esc_attr__('Delete Columns', 'vivid-page-builder') .'"></span>';
							$columns .= '<span class="vivid-clone-col dashicons dashicons-admin-page" title="'. esc_attr__('Clone Columns', 'vivid-page-builder') .'"></span>';
                            
						$columns .= '</div>';
					
						$columns .= '<div class="vivid-box box-lg-1 box-md-1 box-sm-1 box-xs-1">';												
						
							$columns .= '<div class="vivid-column-elements-container">';
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 1', 'vivid-page-builder') .'</div>';
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="1"></span>';
								$columns .= '<div class="vivid-column-container dashicons"></div>';
															
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-1]" data-field="content-1" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-1'] : '') .'</textarea>';							
							$columns .= '</div>';						
							
						$columns .= '</div>';
						
						$columns .= '<input class="vivid-row-input" type="hidden" name="vivid-container-'. esc_attr($row_id) .'-columns['. esc_attr($row_counter) .'][type]" data-field="type" value="col-1">';
									  
					$columns .= '</div>';
					
				break;
	 
				case 'col-2':
					
					$columns .= '<div class="vivid-row col-2" data-template="col-2">';
					
						$columns .= '<div class="vivid-row-controls">';
							$columns .= '<span class="vivid-row-handle dashicons dashicons-move"></span>';
							$columns .= '<span class="vivid-row-remove dashicons dashicons-trash" title="'. esc_attr__('Delete Columns', 'vivid-page-builder') .'"></span>';
							$columns .= '<span class="vivid-clone-col dashicons dashicons-admin-page" title="'. esc_attr__('Clone Columns', 'vivid-page-builder') .'"></span>';
						$columns .= '</div>';
					
						$columns .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 1', 'vivid-page-builder') .'</div>';						
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="1"></span>';
								$columns .= '<div class="vivid-column-container dashicons"></div>';
															
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-1]" data-field="content-1" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-1'] : '') .'</textarea>';							
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 2', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="2"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-2]" data-field="content-2" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-2'] : '') .'</textarea>';							
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<input class="vivid-row-input" type="hidden" name="vivid-container-'. esc_attr($row_id) .'-columns['. esc_attr($row_counter) .'][type]" data-field="type" value="col-2">';
						
					$columns .= '</div>';
					
				break;
	 
				case 'col-3':
					
					$columns .= '<div class="vivid-row col-3" data-template="col-3">';
					
						$columns .= '<div class="vivid-row-controls">';
							$columns .= '<span class="vivid-row-handle dashicons dashicons-move"></span>';
							$columns .= '<span class="vivid-row-remove dashicons dashicons-trash" title="'. esc_attr__('Delete Columns', 'vivid-page-builder') .'"></span>';
							$columns .= '<span class="vivid-clone-col dashicons dashicons-admin-page" title="'. esc_attr__('Clone Columns', 'vivid-page-builder') .'"></span>';
						$columns .= '</div>';
					
						$columns .= '<div class="vivid-box box-lg-3 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 1', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="1"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-1]" data-field="content-1" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-1'] : '') .'</textarea>';						
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-3 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 2', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="2"></span>';
								$columns .= '<div class="vivid-column-container dashicons"></div>';
															
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-2]" data-field="content-2" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-2'] : '') .'</textarea>';						
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-3 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 3', 'vivid-page-builder') .'</div>';						
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="3"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-3]" data-field="content-3" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-3'] : '') .'</textarea>';					
							$columns .= '</div>';
							
						$columns .= '</div>';
			  
						$columns .= '<input class="vivid-row-input" type="hidden" name="vivid-container-'. esc_attr($row_id) .'-columns['. esc_attr($row_counter) .'][type]" data-field="type" value="col-3">';
						
					$columns .= '</div>';
					
				break;
				
				case 'col-4':
				
					$columns .= '<div class="vivid-row col-4" data-template="col-4">';
					
						$columns .= '<div class="vivid-row-controls">';
							$columns .= '<span class="vivid-row-handle dashicons dashicons-move"></span>';
							$columns .= '<span class="vivid-row-remove dashicons dashicons-trash" title="'. esc_attr__('Delete Columns', 'vivid-page-builder') .'"></span>';
							$columns .= '<span class="vivid-clone-col dashicons dashicons-admin-page" title="'. esc_attr__('Clone Columns', 'vivid-page-builder') .'"></span>';
						$columns .= '</div>';
					
						$columns .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 1', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="1"></span>';		
								$columns .= '<div class="vivid-column-container dashicons"></div>';
													
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-1]" data-field="content-1" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-1'] : '') .'</textarea>';				
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 2', 'vivid-page-builder') .'</div>';								
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="2"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-2]" data-field="content-2" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-2'] : '') .'</textarea>';				
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 3', 'vivid-page-builder') .'</div>';								
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="3"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-3]" data-field="content-3" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-3'] : '') .'</textarea>';				
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 4', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="4"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-4]" data-field="content-4" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-4'] : '') .'</textarea>';			
							$columns .= '</div>';
							
						$columns .= '</div>';
			  
						$columns .= '<input class="vivid-row-input" type="hidden" name="vivid-container-'. esc_attr($row_id) .'-columns['. esc_attr($row_counter) .'][type]" data-field="type" value="col-4">';
						
					$columns .= '</div>';
				
				break;
				
				case 'col-5':
				
					$columns .= '<div class="vivid-row col-5" data-template="col-5">';
					
						$columns .= '<div class="vivid-row-controls">';
							$columns .= '<span class="vivid-row-handle dashicons dashicons-move"></span>';
							$columns .= '<span class="vivid-row-remove dashicons dashicons-trash" title="'. esc_attr__('Delete Columns', 'vivid-page-builder') .'"></span>';
							$columns .= '<span class="vivid-clone-col dashicons dashicons-admin-page" title="'. esc_attr__('Clone Columns', 'vivid-page-builder') .'"></span>';
						$columns .= '</div>';
					
						$columns .= '<div class="vivid-box box-lg-5 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 1', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="1"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-1]" data-field="content-1" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-1'] : '') .'</textarea>';		
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-5 box-md-1 box-sm-1 box-xs-1">';
							
							$columns .= '<div class="vivid-column-elements-container">';		
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 2', 'vivid-page-builder') .'</div>';						
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="2"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-2]" data-field="content-2" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-2'] : '') .'</textarea>';			
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-5 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 3', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="3"></span>';
								$columns .= '<div class="vivid-column-container dashicons"></div>';
															
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-3]" data-field="content-3" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-3'] : '') .'</textarea>';		
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-5 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 4', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="4"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-4]" data-field="content-4" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-4'] : '') .'</textarea>';		
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-5 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 5', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="5"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-5]" data-field="content-5" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-5'] : '') .'</textarea>';			
							$columns .= '</div>';						
							
						$columns .= '</div>';
			 
						$columns .= '<input class="vivid-row-input" type="hidden" name="vivid-container-'. esc_attr($row_id) .'-columns['. esc_attr($row_counter) .'][type]" data-field="type" value="col-5">';
						
					$columns .= '</div>';
				
				break;
				
				case 'col-6':
				
					$columns .= '<div class="vivid-row col-6" data-template="col-6">';
					
						$columns .= '<div class="vivid-row-controls">';
							$columns .= '<span class="vivid-row-handle dashicons dashicons-move"></span>';
							$columns .= '<span class="vivid-row-remove dashicons dashicons-trash" title="'. esc_attr__('Delete Columns', 'vivid-page-builder') .'"></span>';
							$columns .= '<span class="vivid-clone-col dashicons dashicons-admin-page" title="'. esc_attr__('Clone Columns', 'vivid-page-builder') .'"></span>';
						$columns .= '</div>';
					
						$columns .= '<div class="vivid-box box-lg-6 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 1', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="1"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-1]" data-field="content-1" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-1'] : '') .'</textarea>';		
							$columns .= '</div>';						
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-3 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 2', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="2"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-2]" data-field="content-2" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-2'] : '') .'</textarea>';			
							$columns .= '</div>';
							
						$columns .= '</div>';
			 
						$columns .= '<input class="vivid-row-input" type="hidden" name="vivid-container-'. esc_attr($row_id) .'-columns['. esc_attr($row_counter) .'][type]" data-field="type" value="col-6">';
						
					$columns .= '</div>';
				
				break;
				
				case 'col-7':
				
					$columns .= '<div class="vivid-row col-7" data-template="col-7">';
					
						$columns .= '<div class="vivid-row-controls">';
							$columns .= '<span class="vivid-row-handle dashicons dashicons-move"></span>';
							$columns .= '<span class="vivid-row-remove dashicons dashicons-trash" title="'. esc_attr__('Delete Columns', 'vivid-page-builder') .'"></span>';
							$columns .= '<span class="vivid-clone-col dashicons dashicons-admin-page" title="'. esc_attr__('Clone Columns', 'vivid-page-builder') .'"></span>';
						$columns .= '</div>';
					
						$columns .= '<div class="vivid-box box-lg-3 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 1', 'vivid-page-builder') .'</div>';								
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="1"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-1]" data-field="content-1" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-1'] : '') .'</textarea>';
							$columns .= '</div>';						
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-6 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 2', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="2"></span>';
								$columns .= '<div class="vivid-column-container dashicons"></div>';
															
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-2]" data-field="content-2" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-2'] : '') .'</textarea>';	
							$columns .= '</div>';
							
						$columns .= '</div>';
			 
						$columns .= '<input class="vivid-row-input" type="hidden" name="vivid-container-'. esc_attr($row_id) .'-columns['. esc_attr($row_counter) .'][type]" data-field="type" value="col-7">';
						
					$columns .= '</div>';
				
				break;
				
				case 'col-8':
				
					$columns .= '<div class="vivid-row col-8" data-template="col-8">';
					
						$columns .= '<div class="vivid-row-controls">';
							$columns .= '<span class="vivid-row-handle dashicons dashicons-move"></span>';
							$columns .= '<span class="vivid-row-remove dashicons dashicons-trash" title="'. esc_attr__('Delete Columns', 'vivid-page-builder') .'"></span>';
							$columns .= '<span class="vivid-clone-col dashicons dashicons-admin-page" title="'. esc_attr__('Clone Columns', 'vivid-page-builder') .'"></span>';
						$columns .= '</div>';
					
						$columns .= '<div class="vivid-box box-lg-7 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 1', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="1"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-1]" data-field="content-1" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-1'] : '') .'</textarea>';
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';		
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 2', 'vivid-page-builder') .'</div>';						
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="2"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-2]" data-field="content-2" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-2'] : '') .'</textarea>';
							$columns .= '</div>';						
							
						$columns .= '</div>';
			 
						$columns .= '<input class="vivid-row-input" type="hidden" name="vivid-container-'. esc_attr($row_id) .'-columns['. esc_attr($row_counter) .'][type]" data-field="type" value="col-8">';
						
					$columns .= '</div>';
				
				break;
				
				case 'col-9':
				
					$columns .= '<div class="vivid-row col-9" data-template="col-9">';
					
						$columns .= '<div class="vivid-row-controls">';
							$columns .= '<span class="vivid-row-handle dashicons dashicons-move"></span>';
							$columns .= '<span class="vivid-row-remove dashicons dashicons-trash" title="'. esc_attr__('Delete Columns', 'vivid-page-builder') .'"></span>';
							$columns .= '<span class="vivid-clone-col dashicons dashicons-admin-page" title="'. esc_attr__('Clone Columns', 'vivid-page-builder') .'"></span>';
						$columns .= '</div>';
					
						$columns .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 1', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="1"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-1]" data-field="content-1" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-1'] : '') .'</textarea>';
							$columns .= '</div>';	
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-7 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 2', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="2"></span>';
								$columns .= '<div class="vivid-column-container dashicons"></div>';
															
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-2]" data-field="content-2" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-2'] : '') .'</textarea>';
							$columns .= '</div>';	
							
						$columns .= '</div>';
			 
						$columns .= '<input class="vivid-row-input" type="hidden" name="vivid-container-'. esc_attr($row_id) .'-columns['. esc_attr($row_counter) .'][type]" data-field="type" value="col-9">';
						
					$columns .= '</div>';
				
				break;
				
				case 'col-10':
				
					$columns .= '<div class="vivid-row col-10" data-template="col-10">';
					
						$columns .= '<div class="vivid-row-controls">';
							$columns .= '<span class="vivid-row-handle dashicons dashicons-move"></span>';
							$columns .= '<span class="vivid-row-remove dashicons dashicons-trash" title="'. esc_attr__('Delete Columns', 'vivid-page-builder') .'"></span>';
							$columns .= '<span class="vivid-clone-col dashicons dashicons-admin-page" title="'. esc_attr__('Clone Columns', 'vivid-page-builder') .'"></span>';
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 1', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="1"></span>';
								$columns .= '<div class="vivid-column-container dashicons"></div>';
															
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-1]" data-field="content-1" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-1'] : '') .'</textarea>';
							$columns .= '</div>';	
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1 vivid-magazine-column">';
							
							$columns .= '<div class="vivid-box magazine-half-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 2', 'vivid-page-builder') .'</div>';								
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="2"></span>';	
									$columns .= '<div class="vivid-column-container dashicons"></div>';
															
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-2]" data-field="content-2" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-2'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
							$columns .= '<div class="vivid-box magazine-half-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';	
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 3', 'vivid-page-builder') .'</div>';							
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="3"></span>';
									$columns .= '<div class="vivid-column-container dashicons"></div>';
																
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-3]" data-field="content-3" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-3'] : '') .'</textarea>';
								$columns .= '</div>';	
								
							$columns .= '</div>';
							
							$columns .= '<div class="vivid-box magazine-half-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';	
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 4', 'vivid-page-builder') .'</div>';							
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="4"></span>';	
									$columns .= '<div class="vivid-column-container dashicons"></div>';
															
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-4]" data-field="content-4" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-4'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
							$columns .= '<div class="vivid-box magazine-half-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';	
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 5', 'vivid-page-builder') .'</div>';							
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="5"></span>';
									$columns .= '<div class="vivid-column-container dashicons"></div>';
																
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-5]" data-field="content-5" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-5'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
						$columns .= '</div>';
			 
						$columns .= '<input class="vivid-row-input" type="hidden" name="vivid-container-'. esc_attr($row_id) .'-columns['. esc_attr($row_counter) .'][type]" data-field="type" value="col-10">';
						
					$columns .= '</div>';
				
				break;
				
				case 'col-11':
				
					$columns .= '<div class="vivid-row col-11" data-template="col-11">';
					
						$columns .= '<div class="vivid-row-controls">';
							$columns .= '<span class="vivid-row-handle dashicons dashicons-move"></span>';
							$columns .= '<span class="vivid-row-remove dashicons dashicons-trash" title="'. esc_attr__('Delete Columns', 'vivid-page-builder') .'"></span>';
							$columns .= '<span class="vivid-clone-col dashicons dashicons-admin-page" title="'. esc_attr__('Clone Columns', 'vivid-page-builder') .'"></span>';
						$columns .= '</div>';
						
						
						$columns .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1 vivid-magazine-column">';
							
							$columns .= '<div class="vivid-box magazine-half-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';	
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 1', 'vivid-page-builder') .'</div>';							
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="1"></span>';	
									$columns .= '<div class="vivid-column-container dashicons"></div>';
															
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-1]" data-field="content-1" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-1'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
							$columns .= '<div class="vivid-box magazine-half-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 2', 'vivid-page-builder') .'</div>';								
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="2"></span>';	
									$columns .= '<div class="vivid-column-container dashicons"></div>';
															
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-2]" data-field="content-2" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-2'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
							$columns .= '<div class="vivid-box magazine-half-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';	
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 3', 'vivid-page-builder') .'</div>';							
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="3"></span>';	
									$columns .= '<div class="vivid-column-container dashicons"></div>';
															
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-3]" data-field="content-3" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-3'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
							$columns .= '<div class="vivid-box magazine-half-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';	
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 4', 'vivid-page-builder') .'</div>';							
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="4"></span>';	
									$columns .= '<div class="vivid-column-container dashicons"></div>';
															
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-4]" data-field="content-4" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-4'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 5', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="5"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-5]" data-field="content-5" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-5'] : '') .'</textarea>';
							$columns .= '</div>';
							
						$columns .= '</div>';
			 
						$columns .= '<input class="vivid-row-input" type="hidden" name="vivid-container-'. esc_attr($row_id) .'-columns['. esc_attr($row_counter) .'][type]" data-field="type" value="col-11">';
						
					$columns .= '</div>';
				
				break;
				
				case 'col-12':
				
					$columns .= '<div class="vivid-row col-12" data-template="col-12">';
					
						$columns .= '<div class="vivid-row-controls">';
							$columns .= '<span class="vivid-row-handle dashicons dashicons-move"></span>';
							$columns .= '<span class="vivid-row-remove dashicons dashicons-trash" title="'. esc_attr__('Delete Columns', 'vivid-page-builder') .'"></span>';
							$columns .= '<span class="vivid-clone-col dashicons dashicons-admin-page" title="'. esc_attr__('Clone Columns', 'vivid-page-builder') .'"></span>';
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 1', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="1"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-1]" data-field="content-1" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-1'] : '') .'</textarea>';
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1 vivid-magazine-column">';
							
							$columns .= '<div class="vivid-box magazine-half-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 2', 'vivid-page-builder') .'</div>';								
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="2"></span>';	
									$columns .= '<div class="vivid-column-container dashicons"></div>';
															
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-2]" data-field="content-2" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-2'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
							$columns .= '<div class="vivid-box magazine-half-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 3', 'vivid-page-builder') .'</div>';								
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="3"></span>';	
									$columns .= '<div class="vivid-column-container dashicons"></div>';
															
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-3]" data-field="content-3" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-3'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
						$columns .= '</div>';               
			 
						$columns .= '<input class="vivid-row-input" type="hidden" name="vivid-container-'. esc_attr($row_id) .'-columns['. esc_attr($row_counter) .'][type]" data-field="type" value="col-12">';
						
					$columns .= '</div>';
				
				break;
				
				case 'col-13':
				
					$columns .= '<div class="vivid-row col-13" data-template="col-13">';
					
						$columns .= '<div class="vivid-row-controls">';
							$columns .= '<span class="vivid-row-handle dashicons dashicons-move"></span>';
							$columns .= '<span class="vivid-row-remove dashicons dashicons-trash" title="'. esc_attr__('Delete Columns', 'vivid-page-builder') .'"></span>';
							$columns .= '<span class="vivid-clone-col dashicons dashicons-admin-page" title="'. esc_attr__('Clone Columns', 'vivid-page-builder') .'"></span>';
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1 vivid-magazine-column">';
							
							$columns .= '<div class="vivid-box magazine-half-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 1', 'vivid-page-builder') .'</div>';								
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="1"></span>';	
									$columns .= '<div class="vivid-column-container dashicons"></div>';
															
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-1]" data-field="content-1" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-1'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
							$columns .= '<div class="vivid-box magazine-half-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 2', 'vivid-page-builder') .'</div>';								
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="2"></span>';
									$columns .= '<div class="vivid-column-container dashicons"></div>';
																
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-2]" data-field="content-2" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-2'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 3', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="3"></span>';	
								$columns .= '<div class="vivid-column-container dashicons"></div>';
														
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-3]" data-field="content-3" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-3'] : '') .'</textarea>';
							$columns .= '</div>';
							
						$columns .= '</div>';               
			 
						$columns .= '<input class="vivid-row-input" type="hidden" name="vivid-container-'. esc_attr($row_id) .'-columns['. esc_attr($row_counter) .'][type]" data-field="type" value="col-13">';
						
					$columns .= '</div>';
				
				break;
				
				case 'col-14':
				
					$columns .= '<div class="vivid-row col-14" data-template="col-14">';
					
						$columns .= '<div class="vivid-row-controls">';
							$columns .= '<span class="vivid-row-handle dashicons dashicons-move"></span>';
							$columns .= '<span class="vivid-row-remove dashicons dashicons-trash" title="'. esc_attr__('Delete Columns', 'vivid-page-builder') .'"></span>';
							$columns .= '<span class="vivid-clone-col dashicons dashicons-admin-page" title="'. esc_attr__('Clone Columns', 'vivid-page-builder') .'"></span>';
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 1', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="1"></span>';
								$columns .= '<div class="vivid-column-container dashicons"></div>';
															
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-1]" data-field="content-1" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-1'] : '') .'</textarea>';
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-8 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';	
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 2', 'vivid-page-builder') .'</div>';							
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="2"></span>';
								$columns .= '<div class="vivid-column-container dashicons"></div>';
															
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-2]" data-field="content-2" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-2'] : '') .'</textarea>';
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1">';
						
							$columns .= '<div class="vivid-column-elements-container">';
								$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 3', 'vivid-page-builder') .'</div>';								
								$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="3"></span>';
								$columns .= '<div class="vivid-column-container dashicons"></div>';
															
								//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-3]" data-field="content-3" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-3'] : '') .'</textarea>';
							$columns .= '</div>';
							
						$columns .= '</div>';
			 
						$columns .= '<input class="vivid-row-input" type="hidden" name="vivid-container-'. esc_attr($row_id) .'-columns['. esc_attr($row_counter) .'][type]" data-field="type" value="col-14">';
						
					$columns .= '</div>';
				
				break;
				
				case 'col-15':
				
					$columns .= '<div class="vivid-row col-15" data-template="col-15">';
					
						$columns .= '<div class="vivid-row-controls">';
							$columns .= '<span class="vivid-row-handle dashicons dashicons-move"></span>';
							$columns .= '<span class="vivid-row-remove dashicons dashicons-trash" title="'. esc_attr__('Delete Columns', 'vivid-page-builder') .'"></span>';
							$columns .= '<span class="vivid-clone-col dashicons dashicons-admin-page" title="'. esc_attr__('Clone Columns', 'vivid-page-builder') .'"></span>';
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1 vivid-magazine-column">';
					
							$columns .= '<div class="vivid-box magazine-full-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 1', 'vivid-page-builder') .'</div>';								
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="1"></span>';	
									$columns .= '<div class="vivid-column-container dashicons"></div>';
															
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-1]" data-field="content-1" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-1'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
							$columns .= '<div class="vivid-box magazine-full-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 2', 'vivid-page-builder') .'</div>';								
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="2"></span>';	
									$columns .= '<div class="vivid-column-container dashicons"></div>';
															
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-2]" data-field="content-2" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-2'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
							$columns .= '<div class="vivid-box magazine-full-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';	
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 3', 'vivid-page-builder') .'</div>';							
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="3"></span>';	
									$columns .= '<div class="vivid-column-container dashicons"></div>';
															
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-3]" data-field="content-3" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-3'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-8 box-md-1 box-sm-1 box-xs-1 vivid-magazine-column">';
							
							$columns .= '<div class="vivid-box magazine-full-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';	
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 4', 'vivid-page-builder') .'</div>';							
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="4"></span>';
									$columns .= '<div class="vivid-column-container dashicons"></div>';
																
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-4]" data-field="content-4" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-4'] : '') .'</textarea>';
								$columns .= '</div>';							
								
							$columns .= '</div>';
							
							$columns .= '<div class="vivid-box magazine-half-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';	
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 5', 'vivid-page-builder') .'</div>';							
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="5"></span>';	
									$columns .= '<div class="vivid-column-container dashicons"></div>';
															
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-5]" data-field="content-5" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-5'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
							$columns .= '<div class="vivid-box magazine-half-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 6', 'vivid-page-builder') .'</div>';								
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="6"></span>';	
									$columns .= '<div class="vivid-column-container dashicons"></div>';
															
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-6]" data-field="content-6" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-6'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
						$columns .= '</div>';
						
						$columns .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1 vivid-magazine-column">';
							
							$columns .= '<div class="vivid-box magazine-full-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 7', 'vivid-page-builder') .'</div>';								
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="7"></span>';
									$columns .= '<div class="vivid-column-container dashicons"></div>';
																
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-7]" data-field="content-7" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-7'] : '') .'</textarea>';
								$columns .= '</div>';	
								
							$columns .= '</div>';
							
							$columns .= '<div class="vivid-box magazine-full-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';	
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 8', 'vivid-page-builder') .'</div>';							
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="8"></span>';	
									$columns .= '<div class="vivid-column-container dashicons"></div>';
															
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-8]" data-field="content-8" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-8'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
							$columns .= '<div class="vivid-box magazine-full-column">';
							
								$columns .= '<div class="vivid-column-elements-container">';
									$columns .= '<div class="vivid-col-number">'. esc_attr__('Column 9', 'vivid-page-builder') .'</div>';								
									$columns .= '<span class="vivid-col-options dashicons dashicons dashicons-edit" title="'. esc_attr__('Edit Column', 'vivid-page-builder') .'" data-column-id="9"></span>';	
									$columns .= '<div class="vivid-column-container dashicons"></div>';
															
									//$columns .= '<textarea class="vivid-row-content" name="vivid-container-'. esc_attr($row_id) .'-content['. esc_attr($row_counter) .'][content-9]" data-field="content-9" placeholder="'. esc_attr__('Add widget', 'vivid-page-builder') .'">'. ($row_data !== '' ? $row_data['content'][$row_counter]['content-9'] : '') .'</textarea>';
								$columns .= '</div>';
								
							$columns .= '</div>';
							
						$columns .= '</div>';
			 
						$columns .= '<input class="vivid-row-input" type="hidden" name="vivid-container-'. esc_attr($row_id) .'-columns['. esc_attr($row_counter) .'][type]" data-field="type" value="col-15">';
						
					$columns .= '</div>';
				
				break;
	 
				default:
					$columns = null;
				break;
	 
			}
	 
			return $columns;
	 
		}
	 
	}
	
}



?>