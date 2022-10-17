<?php
session_start();
if(isset($_SESSION['uid']) =="") {
header("Location: ../login/login.php");
}

$uid=$_SESSION['uid'];
 include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>shop owners page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

 
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href=" " class="logo d-flex align-items-center">
        <img src="assets/img/log.png" alt="">
        <span class="d-none d-lg-block"><?php echo $_SESSION['username']?></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        

    <div class="container text-right">
      <form action="../login/logout.php" method="POST"> 
      <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>
</form>
    </div>

   

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


                  <li class="text-center user-image-back">

                    </li>

<br>
      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>SHOP OWNER</span>
        </a>
      </li><!-- End Dashboard Nav -->

    

    

      <li class="nav-item">
        <a class="nav-link collapsed" href="manage_products.php">
          <i class="bi bi-card-list"></i>
          <span>Manage products</span>
        </a>
      </li><!-- End  product Page Nav -->

 <li class="nav-item">
        <a class="nav-link collapsed" href="manage_offers.php">
          <i class="bi bi-card-list"></i>
          <span>Manage offers</span>
        </a>
      </li><!-- End  offer Page Nav -->

 


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

 
<br>
<center><h2>----------- SHOP IMAGE ---------</h2></center>
<br>


<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("my_shop", $con);
$result = mysql_query("SELECT * FROM shop");
while($row = mysql_fetch_array($result))
  {
                     echo '  
                          <tr>  
                               <td>  
                                    <img src="../registration/images/'.$row['image'].'" height="400" width="400"  class="img-responsive"/>  
                               </td>  
                          </tr>  
                     ';  
                }  
                ?>  





<br>

<BR>
<center><h2>----------------- AVAILABLE PRODUCTS-------------</H2></center>
<br>
<table class="table">
                            <thead>
                              <tr>
                                
                                <th scope="col">NAME</th>
                                <th scope="col">QUANTITY</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">IMAGE</th>
                               <th scope="col">TYPE</th>
	                <th scope="col">BRAND</th>
		<th scope="col"></th>
		<th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>           
<?php
include('db.php');
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("my_shop", $con);

$result = mysql_query("SELECT * FROM product where shop_id=$uid");
while($row = mysql_fetch_array($result))

  {    

?>
                            
                              <tr>
                                <form method="post"  name="form" id="form"> 
                                <td><input type="text" class="form-control" name="product_name"  value="<?php echo $row['product_name']; ?>"></td>
		   <td><input type="text" class="form-control" name="product_quantity"  value="<?php echo $row['product_quantity']; ?>"></td>
                                <td><input type="text" class="form-control" name="product_price"  value="<?php echo $row['product_price']; ?>"></td>
                                <td><?php echo "<img src=".$row['product_img'].' width=50px height="50px">'; ?></td>
		   <td><input type="text" class="form-control" name="product_type"  value="<?php echo $row['product_type']; ?>"></td>
                                <td><input type="text" class="form-control" name="brand"  value="<?php echo $row['brand']; ?>"></td>
                              
                               </tr>
                            </form>
    <?php
 }
?>                       
                            </tbody>
                          </table>
  </main><!-- End #main -->
 <!-- ======= Footer ======= -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>