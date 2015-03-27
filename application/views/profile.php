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
		<link rel="stylesheet" type="text/css" href="/assets/css/profile.css">

	</head>
	<body>
		<a href='/main/out'>Sign out</a>
		<?php
		echo '<h2> Hello '.$this->session->userdata('first_name') . '</h2>'; 
		?>
		<h1> Here are your friends </h1>
		<table>
			<th>
				Name
			</th>
			<th>
				View
			</th>
			<th>
				Unfriend
			</th>
			<?php
			foreach ($friends as $friend) {
				?>
				<tr>
					<td>
					<?php
					echo $friend['first_name'];
					?>
					</td>
					<td>
						<a href='/main/view_profile/<?= $friend['id']?>'>View</a>
					</td>
					<td>
						<a href='/main/delete_friend/<?= $friend['id']?>'>Delete</a>
					</td> 
				</tr>
				<?php
			}

			?>
		</table>

		<h2>Here are some other people you could be friends with</h2>
	    <table>
			<th>
				Name
			</th>
			<th>
				Action
			</th>
			<?php
			foreach ($not_friends as $not_friend) {
				?>
				<tr>
					<td>
					<?php
					echo ' <a href="/main/view_profile/'.$not_friend['id'].'">' .$not_friend['first_name'].'</a>';
					?>
					</td>
					<td>
						<a href='#'>Add</a>
					</td> 
				</tr>
				<?php
			}

			?>
		</table>
	</body>
	