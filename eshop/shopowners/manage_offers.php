<?php
 session_start();
  $uid=$_SESSION['uid'];
  include('db.php');

  

    if(isset($_POST['submit']))
    {
        
        $prd_name=$_POST['prd_name'];
        $prd_quantity=$_POST['prd_quantity'];
        $prd_unitprice=$_POST['prd_unitprice'];
        $prd_netamt=$_POST['prd_netamt'];
        $startingdate=$_POST['startingdate'];
        $endingdate=$_POST['endingdate'];
        $description=$_POST['description'];
        $img=$_POST['img'];

        $sql="INSERT INTO `offers` (`shop_id`,`prd_name`,`prd_quantity`,`prd_unitprice`,`prd_netamt`,`startingdate`,`endingdate`,`description`,`img`) VALUES ('$uid','$prd_name','$prd_quantity','$prd_unitprice','$prd_netamt','$startingdate','$endingdate','$description','$img')";
        $result=$conn->query($sql);

     
       

?>


  <script type="text/javascript">
             location.href='manage_products.php';
            alert("successfully submitted");

        </script>
   <?php

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
               <img src="assets/img/profile-img.jpg"  class="img-responsive"/>
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

    <div class="pagetitle">
    <U>  <h1>ADD OFFERS</h1></U>
      <BR>
    </div><!-- End Page Title -->

    <section class="section dashboard">
 
    </section>



<form method="post" >
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col"><input type="text" class="form-control" name="prd_name" required></th>
                              </tr>
                              
		<tr>
                                <th scope="col">Quantity</th>
                                <th scope="col"><input type="text" class="form-control" name="prd_quantity" required></th>
                              </tr>

                              <tr>
                                <th scope="col">Unit Price</th>
                                <th scope="col"><input type="text" class="form-control" name="prd_unitprice"  required></th>
                              </tr>
          
                              <tr>
                                <th scope="col">Net Amount</th>
                                <th scope="col"><input type="text" class="form-control" name="prd_netamt" required ></th>
                              </tr>
                              
		<tr>
                                <th scope="col">Starting Date Of Offer </th>
                                <th scope="col"><input type="date" class="form-control" name="startingdate"  required></th>
                              </tr>

		<tr>
                                <th scope="col">Ending Date Of Offer</th>
                                <th scope="col"><input type="date" class="form-control" name="endingdate"  required></th>
                              </tr>

		<tr>
                                <th scope="col">Description</th>
                                <th scope="col"><input type="text" class="form-control" name="description"  required></th>
                              </tr>


		<tr>
                                <th scope="col">Image</th>
                                <th scope="col"><input type="text" class="form-control" name="img"  required></th>
                              </tr>
                            </thead>
                            
                          </table>
                          <tr>
                            <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                          </tr>
                  </form>

<br>
<br>
<H1> MANAGE OFFERS </H2>
<BR>
<BR>

  <table border="1" class='table table-bordered table-striped'>
				<tr><th>Name</th><th>Quantity</th><th>Unit Price</th><th>Net Amount</th><th>Starting Date</th><th>Ending Date </th><th>Description</th><th>Image</th><th>Action</th><th></th></tr>
	  <?php
	  
	  $sql="select*from offers where shop_id=$uid";
	  	$result = $conn->query($sql);
	  
	  if ($result->num_rows>0) {

	
	
  while($row = $result->fetch_assoc()) {
	  $url="editoffer.php?oid=".$row['oid'];
	    $url2="deleteoffer.php?oid=".$row['oid'];
echo "<tr><td>".$row['prd_name']."</td>";
echo "<td>".$row['prd_quantity']."</td>";
echo" <td>".$row['prd_unitprice']."</td>";   
echo"<td>".$row['prd_netamt']."</td>";
echo" <td>".$row['startingdate']."</td>";
echo "<td>".$row['endingdate']."</td>";
echo" <td>".$row['description']."</td>";
echo "<td><img src='".$row['img']."' width='200'></td>";
 echo "<td><a href='$url'>Update</a></td><td><a href='$url2'>Delete</td></a></tr>";
  }
	
} else {
  echo "0 results";
}
	  
	  ?>
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