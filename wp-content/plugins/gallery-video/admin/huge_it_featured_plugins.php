<style>
.element {
	position: relative;
	width:93%; 
	margin:5px 0px 5px 0px;
	padding:2%;
	clear:both;
	overflow: hidden;
	border:1px solid #DEDEDE;
	background:#F9F9F9;
}
.element > div {
	display:table-cell;
}
.element div.left-block {
	padding-right:10px;
}
.element div.left-block .main-image-block {
	clear:both; 
}
.element div.left-block .thumbs-block {
	position:relative;
	margin-top:10px;
}
.element div.left-block .thumbs-block ul {
	width:240px; 
	height:auto;
	display:table;
	margin:0px;
	padding:0px;
	list-style:none;
}
.element div.left-block .thumbs-block ul li {
	margin:0px 3px 0px 2px;
	padding:0px;
	width:75px; 
	height:75px; 
	float:left;
}
.element div.left-block .thumbs-block ul li a {
	display:block;
	width:75px; 
	height:75px; 
}
.element div.left-block .thumbs-block ul li a img {
	width:75px; 
	height:75px; 
}
.element div.right-block {
	vertical-align:top;
}
.element div.right-block > div {
	width:100%;
	padding-bottom:10px;
	margin-top:10px;
}
.element div.right-block > div:last-child {
	background:none;
}
.element div.right-block .title-block  {
	margin-top:3px;
}
.element div.right-block .title-block h3 {
	margin:0px;
	padding:0px;
	font-weight:normal;
	font-size:18px !important;
	line-height:18px !important;
	color:#0074A2;
}
.element div.right-block .description-block p,.element div.right-block .description-block * {
	margin:0px;
	padding:0px;
	font-weight:normal;
	font-size:14px;
	color:#555555;
}
.element div.right-block .description-block h1,
.element div.right-block .description-block h2,
.element div.right-block .description-block h3,
.element div.right-block .description-block h4,
.element div.right-block .description-block h5,
.element div.right-block .description-block h6,
.element div.right-block .description-block p, 
.element div.right-block .description-block strong,
.element div.right-block .description-block span {
	padding:2px !important;
	margin:0px !important;
}
.element div.right-block .description-block ul,
.element div.right-block .description-block li {
	padding:2px 0px 2px 5px;
	margin:0px 0px 0px 8px;
}
.element .button-block {
	position:relative;
}
.element div.right-block .button-block a,.element div.right-block .button-block a:link,.element div.right-block .button-block a:visited {
	position:relative;
	display:inline-block;
	padding:6px 12px;
	background:#2EA2CD;
	color:#FFFFFF;
	font-size:14;
	text-decoration:none;
}
.element div.right-block .button-block a:hover,.pupup-elemen.element div.right-block .button-block a:focus,.element div.right-block .button-block a:active {
	background:#0074A2;
	color:#FFFFFF;
}
.button-block a {
	float: right;
}
.description-block p {
	text-align: justify !important;
}
@media only screen and (max-width: 767px) {
	.element > div {
		display:block;
		width:100%;
		clear:both;
	}
	.element div.left-block {
		padding-right:0px;
	}
	.element div.left-block .main-image-block {
		clear:both;
		width:100%; 
	}
	.element div.left-block .main-image-block img {
		width:100% !important;  
		height:auto;
	}
	.element div.left-block .thumbs-block ul {
		width:100%; 
	}
}
</style>
<div class="element hugeitmicro-item">
	<div class="left-block">
		<div class="main-image-block">
			<a href="<?php echo plugins_url( '../images/slider-logo.png' , __FILE__ ); ?>" rel="content"><img src="<?php echo plugins_url( '../images/slider-logo.png' , __FILE__ ); ?>"></a>
		</div>
	</div>
	<div class="right-block">
		<div class="title-block"><h3>Wordpress Slider</h3></div>
		<div class="description-block">
			<p>Huge-IT slider is an awesome WordPress slider plugin with a lot of nice features. Just install and build sliders in a few minutes.</p>
			<p>Huge-IT Slider is a quick and easy way to add custom sliders to the WordPress websites (both to templates and posts/pages). The slider allows having unlimited amount of images with their titles and descriptions.</p>
		</div>			  				
		<div class="button-block">
			<a href="http://huge-it.com/slider/" target="_blank">View Plugin</a>
		</div>
	</div>
</div>
<div class="element hugeitmicro-item">
	<div class="left-block">
		<div class="main-image-block">
			<a href="<?php echo plugins_url( '../images/potfolio-gallery-logo.png' , __FILE__ ); ?>" rel="content"><img src="<?php echo plugins_url( '../images/potfolio-gallery-logo.png' , __FILE__ ); ?>"></a>
		</div>
	</div>
	<div class="right-block">
		<div class="title-block"><h3>Wordpress Portfolio/Gallery</h3></div>
		<div class="description-block">
			<p>Portfolio Gallery is perfect for using for creating various portfolios or gallery within various views. The product allows adding descriptions and titles for each portfolio gallery. It is rather useful whever using with various pages and posts, as well as within custom location.</p>
		</div>			  				
		<div class="button-block">
			<a href="http://huge-it.com/portfolio-gallery/" target="_blank">View Plugin</a>
		</div>
	</div>
</div>
<div class="element hugeitmicro-item">
	<div class="left-block">
		<div class="main-image-block">
			<a href="<?php echo plugins_url( '../images/lightbox-logo.jpg' , __FILE__ ); ?>" rel="content"><img src="<?php echo plugins_url( '../images/lightbox-logo.jpg' , __FILE__ ); ?>"></a>
		</div>
	</div>
	<div class="right-block">
		<div class="title-block"><h3>Wordpress Lightbox</h3></div>
		<div class="description-block">
			<p>Lightbox is a perfect tool for viewing photos. It is created especially for simplification of using, permits you to view larger version of images and giving an interesting design. With the help of slideshow and various styles, betray a unique image to your website.</p>
		</div>			  				
		<div class="button-block">
			<a href="http://huge-it.com/lightbox/" target="_blank">View Plugin</a>
		</div>
	</div>
</div>
<div class="element hugeitmicro-item">
	<div class="left-block">
		<div class="main-image-block">
			<a href="<?php echo plugins_url( '../images/image-gallery-logo.png' , __FILE__ ); ?>" rel="content"><img src="<?php echo plugins_url( '../images/image-gallery-logo.png' , __FILE__ ); ?>"></a>
		</div>
	</div>
	<div class="right-block">
		<div class="title-block"><h3>Wordpress Image Gallery</h3></div>
		<div class="description-block">
			<p>Huge-IT Gallery images is perfect for using for creating various galleries within various views, to creating various sliders with plenty of styles, beautiful lightboxes with it’s options for any taste. The product allows adding descriptions and titles for each image of the Gallery. It is rather useful wherever using with various pages and posts, as well as within custom location.</p>
		</div>			  				
		<div class="button-block">
			<a href="http://huge-it.com/wordpress-gallery/" target="_blank">View Plugin</a>
		</div>
	</div>
</div>
<div class="element hugeitmicro-item">
	<div class="left-block">
		<div class="main-image-block">
			<a href="<?php echo plugins_url( '../images/share-buttons-logo.png' , __FILE__ ); ?>" rel="content"><img src="<?php echo plugins_url( '../images/share-buttons-logo.png' , __FILE__ ); ?>"></a>
		</div>
	</div>
	<div class="right-block">
		<div class="title-block"><h3>Wordpress Share Buttons</h3></div>
		<div class="description-block">
			<p>Social network is one of the popular places where people get information about everything in the world. Adding social share buttons into your blog or website page is very necessary and useful element for "socialization" of the project.</p>
		</div>			  				
		<div class="button-block">
			<a href="http://huge-it.com/share-buttons/" target="_blank">View Plugin</a>
		</div>
	</div>
</div>
<div class="element hugeitmicro-item">
	<div class="left-block">
		<div class="main-image-block">
			<a href="<?php echo plugins_url( '../images/google-maps-logo.png' , __FILE__ ); ?>" rel="content"><img src="<?php echo plugins_url( '../images/google-maps-logo.png' , __FILE__ ); ?>"></a>
		</div>
	</div>
	<div class="right-block">
		<div class="title-block"><h3>Wordpress Google Map</h3></div>
		<div class="description-block">
			<p>Huge-IT Google Map. One more perfect tool from Huge-IT. Improved Google Map, where we have our special contribution. Most simple and effective tool for rapid creation of individual Google Map in posts and pages.</p>
		</div>			  				
		<div class="button-block">
			<a href="http://huge-it.com/google-map/" target="_blank">View Plugin</a>
		</div>
	</div>
</div>
<div class="element hugeitmicro-item">
	<div class="left-block">
		<div class="main-image-block">
			<a href="<?php echo plugins_url( '../images/video-player-logo.png' , __FILE__ ); ?>" rel="content"><img src="<?php echo plugins_url( '../images/video-player-logo.png' , __FILE__ ); ?>"></a>
		</div>
	</div>
	<div class="right-block">
		<div class="title-block"><h3>Wordpress Video Player</h3></div>
			<p>Inserting video on a page is a perfect way to supplement website with media content and expand the user’s interest in your site. Huge-IT Video Player is extremely necessary video tool for your sites, which provides a wide range of different file formats.</p>
		<div class="description-block">
		</div>			  				
		<div class="button-block">
			<a href="http://huge-it.com/video-player/" target="_blank">View Plugin</a>
		</div>
	</div>
</div>