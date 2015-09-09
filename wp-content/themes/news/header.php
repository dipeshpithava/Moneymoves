<!DOCTYPE html >
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
<?php global $admin_data; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title><?php bloginfo('name'); ?> <?php wp_title(' - ', true, 'left'); ?></title>


<?php if($admin_data['favicon'] != "") { ?><link rel="shortcut icon" href="<?php echo esc_html($admin_data['favicon']); ?>" /><?php } ?>

<?php if($admin_data['media_favicon_iphone'] != "") { ?><link rel="apple-touch-icon" href="<?php echo esc_html($admin_data['media_favicon_iphone']); ?>"><?php } ?>

<?php if($admin_data['media_favicon_iphone_retina'] != "") { ?><link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_html($admin_data['media_favicon_iphone_retina']); ?>"><?php } ?>

<?php if($admin_data['media_favicon_ipad'] != "") { ?><link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_html($admin_data['media_favicon_ipad']); ?>"><?php } ?>

<?php if($admin_data['media_favicon_ipad_retina'] != "") { ?><link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_html($admin_data['media_favicon_ipad_retina']); ?>"><?php } ?>

<?php wp_head(); ?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/styles.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css">

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/typed.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/slidx.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.quick.pagination.js"></script>

<script>
	jQuery(document).ready(function(){

        //jQuery("ul.block-dip").quickPager({pageSize:"10"});

        jQuery('#btn-login').click(function(){
            jQuery('.body-overlay').fadeIn('slow');
        });
        jQuery('.crossthin').click(function(){
            jQuery('.body-overlay').fadeOut('slow');
        });
		jQuery(".fb_ajax").click(function(){
			FB.XFBML.parse();
		});
		
		jQuery('.go_up').click(function(){
			jQuery('html, body').animate({scrollTop : 0},2000);
			return false;
		});
		
		jQuery(window).scroll(function() {
			if(jQuery(window).scrollTop() + jQuery(window).height() == jQuery(document).height()) {
				jQuery(".interested_in").fadeIn();
   			}else{
	   			jQuery(".interested_in").fadeOut();
   			}
		});
		
		jQuery(".dontmiss_scroller").typed({
            strings: <?php echo strip_tags(do_shortcode( '[ecp code="header_scroller"]' )); ?>,
            // typing speed
            typeSpeed: 0,
            // time before typing starts
            startDelay: 0,
            // backspacing speed
            backSpeed: 0,
            // time before backspacing
            backDelay: 500,
            // loop
            loop: true,
            // false = infinite
            loopCount: false,
            // show cursor
            showCursor: false,
            // character for cursor
            cursorChar: ".",
            // attribute to type (null == text)
            attr: null,
            // either html or text
            contentType: 'html',
            // call when done callback function
            callback: function() {},
            // starting callback function before each string
            preStringTyped: function() {},
            //callback for every typed string
            onStringTyped: function() {},
            // callback for reset
            resetCallback: function() {}
        });
        
        jQuery(".couter-text").typed({
            strings: <?php echo strip_tags(do_shortcode( '[ecp code="footer-scroller"]' )); ?>,
            // typing speed
            typeSpeed: 0,
            // time before typing starts
            startDelay: 0,
            // backspacing speed
            backSpeed: 0,
            // time before backspacing
            backDelay: 500,
            // loop
            loop: true,
            // false = infinite
            loopCount: false,
            // show cursor
            showCursor: false,
            // character for cursor
            cursorChar: ".",
            // attribute to type (null == text)
            attr: null,
            // either html or text
            contentType: 'html',
            // call when done callback function
            callback: function() {},
            // starting callback function before each string
            preStringTyped: function() {},
            //callback for every typed string
            onStringTyped: function() {},
            // callback for reset
            resetCallback: function() {}
        });
	});
	
	jQuery(window).load(function(){
		jQuery("#slidx_button, #slidx_menu").show();
        jQuery("#idIframe").attr("src", "https://stg.adityabirlamoneyuniverse.com/SitePages/mmsignin.aspx?mmurl=http://casaestilo.in/moneymasala");
	});
</script>

<style>

        .pagination li {
            display:inline-block;
            padding:5px;
        }

		#slidx_menu img{
			width: 30%;
		}
		#slidx_button, #slidx_menu{
			display: none;
		}
		.tooltip_container{
			display: none;
		}
        #slidx_button ul {
            padding: 0px;
            margin: 0px;
        }
        #slidx_button li {
            list-style: none;
        }
        #slidx_menu {
            background-color: #f9f9f9;
            height: 300px;
            top: 100px;
        }
        #slidx_menu a {
            padding: 20px 0px 20px 15px;
            display: block;
        }
        #slidx_menu a:hover {
            background-color: #eeeeee;
            cursor: pointer;
        }
        #slidx_button {
            padding: 10px 30px;
            margin-top: 150px;
            background-color: #cd2122;
        }
        #slidx_button:hover {
            cursor: pointer;
        }

        @media screen and (max-width: 1000px){
            #cat_banner{
                display: none;
            }
        }
        .cdnr_powered{
            display: none;
        }
    </style>

</head>

<body <?php body_class(); ?>>

<!-- Body Wrapper -->
<div class="body-wrapper">
    <section class="body-overlay">
        <div class="overlay-div-iframe">
            <a href="javascript:void(0);" class="crossthin"><img src="http://moneymoves.blob.core.windows.net/uploads/images/cross_thin_19.png" alt=""></a>
            <div class="height-div"></div>
            <iframe width="100%" height="500" id="idIframe" src=""></iframe>
        </div>
    </section>
    

	<div class="controller">
    <div class="controller2">
    
    <!-- Header -->
        <header id="header">
	        
	        <button id="slidx_button" class="btn-abso">Menu</button>

			<nav id="slidx_menu" class="menuabso">
                <div class="slide-100">
                    <img src="http://moneymoves.blob.core.windows.net/uploads/2015/05/contribute.png" />
                    <a href="<?php echo get_site_url(); ?>/contribute/">Contribute</a>
                </div>
                <div class="slide-100">
                    <img src="http://moneymoves.blob.core.windows.net/uploads/2015/06/login.png" />
                    <a href="javascript:void(0);" id="btn-login">Sign In</a>
                </div>
			</nav>
	        
        <?php echo do_shortcode( '[ecp code="Header_banner"]' ); ?>
        	<div class="header_dontmiss">
	        	<div class="dontmiss_text">
		        	DON'T MISS
	        	</div>
	        	<div class="scroller_wrapper">
	        		<div class="dontmiss_scroller">
	        		</div>
	        	</div>
                <div class="social-wrapper">
    	        	<ul class="socials">

    		        	 <li class="fb"><a target="_blank" href="http://www.facebook.com/moneymasala" ><i class="suppa-facebook"></i></a></li>
    		        	 <li class="tw"><a target="_blank" href="http://www.twitter.com/moneymasala" ><i class="suppa-twitter"></i></a></li>
    		        	 <li class="supp"><a target="_blank" href="http://feeds.feedburner.com/MoneyMasalaMoneyMasala" ><i class="suppa-rss"></i></a></li>
    	        	</ul>
                </div><!--end social_wrapper-->
	        	<div class="search">
                	<form action="<?php echo home_url(); ?>/" method="get">
                	    <input type="text" value="<?php _e('Search', 'framework');?>..." onblur="if(this.value=='') this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue) this.value='';" class="ft" name="s"/>
                	    <input type="submit" value="" class="fs">
                	</form>
                </div>
                <div class="clearer"></div>
        	</div>
            <div class="container">
            	<?php if($admin_data['banner-top']){ ?>
            	<div class="column m-top-25">
                	<a href="<?php echo esc_html($admin_data['banner-top-link'])?>"><img src="<?php echo esc_html($admin_data['banner-top'])?>" alt="<?php bloginfo('description'); ?>" /></a>
                </div>
                <?php } ?>
                <div class="column">
                    <div class="logo">
                        <a href="<?php echo home_url(); ?>"><img src="<?php if($admin_data['logo']){echo esc_html($admin_data['logo']);} else{ ?>http://moneymoves.blob.core.windows.net/wp-content/themes/news/framework/img/logo.png<?php } ?>" alt="<?php bloginfo('description'); ?>" /></a>
                    </div>
                    <!-- Edited -->
                    <!-- <div class="no_bg widget-text sbr_box"><ul><li class="sbr_text social-icons FB"><a href=http://www.facebook.com/moneymasala target="_blank" data-tip="Facebook"><img width=40  height=40 src=http://casaestilo.in/moneymasala/wp-content/plugins/top-25-social-icons/images/leaf/facebook.png></a></li><li class="sbr_text social-icons TW"><a href=http://www.twitter.com/moneymasala target="_blank" data-tip="Twitter"><img width=40  height=40 src=http://casaestilo.in/moneymasala/wp-content/plugins/top-25-social-icons/images/leaf/twitter.png></a></li><li class="sbr_text social-icons Gplus"><a href=http://feeds.feedburner.com/MoneyMasalaMoneyMasala  target="_blank" data-tip="GooglePlus"><img width=40  height=40 src=http://casaestilo.in/moneymasala/wp-content/plugins/top-25-social-icons/images/leaf/rss.png></a></li><li class="sbr_text social-icons Gplus"><a title="Contribute" href=http://casaestilo.in/moneymasala/contribute data-tip="GooglePlus"><img width=40  height=40 src=http://casaestilo.in/moneymasala/wp-content/plugins/top-25-social-icons/images/leaf/contribute.png></a></li></ul></div> -->
                    <!-- Edited -->
                    <div style="clear:both;"></div>
                    
                    
                    <?php $main = array(
						'theme_location'  => 'main_menu',
						'menu_class'      => 'sf-menu', 
						'menu_id'         => 'menu-main',);
					?>
                    <!-- Nav -->
                    <nav id="nav">
                        <?php if(has_nav_menu('main_menu')){ wp_nav_menu( $main );} else{echo '<ul class="sf-menu"><li><a href="">No menu assigned!</a></li></ul>';}?>
                    </nav>
                    <!-- /Nav -->
                </div>
            </div>
        </header>
        <!-- /Header -->