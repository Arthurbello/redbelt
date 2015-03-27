<!DOCTYPE html>
<html>
	<head lang="en">
	    <meta charset="UTF-8">
	    <title>Profile Page</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		    <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="style/avgrund.css">
		<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
		<script src="parallax.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css">
<!-- 		<link rel="stylesheet" type="text/css" href="/assets/css/profile.css">
 -->
	</head>
	<body>
		<?php
		echo '<h2>'.$user['first_name'] . '\'s Profile</h2>'; 
		echo '<p>Name:'. $user['first_name'].' '.$user['last_name'] .'</p>';
		?>
	</body>