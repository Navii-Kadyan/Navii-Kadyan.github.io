<?php 
include_once "includes/header_inc.php";
 ?>
	<section>
		<div class="main_content">
			<form action ="includes/upload.inc.php" method="post" enctype="multipart/form-data">
			<input type="file" name="file">
			<button type="submit" name="submit">Upload</button>
			</form>
		</div>

	</section>
	<?php include_once "includes/footer_inc.php" ?>;