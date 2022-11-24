<?php //Post Params 
 include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MyResume Bootstrap Template - Index</title>
 

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MyResume - v4.9.2
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<form class="form-inline" method="post"  action="search.php">
<nav class="navbar navbar-default navbar-fixed-top">

       <div class="container">
          <div class="navbar-header">
	<a class="navbar-brand" href="#"> <img src="../max.jpg" height=150 width=200></a>
  
           
            </div><div><h1><I><FONT color=Green><b> shop offers</b></font></I></h1></div><p>

<input type="text" list="products" name="roll_no"  placeholder="enter product name ..">
<datalist id="products">
<?php
$sql="select*from offers";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
?>
<option value="<?php echo $row['prd_name']?>"><?php echo $row['prd_name']?></option>
<?php
}  
?>
</datalist>
<button type="submit" name="save">Search</button>
       
        </p>  </div>
          <!--/.nav-collapse -->
       </div>
    </nav></form>
  <!-- ======= Mobile nav toggle button ======= -->
  <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
  <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">

    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="../index.php" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
      </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header -->

  
  <main id="main">

    <!-- ======= main Section ======= -->


<style type="text/css">


*{
 margin: 0px;
 padding: 0px;
}
section{
 font-family: arial;
}
.main{

 margin: 2%;
}

.card{
     width: 20%;
     display: inline-block;
     box-shadow: 2px 2px 20px black;
     border-radius: 5px; 
     margin: 2%;
    }

.image img{
  width: 100%;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
  

 
 }

.title{
 
  text-align: center;
  padding: 10px;
  
 }

h3{
  font-size: 20px;
 }

.des{
  padding: 3px;
  text-align: center;
 
  padding-top: 10px;
        border-bottom-right-radius: 5px;
  border-bottom-left-radius: 5px;
}
button{
  margin-top: 40px;
  margin-bottom: 10px;
  background-color: white;
  border: 1px solid black;
  border-radius: 5px;
  padding:10px;
}
button:hover{
  background-color: black;
  color: white;
  transition: .5s;
  cursor: pointer;
}

</style>

<div class="main">
 <!--cards -->

<?php
	
               
	  $sql="select*from offers natural join shop  order by offers.prd_netamt ASC ";
	  
	  	$result = $conn->query($sql);
		
	   
	  if ($result->num_rows > 0) {

	
	
  while($row = $result->fetch_assoc()) {
echo '
<div class="card">

<div class="image">
 <img src="'.$row['img'].'" height="180" width="180"  class="img-responsive"> 
</div>
<div class="title">
<h3><b>
product  :  '.$row['prd_name'].'<br>
total amount: ₹  '.$row['prd_netamt'].'</h3>
unit price : ₹ '.$row['prd_unitprice'].'<br>
description : '.$row['description'].'<br>
offers ends in : '.$row['endingdate'].'<br>
shop name : '.$row['shop_name'].'<br>
shop place : '.$row['place'].'
</b>
</div>
<div class="des">

 </div></div> ';

          }  
}

                ?>  

<!--cards -->





</div>
    </section>
    





  </main>
<!--  =======End #main======= -->
  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/typed.js/typed.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  
  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>