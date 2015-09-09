<?php
/*
	Template Name: Home
*/
?>
<?php get_header();?>
<?php global $admin_data; ?>
		
        <?php
		if($admin_data['slider_section'] == 1){ 
			get_template_part( 'slider' );  
		}
		?>
        
        <!-- Content -->
        <section id="content">
            <div class="container">
            	<!-- Main Content -->
                <div class="main-content <?php if($admin_data['home_style'] == "home_leftsidebar"){?> left-sidebar <?php } ?>">
	                
	                <?php
		                get_template_part( 'module/module-1' );
		                
		                $admin_data['m2_category'] = "Investment";
		                get_template_part( 'module/module-2-custom-1' );
		                
		                $admin_data['m3_category'] = "Personal Finance";
		                get_template_part( 'module/module-3-custom-1' );
		                
		                $admin_data['m2_category'] = "Tax Savers";
		                get_template_part( 'module/module-2-custom-3' );
		                
		                $admin_data['m1_category_1'] = "Real Estate";
		                $admin_data['m1_category_2'] = "Loans";
		                get_template_part( 'module/module-1-custom' );
		                
		                //$admin_data['m1_category_1'] = "Insurance";
		                //$admin_data['m1_category_2'] = "Invest Correctly";
		                //get_template_part( 'module/module-1-custom' );
		            ?>
                	
					<div class="column-two-third">
						<h5 class="line"><span>Storyboard</span></h5>
                        <span class="liner"></span>
						<?php echo do_shortcode( '[advps-slideshow optset="1"]' ); ?>
					</div>
                </div>
                <!-- /Main Content -->
                
                <?php get_sidebar(); ?>
                
            </div>
        </section>
        <!-- / Content -->
        

        
       <?php get_footer(); ?>