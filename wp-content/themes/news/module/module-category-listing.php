<?php global $admin_data; ?>

                	<div class="column-two-third">
                    	<h5 class="line"><span><?php echo $admin_data['custom_par_category_name']; ?></span></h5>
                        <span class="liner"></span>
                        <div class="outerwide">
                        	<ul class="block-dip">
                            	<?php $numberofposts = $admin_data['m1_numberofposts']; ?>
                                <?php mypassion_popular_posts_home1($numberofposts); ?>
                            </ul>
                        </div>
                    </div>