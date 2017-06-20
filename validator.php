<?php

$email=$_REQUEST['email'];
$password=$_REQUEST['pass'];
$allowed_domains = array("mcash.ug");
$email_domain = array_pop(explode("@", $email));
if(!in_array($email_domain, $allowed_domains)) {
    // Not an authorised email 
	echo "Only mcash accounts allowed ";
	
	
}else{
	
	include 'connect.php';
	
	//check to see if gmail for mcash exists using API
	//dataentrants.
	//or a search
	$email=mysql_real_escape_string($email);
	$password=mysql_real_escape_string($password);
	
	//$password=$_REQUEST['password'];
	
	$password=md5($password);
	
	$save=mysqli_query($db,"insert into dataentrants(id,email,password)values(null,'$email','$password')");
	
	
	if($save){
		echo "Successfully registered";
		
		}else{
			
			echo "You were not  registered";
			
			}
	
	//for login if md5(input)==password..yes
	

	
	
	
	
	
	$db=NULL;
	
	
	
	}

