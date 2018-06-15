<?php 

include_once "includes/header_inc.php";
 ?>
 	<section>
		<div class="main_content"><h3>Log In<h3>
			<form class="log_in" action="includes/log_in.inc.php" method="post">
				<input type="text" name="uid" placeholder="Enter your Name/Email"><br>
				<input type="password" name="pass" placeholder="Password"><br>
				<button type="submit" name="submit">Log In</button>
			</form>
		</div>
	</section>
	<?php include_once "includes/footer_inc.php" ?>
