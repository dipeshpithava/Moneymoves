<?php global $admin_data; ?>
<!-- Life Style -->
					
                    <?php
						$divider = '&nbsp;  '. $admin_data['divider2'] .' &nbsp;'; 
						
						
						$cat_name = $admin_data['m2_category'];
						
						$tente = get_cat_ID( $cat_name );
						 query_posts('cat='.$tente);
								
					?>
                    
                    <div class="column-two-third">
                    	<h5 class="line">
                        	<span><?php echo esc_html($cat_name);?></span>
                            <div class="navbar">
                                <a id="next-1" class="next" href="#"><span></span></a>	
                                <a id="prev-1" class="prev" href="#"><span></span></a>
                            </div>
                        </h5>
                        <span class="liner"></span>
                        
                        
                        <?php

							$i = 0;
							
							while (have_posts()) : the_post();
							  
							$i++;
							if ($i <= 1) {
						?>
                        <div class="outertight">
                        	<a href="<?php the_permalink();?>"><?php the_post_thumbnail('main-medium-thumb'); ?></a>
                            <h6 class="regular"><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
							<span class="meta">
								<?php if($admin_data['home_date']){ the_time(get_option('date_format'));  }
								if($admin_data['home_category']){if($admin_data['home_date']){echo $divider;} the_category(', ');} 
								if($admin_data['home_comment']){ echo $divider; comments_popup_link(__( 'No Comment', 'framework' ),__( '1 comment', 'framework' ),__( '% Comments', 'framework' ),'',__( 'Comments are off', 'framework' ));} ?> 
                            </span>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                        <?php } 
								endwhile;
							wp_reset_query();?>	
                        
                        
                        <?php query_posts('offset=1&cat='.$tente); ?>
                        
                        <div class="outertight m-r-no">
                        	
                        	<ul class="block" id="carousel-2">
                            
                            	<?php

									$i = 0;
									
									while (have_posts()) : the_post();
									  
									$i++;
									if ($i <= 15) {
								?>
                                <li>
                                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail('main-small-thumb'); ?></a>
                                    <p>
                                        <?php if($admin_data['home_date']){ ?><span><?php the_time(get_option('date_format')); ?>.</span><?php } ?>
                                        <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                                    </p>
                                    <?php
										$mypassion_review_enable =  get_post_meta(get_the_ID(), 'mypassion_review_enable', true);
										$mypassion_review_type =  get_post_meta(get_the_ID(), 'mypassion_review_type', true);
										$mypassion_final_score =  get_post_meta(get_the_ID(), 'mypassion_final_score', true);
										$mypassion_final_percentage = $mypassion_final_score * 20 ;
									?>
                                    <?php if($admin_data['review_switcher'] == true){ ?>
									<?php if($mypassion_review_enable == 'enable'){ ?><span class="mypassion-rating mypassion-rating-<?php echo esc_html($mypassion_review_type); ?>"><span style="width:<?php echo esc_html($mypassion_final_percentage); ?>%;"></span></span>
									<?php } ?>
									<?php } ?>
                                </li>
								<?php } 
                                    endwhile;
                                wp_reset_query();?>	

                            
                            </ul>
                        </div>
                        <!-- Google Ad Start Here -->
						<?php echo do_shortcode( '[ecp code="post_ads"]' ); ?>
						<!-- Google Ad End Here -->
                    </div>
                    <!-- /Life Style -->