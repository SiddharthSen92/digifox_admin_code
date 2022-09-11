<?php 
session_start();
if (isset($_SESSION['login_user'])) {
	$name = $_SESSION['login_user'];
}else{
	?>
	<script type="text/javascript">alert("You are not logged in. Please login to continue.");</script>
	<?php
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Home Page</title>
</head>
<body>
	<h1><?php echo $name; ?></h1>
	<form action="" method="POST">
		<button id="logoout" name="logout">LOGOUT</button>
	</form>
	<?php 
	if (isset($_POST['logout'])) {
		unset($_SESSION['login_user']);
		unset($_SESSION['login_id']);
		session_unset();
		session_destroy();
		header("location: index.php");
	}
	?>

</body>
</html>