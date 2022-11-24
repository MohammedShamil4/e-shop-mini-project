<?php //Post Params 
 include('db.php');
if(isset($_GET['uid']))
{
	$uid=$_GET['uid'];
	 $query = "DELETE FROM login WHERE uid = '$uid'"; 
	  $query = "DELETE FROM shop_id WHERE shop_id = '$uid'";
                  $query = "DELETE FROM shop_owner WHERE uid = '$uid'";
	 $query = "DELETE FROM product WHERE shop_id = '$uid'";
	echo $query;
 $result = $conn->query($query); 

 if( $result )
 {
 	//echo 'Success';
	 ?>
	 <script>
		 alert("Deleted the record");
	 window.location="users.php";
	 </script>
<?php
 }
 else
 {
 	echo 'Query Failed';
 }
}

?>