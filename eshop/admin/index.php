<?php
session_start();
if(isset($_SESSION['uid']) =="") {
header("Location: ../login/login.php");
}

$uid=$_SESSION['uid'];
 include('db.php');
?>
<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Sidebar Menu  | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styletable.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
     
        <div class="logo_name"><?php echo $_SESSION['username']?></div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      
      <li>
        <a href="index.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Homepage</span>
        </a>
         <span class="tooltip">Homepage</span>
      </li>
      <li>
       <a href="users.php">
         <i class='bx bx-user' ></i>
         <span class="links_name">Users</span>
       </a>
       <span class="tooltip">Users</span>
     </li>
 
     <li>
       <a href="shopdetails.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">File Manager</span>
       </a>
       <span class="tooltip">Files</span>
     </li>
     

   <li >
    <form action="../login/logout.php" method="POST"> 
         
        <button type="submit" name="logout_btn" style=" background-color:  #11101D; border: none;"><i class='bx bx-log-out'></i><font color="white">logout</font></button>
       </a>
       <span class="tooltip">logout</span>
     </li>
</form>
     </li>
    </ul>
  </div>
  <section class="home-section">
      <div class="text">Dashboard</div>

<center><h2>----------- SHOP IMAGE ---------</h2></center>
<br>

<center>
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
                                    <img src="../registration/images/'.$row['image'].'" height="250" width="300"  class="img-responsive"/>  
                               </td>  
		
                          </tr>  
                     ';  


                }  
                ?>  





<br>

<BR>
<center><h2>----------------- AVAILABLE PRODUCTS-------------</H2></center>
<br>
     
<table class="styled-table">
    <thead>
        <tr>
            <th>PRODUCT NAME</th>
            <th>QUANTITY</th>
            <th>Price</th>
            
        </tr>
    </thead>
    <tbody>
<?php
	  
	  $sql="select*from product";
	  	$result = $conn->query($sql);
	  
	  if ($result->num_rows > 0) {

	
	
  while($row = $result->fetch_assoc()) {
	    
       
echo "<tr><td>".$row['product_name']."</td>";
echo" <td>".$row['product_quantity']."</td>";
echo "<td>".$row['product_quantity']."</td>";


  }
	
} else {
  echo "0 results";
}
	  
	  ?>            
        
    </tbody>
</table>
<br><BR>
<center><h2>----------------- AVAILABLE OFFERS-------------</H2></center>
<br>
     
<table class="styled-table">
    <thead>
        <tr>
            <th>PRODUCT NAME</th>
            <th>QUANTITY</th>
            <th>Price</th>
            
        </tr>
    </thead>
    <tbody>
<?php
	  
	  $sql="select*from offers";
	  	$result = $conn->query($sql);
	  
	  if ($result->num_rows > 0) {

	
	
  while($row = $result->fetch_assoc()) {
	    
       
echo "<tr><td>".$row['prd_name']."</td>";
echo" <td>".$row['prd_quantity']."</td>";
echo "<td>".$row['prd_netamt']."</td>";


  }
	
} else {
  echo "0 results";
}
	  
	  ?>            
        
    </tbody>
</table>
<br>
</center>

  </section>

  <script src="script.js"></script>

</body>
</html>
