<?php global $admin_data; ?>

                	<div class="column-two-third">
                    	<h5 class="line"><span><?php echo $admin_data['custom_category_name']; ?></span></h5>
                        <span class="liner"></span>
                        <div class="outerwide">
                        	<ul class="block-dip">
                            	<?php $numberofposts = $admin_data['m1_numberofposts']; ?>
                                <?php mypassion_popular_posts_home2("-1"); ?>
                                <?php //mypassion_popular_posts_home_paged("-1"); ?>
                            </ul>
                        </div>
                    </div>