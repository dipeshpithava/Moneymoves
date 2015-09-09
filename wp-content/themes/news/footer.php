<?php global $admin_data; ?>

<div class="interested_in">
	<h5>You May Be Interested In</h5>
	<hr>
	<?php echo do_shortcode( '[super-post query="recent" items="3" show_excerpt="true" excerpt_length="15" excerpt_more="..." show_thumbnail="true" icon_height="90" icon_width="90" show_comments="true" show_date="false" order="DESC"]' ); ?>
</div>

<!-- Footer -->

<footer id="footer" style="position:relative;">
    <div class="footer-top">
        <div class="hot-div"><span>HOT</span></div>
        <div class="middle-div">
            <div class="couter-text">
                
            </div>
        </div>
        <!--endmiddle div-->
        <div class="last-div">
            <ul>
                <!--  <li><a href="">404Error</a></li> -->
                <li><a href="http://casaestilo.in/moneymasala/contact/">contact</a></li>
                <li style="display:none;"><a href="http://casaestilo.in/moneymasala/blogs/">blog</a></li>
                <!--     <li><a href="">home</a></li> -->
            </ul>

        </div>
        <!--end lat-div-->
        <div style="clear:both;"></div>
    </div>
    <!--end footertop-->

    <div class="container">
        <?php get_sidebar( 'footer-1'); ?>
        <?php get_sidebar( 'footer-2'); ?>
        <?php get_sidebar( 'footer-3'); ?>
        <?php //get_sidebar( 'footer-4'); ?>

        <div class="clearfix"></div>

        <ul class="social2">
            <?php if($admin_data[ 'facebook']){ ?>
            <li><a href="<?php echo esc_html($admin_data['facebook']) ?>" target="_blank"><i class="icon-facebook"></i></a></li>
            <?php }?>
            <?php if($admin_data[ 'dribble']){ ?>
            <li><a href="<?php echo esc_html($admin_data['dribble']) ?>" target="_blank"><i class="icon-dribbble"></i></a></li>
            <?php }?>
            <?php if($admin_data[ 'twitter']){ ?>
            <li><a href="<?php echo esc_html($admin_data['twitter']) ?>" target="_blank"><i class="icon-twitter"></i></a></li>
            <?php }?>
            <?php if($admin_data[ 'flickr']){ ?>
            <li><a href="<?php echo esc_html($admin_data['flickr']) ?>" target="_blank"><i class="icon-flickr"></i></a></li>
            <?php }?>
            <?php if($admin_data[ 'google']){ ?>
            <li><a href="<?php echo esc_html($admin_data['google']) ?>" target="_blank"><i class="icon-gplus"></i></a></li>
            <?php }?>
            <?php if($admin_data[ 'linkedin']){ ?>
            <li><a href="<?php echo esc_html($admin_data['linkedin']) ?>" target="_blank"><i class="icon-linkedin"></i></a></li>
            <?php }?>
            <?php if($admin_data[ 'tumblr']){ ?>
            <li><a href="<?php echo esc_html($admin_data['tumblr']) ?>" target="_blank"><i class="icon-tumblr"></i></a></li>
            <?php }?>
            <?php if($admin_data[ 'skype']){ ?>
            <li><a href="<?php echo esc_html($admin_data['skype']) ?>" target="_blank"><i class="icon-skype"></i></a></li>
            <?php }?>
            <?php if($admin_data[ 'vimeo']){ ?>
            <li><a href="<?php echo esc_html($admin_data['vimeo']) ?>" target="_blank"><i class="icon-vimeo"></i></a></li>
            <?php }?>
            <?php if($admin_data[ 'pinterest']){ ?>
            <li><a href="<?php echo esc_html($admin_data['pinterest']) ?>" target="_blank"><i class="icon-pinterest"></i></a></li>
            <?php }?>
            <?php if($admin_data[ 'instagram']){ ?>
            <li><a href="<?php echo esc_html($admin_data['instagram']) ?>" target="_blank"><i class="icon-instagram"></i></a></li>
            <?php }?>
        </ul>


    </div>

    <div class="final-footer">
        <div class="container">
            <div class="grid-33 height-min">
                <div class="row-100">
                    <center> <img src="http://moneymoves.blob.core.windows.net/uploads/images/footer-logo.jpg" class="aditya-money old-aditya" alt="adityabirla myuniverse"></center>
                </div><!--row-100-->
                 <div class="row-100">
                    <center><img src="http://moneymoves.blob.core.windows.net/uploads/images/logo-final.png" class="old-aditya" alt="adityabirla myuniverse"></center>
                </div><!--row-100-->
                <!-- <a href="#" class="help-invers">HOW MYUNIVERSE HELPS</a> -->
            </div><!--endgrid-->
            <div class="grid-33 height-min">
                 <p class="footer-para">connect with us</p>
                 <div class="row-100">
                     <ul class="footer-social">
                    <li class="f1-hover">
                        <a href="" target="_blank" >
                            
                            <i class="fa fa-facebook"></i>
                            </a>
                    </li>
                    <li class="t1-hover">
                        <a href="" target="_blank" >
                        
                          <i class="fa fa-twitter"></i>
                            </a>
                    </li>
                    <li class="g1-hover">
                        <a href="" target="_blank" >
                         
                            <i class="fa fa-google-plus"></i>
                            </a>
                    </li>
                </ul>
                 </div><!--end row-->
                 <p class="footer-para">SIGNUP FOR NEWSLETTER</p>
                  <p class="footer-para-small">Enter your email address below to receive our money tips</p>
                  <!-- <form action="">
                    <input type="text" placeholder="enter email address" class="text-email">

                    <input type="submit" value="SUBMIT" class="btn-btn-submit">
                </form> -->
                <?php echo do_shortcode( '[do_widget subscribe]' ); ?>
            </div><!--endgrid-->
            <div class="grid-33 ">
                 <p class="footer-para">CONTACT US</p>
                 <div class="row-100" style="margin-top:2%;">
                    <div class="div-cell-con">
                         <img src="http://moneymoves.blob.core.windows.net/uploads/images/cell.png" alt="">
                    </div><!--div-cell-con-->
                    <div class="div-cell-desc">
                        <p class="con-txt-para">022-61802828 <br>
                        <span class="small" style="color: #6c6c6c;"> (10am-7pm Mon - Sat)</p>
                    </div>
                    <div style="clear:both;"></div>
                 </div><!--end row-->
                 <div class="row-100">
                    <div class="div-cell-con">
                     <img src="http://moneymoves.blob.core.windows.net/uploads/images/msg.png" alt="">
                 </div><!--div-cell-con-->
                 <div class="div-cell-desc">
                   <p class="con-txt-para"><a href="mailto:customercare@myuniverse.co.in" >customercare <span class="small" style="color: #6c6c6c;">@myuniverse.co.in</span></a></p>
               </div>
               <div style="clear:both;"></div>
                 </div><!--end row-->
            </div><!--endgrid-->
        </div><!--end container-->
        
    </div><!--.final-footer-->
        <div class="co-right">
            <div class="container">
            <div class="row">
                 <p class="copyright"> <span class="copyright-text">Copyright © 2013 Aditya Birla Customer Services  Ltd.</span> <span class="footer-link-separator">|</span> <a href="#" target="_blank" class="legal">Legal Disclaimer</a> <span class="footer-link-separator">|</span> <a href="#" target="_blank" class="privacy">Privacy Policy</a> <span class="footer-link-separator">|</span> <a href="#" target="_blank" class="tc">Terms and Conditions</a> <span class="footer-link-separator">|</span> <a href="#" target="_blank" class="investment-acc">Investment Account T &amp; C</a> </p>
                <p class="copyright">Site is best viewed with Internet Explorer 11+, Firefox 30+, Chrome 30+ and Safari 5.1+ with a resolution of 1024 x 768.</p>
            </div><!--end row-->
        </div><!--end container-->
</div>




    <!-- end priv footer -->

    <div class="bottom-footer" style="display:none;">
        <div class="container">
            <div class="column-one-third width-social marleft">
                <p class="footer-para">connect with us</p>
                <ul class="footer-social">
                    <li>
                        <a href="" target="_blank">
                            
                            <i class="fa fa-facebook"></i>
                            </a>
                    </li>
                    <li>
                        <a href="" target="_blank">
                        
                          <i class="fa fa-twitter"></i>
                            </a>
                    </li>
                    <li>
                        <a href="" target="_blank">
                         
                            <i class="fa fa-google-plus"></i>
                            </a>
                    </li>
                </ul>
            </div>
            <div class="column-one-third width-social-new marleft">
                <p class="footer-para">signup for newsletter</p>
                <p class="footer-para-small">Enter your email address below to receive our money tips</p>
                <?php echo do_shortcode( '[do_widget subscribe]' ); ?>
                <!--
<form action="">
                    <input type="text" placeholder="enter email address" class="text-email">

                    <input type="submit" value="SUBMIT" class="btn-btn-submit">
                </form>
-->
            </div>
            <div class="column-one-third width-social-contact marleft">
                <p class="footer-para">CONTACT US</p>
                <div class="contact-panel">
                    <img src="<?php echo get_site_url(); ?>/wp-content/uploads/images/cell.png" alt="">
                    <p class="con-txt">022-61802828 <br>
                        <span class="small" style="color: #6c6c6c;"> (10am-7pm Mon - Sat)</p>
                </div><!--endcontact-panel-->
                <div class="contact-panel">
                   <img src="<?php echo get_site_url(); ?>/wp-content/uploads/images/msg.png" alt="">
                   <p class="con-txt"><a href="mailto:customercare@myuniverse.co.in" >customercare <span class="small" style="color: #6c6c6c;">@myuniverse.co.in</span></a></p>
                </div><!--endcontact-panel-->
    


                <div class="contact-panel" style="display:none;">
                    <p class="contact-icons phone-icon"></p>
                    <p class="con-txt" style="font-size: 17px;">022-61802828
                        <br>
                        <span class="small" style="color: #6c6c6c;"> (10am-7pm Mon - Sat)</span></p>
                </div>
                <div class="contact-panel" style="display:none;">
                    <p class="contact-icons email-icon"></p>
                    <p class="con-txt"><a href="mailto:customercare@myuniverse.co.in" style="font-size: 20px;">customercare <span class="small" style="color: #6c6c6c;">@myuniverse.co.in</span></a></p>
                </div>
            </div><!--width-social-contact-->
            <div style="clear:both;"></div>
        </div>
        <!--end container-->
    </div>
    <!--bottom-footer-->
    <div class="footer-link-contain container" style="display:none;">
        <div class="footer-logo lflt"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/images/footer-logo.jpg" width="191" alt="adityabirla myuniverse"></div>
        <ul class="footer-menu-link">
            <li><a href="">HOW MYUNIVERSE HELPS</a></li>
            <li><a href="">LEARNING CENTER</a></li>
            <li><a href="">SECURITY &amp; PRIVACY</a></li>
            <li><a href="">PRICING</a></li>
        </ul>
        <p class="lflt terms-con">* The research based investment advice &amp; reports, stock and commodity recommendations, if any, projected/ displayed on or communicated through the www.myuniverse.co.in are provided by /created by/ sourced from Aditya Birla Money Mart Ltd, Aditya Birla Money Ltd and Aditya Birla Commodities Broking Ltd, respectively and not by ABCSL, the owner of this website. For more details, please refer the legal disclaimer</p>
        <p class="lflt copyright"> <span class="copyright-text">Copyright © 2013 Aditya Birla Customer Services  Ltd.</span> <span class="footer-link-separator">|</span> <a href="#" target="_blank" class="legal">Legal Disclaimer</a> <span class="footer-link-separator">|</span> <a href="#" target="_blank" class="privacy">Privacy Policy</a> <span class="footer-link-separator">|</span> <a href="#" target="_blank" class="tc">Terms and Conditions</a> <span class="footer-link-separator">|</span> <a href="#" target="_blank" class="investment-acc">Investment Account T &amp; C</a> </p>
        <p class="lflt copyright">Site is best viewed with Internet Explorer 11+, Firefox 30+, Chrome 30+ and Safari 5.1+ with a resolution of 1024 x 768.</p>
        <div class="clear"></div>
    </div>




<a href="javascript:void(0);" class="go_up"><img src="<?php echo get_site_url();?>/wp-content/uploads/images/up.png" /></a>
</footer>
<!-- / Footer -->

</div>
</div>
</div>
<!-- / Body Wrapper -->

<?php if($admin_data[ 'trackingcode'] !='' ) { echo $admin_data[ 'trackingcode']; } ?>
<?php wp_footer(); ?>

<script>
    function show_username(username){
        jQuery("#btn-login").html(username);
    }
</script>

</body>

</html>