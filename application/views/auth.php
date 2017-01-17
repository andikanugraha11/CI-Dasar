<html>
<head>
<meta name="google-signin-client_id" content="627484450598-bif69q62j2tv83762o8n468m13df5he0.apps.googleusercontent.com">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
<link rel="stylesheet" media="screen and (max-width: 1200px) and (min-width: 0px)" type="text/css" href="<?php echo base_url(); ?>css/styleresponsive1.css">
<link rel="stylesheet" media="screen and (max-width: 600px) and (min-width: 0px)" type="text/css" href="<?php echo base_url(); ?>css/styleresponsive2.css">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>
<div id="main">
<div id="envelope">
<?php if (isset($authUrl)){ ?>
<header id="sign_in">
<h2>CodeIgniter Login With Google Oauth PHP</h2>
</header>
<hr>
<div id="content">
<center><a href="<?php echo $authUrl; ?>"><img id="google_signin" src="<?php echo base_url(); ?>images/google_login.jpg" width="100%" ></a></center>
</div>
<?php }else{ ?>
<header id="info">
<a target="_blank" class="user_name" href="<?php echo $userData->link; ?>" /><img class="user_img" src="<?php echo $userData->picture; ?>" width="15%" />
<?php echo '<p class="welcome"><i>Welcome ! </i>' . $userData->name . "</p>"; ?></a><a class='logout' href='https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=<?php echo base_url(); ?>index.php/user_auth/logout'>Logout</a>
</header>
<?php
echo "<p class='profile'>Profile :-</p>";
echo "<p><b> First Name : </b>" . $userData->given_name . "</p>";
echo "<p><b> Last Name : </b>" . $userData->family_name . "</p>";
echo "<p><b> Gender : </b>" . $userData->gender . "</p>";
echo "<p><b>Email : </b>" . $userData->email . "</p>";
?>
<?php }?>
</div>
</div>
<div class="g-signin2" data-onsuccess="onSignIn"></div>
</body>
</html>
<script type="text/javascript">
	function onSignIn(googleUser) {
		  var profile = googleUser.getBasicProfile();
		  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
		  console.log('Name: ' + profile.getName());
		  console.log('Image URL: ' + profile.getImageUrl());
		  console.log('Email: ' + profile.getEmail());
}
</script>