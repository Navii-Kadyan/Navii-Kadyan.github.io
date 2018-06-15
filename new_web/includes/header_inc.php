<!DOCTYPE html>
<html>
<head>
	<title>My Dynamic Website</title>
	<link rel="stylesheet" type="text/css" href="web_style.css">
</head>
<body>
	<header>
		<nav>
			<div class ="nav_logo">
				<ul>
					<li><a href="#">Brand</a></li>
				</ul>
			</div>
			<div class=nav_menu>
				<ul>
					<?php 
		 if(isset($_SESSION['u_id'])){
		 	echo "<form action = 'includes/logout.inc.php' method='post'>
		 			<button type='submit' name='logout'>Log Out</button>";
		 }
		 else{
		 	echo '
					<li><a href="../new_web/index.php">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="upload.php">Upload</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="signup.php">Signup</a></li> ';
		 }
		 ?>
				</ul>
			</div>
		</nav>
	</header>