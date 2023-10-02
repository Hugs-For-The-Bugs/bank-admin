<?php
 
 	include("config.php");
  	$identity = ''; 
	 
	$identity = $_GET['mixhtyr12noitcudorpobguhtennek007'];

	 if(!$identity == '')
	 {
	 	echo  "<script>window.history.back();</script>";
	 }
  
      $sql = "UPDATE accounts SET active ='0' WHERE id='{$identity}'";
      $result = mysqli_query($conn,$sql);  
	  echo 'processing...';

	  header("location:index.php");	

	  //echo  "<script>window.history.back();</script>";
	
 
 ?>
 