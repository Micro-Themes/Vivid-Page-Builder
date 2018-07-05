<?php
/* Page Builder Class */

//Fetch column controls and columns from Column_Factory class
include_once( 'classes/factories/column-factory.php' );

//Fetch panel ui tab buttons and tab content
include_once( 'classes/factories/panel-factory.php' );

if ( !class_exists( 'Vivid_Page_Builder' ) ) {
	
	class Vivid_Page_Builder {
		
		//Private classes for object creation
		private $column_factory;
		private $panel_factory;
		
		//Constructor
		public function __construct() {
						
			//Classes
			$this->column_factory = new Column_Factory();
			
			$this->panel_factory = new Panel_Factory();
			
			//Text domain
			add_action( 'init', array( $this, 'pm_ln_load_languages' ) );
			
			//Insert editor toggle
			add_action( 'edit_form_after_title', array( $this, 'pm_ln_edit_form_after_title' ) );
			
			//Add page builder form after editor
			add_action( 'edit_form_after_editor', array( $this, 'pm_ln_editor_callback' ), 10, 2 );
			
			//Admin Scripts/Styles
			add_action( 'admin_enqueue_scripts', array( $this, 'pm_ln_admin_scripts' ) );
			
			//Body class filter 
			add_filter( 'admin_body_class', array( $this, 'pm_ln_admin_body_class_filter' ) );
			
			//Google fonts preconnect
			add_filter( 'wp_resource_hints', array( $this, 'pm_ln_resource_hints' ), 10, 2 );
			
			//Save post meta on the 'save_post' hook
			add_action( 'save_post', array( $this, 'pm_ln_save_post' ), 10, 2 );
			
			//Ajax calls
			add_action('wp_ajax_nopriv_pm_ln_load_panel_ui', array( $this, 'pm_ln_load_panel_ui' ) );
			add_action('wp_ajax_pm_ln_load_panel_ui', array( $this, 'pm_ln_load_panel_ui' ));
			
			
		}//end of __construct
		
		//TEXT DOMAIN
		public function pm_ln_load_languages() { 
			load_plugin_textdomain( 'vivid-page-builder', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
		} 
		
		//GOOGLE FONTS PRE-CONNECT
		public function pm_ln_resource_hints( $urls, $relation_type ) {
			if ( wp_style_is( 'pm_ln_theme-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
				$urls[] = array(
					'href' => 'https://fonts.gstatic.com',
					'crossorigin',
				);
			}
		
			return $urls;
		}
		
		//ADMIN SCRIPTS
		public function pm_ln_admin_scripts( $hook_suffix ){
		
			global $post_type;
		
			/* In Page Edit Screen */
			if( 'page' == $post_type && in_array( $hook_suffix, array( 'post.php', 'post-new.php' ) ) ){		
		
				// Enqueue CSS
				wp_enqueue_style( 'vivid-main-css', VIVID_BASE_URI. 'assets/admin/css/main.css', array(), VIVID_BASE_VERSION );
				wp_enqueue_style( 'jquery-ui', 'http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css', array(), VIVID_BASE_VERSION );
				wp_enqueue_style( 'custom-scrollbar', VIVID_BASE_URI. 'assets/admin/js/custom-scrollbar/jquery.mCustomScrollbar.css', array(), VIVID_BASE_VERSION );
				wp_enqueue_style( 'wow', VIVID_BASE_URI. 'assets/admin/js/wow/css/libs/animate.css', array(), VIVID_BASE_VERSION );
				
				// Enqueue JS
				wp_enqueue_script( 'vivid-admin-editor-toggle', VIVID_BASE_URI . 'assets/admin/js/admin-editor-toggle.js', array( 'jquery' ), VIVID_BASE_VERSION );
				wp_enqueue_script( 'vivid-admin-js', VIVID_BASE_URI. 'assets/admin/js/admin-page-builder.js', array( 'jquery', 'jquery-ui-sortable', 'jquery-ui-draggable', 'jquery-ui-resizable' ), VIVID_BASE_VERSION, true );
				
				wp_enqueue_script( 'custom-scrollbar', VIVID_BASE_URI . 'assets/admin/js/custom-scrollbar/jquery.mCustomScrollbar.min.js', array( 'jquery' ), VIVID_BASE_VERSION );
				wp_enqueue_script( 'wow', VIVID_BASE_URI . 'assets/admin/js/wow/wow.min.js', array( 'jquery' ), VIVID_BASE_VERSION );
				
				wp_enqueue_script( 'ace_code_highlighter_js', VIVID_BASE_URI . 'assets/admin/js/ace-builds/src-noconflict/ace.js', '', '1.0.0', true );
				
				// jQuery classes
				wp_enqueue_script( 'panel-ui', VIVID_BASE_URI . 'assets/admin/js/_vivid-panel-class.js', array( 'jquery' ), VIVID_BASE_VERSION );
		
				// Google Fonts
				wp_enqueue_style( 'pm-ln-theme-fonts', $this->pm_ln_fonts_url(), array(), null );
				
				//Codestar colorpicker
				wp_enqueue_style( 'wp-color-picker' );
				wp_enqueue_style( 'cs-wp-color-picker', VIVID_BASE_URI. 'assets/admin/js/codestar/css/cs-wp-color-picker.min.css', array( 'wp-color-picker' ), '1.0.0', 'all' );
			
				wp_enqueue_script( 'wp-color-picker' );
				wp_enqueue_script( 'cs-wp-color-picker', VIVID_BASE_URI . 'assets/admin/js/codestar/js/cs-wp-color-picker.min.js', array( 'wp-color-picker' ), '1.0.0', true );
								
			
				//Define AJAX URL and pass to JS
				$js_file = VIVID_BASE_URI . 'assets/admin/js/wordpress.js'; 
				
				wp_enqueue_script( 'pm_ln_register_script', $js_file );
					$array = array( 
						'pm_ln_ajax_url' => admin_url('admin-ajax.php'),
						'pm_ln_nonce' => wp_create_nonce('pm_ln_nonce'),
				);
					
				wp_localize_script( 'pm_ln_register_script', 'pm_ln_register_vars', $array );	
		
			}
		
		}
		
		//GOOGLE FONTS
		public function pm_ln_fonts_url() {
		
			$fonts_url = '';
			 
			$Montserrat_font = _x( 'on', 'Montserrat font: on or off', 'pro-cast-theme' );
			$Open_sans_font = _x( 'on', 'Open Sans font: on or off', 'pro-cast-theme' );
			$Source_sans_pro_font = _x( 'on', 'Source Sans Pro font: on or off', 'pro-cast-theme' );
			$Merrirweather_font = _x( 'on', 'Merrirweather font: on or off', 'pro-cast-theme' );
			$Worksans_font = _x( 'on', 'Worksans font: on or off', 'pro-cast-theme' );
			$Lato_font = _x( 'on', 'Lato font: on or off', 'pro-cast-theme' );
			
			$font_families = array();
		
			if ( 'off' !== $Montserrat_font ) {
				$font_families[] = 'Montserrat:400,700';
			}
			
			if ( 'off' !== $Merrirweather_font ) {
				$font_families[] = 'Merriweather:300,300i,400,400i,700,700i,900,900i';
			}
			
			if ( 'off' !== $Worksans_font ) {
				$font_families[] = 'Work+Sans:100,200,300,400,500,600,700,800,900';
			}
			
			if ( 'off' !== $Open_sans_font ) {
				$font_families[] = 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic';
			}
			
			if ( 'off' !== $Source_sans_pro_font ) {
				$font_families[] = 'Source Sans Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic';
			}
			
			if ( 'off' !== $Lato_font ) {
				$font_families[] = 'Lato:100,100i,300,300i,400,400i,700,700i';
			}		
			
			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);
		
			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		
			return esc_url_raw( $fonts_url );
		}
		
		
		//EDITOR ACTIVATION TOGGLE
		public function pm_ln_edit_form_after_title($post) {
			
			if( 'page' !== $post->post_type ){
				return;
			}
			
			if( isset($_GET['post']) ) {
				
				//Existing post
				$post_id = $_GET['post'];	
				$page_builder_active = get_post_meta( $post_id, 'page_builder_active', true );	
				
				echo '<div class="vivid-pb-action-buttons-container">';
				
					if( $page_builder_active  === 'active' ) {
						
						echo '<button id="vivid_pb_toggle" class="vivid_pb_button button button-primary button-large active">'. esc_attr__('Disable Classic Editor', 'vivid-page-builder') .'</button>';
						
						echo '<button id="vivid_pb_import" class="vivid_pb_button vivid_pb_import button button-primary button-large dashicons dashicons-arrow-down-alt active" title="'. esc_attr__('Import Template', 'vivid-page-builder') .'"></button>';
						echo '<button id="vivid_pb_export" class="vivid_pb_button vivid_pb_export button button-primary button-large dashicons dashicons-external active" title="'. esc_attr__('Export Template', 'vivid-page-builder') .'"></button>';
						
						echo '<button id="vivid_pb_save_template" class="vivid_pb_button vivid_pb_save_template button button-primary button-large dashicons 
		dashicons-image-rotate-left active" title="'. esc_attr__('Save Template', 'vivid-page-builder') .'"></button>';
		
						echo '<button id="vivid_pb_load_template" class="vivid_pb_button vivid_pb_load_template button button-primary button-large dashicons 
		dashicons-admin-customizer active" title="'. esc_attr__('Load Template', 'vivid-page-builder') .'"></button>';
		
						echo '<button id="vivid_pb_custom_css" class="vivid_pb_button vivid_pb_load_template button button-primary button-large dashicons 
		dashicons dashicons-edit active" title="'. esc_attr__('Custom CSS', 'vivid-page-builder') .'"></button>';
						
						
					} else {
						
						echo '<button id="vivid_pb_toggle" class="vivid_pb_button button button-primary button-large">'. esc_attr__('Vivid Classic Editor', 'vivid-page-builder') .'</button>';
						
						echo '<button id="vivid_pb_import" class="vivid_pb_button vivid_pb_import button button-primary button-large dashicons dashicons-arrow-down-alt" title="'. esc_attr__('Import Template', 'vivid-page-builder') .'"></button>';
						echo '<button id="vivid_pb_export" class="vivid_pb_button vivid_pb_export button button-primary button-large dashicons dashicons-external" title="'. esc_attr__('Export Template', 'vivid-page-builder') .'"></button>';
						
						echo '<button id="vivid_pb_save_template" class="vivid_pb_button vivid_pb_save_template button button-primary button-large dashicons 
		dashicons-image-rotate-left" title="'. esc_attr__('Save Template', 'vivid-page-builder') .'"></button>';
		
						echo '<button id="vivid_pb_load_template" class="vivid_pb_button vivid_pb_load_template button button-primary button-large dashicons 
		dashicons-admin-customizer" title="'. esc_attr__('Load Template', 'vivid-page-builder') .'"></button>';
		
						echo '<button id="vivid_pb_custom_css" class="vivid_pb_button vivid_pb_load_template button button-primary button-large dashicons 
		dashicons dashicons-edit active" title="'. esc_attr__('Custom CSS', 'vivid-page-builder') .'"></button>';
						
					}
				
				echo '</div>';
				
			} else {
			
				//New unsaved post
				echo '<button id="vivid_pb_toggle" class="vivid_pb_button button button-primary button-large">'. esc_attr__('Vivid Classic Editor', 'vivid-page-builder') .'</button>';
				
			}
			
			
		}
		
		//BODY CLASS FILTER
		public function pm_ln_admin_body_class_filter( $classes ){
			
			if( isset($_GET['post']) ) {
				
				$post_id = $_GET['post'];	
				$page_builder_active = get_post_meta( $post_id, 'page_builder_active', true );	
				
				if($page_builder_active) {
					$page_builder_class = 'vivid-page-builder-' . $page_builder_active;
				} else {
					$page_builder_class = 'vivid-page-builder-inactive';
				}
					
				return "$classes $page_builder_class";
				
			} else {
				return $classes;	
			}	
			
		}
		
		//ADD PAGE BUILDER CONTROL
		public function pm_ln_editor_callback( $post ){
		
			if( 'page' !== $post->post_type ){
				return;
			}
			
			$page_builder_active = get_post_meta( $post->ID, 'page_builder_active', true );
		
			?>
		
			<div class="vivid-page-builder-wrapper<?php echo $page_builder_active === 'active' ? ' active' : '' ?>" id="vivid-page-builder">
		
				<!-- RENDER ROWS -->
				<div class="vivid-rows" id="vivid-rows">
					<?php $this->pm_ln_render_rows( $post ); // check if we have saved data or else display empty message ?>
				</div>
				<!-- RENDER ROWS END -->
		
				<!-- EDITOR ACTION BUTTONS -->
				<div class="vivid-actions">
					<a href="#" class="vivid-add-row button-primary button-large" data-template="col-1"><?php esc_attr_e('Add Row', 'vivid-page-builder') ?></a>
				</div>
				<!-- EDITOR ACTION BUTTONS END -->
		
				<input type="hidden" name="page_builder_active" id="page_builder_active" value="<?php echo isset($page_builder_active) ? $page_builder_active : 'inactive'; ?>" />
		
				<?php wp_nonce_field( "vivid_nonce_action", "vivid_nonce" ) ?>
		
				<!-- RENDER TEMPLATES -->
				<div class="vivid-templates" id="vivid-templates">
		
					<!-- CONTAINER TEMPLATE -->
					<div class="vivid-container" data-row="0">
		
						<?php echo $this->get_column_controls(); ?>
		
						<p class="vivid-default-message"><?php esc_attr_e('Insert columns', 'vivid-page-builder') ?></p>
						
						<input class="vivid-container-input" type="hidden" name="" data-field="type" value="">
		
					</div>
					<!-- CONTAINER TEMPLATE END -->
					
					<!-- STANDARD COLUMNS -->
                    <?php
                    	echo $this->get_column('col-1');
						echo $this->get_column('col-2');
						echo $this->get_column('col-3');
						echo $this->get_column('col-4');
						echo $this->get_column('col-5');
						echo $this->get_column('col-6');
						echo $this->get_column('col-7');
						echo $this->get_column('col-8');
						echo $this->get_column('col-9');
					?>
					<!-- STANDARD COLUMNS END -->  
					
					<!-- MAGAZINE COLUMNS --> 
					<?php
						echo $this->get_column('col-10');
						echo $this->get_column('col-11');
						echo $this->get_column('col-12');
						echo $this->get_column('col-13');
						echo $this->get_column('col-14');
						echo $this->get_column('col-15');
					?>
					<!-- MAGAZINE COLUMNS END --> 
		
				</div><!-- .vivid-templates -->
				<!-- TEMPLATES END -->
                
                <!-- UI PANEL WINDOW -->
                <div class="vivid-ui-panel-window" data-row="0" data-column="0" data-panel-type="null">
                
                    <div class="vivid-ui-panel-window-header">                    
                        <div class="vivid-ui-panel-window-handle dashicons dashicons-move"></div>                    
                        <p class="vivid-ui-panel-window-title"></p>                                                
                        <div class="vivid-ui-panel-window-action-buttons">
                            <a href="#" class="dashicons dashicons-edit" id="vivid-ui-panel-save-preset" title="<?php esc_attr_e('Element Settings', 'vivid-page-builder'); ?>"></a>
                            <a href="#" class="dashicons dashicons-minus" id="vivid-ui-panel-minimize" title="<?php esc_attr_e('Minimize', 'vivid-page-builder'); ?>"></a>
                            <a href="#" class="dashicons dashicons-no-alt" id="vivid-ui-panel-close" title="<?php esc_attr_e('Close', 'vivid-page-builder'); ?>"></a>
                            
                            <div class="vivid-ui-panel-preset-menu" id="vivid-ui-panel-preset-menu">
                                <ul class="vivid-ui-panel-menu-list">
                                    <li><button id="vivid-save-preset-btn"><?php esc_attr_e('Save as preset', 'vivid-page-builder'); ?></button></li>
                                    <li><button id="vivid-default-preset-btn"><?php esc_attr_e('Set as default', 'vivid-page-builder'); ?></button></li>
                                    <li><button id="vivid-restore-preset-btn"><?php esc_attr_e('Restore default', 'vivid-page-builder'); ?></button></li>
                                    <li><button id="vivid-view-presets-btn"><?php esc_attr_e('View presets', 'vivid-page-builder'); ?></button></li>
                                </ul>
                            </div>
                            
                        </div>  
                                                            
                    </div>                    
                    
                    <!-- Preloader -->
                    <div class="vivid-ui-panel-preloader" id="vivid-ui-panel-preloader">
                    	<div class="sk-cube-grid">
                          <div class="sk-cube sk-cube1"></div>
                          <div class="sk-cube sk-cube2"></div>
                          <div class="sk-cube sk-cube3"></div>
                          <div class="sk-cube sk-cube4"></div>
                          <div class="sk-cube sk-cube5"></div>
                          <div class="sk-cube sk-cube6"></div>
                          <div class="sk-cube sk-cube7"></div>
                          <div class="sk-cube sk-cube8"></div>
                          <div class="sk-cube sk-cube9"></div>
                        </div>
                    </div>
                    
                    <!-- Panel data gets loaded into this container -->
                    <div id="vivid-ui-data-container"></div>
                    
                    <div class="vivid-ui-panel-window-footer-buttons">
                        <a href="#" class="vivid-ui-panel-footer-button" data-action="close"><?php esc_attr_e('Close', 'vivid-page-builder'); ?></a>
                        <a href="#" class="vivid-ui-panel-footer-button" data-action="save"><?php esc_attr_e('Save changes', 'vivid-page-builder'); ?></a>
                    </div>
                
                </div>                              
                <!-- UI PANEL WINDOW END -->
		
			</div><!-- .vivid-page-builder -->
		<?php
		}
		
		//COLUMN FACTORY FUNCTIONS
		public function get_column_controls($row_id = 0) {			
			return $this->column_factory->get_column_controls($row_id);				
		}
		
		public function get_column($col_type, $row_id = 0, $row_counter = 0, $row_data = '') {			
			return $this->column_factory->get_column($col_type, $row_id, $row_counter, $row_data);				
		}
		
		//PANEL FACTORY FUNCTIONS
		public function get_ui_panel($panel_type = '', $data = null) {			
			return $this->panel_factory->get_ui_panel($panel_type, $data);
		}
		
		//SAVE PAGE BUILDER DATA
		public function pm_ln_save_post( $post_id, $post ){
		
			//Stripslashes Submitted Data
			$request = stripslashes_deep( $_POST );
		
			//Verify/validate 
			if ( ! isset( $request['vivid_nonce'] ) || ! wp_verify_nonce( $request['vivid_nonce'], 'vivid_nonce_action' ) ){
				return $post_id;
			}
			//Do not save on autosave
			if ( defined('DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return $post_id;
			}
			//Check post type and user caps
			$post_type = get_post_type_object( $post->post_type );
			if ( 'page' != $post->post_type || !current_user_can( $post_type->cap->edit_post, $post_id ) ){
				return $post_id;
			}
		
			//Track if page builder is active so we can load it upon page load/reload
			if( isset( $request['page_builder_active'] ) ){
				
				$page_builder_active = get_post_meta( $post_id, 'page_builder_active', true );
						
				if( isset($page_builder_active) ) {
					update_post_meta( $post_id, 'page_builder_active', $request['page_builder_active'] );
				} else {
					add_post_meta( $post_id, 'page_builder_active', $request['page_builder_active'], false );
				}
				
			}
		
			//Save, Delete, or Update Page Builder Data
			
			//Get existing saved page builder data 
			$saved_data = get_post_meta( $post_id, 'vivid', true );
			
			//Store data into structured array
			$vivid_data = array();
			
			//Save containers and textarea content
			if( isset($request['vivid-container']) ) {
				
				$counter = 0;
									
				foreach($request['vivid-container'] as $container){
					
					$columnsDataName = 'vivid-container-'.($counter+1).'-columns';
					$contentDataName = 'vivid-container-'.($counter+1).'-content';
					
					if( isset($request[$columnsDataName] ) ) {
						
						$vivid_data[$counter] = array(
													'type' => $request[$columnsDataName], 
													'content' => $request[$contentDataName]
													);	
						
					} else {
						
						$vivid_data[$counter] = array(
													'type' => 'null', 
													'content' => 'null'
													);	
						
					}
									
					$counter++;	
									
				}
				
			}
					
			//Save, update or delete page builder data
			
			if ( $saved_data == '' ){ //New data submitted, No previous data, create it
			
				add_post_meta( $post_id, 'vivid', $vivid_data, true );
				
			} elseif(  $vivid_data != $saved_data  ){ //New data submitted, but it's different data than previously stored data, update it
			
				update_post_meta( $post_id, 'vivid', $vivid_data );
				
			} elseif ( empty( $vivid_data ) && $saved_data ){//New data submitted is empty, but there's old data available, delete it
				
				delete_post_meta( $post_id, 'vivid' );
				
			}
			 
			//Save page builder data as post content
			$vivid_content = $this->pm_ln_format_post_content_data( $vivid_data );
		 
			//Save page builder data as post content data for visual editor output
			$this_post = array(
				'ID'           => $post_id,
				'post_content' => sanitize_post_field( 'post_content', $vivid_content, $post_id, 'db' ),
			);
		
			remove_action( 'save_post', array( $this, 'pm_ln_save_post' ) );
			wp_update_post( $this_post );
			add_action( 'save_post', array( $this, 'pm_ln_save_post' ) );
		
		}
		
		// Format page builder content for post content - save content only for clean output
		public function pm_ln_format_post_content_data( $row_datas ){
		
			/* return if no rows data */
			if( !$row_datas ){
				return '';
			}
		
			/* Output */
			$content = '';
		
			foreach( $row_datas as $container_id => $row_data ){
		
				  if( $row_data['type'] !== 'null' ) {
				
					 $rowCounter = 1;
				
					 foreach( $row_data['type'] as $row ) {
				
						switch ($row['type']) {
					
						   case 'col-1' :
								$content .= $row_data['content'][$rowCounter]['content-1'];
						   break;
					
						   case 'col-2' :
								$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= $row_data['content'][$rowCounter]['content-2'];
						   break;
					
						   case 'col-3' :
								$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= $row_data['content'][$rowCounter]['content-2'];
								$content .= $row_data['content'][$rowCounter]['content-3'];
						   break;
					
						   case 'col-4' :
								$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= $row_data['content'][$rowCounter]['content-2'];
								$content .= $row_data['content'][$rowCounter]['content-3'];
								$content .= $row_data['content'][$rowCounter]['content-4'];
						   break;
					
						   case 'col-5' :
								$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= $row_data['content'][$rowCounter]['content-2'];
								$content .= $row_data['content'][$rowCounter]['content-3'];
								$content .= $row_data['content'][$rowCounter]['content-4'];
								$content .= $row_data['content'][$rowCounter]['content-5'];
						   break;
						   
						   case 'col-6' :
								$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= $row_data['content'][$rowCounter]['content-2'];
						   break;
						   
						   case 'col-7' :
								$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= $row_data['content'][$rowCounter]['content-2'];
						   break;
						   
						   case 'col-8' :
								$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= $row_data['content'][$rowCounter]['content-2'];
						   break;
						   
						   case 'col-9' :
								$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= $row_data['content'][$rowCounter]['content-2'];
						   break;
						   
						   case 'col-10' :
								$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= $row_data['content'][$rowCounter]['content-2'];
								$content .= $row_data['content'][$rowCounter]['content-3'];
								$content .= $row_data['content'][$rowCounter]['content-4'];
								$content .= $row_data['content'][$rowCounter]['content-5'];
						   break;
						   
						   case 'col-11' :
								$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= $row_data['content'][$rowCounter]['content-2'];
								$content .= $row_data['content'][$rowCounter]['content-3'];
								$content .= $row_data['content'][$rowCounter]['content-4'];
								$content .= $row_data['content'][$rowCounter]['content-5'];
						   break;
						   
						   case 'col-12' :
								$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= $row_data['content'][$rowCounter]['content-2'];
								$content .= $row_data['content'][$rowCounter]['content-3'];
						   break;
						   
						   case 'col-13' :
								$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= $row_data['content'][$rowCounter]['content-2'];
								$content .= $row_data['content'][$rowCounter]['content-3'];
						   break;
						   
						   case 'col-14' :
								$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= $row_data['content'][$rowCounter]['content-2'];
								$content .= $row_data['content'][$rowCounter]['content-3'];
						   break;
						   
						   case 'col-15' :
								$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= $row_data['content'][$rowCounter]['content-2'];
								$content .= $row_data['content'][$rowCounter]['content-3'];
								$content .= $row_data['content'][$rowCounter]['content-4'];
								$content .= $row_data['content'][$rowCounter]['content-5'];
								$content .= $row_data['content'][$rowCounter]['content-6'];
								$content .= $row_data['content'][$rowCounter]['content-7'];
								$content .= $row_data['content'][$rowCounter]['content-8'];
								$content .= $row_data['content'][$rowCounter]['content-9'];
						   break;
					
						}//end switch
						
						$rowCounter++;
				
					 }//end foreach
				
				  }//end if
				
				}//end foreach
			
			return $content;
		}
		
		public function pm_ln_render_rows( $post ){

			//Get saved rows data 
			$row_datas = get_post_meta( $post->ID, 'vivid', true );
				
			//Use this view saved data structure
			//print "<pre>";
			//print_r($row_datas);
			//print "</pre>";
		
			//Default Message
			$default_message = esc_attr__('Insert Rows', 'vivid-page-builder');
		
			//Return if no rows data
			if( !$row_datas ){
				
				echo '<p class="vivid-rows-message">' . $default_message . '</p>';
				return;
				
			} else { //Data available, hide default notice
			
				echo '<p class="vivid-rows-message" style="display:none;">' . $default_message . '</p>';
				
			}
		
			//Loop for each rows 
			foreach( $row_datas as $container_id => $row_data ){
				
				$container_id = intval( $container_id );
				$row_id = $container_id + 1;
		
				?>
				<div class="vivid-container" id="vivid-container-<?php echo esc_attr($row_id); ?>" data-row="<?php echo esc_attr($row_id); ?>">
		
					<?php echo $this->get_column_controls($row_id); ?>
		
					<!-- COLUMN DATA -->
					<?php if( $row_data['type'] !== 'null' ) { ?>
					
						<!-- Display columns -->
						<?php 
										
							$rowCounter = 1;
										
							foreach( $row_data['type'] as $row ) {
								
								switch ($row['type']) {
								
									case 'col-1' :
									
										echo $this->get_column('col-1', $row_id, $rowCounter, $row_data);
									
									break;
									
									case 'col-2' :
									
										echo $this->get_column('col-2', $row_id, $rowCounter, $row_data);
									
									break;
									
									case 'col-3' :
									
										echo $this->get_column('col-3', $row_id, $rowCounter, $row_data);
									
									break;
									
									case 'col-4' :
									
										echo $this->get_column('col-4', $row_id, $rowCounter, $row_data);
									
									break;
									
									case 'col-5' :
									
										echo $this->get_column('col-5', $row_id, $rowCounter, $row_data);
									
									break;
									
									
									case 'col-6' :
									
										echo $this->get_column('col-6', $row_id, $rowCounter, $row_data);
									
									break;
									
									
									case 'col-7' :
									
										echo $this->get_column('col-7', $row_id, $rowCounter, $row_data);
									
									break;
									
									case 'col-8' :
									
										echo $this->get_column('col-8', $row_id, $rowCounter, $row_data);
									
									break;
									
									case 'col-9' :
									
										echo $this->get_column('col-9', $row_id, $rowCounter, $row_data);
									
									break;
									
									
									case 'col-10' :
									
										echo $this->get_column('col-10', $row_id, $rowCounter, $row_data);
									
									break;
									
									
									case 'col-11' :
									
										echo $this->get_column('col-11', $row_id, $rowCounter, $row_data);
									
									break;
									
									
									case 'col-12' :
									
										echo $this->get_column('col-12', $row_id, $rowCounter, $row_data);
									
									break;
									
									case 'col-13' :
									
										echo $this->get_column('col-13', $row_id, $rowCounter, $row_data);
									
									break;
									
									
									case 'col-14' :
									
										echo $this->get_column('col-14', $row_id, $rowCounter, $row_data);
									
									break;
									
									
									case 'col-15' :
									
										echo $this->get_column('col-15', $row_id, $rowCounter, $row_data);
									
									break;
									
									
									default :
									
										echo '';
									
									break;
									
								}//end switch
								
								$rowCounter++;
								
							}//end foreach
						
						?>
						
						<p class="vivid-default-message inactive"><?php esc_attr_e('Insert columns', 'vivid-page-builder') ?></p>
					
					<?php } else { ?>
						
						<p class="vivid-default-message"><?php esc_attr_e('Insert columns', 'vivid-page-builder') ?></p>
						
					<?php } ?>
					
					<!-- COLUMN DATA END -->
					
					<input class="vivid-container-input" type="hidden" name="vivid-container[<?php echo esc_attr($row_id); ?>]" data-field="type" value="">
		
				</div><!-- .vivid-container -->
				<?php
		
				
			}//end foreach
			
		}
		
		//Ajax functions
		public function pm_ln_load_panel_ui() {
		
			//Verify nonce
			//if(!wp_verify_nonce($_POST['pm_ln_nonce'], 'pm_ln_nonce')) die('Invalid nonce');
			
			//Capture POST data
			$panel_type = '';
			$row_id = 0;
			$column_id = 0;
			
			if( isset($_POST['panel_type']) ) {
				$panel_type = sanitize_text_field($_POST['panel_type']);
			}
			
			if( isset($_POST['row_id']) ) {
				$row_id = sanitize_text_field($_POST['row_id']);
			}
			
			if( isset($_POST['column_id']) ) {
				$column_id = sanitize_text_field($_POST['column_id']);
			}
			
			
			
			$panel_content = '';
			
			switch($panel_type) {
				
				case 'row' :
				
					//Fetch existing data based on row id and pass into get_ui_panel as second parameter
				
					//Fetch panel
					$panel_content = $this->get_ui_panel('row');
				
				break;
				
				case 'column' :
				
					//Fetch existing data based on column id and pass into get_ui_panel as second parameter
					
					//Fetch panel
					$panel_content = $this->get_ui_panel('column');
				
				break;
				
				case 'custom-css' :
									
					//Fetch panel
					$panel_content = $this->get_ui_panel('custom-css');
				
				break;
				
				case 'import-template' :
									
					//Fetch panel
					$panel_content = $this->get_ui_panel('import-template');
				
				break;
				
				case 'export-template' :
									
					//Fetch panel
					$panel_content = $this->get_ui_panel('export-template');
				
				break;
				
				case 'save-template' :
				
					//Fetch panel
					$panel_content = $this->get_ui_panel('save-template');
				
				break;
				
				case 'load-template' :
				
					//Fetch panel
					$panel_content = $this->get_ui_panel('load-template');
				
				break;
				
				case 'elements' :
				
					//Fetch panel
					$panel_content = $this->get_ui_panel('elements');
				
				break;
				
				default :
					//do nothing
				break;
				
			}//end switch
			
			
			echo json_encode(
				array(
					'content' => $panel_content,
				)
			);
			
			exit;
				
		}
		
		
	}//end of class
	
	
	
}//end of class exists


// Instantiate the class
$vivid_page_builder = new Vivid_Page_Builder;