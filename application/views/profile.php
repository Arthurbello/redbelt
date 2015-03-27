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
<!-- 		The if statement below checks if the 'friends' array has no users and if it does, it echos the statement below instead of the table
 -->		<?php 
		if ($friends[0]['first_name'] == NULL && $friends[0]['user_id'] == NULL) {
			echo "<p> You have no friends </p>";
		}

		else { ?>
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
				// The foreach loop below goes through the returned array of friends
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
			<?php } ?>

		<h2>Here are some other people you could be friends with</h2>
<!-- 		The if statement below checks if the 'not_friends' array is empty, and if it is, it echos the statement below instead of a table
 -->		<?php if (empty($not_friends)) {
				echo "<p> Wow, you are already friends with everyone </p>";
			}
		else { ?>
		    <table>
				<th>
					Name
				</th>
				<th>
					Action
				</th>
				<?php
				// The foreach loop below goes through the returned array of people who are not the users friends
				foreach ($not_friends as $not_friend) {

					?>
					<tr>
						<td>
							<?php
							echo ' <a href="/main/view_profile/'.$not_friend['id'].'">' .$not_friend['first_name'].'</a>';
							?>
						</td>
						<td>
							<?php
							echo ' <a href="/main/add_friend/'.$not_friend['id'].'">Add</a>';
							?>
						</td> 
					</tr>
					<?php
				}

				?>
			</table>
		<?php } ?>
	</body>
	