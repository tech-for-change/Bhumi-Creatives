<!--
	Title: Bhmui Creatives - Notifications Page for General Users
-->
<!DOCTYPE html>
<html>
<head>
	<title>Notification</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

 	<link rel="stylesheet" type="text/css" href="../../assets/css/gen/styles.css"/>
	<link rel="icon" type="image/png" href="../../assets/img/siteicon.png" />
</head>

<body>




	<?php
	session_start();
		include 'header.php';
		include '../common/connection.php';
	
		if(isset($_SESSION['user']))
			$user = $_SESSION['user'];
		else
			header("Location:../index.php");
		$sql = "SELECT * FROM notification WHERE uname='".$user."';";
		$result = $conn->query($sql) or die($conn->error);
		if ($result->num_rows > 0){
			echo "<div class='row justify-content-md-center'><div class='col-md-8 m-2 '><div class='card'> <div class='card-body '><h2><strong>Notifications</strong><h2></div></div></div></div>";
			while($row = $result->fetch_assoc()){
				$message = $row['message'];
				$dates = $row['dateCheck'];
				echo "<div class='row justify-content-md-center'><div class='col-md-8 m-2'><div class='card'> <div class='card-body'>".$dates."<br><b>Message</b>: ".$message."</div></div></div></div>";
				$sql = "UPDATE notification SET status='read' WHERE uname='".$user."';";
				$result1 = $conn->query($sql);
			}
			echo "</div>";
		}
		else{
			echo "<div class='container-fluid'> <h3>All Notifications Read.</h3>";
			echo "</div>";
		}
		$conn->close();
	?>
	<!-- Call footer.php for Footer Bar-->
    <?php include "..//common//footer.php"; ?>
	
</body>
</html>
