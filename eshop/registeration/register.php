<?php
   include('db.php');

    if(isset($_POST['submit']))
    {
        
        $name=$_POST['name'];
        
        $address=$_POST['address'];
        $phone_number1=$_POST['phone_number1'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $shop_name=$_POST['shop_name'];
        $shop_regno=$_POST['shop_regno'];
        $phone_number2=$_POST['phone_number2'];
        $place=$_POST['place'];



  if(isset($_FILES['image'])){
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $expensions= array("jpeg","jpg","png");
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }

 

        $sql="INSERT INTO `login` (`username`, `password`) VALUES ('$username', '$password')";
        $result=$conn->query($sql);
        $sql="INSERT INTO `shop_owner` (`uid`,`name`,`address`,`phone_number`,`email`) VALUES (LAST_INSERT_ID(),'$name','$address','$phone_number1','$email')";
        $result=$conn->query($sql);
        $sql="INSERT INTO `shop` (`shop_id`,`shop_name`, `place`,`phone_number`,`shop_regno`,`image`) VALUES (LAST_INSERT_ID(),'$shop_name', '$place','$phone_number2','$shop_regno', '$file_name')";
        $result=$conn->query($sql);

    }
?>


  <script type="text/javascript">
             location.href='../login/login.php';
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

  <title>registration form</title>
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
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->
<center>
      <div class="container text-center">
         <font size="6" color="blue" ><b> REGISTRATION FORM OF SHOP OWNER AND SHOP </b></font>
      </div>

    </center>
  
     

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


<br>
      

    

    

      <li class="nav-item">
        <a class="nav-link collapsed" href="../index.php">
          <i class="bi bi-card-list"></i>
          <span>HOME</span>
        </a>
      </li><!-- End  product Page Nav -->

 <li class="nav-item">
        <a class="nav-link collapsed" href="../login/login.php">
          <i class="bi bi-card-list"></i>
          <span>SIGN-IN</span>
        </a>
      </li><!-- End  offer Page Nav -->



    </ul>

  </aside><!-- End Sidebar-->
  <main id="main" class="main">

 


<form method="post" enctype="multipart/form-data">
                          <table class="table">
                            <thead>
                              <B>---------------------------------------- SHOP OWNER DETAILS ---------------------------------------</B><br><br>
                              <tr>
                                <th scope="col">NAME</th>
                                <th scope="col"><input type="text" class="form-control" name="name" required></th>
                              </tr>
                              
                              <tr>
                                <th scope="col">ADDRESS</th>
                                <th scope="col"><input type="text" class="form-control" name="address" required></th>
                              </tr>

                              <tr>
                                <th scope="col">PHONE NUMBER</th>
                                <th scope="col"><input type="number" class="form-control" name="phone_number1"  minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" /required></th>
                              </tr>

                              <tr>
                                <th scope="col">EMAIL</th>
                                <th scope="col"><input type="email" class="form-control" name="email" required></th>
                              </tr>

                              <tr>
                                <th scope="col">USER NAME</th>
                                <th scope="col"><input type="text" class="form-control" name="username" required></th>
                              </tr>

                              <tr>
                                <th scope="col">PASSWORD</th>
                                <th scope="col"><input type="password" class="form-control" name="password" required></th>
                              </tr><br>
                              <tr><th>
                              <B>---------------------------------------- SHOP DETAILS --------------------------------------------------</B><br><br>
                            </th>  
                            </tr>
                              <tr>
                                <th scope="col">SHOP Name</th>
                                <th scope="col"><input type="text" class="form-control" name="shop_name" required></th>
                              </tr>

                              <tr>
                                <th scope="col">PLACE</th>
                                <th scope="col"><input type="text" class="form-control" name="place" required></th>
                              </tr>

                              <tr>
                                <th scope="col">SHOP REG.NO</th>
                                <th scope="col"><input type="text" class="form-control" name="shop_regno" required></th>
                              </tr>

                        <tr>
                                <th scope="col"> SHOP IMAGE</th>
                                <th scope="col"><input type="FILE" class="form-control" name="image" id="image" required></th>
                              </tr>


                              <tr>
                                <th scope="col"> SHOP PHONE NUMBER</th>
                                <th scope="col"><input type="text" class="form-control" name="phone_number2" minlength="10" maxlength="10"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" / required></th>
                              </tr>


                            </thead>
                            
                          </table>
                          <tr>
                            <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                          </tr>
                  </form>


  </main><!-- End #main -->
  



  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>