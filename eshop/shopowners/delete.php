<?php //Post Params 
 include('db.php');
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	 $query = "DELETE FROM product WHERE id = '$id'"; 
	 
	echo $query;
 $result = $conn->query($query); 

 if( $result )
 {
 	//echo 'Success';
	 ?>
	 <script>
		 alert("Deleted the record");
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