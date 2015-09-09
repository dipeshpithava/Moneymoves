<?php global $admin_data; ?>
<!-- Slider -->
<?php

	 // $querydetails = "
	 //   SELECT DISTINCT wposts.*
	 //   FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
	 //   WHERE wposts.ID = wpostmeta.post_id
	 //   AND wpostmeta.meta_key = 'mypassion_mainslider'
	 //   AND wpostmeta.meta_value = '1'
	 //   AND wposts.post_status = 'publish'
	 //   AND wposts.post_type = 'post'
	 //   ORDER BY wposts.post_date DESC
	 // ";

	 // $pageposts = $wpdb->get_results($querydetails, OBJECT);
	 
     $tente_current = $admin_data['current_category_id'];
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
                                    (   $wpdb->term_taxonomy.taxonomy = 'category')
                                    and $wpdb->term_taxonomy.term_id IN($tente_current)
                                )
                           ORDER BY wposts.post_date DESC
                         ";
        
                         $pageposts = $wpdb->get_results($querydetails, OBJECT);
	 
	 if ($pageposts == true){
?>

        <section id="slider">
            <div class="container">
                <div class="main-slider main-slider-custom">
                	<?php if($admin_data['ribbons_switcher'] == 1): ?>
                    <div class="badg">
                    	<p><a><?php echo esc_html($admin_data['slider_ribbon1']); ?></a></p>
                    </div>
                    <?php endif; ?>
                    
                	<div class="flexslider" style="width:66%;float:left;">
                        <ul class="slides">
                        	<?php 
                
                                $i = 0;
                                if ($pageposts):
                                foreach ($pageposts as $post):
                                setup_postdata($post); 
                                $i++;
                                if ($i <= $admin_data['slider_post_number']) {
                                ?>
                            <li>
                                <a class="Dipesh" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(930, 372)); ?></a>
                                <p class="flex-caption"><a href="<?php the_permalink(); ?>"><?php the_title(); ?>.</a> <?php echo substr(get_the_excerpt(), 0, 80); ?> ... </p>
                            </li>
                            <?php } 
                                    endforeach; 	
                                endif; 
                                wp_reset_query();?>	
                            
                        </ul>
                    </div>
                    <div id="cat_banner" style="float:left;margin-left:16px;">
                      <?php echo do_shortcode( '[ecp code="category_banner"]' );?>
                    </div>
                </div>
                
                
                 
               
                <?php
					 
						wp_reset_query();?>
                
            </div>    
        </section>
        <!-- / Slider -->
<?php }else{ ?>
		<section id="slider">
            <div class="container">
            	<div class="column">
                	<p><?php echo __('No posts attached to slider','framework') ?></p>
                </div>
            </div>
        </section>
<?php }?>