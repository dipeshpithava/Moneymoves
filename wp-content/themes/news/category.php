<?php get_header();?>
        <!-- Content -->
        <section id="content">
            <div class="container">
            	<!-- Main Content -->
                
                <?php if($admin_data['breadcrumbs'] == true){ ?>
                <div class="breadcrumbs column">
                	<?php mypassion_breadcrumbs(); ?>
                </div>
            	<?php }?>
                
                 <?php  
					$divider = '&nbsp;  '. $admin_data['divider2'] .' &nbsp;'; 
				?>

				<?php
                    $cat_name_custom = single_cat_title( '', false );
                    $tente_custom = get_cat_ID( $cat_name_custom );

					if($admin_data['slider_section'] == 1){ 
                        $admin_data['current_category_id'] = $tente_custom;
						get_template_part( 'slider_custom' );  
					}
				?>
                
                <div class="main-content <?php if($admin_data['cat_style'] == "cat_leftsidebar"){?> left-sidebar <?php } ?>">

                    
                    <?php

						$cat_name = single_cat_title( '', false );
						$tente = get_cat_ID( $cat_name );
						$par_cat_id = $tente;
						
						foreach(get_categories("child_of=".$par_cat_id) as $sub_cat){
							$tente .= ",".$sub_cat->term_id;
						}

						 $querydetails = "
						   SELECT wposts.*
						   FROM $wpdb->posts wposts
						   LEFT JOIN $wpdb->postmeta wpostmeta ON wposts.ID = wpostmeta.post_id
						   LEFT JOIN $wpdb->term_relationships ON (wposts.ID = $wpdb->term_relationships.object_id)
						   LEFT JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
						   
						   WHERE wposts.ID = wpostmeta.post_id
						   AND wpostmeta.meta_key = 'mypassion_featured_post'
						   AND wpostmeta.meta_value = '1'
						   AND wposts.post_status = 'publish'
						   AND wposts.post_type = 'post'
						   AND (
									(	$wpdb->term_taxonomy.taxonomy = 'category')
									and $wpdb->term_taxonomy.term_id IN($tente)
								)
						   ORDER BY wposts.post_date DESC
						 ";
		
						 $pageposts = $wpdb->get_results($querydetails, OBJECT);
						
								
					?>
                    
                    <!-- Popular News -->
                	<div class="column-two-third">
						<?php if($admin_data['blog_style'] == "blog1"){ ?>
                        
                        <div class="outerwide">
                            <h5 class="line">
                                <span><?=$cat_name?></span>
                            </h5>
                            <span class="liner"></span>
                        	<ul class="block-dip" id="pagination" data-par="<?=$par_cat_id?>" data-cats="<?=$tente?>">
                        		<?php $page_counter = 0; ?>
								<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                                <?php $page_counter++; ?>
                                <li id="p<?=$page_counter?>" class="<?=$page_counter==1?'_current':''?>">
                                	<!-- <p class="page_name"> -->
                                	<!-- <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(240, 160)); ?></a>
                                        <p>
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </p>
                                        <?php
											$mypassion_review_enable =  get_post_meta(get_the_ID(), 'mypassion_review_enable', true);
											$mypassion_review_type =  get_post_meta(get_the_ID(), 'mypassion_review_type', true);
											$mypassion_final_score =  get_post_meta(get_the_ID(), 'mypassion_final_score', true);
											$mypassion_final_percentage = $mypassion_final_score * 20 ;
										?>
                                        <?php if($admin_data['review_switcher'] == true){
											}else{ ?>
                                        	<?php if($admin_data['postview_box'] == true){ ?>
                                            <span class="meta2"><?php echo getPostViews(get_the_ID()); ?> </span>
                                            <?php } ?>
                                        <?php } ?>
                                    <!-- </div> -->
	                                    <div class="full-col-12">
											<span class="total_comments">
												<i class="fa fa-comments-o"></i>
												<?php comments_popup_link(__( '0 Comment', 'framework' ),__( '1 comment', 'framework' ),__( '% Comments', 'framework' ),'',__( 'Comments are off', 'framework' ));?>
											</span>
											<span class="total_views">
												<i class="fa fa-eye"></i>
												<?php
													$meta = get_post_meta( $post->ID, 'super_post', true );
													if(isset($meta['views'])){
														echo $meta['views']<=1?$meta['views']." View":$meta['views']." Views";
													}
												?>
											</span>
										</div>
										<div class="excerpt_dip"><?php the_excerpt(); ?></div>
									<!-- </p> -->
                                </li>
                                
								<?php endwhile; endif;?>
								<li class="demo5"></li>
                            </ul>
                        </div>
                        <?php } ?>
                        
                        <?php if($admin_data['blog_style'] == "blog2"){ ?>
                        <div class="outerwide">
                            <ul class="block3">
                            
								<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                                <li>
                                	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    	<a class="thumbnail_image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('main-medium-thumb'); ?></a>
                                        <h6 class="regular"><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
                                        <span class="meta"><?php the_time(get_option('date_format')); echo $divider; the_category(', '); echo $divider; comments_popup_link(__( 'No Comment', 'framework' ),__( '1 comment', 'framework' ),__( '% Comments', 'framework' ),'',__( 'Comments are off', 'framework' )); ?> </span>
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                </li>
                                <?php endwhile; endif;?>
                                
                            </ul>
                        </div>
                        <?php } ?>
                        
                        <?php if($admin_data['blog_style'] == "blog3"){ ?>
                        <div class="outerwide">
                            <ul class="block3 blog_stylish">
                            	
								<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                                <li>
                                	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    	<a class="thumbnail_image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('main-medium-thumb'); ?></a>
                                        <h6 class="regular"><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
                                        <span class="meta"><?php the_time(get_option('date_format')); echo $divider; the_category(', '); echo $divider; comments_popup_link(__( 'No Comment', 'framework' ),__( '1 comment', 'framework' ),__( '% Comments', 'framework' ),'',__( 'Comments are off', 'framework' )); ?> </span>
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                </li>
                                <?php endwhile; endif;?>
                                
                            </ul>
                        </div>
                        <?php } ?>
                        
                        
                        <?php if($admin_data['blog_style'] == "blog4"){ ?>
                        <div class="outerwide">
                            <ul class="block3">
                            	
								<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                                <li>
                                	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    	<a class="thumbnail_image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('main-big-thumb'); ?></a>
                                        <h6 class="regular"><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
                                        <span class="meta"><?php the_time(get_option('date_format')); echo $divider; the_category(', '); echo $divider; comments_popup_link(__( 'No Comment', 'framework' ),__( '1 comment', 'framework' ),__( '% Comments', 'framework' ),'',__( 'Comments are off', 'framework' )); ?> </span>
                                        <p><?php the_excerpt(); ?></p>
                                    </div>
                                </li>
                                <?php endwhile; endif;?>
                                
                            </ul>
                        </div>
                        <?php } ?>
                        
                        <?php mypassion_pagination();  wp_reset_query(); ?>
                        
                    	
                    </div>
                    <!-- /Popular News -->
                    
                </div>
                <!-- /Main Content -->
                
                <?php get_sidebar(); ?>
                
            </div>    
        </section>
        <!-- / Content -->
        
       <?php get_footer(); ?>