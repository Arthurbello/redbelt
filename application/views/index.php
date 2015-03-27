<!DOCTYPE html>
<html>

<head lang="en">

    <meta charset="UTF-8">
	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

	<title>HI</title>
    

	<link rel="stylesheet" type="text/css" href="/assets/css/index.css">
	
</head>
<body>
 	<?php  
 	if ($this->session->userdata('first_name') == NULL) {
 	?>
	 	<div class='cover'>
	 		<?php if ($this->session->flashdata('registration_error') != NULL){
		 			foreach ($this->session->flashdata('registration_error') as $answer)
			    		echo $answer. '<br>';
			    	 ; 
			    	 }?>
			    	 
			<?php if ($this->session->flashdata('registration_error_form') != NULL){
				echo $this->session->flashdata('registration_error_form');
				 } ?>
			    	 
			<?php if ($this->session->flashdata('success') != NULL){
			    		echo $this->session->flashdata('success');
			    	 ; 
			    	 }?>    	 
		 	<form enctype="multipart/form-data" id='registration' style='width: 60%; margin: 0 auto; text-align: center;' action='/main/process_registration' method='post' class="pure-form">
		    <fieldset>
		    	
				<h2> Register </h2>
				 <img id='shower'  src="#" alt="your image" />
				<input name='dp' type='file' onchange="readURL(this);" /><br><br>
		    	<label for='email'>Email</label><br><br>
		 		<input class='checkers_register' required id='email' type='text' placeholder='email' name='email'><br><br>
		 		<label for='first_name'>First Name</label><br><br>
		 		<input class='checkers_register' required id='first_name' type='text' placeholder='First Name' name='first_name'><br><br>
		 		<label for='last_name'>Last name</label><br><br>
		 		<input class='checkers_register' required id='last_name' type='text' placeholder='Last Name' name='last_name'><br><br>
		 		<label for='password'>Password</label><br><br>
		 		<input class='checkers_register passwords' required id='password' type='password' placeholder='Password' name='password'><br>
		 		<span id='count'>Must be greater than 5 characters</span><br><br>
		 		<label for='password_confirmation'>Confirm Password</label><br><br>
		 		<input class='checkers_register passwords' required id='password_confirmation' type='password' placeholder='Confirm Password' name='passconf'><br>
		 		<span id='match'>Does not match password</span><br><br>
		 		<input disabled id = 'register' class="pure-button pure-button-primary" name='register' type='submit' value='Submit'><br><br>
		 		<a id='switch_login' class="button-secondary pure-button">Already a User?</a>
		 	</fieldset>
		 	</form>
	
		 	<form id='login' style='width: 60%; margin: 0 auto; text-align: center;' action='/main/process_login'  method='post' class="pure-form">
		    	
		    <?php if($this->session->flashdata('login_error') !== NULL) {echo $this->session->flashdata('login_error');};?>
		    <fieldset>
		    	<h2> Login </h2>
		    	<label for='email'>Email</label><br><br>
		 		<input  class='checkers_login' required id='email_login' type='text' placeholder='email' name='email'><br><br>
		 		<label for='password'>Password</label><br><br>
		 		<input  class='checkers_login' required id='password_login' type='password' placeholder='Password' name='password'><br><br>
		 		<input disabled id='login_user' class="pure-button pure-button-primary" name='login' type='submit' value='Sign in'><br><br>
		 		<a id='switch_registration' class="button-secondary pure-button">New? Register</a>
		 	</fieldset>
		 	</form>
	 	</div>
	 		<?php if ($this->session->flashdata('registration_error') != NULL){?>
			    	 <script>
				    	 $('#login').hide();
				    	 $('#registration').show();
				     </script>
			    	 <?php
			    	 }
	}
	else {
		foreach ($query->result() as $value) {
			
			var_dump($value);
			foreach ($query2->result() as $review){
				if ($review->books_id == $value->id){
					echo($review->review);
				}
			}
		}
	}
	?>
		    	 
 		<script type="text/javascript">
 		function readURL(input) {
        if (input.files && input.files[0]) {
        	$('#shower').show();
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#shower')
                    .attr('src', e.target.result)
                    .width(200);
                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
 		setInterval(function(){ $('#successful').fadeOut(1000); }, 5000);
 		

 		$('.passwords').keyup(function() {
 			if ($('#password').val().length<6) {
 				$('#count').show()
 			}
 			else {
 				$('#count').hide()
 			}

 			if ($('#password').val() !== $('#password_confirmation').val()) {
 				$('#match').show()
 			}
 			else {
 				$('#match').hide()
 			}
 		})


 		$('#switch_registration').click(function() {
 				$('#login').fadeOut(500, function() {
 					$('#registration').fadeIn(500)
 				})

 			})

 			$('#switch_login').click(function() {
 				$('#registration').fadeOut(500, function() {
 					$('#login').fadeIn(500)
 				})

 			})

 			function isValidEmailAddress(emailAddress) {
			    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
			    return pattern.test(emailAddress);
			};
			// if( $('#first_name').val().replace(/ /g,'').length <2 || $('#last_name').val().replace(/ /g,'').length <2 || $('#email').val().replace(/ /g,'').length <2 || $('#password').val().replace(/ /g,'').length <2 || $('#password_confirmation').val().replace(/ /g,'').length <2 ) { 
			// 	 	document.getElementById("register").disabled = true;
			// 	 }
			// else { document.getElementById("register").disabled = false; }
		// })
			$('.checkers_register').keyup(function() {
				// $('#get_quote').val($('#quote').val())
				// console.log($('#firstname').val().replace(/ /g,'').length);
				// console.log($('#quote').val().replace(/ /g,'').length); 
				if( $('#first_name').val().replace(/ /g,'').length <2 || $('#last_name').val().replace(/ /g,'').length <2 || $('#email').val().replace(/ /g,'').length <2 || $('#password').val().replace(/ /g,'').length <6 || $('#password_confirmation').val().replace(/ /g,'').length <6 || $('#password').val() !== $('#password_confirmation').val() || !isValidEmailAddress( $('#email').val() )) { 
				 	document.getElementById("register").disabled = true;
				 }
			else { document.getElementById("register").disabled = false; }

			})

			// if( $('#email_login').val().replace(/ /g,'').length <2 || $('#password_login').val().replace(/ /g,'').length <2 ) {
			// 	 	document.getElementById("login").disabled = true;
			// 	 }
			// else { document.getElementById("login").disabled = false; }
		// })
			$('.checkers_login').keyup(function() {
				// $('#get_quote').val($('#quote').val())
				// console.log($('#firstname').val().replace(/ /g,'').length);
				// console.log($('#quote').val().replace(/ /g,'').length); 
				if( $('#email_login').val().replace(/ /g,'').length <2 || $('#password_login').val().replace(/ /g,'').length <5 ) {
				 	document.getElementById("login_user").disabled = true;
				 }
			else { document.getElementById("login_user").disabled = false; }

			})

 		</script>
 </body>
</html>