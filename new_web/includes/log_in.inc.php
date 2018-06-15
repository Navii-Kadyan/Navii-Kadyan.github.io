<?php 
session_start();
if(isset($_POST['submit'])){
	include_once "db_connect.php";
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$password = mysqli_real_escape_string($conn, $_POST['pass']);
	if(empty($uid)||empty($password)){
		header("Location: ../login.php?login=empty");
		exit();	
	}
	else{
		$sql = "SELECT * FROM login WHERE user_name='$uid' OR email='$uid'";
		$result = $conn->query($sql);
		if($result->num_rows < 1){
			header("Location: ../login.php?login=error1");
			exit();
		}
		else{
			$row = $result->fetch_assoc();
			if($row['email']='$uid'||$row['user_name']='$uid'){
				// echo $password .$row['password'];
				$passcheck = password_verify($password, $row['password']);
				if($passcheck == false){

					header("Location: ../login.php?login=error2");
					exit();
				}
				elseif($passcheck == true){
					//Log IN the USer HERE
					$_SESSION['u_id'] = $row['id'];
					$_SESSION['u_name'] = $row['name'];
					$_SESSION['u_id'] = $row['user_name'];
					header("Location: ../index.php?login=success");
					exit();
				}
			}
			else{
				header("Location: ../login.php?login=error3");
				exit();
			}
		}
	}
}
else{
	header("Location: ../login.php");
	exit();
}	
 ?>