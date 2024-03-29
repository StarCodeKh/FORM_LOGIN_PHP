
<?php 
	session_start(); 

	if (!isset($_SESSION['email'])) 
	{
		$_SESSION['msg'] = "You must log in first";
		header('location: signin.php');
	}

	if (isset($_GET['logout'])) 
	{
		session_destroy();
		unset($_SESSION['email']);
		header("location: signin.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>

	<!-- library icon fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- style icon -->
    <link href="css/styles.css" rel="stylesheet">

</head>
<body>

	<br>
	<br>
	
	<div class="header text-center">
		<h2>Home Page</h2>
		<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-youtube"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<hr>
		<!-- logged in user information -->
		<?php  if (isset($_SESSION['email'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['email']; ?></strong></p>
		<?php endif ?>
	</div>
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
	</div>
</body>
</html>
