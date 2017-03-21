<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login | E-Learning</title>

	<link rel="stylesheet" type="text/css" href="bower_components\bootstrap\dist\css\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css\login.css">

	<script src="bower_components\jquery\dist\jquery.min.js"></script>
	<script src="bower_components\bootstrap\dist\js\bootstrap.min.js"></script>
	<script src="js\login.js"></script>

	<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
	<meta name="google-signin-client_id" content="200453912889-ne0gsr1stps83uqqrhfa1abcb39lmjq1.apps.googleusercontent.com">

	<script type="text/javascript" src="bower_components/jquery.fblogin/dist/jquery.fblogin.min.js"></script>

</head>

<script>
	/*function login() 
	{
	  var myParams = {
	    'clientid' : '200453912889-ne0gsr1stps83uqqrhfa1abcb39lmjq1.apps.googleusercontent.com',
	    'cookiepolicy' : 'single_host_origin',
	    'callback' : 'tes',
	    'approvalprompt':'force',
	    'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
	  };
	  gapi.auth.signIn(myParams);
	}

	function tes(googleUser){
		var profile1 = googleUser.getBasicProfile();
		console.log(profile1);
	}

	function loginCallback(result)
	{
	    if(result['status']['signed_in'])
	    {
	        var request = gapi.client.plus.people.get(
	        {
	            'userId': 'me'
	        });
	        request.execute(function (resp)
	        {
	            var email = '';
	            if(resp['emails'])
	            {
	                for(i = 0; i < resp['emails'].length; i++)
	                {
	                    if(resp['emails'][i]['type'] == 'account')
	                    {
	                        email = resp['emails'][i]['value'];
	                    }
	                }
	            }
	            var str = "Name:" + resp['displayName'] + "<br>";
	            str += "Image:" + resp['image']['url'] + "<br>";
	            str += "<img src='" + resp['image']['url'] + "' /><br>";
	 
	            str += "URL:" + resp['url'] + "<br>";
	            str += "Email:" + email + "<br>";
	            document.getElementById("profile").innerHTML = str;
	        });
	 
	    }
	 
	}



	function onSuccess(googleUser) {
	    var profile = googleUser.getBasicProfile();
	    gapi.client.load('plus', 'v1', function () {
	        var request = gapi.client.plus.people.get({
	            'userId': 'me'
	        });
	        //Display the user details
	        request.execute(function (resp) {
	        	console.log(resp);
	            var profileHTML = '<div class="profile"><div class="head">Welcome '+resp.name.givenName+'! <a href="javascript:void(0);" onclick="signOut();">Sign out</a></div>';
	            profileHTML += '<img src="'+resp.image.url+'"/><div class="proDetails"><p>'+resp.displayName+'</p><p>'+resp.emails[0].value+'</p><p>'+resp.gender+'</p><p>'+resp.id+'</p><p><a href="'+resp.url+'">View Google+ Profile</a></p></div></div>';
	            $('.userContent').html(profileHTML);
	            $('#gSignIn').slideUp('slow');
	        });
	    });
	}
	function onFailure(error) {
	    alert(error);
	}
	function renderButton() {
	    gapi.signin2.render('gSignIn', {
	        'scope': 'profile email',
	        'width': 240,
	        'height': 50,
	        'longtitle': true,
	        'theme': 'dark',
	        'onsuccess': onSuccess,
	        'onfailure': onFailure
	    });
	}
	function signOut() {
	    var auth2 = gapi.auth2.getAuthInstance();
	    auth2.signOut().then(function () {
	        $('.userContent').html('');
	        $('#gSignIn').slideDown('slow');
	    });
	}*/


	/*login facebook*/
	window.fbAsyncInit = function() {
		FB.init({
		  appId      : '360118314383005',
		  xfbml      : true,
		  version    : 'v2.8'
		});
		FB.AppEvents.logPageView();
		};

		(function(d, s, id){
		 var js, fjs = d.getElementsByTagName(s)[0];
		 if (d.getElementById(id)) {return;}
		 js = d.createElement(s); js.id = id;
		 js.src = "//connect.facebook.net/en_US/sdk.js";
		 fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

	function loginFB(){
		$.fblogin({
		    fbId: '360118314383005',
		    success: function (data) {
		        //console.log('Basic public user data returned by Facebook', data.name);
		        //window.location.href = "/elearning/";
		        //http://graph.facebook.com/userid_here/picture?type=large
		        $.post("templates/session_set.php", {
		        	"id": data.id,
		        	"nama": data.name
		        }).done(function( data ) {
		        	//if($.trim(data)=="succses"){
		        		window.location.href = "/elearning/";
		        		//alert(data);
		        	//}
				});
		    },
		    error: function (error) {
		        console.log('An error occurred.', error);
		    }
		});
	}

</script>

<body>


<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">

								<form id="login-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
								</form>

								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<button class="loginBtn loginBtn--facebook" style="width:100%" onclick="loginFB()" id="loginFB">Login with Facebook</button>
										</div>
										<!-- <div class="col-md-6">
											<button onclick="login()" class="loginBtn loginBtn--google" style="width:100%">Login with Google</button>
											<div id="gSignIn"></div>
										</div> -->
									</div>
								</div>

								<form id="register-form" action="" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="userContent"></div>
	<div id="profile"></div>

</body>



</html>