<?php 
session_start();
if (isset($_SESSION['login_user'])) {//if logged in before then go to homepage
	header("location: homepage.php");
}else{//else stay in index page

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>
	<center>
		<h1>Login Here</h1>
	</center>
	<center>
	<form action="#" method="POST">
		<input type="email" name="email" placeholder="Enter your email here" required>
		<input type="password" name="password" placeholder="Enter your password here" required>
		<input type="submit" name="submit" id="submit" value="Submit">
	</form>
	</center>
	<?php 
	$con = mysqli_connect('localhost','root','','DIGIFOX');
	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$query = "SELECT * FROM `regdusers` WHERE email='$email' AND password='$password' AND status=0";
		$res = mysqli_query($con, $query);
		$check = mysqli_fetch_array($res);
		if (isset($check)) {
			$_SESSION['login_user'] = $check['name'];
			$_SESSION['login_id'] = $check['slno'];
			header("location: homepage.php");
		}else{
			?>
			<script type="text/javascript">alert("Wrong email or password. Please try again.");</script>
			<?php
		}
	}

	?>
</body>
</html>