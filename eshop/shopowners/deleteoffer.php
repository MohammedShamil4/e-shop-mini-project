<?php //Post Params 
 include('db.php');
if(isset($_GET['oid']))
{
	$oid=$_GET['oid'];
	 $query = "DELETE FROM offers WHERE oid = '$oid'"; 
	 
	echo $query;
 $result = $conn->query($query); 

 if( $result )
 {
 	//echo 'Success';
	 ?>
	 <script>
		 alert("Deleted the record");
	 window.location="manage_offers.php";
	 </script>
<?php
 }
 else
 {
 	echo 'Query Failed';
 }
}

?>