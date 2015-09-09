<?php
if(!@session_start()){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Money Masala</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .no_display{
            display: none;
        }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        // init the FB JS SDK
        FB.init({
          appId      : '780026442117302',                        // App ID from the app dashboard
          status     : true,                                 // Check Facebook Login status
          xfbml      : true,                                  // Look for social plugins on the page
          frictionlessRequests : true
        });
        // Additional initialization code such as adding Event Listeners goes here
      };

      // Load the SDK asynchronously
      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/all.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
</head>

<body>
    <div class="container container-width">
        <div class="row">
            <h2 class="text-center head-h2">What do you think ?</h2>
        </div>
        <!--en drow-->
        <div class="row" style="margin-top:2%;">
            <div class="col-md-6 col-sm-12 col-xs-6">
                <div class="div-img img-thumbnail"><img src="images/img1.png" class="img-responsive" alt=""></div>
                <h3 class="pos-neg">Positive</h3>
                <p class="small-po">Positive</p>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">

                <div class="div-img1 img-thumbnail "><img src="images/img1.png" class="img-responsive" alt=""></div>
                <h3 class="pos-neg text-right">Negative</h3>
                <p class="small-po text-right">Negative</p>
            </div>
        </div>
        <!--end row-->
        <div class="row" style="margin-top:2%;">
            <div class="col-xs-12 text-center">
                <p class="ques">There are many variations of passages of Lorem Ipsum available</p>
            </div>
        </div>
        <!--end row-->
        <div class="row" style="margin-top:2%;">
            <div class="col-xs-6">
                <div class="form-group">
                    <textarea name="" id="txt_comments_positive" class="form-control" rows="6" placeholder="Positive"></textarea>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <textarea name="" id="txt_comments_negative" class="form-control" rows="6" placeholder="Negative"></textarea>
                </div>
            </div>
        </div>
        <!--end row-->
        <div class="row">
            <h2 class="text-center head-support">Which one do you support?</h2>
        </div>
        <!--en drow-->
        <div class="row" style="margin-top:3%;">
            <div class="col-xs-12 text-center">
                <a class="btn btn-danger <?=@$_SESSION['fb_id']!=""?"no_display":""?>" href="javascript:void(0);" id="btn_fb_login" style="background:#47639E;border:0px;">
                    <i class="fa fa-facebook fa-lg"></i>
                    Join with Facebook
                </a>
                <a class="btn btn-danger <?=@$_SESSION['fb_id']==""?"no_display":""?>" href="javascript:void(0);" id="btn_post_comment" style="background:#47639E;border:0px;">
                    Post
                </a>
                <br>
            </div>
        </div>
        <!--end row-->
        <div class="row" style="margin-top:2%;">
            <div class="col-xs-6">
                <button class="btn btn-lg btn-success thumb-btn text-left" style="color:#4DAC54;">
                    <span class="fa-stack fa-lg pull-left pro-thu">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-thumbs-up fa-stack-1x fa-inverse"></i>
                  </span>
                    <small>Support &nbsp;3%</small> 
                    <br>&nbsp; <span style="font-weight:bold;"> Positive </span>
                </button>
            </div>
            <div class="col-xs-6">
                <button class="btn btn-lg btn-success thumb-btn text-left" style="color:#F01A34;">
                    <span class="fa-stack fa-lg pull-left ne-thu">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-thumbs-down fa-stack-1x fa-inverse"></i>
                  </span>
                    <small>Support &nbsp;5%</small>
                    <br>&nbsp; <span style="font-weight:bold;"> Negative </span>
                </button>
            </div>
        </div>
        <!--end row-->

        <div class="row" style="margin-top:4%;">
            <div class="col-xs-6">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object img-media" src="images/img1.png" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Media heading</h4> There are many variations of passages of Lorem Ipsum available.There are many variations of passages of Lorem Ipsum available
                        <a href="#" class="vote-btn">VOTE</a>
                    </div>
                </div>
            </div>
            <!--end col-6-->
            <div class="col-xs-6">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object img-media" src="images/img1.png" alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Media heading</h4> There are many variations of passages of Lorem Ipsum available.There are many variations of passages of Lorem Ipsum available
                        <a href="#" class="vote-btn">VOTE</a>
                    </div>
                </div>
            </div>
            <!--end col-6-->
        </div>
        <!--endrow-->


    </div>
    <!--endcontainer-->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $(document).ready(function(){
            $("#btn_fb_login").click(function(){
                login_fb();
            });

            $("#btn_post_comment").click(function(){
                var txt_comments_positive = $("#txt_comments_positive").val();
                var txt_comments_negative = $("#txt_comments_negative").val();
                $.ajax({
                    data: "txt_comments_positive="+txt_comments_positive+"&txt_comments_negative="+txt_comments_negative,
                    type: "post",
                    url: "lib/functions.php?action=comment",
                    success: function(response){
                        if(response=="ok"){
                            console.log("Comment posted.");
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
