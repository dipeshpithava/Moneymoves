
jQuery(document).ready(function(){
	jQuery('#kento-highlight-widget ul li').click(function(event){
		jQuery('.active').removeClass('active');
		jQuery(this).addClass('active');
	});
	
	var divs = jQuery("#tab1, #tab2, #tab3");
		// Show chosen div, and hide all others
		jQuery("#kento-highlight-widget li a").click(function () {
		jQuery(divs).hide();
		jQuery("#" + jQuery(this).attr("class")).slideDown(500);							
	});	
		
});

