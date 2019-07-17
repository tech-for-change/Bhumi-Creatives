<!--
	Title: Bhmui Creatives - Reset Password
-->
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../../assets/img/siteicon.png" />
	<!-- CSS Stylesheets Here -->
	<link rel="stylesheet" type="text/css" href="../../assets/css/login.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/styles.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/my-login.css">
	<link rel="stylesheet" href="../../lib/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- Fonts Here -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>
<body>
	<div class="my-login-page">
	<!-- PHP Open -->
	<?php
		session_start();

		if(isset($_SESSION['user']))
			$user = $_SESSION['user'];
		else
			header("Location:../index.php");

		if(isset($_POST['subPass']))
		{
			include '../common/connection.php';

			$pass = mysqli_real_escape_string($conn, $_POST['pass']);
			$conPass = $_POST['conPass'];

			if($pass == $conPass)
			{
				$salted = '24@fu'.$pass.'45&deo';
				$hashed = hash('sha512', $salted);

				$sql = "UPDATE ulogin SET password='".$hashed."' WHERE uname='".$user."';";
				$result = $conn->query($sql) or die(mysqli_error($conn));

        		$_SESSION['msg'] = "Your Password has been changed successfully.";
        		header('location:myAccount.php');
        		exit();
			}
			else{
				echo "<center><h3>Both Passwords not same.Try again !!</h3></center>";
			}
			$conn->close();
		}
	?>
	<!-- PHP Close -->
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="../../assets/img/logo.jpg" alt="Bhumi logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<form action="resetPassPro.php" method="POST">
								<h4 class="card-title">Reset Password</h4>
									<input class="form-control" type="password" name="pass" placeholder="Enter Password" required/><br>
									<input class="form-control" type="password" name="conPass" placeholder="Enter New Password Again" required/><br><br>
									<input type="submit" name="subPass" value="Change Password"class="btn btn-primary btn-block" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	</center>
</div>

</body>
</html>
