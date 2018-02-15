<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Facebook login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		#fb-btn, #logout {
			display: none
		}
		#googleMaps {
			display: none;
		} 
	</style>
</head>
<body>
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '339937566508414',
	      cookie     : true,
	      xfbml      : true,
	      version    : 'v2.12'
	    });
	      
	    
		FB.getLoginStatus(function(response) {
		    statusChangeCallback(response);
		});   
	      
	  };

	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "https://connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));


	  function statusChangeCallback(response) {
	  	console.log(response);
	  	// Check login state
	  	if(response.status=== "connected") {
	  		console.log('Logged in and authenticated');
	  		setElements(true);
	  		graphAPI();
	  		
	  		
	  		
	  	} else {
	  		console.log('Not authenticated!');
	  		setElements(false);
	  		document.getElementById("graphAPI").innerHTML = "Please log in with facebook.";
	  		
	  	}
	  }


		function checkLoginState() {
		  FB.getLoginStatus(function(response) {
		    statusChangeCallback(response);
		    
		  });
		}

		
		function setElements(isLoggedIn) {
			if(isLoggedIn) {
		// 		document.getElementById("fb-button").style.display = 'none';
		// 		document.getElementById("logout").style.display = 'block';
				document.getElementById("googleMaps").style.display = 'block';
			} else {
		// 		document.getElementById("fb-button").style.display = 'block';
		// 		document.getElementById("logout").style.display = 'none';
				document.getElementById("googleMaps").style.display = 'none';
			}
		}
		// function logout() {
		// 	FB.logout(function(response){
		// 		statusChangeCallback(response);
		// 		setElements(false);
		// 	});
		// }

		function graphAPI() {
			FB.api('/me?fields=id,name,email', function(response){
				if(response && !response.error){
					console.log(response);
					console.log(response.name);
					document.getElementById("graphAPI").innerHTML = "Welcome " + response.name + " your email is: " + response.email;
					
					
				}
			})
		}
	</script>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
        <div class="container">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false"><span class="navbar-toggler-icon"></span></button>
            <div class="navbar-collapse collapse" id="navbarNav" style="">
              <ul class="navbar-nav">
                  <li class="nav-item" id="googleMaps">
                      <a class="nav-link" href="maps.php">Google maps</a>
                  </li>
                  
                  <li class="nav-item" id="fb-button" >
                  	<!-- Because data-auto-logout-link="true" a bunch of code can be commented out!!! It logs out on same button now -->
                    <fb:login-button  class="pt-1" data-auto-logout-link="true" 

                      	  scope="public_profile,email"
                      	  onlogin="checkLoginState();">
                  	</fb:login-button>
                  </li>
                  <!-- <li class="nav-item pt-1" id="logout">
                      <button class="fb-logout-button">Log Out</button>
                  </li> -->
              </ul>
            </div>
          </div>
    </nav>
	<div class="container">
	    <div>
			<p id="graphAPI"></p>
		</div>
	</div>
	
	

	
	<!-- <script>
		document.getElementById("logout").addEventListener('click', logout);
	</script> -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>