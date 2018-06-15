<?php 
if(isset($_POST['submit'])){
  $file_oldname = $_FILES['file']['name'];
  $file_oldtype = $_FILES['file']['type'];
  $file_oldpath = $_FILES['file']['tmp_name'];
  $file_error = $_FILES['file']['error'];
  $file_size = $_FILES['file']['size'];
  $file_axt = explode('.',$file_oldname);
  $file_ext = strtolower(end($file_axt));
  $allowed = array('jpg','jpeg','mp3','mp4','avi');
  if(in_array($file_ext, $allowed)){
  		if($file_error == 0){
  			if($file_size < 10000000){
  				$newname = uniqid('',true).".".$file_ext;
  				$file_dest = "uploads/".$newname;
  				move_uploaded_file($file_oldpath, $file_dest);
  				header("Location: ../upload.php?type=success");
  				exit();		
  			}
  			else{
  				header("Location: ../upload.php?type=largefile");
  				exit();
  			}
  		}
  		else{
  			header("Location: ../upload.php?type=error_uploading");
  			exit();
  		}
  }
  else{
  	header("Location: ../upload.php?type=unsupported");
  	exit();
  }
}


else{
 header("Location: ../upload.php");
 exit();
}
?>

