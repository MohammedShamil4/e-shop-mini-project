<?php
include('db.php');
if(isset($_POST['submit']))
{
$id = $_POST['id'];  
$product_name=$_POST['product_name'];
$product_quantity=$_POST['product_quantity'];
$product_price=$_POST['product_price'];
$product_img=$_POST['product_img'];
$product_type=$_POST['product_type'];
$brand=$_POST['brand'];
  

		if(!isset($product_img) || empty($product_img))
		$query = " UPDATE product SET id = '$id', product_name = '$product_name',  product_quantity = '$product_quantity',  product_price = '$product_price',  product_type= '$product_type',  brand = '$brand'  WHERE id = '$id' "; 
else
	$query = " UPDATE product SET  id = '$id',  product_name = '$product_name',  product_quantity = '$product_quantity',  product_price = '$product_price', product_img = '$product_img',  product_type= '$product_type',  brand = '$brand'  WHERE id = '$id' "; 
	
 $result = $conn->query($query); 
 if( $result )
 {
 	//echo 'Success';
	 ?>
	 <script>
		 alert("Updated successfully");
	 window.location="manage_products.php";
	 </script>
<?php
 }
 else
 {
 	echo 'Query Failed';
 }
}

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
        <span class="d-none d-lg-block"></span>
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


<!-- ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                  <h2 class="widget-title"><b>Edit products</b></h2>
                 <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
		<input type="hidden" name="id" id="id" class="form-control"  value="<?php echo $_GET['id'];?>"/>
<br class="clear" />	


<?php
$sql2="select*from product where id='".$_GET['id']."'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

?>

	<label for="product_name"> Name</label><input type="text" name="product_name" class="form-control"  id="product_name" value="<?php echo $row2['product_name'];?>"required/>
<br class="clear" /> 

<label for="product_price">Price (Rs)</label><input type="text" name="product_price" id="product_price" class="form-control" value="<?php echo $row2['product_price'];?>"required/>
<br class="clear" /> 

<label for="product_quantity">Quantity</label><input type="text" name="product_quantity" id="product_quantity" class="form-control" value="<?php echo $row2['product_quantity'];?>"required />
<br class="clear" /> 

<label for="product_img">Image</label>&nbsp;
<?php if(isset($row2['product_img']) && !empty($row2['product_img']))
echo "<td><img src='".$row2['product_img']."' width='100'></td>";?>
<input type="text" name="product_img" id="product_img" class="form-control"/>
<br class="clear" /> 

<label for="product_type">Product type</label>
<textarea name="product_type" class="form-control" ><?php echo $row2['product_type'];?></textarea>
<br class="clear" /> 

<label for="brand">Brand</label><input type="text" name="brand" id="brand" class="form-control" value="<?php echo $row2['brand'];?>"required/>
<br class="clear" /> 

<label for="submit"></label>
	<input type="submit" name="submit">
<br class="clear" /> 
</form>
               


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