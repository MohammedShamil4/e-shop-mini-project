<?php
session_start();
require_once "db.php";
if (isset($_SESSION['uid']) != "") {
header("Location: ../shopowner/index.php");
}
if (isset($_POST['login'])) {
$username    = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (strlen($password) < 4) {
$password_error = "Password must be minimum of 6 characters";
}
$result = mysqli_query($conn, "SELECT * FROM login WHERE username = '" . $username . "' and password = '" . $password . "'");
if ($row = mysqli_fetch_array($result)) {
$_SESSION['uid']     = $row['uid'];
$_SESSION['username']   = $row['username'];
header("Location: ../shopowner/index.php");
} else {
$error_message = "Incorrect Email or Password!" ;
}
}
?>
<html>
<head>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Login Form Using HTML And CSS Only</title>
</head>
<body>

  
	<div class="container" id="container">
		<div class="form-container log-in-container">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<h1>E-SHOP OFFERS <h1>
				<h2>Login</h2>
				
				<br>
				<input type="username" class="form-control" placeholder="username"  name="username" value="" maxlength="30" required=""/>
				<input type="password" placeholder="Password"  name="password" class="form-control" value="" maxlength="8" required=""/>
				<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
				<a href="../registration/register.php">Not a user ? Register now</a>
				<button type="submit" name="login" class="btn btn-primary" name="login" value="submit">login</button>
				<span class="text-danger"><?php if (isset($error_message)) echo $error_message; ?></span>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<img src="..\assets\img\hero-bg.jpg" width="250%" height="100%">
				</div>
			</div>
		</div>
	</div>
</body>
</html>

