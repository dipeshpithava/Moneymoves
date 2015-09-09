function login_fb(){
	FB.login(function(response) {
   if (response.authResponse) {
	   get_user_data();
   } else {
     login_fb();
   }
 }, {scope:'email'});
}

function getLoginStatus(){
	FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
  	get_user_data();
  } else if (response.status === 'not_authorized') {
    login_fb();
  } else {
    login_fb();
  }
 });
}

//get user details from fb
function get_user_data() {
	FB.api('/me', function(response) {
		// console.log(response);
    var email_id = response.email, full_name = response.first_name+" "+response.last_name, username = response.name, fb_id = response.id;
    FB.api(
      "/"+fb_id+"/picture",
      function (response) {
        // console.log(response.data.url);
        var pic = response.data.url;
        $.ajax({
          data: "email_id="+email_id+"&username="+username+"&full_name="+full_name+"&fb_id="+fb_id+"&pic="+pic,
          url: "lib/functions.php?action=login",
          type: "post",
          success: function(response){
            // console.log(response);
            if(response == "ok"){
              $("#btn_post_comment").removeClass("no_display");
              $("#btn_fb_login").addClass("no_display");
            }
          }
        });
      }
    );
	});
}