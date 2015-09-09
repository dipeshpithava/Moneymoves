<?php global $admin_data; ?>
<!-- World News -->
					
                    <?php
						$divider = '&nbsp;  '. $admin_data['divider2'] .' &nbsp;'; 
						
						
						$cat_name = $admin_data['m3_category'];
						$tente = get_cat_ID( $cat_name );

						 query_posts('cat='.$tente);
								
					?>
                    <div class="column-two-third">
                    	<h5 class="line">
                        	<span><?php echo esc_html($cat_name); ?></span>
                            <div class="navbar">
                                <a id="next2" class="next" href="#"><span></span></a>	
                                <a id="prev2" class="prev" href="#"><span></span></a>
                            </div>
                        </h5>
                        <span class="liner"></span>
                        
                        <div class="outerwide" >
                        	<ul class="wnews" id="carousel2">
                            
                            	<?php

									$i = 0;
									
									while (have_posts()) : the_post();
									  
									$i++;
									if ($i <= $admin_data['m3_maxnumberofposts']) {
								?>
                            
                            	<li>
                                	<a href="<?php the_permalink();?>" class="mimg"><?php the_post_thumbnail('main-medium-thumb'); ?></a>
                                    <h6 class="regular"><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
                                    <div class="full-col-12">
										<span class="total_comments">
											<?php $comments_count = wp_count_comments(get_the_ID()); ?>
											
												<i class="fa fa-comments-o"></i>
												<?php echo $comments_count->total_comments<=1?$comments_count->total_comments." Comment":$comments_count->total_comments." Comments"; ?>
											
										</span>
										<span class="total_views">
											<i class="fa fa-eye"></i>
												<?php $meta = get_post_meta( $post->ID, 'super_post', true ); if(isset($meta['views'])){echo $meta['views']<=1?$meta['views']." View":$meta['views']." Views";}?>
											
										</span>
									</div>
                                    <p><?php the_excerpt(); ?></p>
                                </li>
								<?php } 
									endwhile;
								wp_reset_query();?>	
                            </ul>
                        </div>
                        
                        
                        <?php query_posts('offset='.$admin_data['m3_maxnumberofposts'].'&cat='.$tente); ?>
                        <div class="outerwide">
                        	<ul class="block2">
                            	
                                <?php
									$i = 0;
									while (have_posts()) : the_post(); 
									$i++;
									if ($i <= 4) {
								?>
                                <li>
                                   	<a href="<?php the_permalink();?>"><?php the_post_thumbnail('main-small-thumb'); ?></a>
                                    <p>
                                        <!-- <?php if($admin_data['home_date']){ ?><span><?php the_time(get_option('date_format')); ?>.</span><?php } ?> -->
                                        <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                                    </p>
                                    <div class="full-col-12">
										<span class="total_comments">
											<?php $comments_count = wp_count_comments(get_the_ID()); ?>
											<a href="javascript:void(0);" title="<?php echo $comments_count->total_comments<=1?$comments_count->total_comments." Comment":$comments_count->total_comments." Comments"; ?>">
												<i class="fa fa-comments-o"></i>
												<?php echo $comments_count->total_comments<=1?$comments_count->total_comments." Comment":$comments_count->total_comments." Comments"; ?>
											</a>
										</span>
										<span class="total_views">
											<a href="javascript:void(0);" title="<?php $meta = get_post_meta( $post->ID, 'super_post', true ); if(isset($meta['views'])){echo $meta['views']<=1?$meta['views']." View":$meta['views']." Views";}?>"><i class="fa fa-eye"></i>
												<?php $meta = get_post_meta( $post->ID, 'super_post', true ); if(isset($meta['views'])){echo $meta['views']<=1?$meta['views']." View":$meta['views']." Views";}?>
											</a>
										</span>
									</div>
                                    <?php
                                        $mypassion_review_enable =  get_post_meta(get_the_ID(), 'mypassion_review_enable', true);
                                        $mypassion_review_type =  get_post_meta(get_the_ID(), 'mypassion_review_type', true);
                                        $mypassion_final_score =  get_post_meta(get_the_ID(), 'mypassion_final_score', true);
                                        $mypassion_final_percentage = $mypassion_final_score * 20 ;
                                    ?>
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
                    <!-- /World News -->