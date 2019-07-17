<!--
	Title: Bhmui Creatives - Notifications Page for Moderators
-->
<!DOCTYPE html>
<html>
<head>
	<title>All Notifications</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../assets/img/siteicon.png" />
	<link rel="stylesheet" type="text/css" href="../../assets/css/gen/styles.css">
</head>
<body>

	<?php
		include 'headerAdmin.php';
		include '../common/connection.php';
		session_start();
		if(isset($_SESSION['user']) && $_SESSION['user'] == "admin")
			$user = $_SESSION['user'];
		else
			header("Location:loginAdmin.php");
		if( isset($_GET['clear']) )
		{
			$sql = "DELETE FROM notification WHERE status='read';";
			$result = $conn->query($sql);
		}
		$sql = "SELECT * FROM notification;";
		$result = $conn->query($sql) or die($conn->error);
		if ($result->num_rows > 0){
			echo "<center><button onclick='clearN()' class='button'>Clear Read Notification</button></center>";
			while($row = $result->fetch_assoc()){
				$message = $row['message'];
				$dates = $row['dateCheck'];
				echo "<br><b>User: </b>".ucfirst($row['uname'])."<br><b>Dated on: </b>".$dates."<br><b>Message</b>:  ".ucfirst($message)."<br>
				<b>Status: </b>".ucfirst($row['status'])."<br>";
			}
			$sql = "UPDATE notification SET status='read' WHERE uname='".$user."';";
			$result1 = $conn->query($sql);
		}
		else{
			echo "<h3>All Notifications Read.</h3>";
		}
		$conn->close();
	?>
	<script type="text/javascript">
		function clearN() {
			window.open("notificationAdmin.php?clear=y","_self");
		}
	</script>
	<!-- Call footer.php for Footer Bar-->
	<?php include "..//common//footer.php"; ?>

</body>
</html>
