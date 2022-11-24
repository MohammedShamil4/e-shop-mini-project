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
       <a href="#">
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
    <a href="logout.php">
    <i class='bx bx-log-out' id="log_out" ></i>
         <span class="links_name">logout</span>
       </a>
       <span class="tooltip">logout</span>
     </li>
     </li>
    </ul>
  </div>
  <section class="home-section">
      <div class="text">Manage shop-owners</div>


<center>

     
<table class="styled-table">
    <thead>
        <tr>
            <th>Uid</th>
            <th>Username</th>
	<th>Shop name</th>
	<th>Place</th>
	<th>Phone number</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
<?php
	  
	  $sql="SELECT l.*,s.* from login l left join shop s on l.uid=s.shop_id";
	  	$result = $conn->query($sql);
	  
	  if ($result->num_rows > 0) {

	
	
  while($row = $result->fetch_assoc()) {
	    $url2="delete.php?uid=".$row['uid'];
       
echo "<tr><td>".$row['uid']."</td>";
echo" <td>".$row['username']."</td>";
echo" <td>".$row['shop_name']."</td>";
echo" <td>".$row['place']."</td>";
echo" <td>".$row['phone_number']."</td>";
echo "<td><a href='$url2'>Delete</td></a></tr>";
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
