<!--
	Title: Bhmui Creatives - Upload Form for normal user
-->
<!DOCTYPE html>
<html>
<head>
	<title>Upload</title>


	<script src="../common/cities.js"></script>
    <script src="../common/programe.js"></script>

</head>

<body>		
	
	<?php

	include 'header.php';
	?>
  <?php
			session_start();


			if (isset($_SESSION['user']))
					$user = $_SESSION['user'];
			else
					header("Location:../index.php");

			if (isset($_POST['submit'])) {
					include '../common/connection.php';

					$user = $_SESSION['user'];

					do {
							$uni_id = rand(10, 99);

							$first = $uni_id;
							$chars_to_do = 8 - strlen($uni_id);
							for ($i = 1; $i <= $chars_to_do; $i++) {
									$first .= chr(rand(48, 57));
							}

							$pid = $first;

							$sql1 = "SELECT * FROM project WHERE pid='".$pid.
							"';";
							$result1 = $conn -> query($sql1);

							$sql2 = "SELECT * FROM approval WHERE pid='".$pid.
							"';";
							$result2 = $conn -> query($sql2);

					} while ($result1 -> num_rows > 0 || $result2 -> num_rows > 0);


					$target_dir = "uploads/";
					$target_file = $target_dir.basename($_FILES["file"]["name"]);
					$uploadOk = 1;
					$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

					$target_file_img = $target_dir.$pid.
					".".$imageFileType;

					// Check if image file is a actual image or fake image
					if (isset($_POST["submit"])) {
							$check = getimagesize($_FILES["file"]["tmp_name"]);
							if ($check !== false) {
									echo "<center><h3>File is an image - ".$check["mime"].
									".</h3></center>";
									$uploadOk = 1;
							} else {
									echo "<center><h3>File is not an image.</h3></center>";
									$uploadOk = 0;
							}
					}
					// Check file size
					if ($_FILES["file"]["size"] > 5242880) {
							echo "<center><h3>Sorry, your file is too large.</h3></center>";
							$uploadOk = 0;
					}
					// Allow certain file formats
					if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
							echo "<center><h3>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</h3></center>";
							$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
							echo "<center><h3>Sorry, your file was not uploaded.</h3></center>";
							// if everything is ok, try to upload file
					} else {
							if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_img)) {

							} else {
									echo "<center><h3>Sorry, there was an error uploading your file.</h3></center>";
							}
					}

					$target_dir = "uploads/";
					$target_file = $target_dir.basename($_FILES["source"]["name"]);
					$uploadOk = 1;
					$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

					$target_file = $target_dir.$pid.
					".".$fileType;

					// Check file size
					if ($_FILES["source"]["size"] > 52428800) {
							echo "<center><h3>Sorry, your file is too large.</h3></center>";
							$uploadOk = 0;
					}
					// Allow certain file formats
					if ($fileType != "rar" && $fileType != "zip" && $fileType != "tar" && $fileType != "psd") {
							echo "<center><h3>Sorry, only RAR, ZIP, TAR & PSD files are allowed.</h3></center>";
							$uploadOk = 0;
					}
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
							echo "<center><h3>Sorry, your file was not uploaded.</h3></center>";
							// if everything is ok, try to upload file
					} else {
							if (move_uploaded_file($_FILES["source"]["tmp_name"], $target_file)) {
									$city = $_POST['city'];
									$city = substr($city, 1, strlen($city)-2);

									$tags = $_POST['tag'].
									",".$city.
									",".$_POST['programme'];

									$sql = "INSERT INTO approval VALUES('".$user.
									"','".$pid.
									"','".$_POST['name'].
									"','".$target_file_img.
									"','".$_POST['descri'].
									"','".$_POST['state'].
									"','".$city.
									"','".$_POST['programme'].
									"','".$_POST['project'].
									"','".$tags.
									"','".$target_file.
									"');";
									$result = $conn -> query($sql) or die(mysqli_error($conn));

									$_SESSION['msg'] = "Your file has been successfully uploaded.";
									header('location:myAccount.php');
									exit();
							} else {
									echo "<center><h3>Sorry, there was an error uploading your source file.</h3></center>";
							}
					}
					$conn -> close();
			}
		?>



		<!--form -->
		<div class="container-fluid">
		<div class="row justify-content-md-center">
		<div class="col-md-8 border p-4">
		<form method='post' action='uploading.php' enctype="multipart/form-data">
		<div class="row justify-content-md-center">
		<h2><strong>Upload Form</strong></h2>
		</div>

		<div class="form-group">
   		 <label for="file">Export Image</label>
   		 <input type="file" class="form-control-file" id="file" name='file' required>
			<div style="color:red;">* File size must be < 5MB </div>
			<div>Allowed formats are JPEG, JPG, PNG and GIF</div>
 		 </div>
	  
		<div class="form-group">
			<label>Project/Design Name</label>
		  <input class="form-control" type="text" name='name' required>
		</div>
		<div class="form-group">
			<label>Description</label>
		  <input class="form-control" type="text" name='descri' maxlength="250" required>
		  <div>(Maximum 250 Characters allowed)</div>
		</div>

		<div class="form-group">
		<label>State </label>
		<select onchange="print_city('state', this.selectedIndex);" id="sts" name="state" class="form-control" required></select>
		</div>

		<div class="form-group">
		<label>City</label>
		<select id ="state" class="form-control " name="city" required></select>
		<script language="javascript">print_state("sts");</script>
		</div> 

		<div class="form-group">
		<label>Programme</label>
		<select onchange="print_project('programme', this.selectedIndex);" id="pro" name ="programme" class="form-control" required></select>
		</div> 
		
		<div class="form-group">
		<label>Project</label>
		<select id ="programme" class="form-control " name="project" required></select>
		<script language="javascript">print_programme("pro");</script>
		</div> 

		<div class="form-group">
		<label>Tags</label>
        <input class="form-control" type="text" name='tag' required />
        <div> (Separate different tags using commas)</div>
		</div> 

		<div class="form-group">
		<label>Source File</label>
        <input class="w3-input" type="file" name='source' required />
		<div style="color:red;">* File size must be < 50MB </div>
		<div>Allowed formats are ZIP,RAR,TAR and PSD</div>
		</div>
		
		<button type="submit" class="btn btn-primary">Upload</button>
		</form>
		</div>
		</div>
		</div>
		<!--form -->

			<!-- Call footer.php for Footer Bar-->
    <?php include "..//common//footer.php"; ?>



</body>
</html>
