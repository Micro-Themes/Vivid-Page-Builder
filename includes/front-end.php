<?php
/**
 * Front End Output
 * @since 1.0.0
**/

/* Filter Content as early as possible, but after all WP code filter runs. */
add_filter( 'the_content', 'pm_ln_filter_content', 10.5 );

/**
 * Filter Content
 * @since 1.0.0
**/
function pm_ln_filter_content( $content ){
	
	
	$vivid_enabled = get_post_meta( get_the_ID(), 'page_builder_active', true );

	/* In single page when page builder template selected. */
	if ( $vivid_enabled === 'active' ){
		
		/* Add content with shortcode, autoembed, responsive image, etc. */
		$content = pm_ln_default_content_filter( pm_ln_get_content() );
	}
	/* Return content */
	return $content;
}

/**
 * Page Builder Content Output
 * This need to be use in the loop.
 * @since 1.0.0
**/
function pm_ln_get_content(){
	
	/* Get saved rows data and sanitize it */
	//$row_datas = pm_ln_sanitize( get_post_meta( get_the_ID(), 'vivid', true ) );
	$row_datas = get_post_meta( get_the_ID(), 'vivid', true );
	
	//print "<pre>";
	//print_r($row_datas);
	//print "</pre>";

	/* return if no rows data */
	if( !$row_datas ){
		return '';
	}

	/* Content */
	$content = '';
	
	/* Loop for each rows */
	foreach( $row_datas as $container_id => $row_data ){
		
		$container_id = intval( $container_id );
		$row_id = $container_id + 1;

		?>
		<div class="vivid-container" id="vivid-container-<?php echo esc_attr($row_id); ?>">            

            <?php if( $row_data['type'] !== 'null' ) { ?>
            
            	<!-- Print columns -->
                <?php 
								
					$rowCounter = 1;
								
					//print_r($row_data['type']); 
					foreach( $row_data['type'] as $row ) {
						
						switch ($row['type']) {
						
							case 'col-1' :
                                
                                $content .= '<div class="vivid-row">';
                                    $content .= '<div class="vivid-box box-lg-1 box-md-1 box-sm-1 box-xs-1">';
                                         $content .= $row_data['content'][$rowCounter]['content-1'];
                                    $content .= '</div>';
                                $content .= '</div>';
							
							break;
							
							case 'col-2' :
                                
                                $content .= '<div class="vivid-row">';
                                    $content .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-1'];
                                    $content .= '</div>';
                                    $content .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-2'];
                                    $content .= '</div>';
                                $content .= '</div>';
							
							break;
							
							case 'col-3' :
							                                
                                $content .= '<div class="vivid-row">';
                                    $content .= '<div class="vivid-box box-lg-3 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-1'];
                                    $content .= '</div>';
                                    $content .= '<div class="vivid-box box-lg-3 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-2'];
                                    $content .= '</div>';
                                    $content .= '<div class="vivid-box box-lg-3 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-3'];
                                    $content .= '</div>';
                                $content .= '</div> ';                           
                                							
							break;
							
							case 'col-4' :
                                
                                $content .= '<div class="vivid-row">';
                                    $content .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-1'];
                                    $content .= '</div>';
                                    $content .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-2'];
                                    $content .= '</div>';
                                    $content .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-3'];
                                    $content .= '</div>';
                                    $content .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-4'];
                                    $content .= '</div>';
                                $content .= '</div>';
							
							break;
							
							case 'col-5' :
                                
                                $content .= '<div class="vivid-row">';
                                    $content .= '<div class="vivid-box box-lg-5 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-1'];
                                    $content .= '</div>';
                                    $content .= '<div class="vivid-box box-lg-5 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-2'];
                                    $content .= '</div>';
                                    $content .= '<div class="vivid-box box-lg-5 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-3'];
                                    $content .= '</div>';
                                    $content .= '<div class="vivid-box box-lg-5 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-4'];
                                    $content .= '</div>';
                                    $content .= '<div class="vivid-box box-lg-5 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-5'];
                                    $content .= '</div>';
                                $content .= '</div>';
							
							break;
							
							
							case 'col-6' :
                                
                                $content .= '<div class="vivid-row">';
                                    $content .= '<div class="vivid-box box-lg-6 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-1'];
                                    $content .= '</div>';
                                    $content .= '<div class="vivid-box box-lg-3 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-2'];
                                    $content .= '</div>';
                                $content .= '</div>';
							
							break;
							
							case 'col-7' :
                                
                                $content .= '<div class="vivid-row">';
                                    $content .= '<div class="vivid-box box-lg-3 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-1'];
                                    $content .= '</div>';
                                    $content .= '<div class="vivid-box box-lg-6 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-2'];
                                    $content .= '</div>';
                                $content .= '</div>';
							
							break;
							
							case 'col-8' :
                                
                                $content .= '<div class="vivid-row">';
                                    $content .= '<div class="vivid-box box-lg-7 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-1'];
                                    $content .= '</div>';
                                    $content .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-2'];
                                    $content .= '</div>';
                                $content .= '</div>';
							
							break;
							
							case 'col-9' :
                                
                                $content .= '<div class="vivid-row">';
                                    $content .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-1'];
                                    $content .= '</div>';
                                    $content .= '<div class="vivid-box box-lg-7 box-md-1 box-sm-1 box-xs-1">';
                                        $content .= $row_data['content'][$rowCounter]['content-2'];
                                    $content .= '</div>';
                                $content .= '</div>';
							
							break;
							
							case 'col-10' :
                                
                                $content .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1">';
									$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= '</div>';								
								$content .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1 vivid-magazine-column">';									
									$content .= '<div class="vivid-box magazine-half-column">';
										$content .= $row_data['content'][$rowCounter]['content-2'];
									$content .= '</div>';									
									$content .= '<div class="vivid-box magazine-half-column">';
										$content .= $row_data['content'][$rowCounter]['content-3'];
									$content .= '</div>';									
									$content .= '<div class="vivid-box magazine-half-column">';
										$content .= $row_data['content'][$rowCounter]['content-4'];
									$content .= '</div>';									
									$content .= '<div class="vivid-box magazine-half-column">';
										$content .= $row_data['content'][$rowCounter]['content-5'];
									$content .= '</div>';									
								$content .= '</div>';
							
							break;
							
							case 'col-11' :
																
								$content .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1 vivid-magazine-column">';									
									$content .= '<div class="vivid-box magazine-half-column">';
										$content .= $row_data['content'][$rowCounter]['content-1'];
									$content .= '</div>';									
									$content .= '<div class="vivid-box magazine-half-column">';
										$content .= $row_data['content'][$rowCounter]['content-2'];
									$content .= '</div>';									
									$content .= '<div class="vivid-box magazine-half-column">';
										$content .= $row_data['content'][$rowCounter]['content-3'];
									$content .= '</div>';									
									$content .= '<div class="vivid-box magazine-half-column">';
										$content .= $row_data['content'][$rowCounter]['content-4'];
									$content .= '</div>';									
								$content .= '</div>';
								$content .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1">';
									$content .= $row_data['content'][$rowCounter]['content-5'];
								$content .= '</div>';
							
							break;
							
							case 'col-12' :
							
								$content .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1">';
									$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= '</div>';								
								$content .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1 vivid-magazine-column">';									
									$content .= '<div class="vivid-box magazine-half-column">';
										$content .= $row_data['content'][$rowCounter]['content-2'];
									$content .= '</div>';									
									$content .= '<div class="vivid-box magazine-half-column">';
										$content .= $row_data['content'][$rowCounter]['content-3'];
									$content .= '</div>';									
								$content .= '</div> ';
								
							break;
							
							case 'col-13' :
															
								$content .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1 vivid-magazine-column">';									
									$content .= '<div class="vivid-box magazine-half-column">';
										$content .= $row_data['content'][$rowCounter]['content-1'];
									$content .= '</div>';									
									$content .= '<div class="vivid-box magazine-half-column">';
										$content .= $row_data['content'][$rowCounter]['content-2'];
									$content .= '</div>';									
								$content .= '</div> ';
								$content .= '<div class="vivid-box box-lg-2 box-md-1 box-sm-1 box-xs-1">';
									$content .= $row_data['content'][$rowCounter]['content-3'];
								$content .= '</div>';	
								
							break;
							
							case 'col-14' :
															
								$content .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1">';
									$content .= $row_data['content'][$rowCounter]['content-1'];
								$content .= '</div>';
								$content .= '<div class="vivid-box box-lg-8 box-md-1 box-sm-1 box-xs-1">';
									$content .= $row_data['content'][$rowCounter]['content-2'];
								$content .= '</div>';
								$content .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1">';
									$content .= $row_data['content'][$rowCounter]['content-3'];
								$content .= '</div>';
								
							break;
							
							case 'col-15' :
							
								$content .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1 vivid-magazine-column">';        	
									$content .= '<div class="vivid-box magazine-full-column">';
										$content .= $row_data['content'][$rowCounter]['content-1'];
									$content .= '</div>';
									$content .= '<div class="vivid-box magazine-full-column">';
										$content .= $row_data['content'][$rowCounter]['content-2'];
									$content .= '</div>';
									$content .= '<div class="vivid-box magazine-full-column">';
										$content .= $row_data['content'][$rowCounter]['content-3'];
									$content .= '</div>';									
								$content .= '</div>';								
								$content .= '<div class="vivid-box box-lg-8 box-md-1 box-sm-1 box-xs-1 vivid-magazine-column">';									
									$content .= '<div class="vivid-box magazine-full-column">';
										$content .= $row_data['content'][$rowCounter]['content-4'];
									$content .= '</div>';									
									$content .= '<div class="vivid-box magazine-half-column">';
										$content .= $row_data['content'][$rowCounter]['content-5'];
									$content .= '</div>';									
									$content .= '<div class="vivid-box magazine-half-column">';
										$content .= $row_data['content'][$rowCounter]['content-6'];
									$content .= '</div>';									
								$content .= '</div>';								
								$content .= '<div class="vivid-box box-lg-4 box-md-1 box-sm-1 box-xs-1 vivid-magazine-column">';									
									$content .= '<div class="vivid-box magazine-full-column">';
										$content .= $row_data['content'][$rowCounter]['content-7'];
									$content .= '</div>';
									$content .= '<div class="vivid-box magazine-full-column">';
										$content .= $row_data['content'][$rowCounter]['content-8'];
									$content .= '</div>';
									$content .= '<div class="vivid-box magazine-full-column">';
										$content .= $row_data['content'][$rowCounter]['content-9'];
									$content .= '</div>';									
								$content .= '</div>';
							
							break;
							
							default :
							
							break;
							
						}//end switch
						
						$rowCounter++;
						
					}//end foreach
				
				?>
                
            
            <?php }//end if row data type ?>

        </div><!-- .vivid-container -->
        <?php

		
	}//end foreach
	
	return $content;
}


/* === FRONT-END SCRIPTS === */

/* Enqueue Script */
add_action( 'wp_enqueue_scripts', 'pm_ln_base_front_end_scripts' );

/**
 * Admin Scripts
 * @since 1.0.0
 */
function pm_ln_base_front_end_scripts(){

	/* In a page using page builder */
	/* Enqueue CSS & JS For Page Builder */
	wp_enqueue_style( 'vivid-page-builder-font-css', VIVID_BASE_URI. 'assets/front-end/css/flexbox.css', array(), VIVID_BASE_VERSION );
	
}
