<?php

$id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$mobile=$_REQUEST['mobile'];
$company=$_REQUEST['company'];


if(isset($name)&& isset($mobile)){
	
	include 'connect.php';
	
	
	$edit=mysqli_query($db,"update users set AccountName='$name',PAN='$mobile',phone='$company' where id='$id'");
	
	if($edit){
		
		echo "Update was successfull.";
		
		}else{
			
			
			echo mysqli_error($db);
			}
	
	
	
	$db=NULL;
	
	}
