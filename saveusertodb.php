<?php
//include error_reporting('E_ALL');
$name=$_REQUEST['name'];
$company=$_REQUEST['company'];
$mobile=$_REQUEST['mobile'];
if(isset($name)&&isset($mobile)){
	
	include 'connect.php';
	
	$save=mysqli_query($db,"insert into users(id,name,mobile,company)values(null,'$name','$mobile','$company')");
	
	if($save){
		echo "User was created successfully!";
		
		}
	
	
	
	
	$db=NULL;
	
	
	}else{
		
		
		echo "Please fill in the name and mobile numbers";
		
		}