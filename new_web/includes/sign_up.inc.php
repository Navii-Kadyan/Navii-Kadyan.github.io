<?php 
if(isset($_POST['submit'])){
	include_once "db_connect.php";
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$username = mysqli_real_escape_string($conn, $_POST['user_name']);
	$password = mysqli_real_escape_string($conn, $_POST['pass']);
	// error handlers
	//check for empty fields
	if(empty($name)||empty($email)||empty($username)||empty($password)){
		header("Location: ../signup.php?signup=empty");
		exit();
	}
	else{
	// check if input are valids
		if(!preg_match("/^[a-zA-Z ]*$/",$name)){
			header("Location: ../signup.php?signup=invalid_name");
			exit();		
		}
	// check if email is valid	
		else{
		 	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: ../signup.php?signup=invalid_email");
			exit();
			}
	//check if username is availabe		
			else{
				$sql = "SELECT user_name FROM login WHERE user_name= '$username'" ;
				$result = $conn -> query($sql);
				if($result->num_rows > 0){
				header("Location: ../signup.php?signup=username_taken");
				exit();
				}
	//inserting data			
				else{
					$passwrdSecure = password_hash($password,PASSWORD_DEFAULT);
					$stmt = $conn->prepare("INSERT INTO login(name,email,user_name,password) VALUES(?,?,?,?)");
					$stmt->bind_param("ssss", $name, $email, $username, $passwrdSecure);
					$stmt->execute();
					$stmt->close();
					$conn->close();
					header("Location: ../login.php?signup=success");
				}
			}
		
		
			
			
			

		
		}
	}
}
else{
	header("Location: ../signup.php");
	exit();
}

 ?>