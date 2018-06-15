<?php 

include_once"includes/header_inc.php";
 ?>
 	<section>
		<div class="main_content"><h3>Sign Up<h3>
			<form class="sign_up" action="includes/sign_up.inc.php" method="post">
				<input type="text" name="name" placeholder="Enter your Name"><br>
				<input type="text" name="user_name" placeholder="Enter your User Name"><br>
				<input type="email" name="email" placeholder="Enter Email"><br>
				<input type="password" name="pass" placeholder="Password"><br>
				<button type="submit" name="submit">Sign-up</button>
			</form>
		</div>
	</section>
	<?php include_once "includes/footer_inc.php" ?>
