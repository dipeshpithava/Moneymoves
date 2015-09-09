<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Webinar</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
		.cms_yt{
			display: none;
		}
	</style>
	<style type="text/css">
	h1,h2,h3,h4{
		padding: 0px;
		margin: 0px;
	}

	.caption-style-2{
		list-style-type: none;
		margin: 0px;
		padding: 0px;
		
	}

	.caption-style-2 li{
		float: left;
		padding: 0px;
		position: relative;
		overflow: hidden;
	}

	.caption-style-2 li:hover .caption{
		opacity: 1;
		transform: translateY(-100px);
		-webkit-transform:translateY(-100px);
		-moz-transform:translateY(-100px);
		-ms-transform:translateY(-100px);
		-o-transform:translateY(-100px);

	}


	.caption-style-2 img{
		margin: 0px;
		padding: 0px;
		float: left;
		z-index: 4;
	}


	.caption-style-2 .caption{
		cursor: pointer;
		position: absolute;
		opacity: 0;
		top:300px;
		-webkit-transition:all 0.15s ease-in-out;
		-moz-transition:all 0.15s ease-in-out;
		-o-transition:all 0.15s ease-in-out;
		-ms-transition:all 0.15s ease-in-out;
		transition:all 0.15s ease-in-out;

	}
	.caption-style-2 .blur{
		background-color: rgba(0,0,0,0.7);
		height: 300px;
		width: 400px;
		z-index: 5;
		position: absolute;
	}

	.caption-style-2 .caption-text h1{
		text-transform: uppercase;
		font-size: 18px;
	}
	.caption-style-2 .caption-text{
		z-index: 10;
		color: #fff;
		position: absolute;
		width: 400px;
		height: 300px;
		text-align: center;
		top:20px;
	}


	/** Nav Menu */
	ul.nav-menu{
		padding: 0px;
		margin: 0px;
		list-style-type: none;
		width: 490px;
		margin: 60px auto;
	}

	ul.nav-menu li{
		display: inline;
		margin-right: 10px;
		padding:10px;
		border: 1px solid #ddd;
	}

	ul.nav-menu li a{
		color: #eee;
		text-decoration: none;
		text-transform: uppercase;
	}

	ul.nav-menu li a:hover, ul.nav-menu li a.active{
		color: #2c3e50;
	} 
	/** content **/
	.content{
		margin-top: 100px;
		margin-left: 100px;
		width: 700px;
	}
	.content h1, .content h2{
		font-family: "Source Sans Pro",sans-serif;
		color: #ecf0f1;
		padding: 0px;
		margin: 0px;
		font-weight: normal;
	}

	.content h1{
		font-weight: 900;
		font-size: 64px;
	}

	.content h2{
		font-size:26px;
	}

	.content p{
		color: #ecf0f1;
		font-family: "Lato";
		line-height: 28px;
		font-size: 15px;
		padding-top: 50px;
	}

	p.credit{
		padding-top: 20px;
		font-size: 12px;
	}

	p a{
		color: #ecf0f1;
	}

	/** fork icon**/
	.fork{
		position: absolute;
		top:0px;
		left: 0px;
	}

	</style>
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	 <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/wow.min.js"></script>
	<script>
		$(document).ready(function(){
			$(".refvid").click(function(){
				var vid_id = $(this).data("refid");
				//$(".est").hide();
				//$(".cms_yt").html('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'+vid_id+'" frameborder="0" allowfullscreen></iframe>');
				$(".est").html('<div class="row"><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="embed-responsive embed-responsive-16by9"><iframe width="100%" height="100%" src="https://www.youtube.com/embed/'+vid_id+'" frameborder="0" allowfullscreen></iframe></div></div></div>');
				//$(".cms_yt").show();
			});
			$(".back").click(function(){
				window.history.back();
			});
			$(".refvid1").click(function(){
				$(".est").html('<iframe width="100%" height="700px" src="http://estv.in/myuniverse/" class="tag-iframe embed-responsive-item"></iframe>');
			});
		});
	</script>
	
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=181509505385603";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<a href="javascript:void(0);" class="back type-2">
					<span> <i class="fa fa-arrow-left"></i> BACK </span>
					<span> <i class="fa fa-arrow-left"></i> BACK </span>
					<span> <i class="fa fa-arrow-left"></i> BACK </span>
					<span> <i class="fa fa-arrow-left"></i> BACK </span>
				</a>
			</div>
	</div><!--end row-->
	<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="embed-responsive embed-responsive-16by9">
				<div class="est">
					<iframe width="100%" height="700px" src="http://estv.in/myuniverse/" class="tag-iframe embed-responsive-item"></iframe>
				</div>
			</div>
			</div>
	</div><!--end row-->
	<hr />
	
	

		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="row">
					<div class="col-lg-12">
						<span class="other">Other Videos:</span>
					</div>
				</div><!--end row-->
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<!--
<a class="refvid" href="javascript:void(0);" data-refid="ta7ITAYTATM"><img src="http://casaestilo.in/moneymasala/webinar/img/vid1.png" class="img-responsive img-thumbnail img-center"/></a>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<a class="refvid" href="javascript:void(0);" data-refid="ta7ITAYTATM"><img src="http://casaestilo.in/moneymasala/webinar/img/vid1.png" class="img-responsive img-thumbnail img-center"/></a>
-->
						<ul class="caption-style-2">
							<li>
								<a class="refvid1" href="javascript:void(0);" data-refid="ta7ITAYTATM"><img src="img/chaps_1x.jpg" alt=""></a>
								<div class="caption">
									<div class="blur"></div>
									<div class="caption-text">
										<p>Webinar</p>
									</div>
								</div>
							</li>
							<?php include_once "functions.php"; ?>
						</ul>
					</div>
				</div><!--endrow-->
			</div><!--end col-6-->
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="fb-comments" data-href="<?="http://".$_SERVER["SERVER_NAME"].$_SERVER['REQUEST_URI']?>" data-numposts="5" data-colorscheme="light"></div>
			</div><!--end col-6-->
	</div><!--end row-->
	

	<div class="video_thumb">
		
	</div>
</div><!--endcontainer-fluid-->
</body>
</html>