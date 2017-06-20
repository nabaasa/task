<?php
$id=$_REQUEST['id'];

if(isset($_REQUEST['id'])){
	
	include 'connect.php';
	
	$user=mysqli_query($db,"select * from users where id='$id'");
	
	$row=mysqli_fetch_array($user);
	$data=$row;
	
	echo json_encode($data);
	
	$db=NULL;
	
	
	
	
	
	}

