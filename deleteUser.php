<?php

$id=$_REQUEST['id'];
if(isset($id)){
	include 'connect.php';
	
	$delete=mysqli_query($db,"delete from users where id='$id'");
	if($delete){
		echo "Delete operation was successfull.";
		
		}
	
	
	
	$db=NULL;
	
	}