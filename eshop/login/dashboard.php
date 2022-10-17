<?php
session_start();
if(isset($_SESSION['uid']) =="") {
header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Info Dashboard | Tutsmake.com</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="card">
<div class="card-body">
<h5 class="card-title">Name :- <?php echo $_SESSION['username']?></h5>

<form action="logout.php" method="POST"> 
      <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>
</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>