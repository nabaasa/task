<?php

session_start();
include error_reporting('E_ALL');


?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Data entrant</title>
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
<style>
input{
	border:0;
	border-bottom:2px solid #EEE;
	width:100%;
	height:45px;
	transition:border-bottom 2s ease;
	}
	input:focus{
		outline:none;
		border-bottom:2px solid #e67e22;}
		a{
			color:#e67e22;}



</style>
</head>

<body>

<div style="margin:auto; height:500px; width:450px; border:1px solid #EEE; margin-top:50px;">
<div style="margin-top:0; width:100%; height:45px; text-align:center; color:#fff; line-height:45px; background-color:#e67e22; border-bottom:1px solid #d35400;">DATA ENTRY</div><br/><br/>

<form method="post">

<table width="100%" align="center" cellpadding="5" cellspacing="5">

<tr><td><label>Email</label></td><td><input type="email" name="email" required/></td></tr>
<tr><td><label>Password</label></td><td><input type="password" name="pass" required/></td></tr>
<tr><td><a href="#" data-toggle="modal" data-target="#myModal">Register/Create account</a></td><td><input type="submit" name="sendbtn" value="Submit" style="border:none; width:100%; height:45px; color:#FFF; background-color:#e67e22;"/></td></tr>
</table>

</form>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> <h4 class="modal-title" id="myModalLabel"> CREATE ACCOUNT
</h4> </div> <div class="modal-body">


<form method="post">
<br/><br/>

<table width="100%" align="center" cellpadding="5" cellspacing="5">

<tr><td><label>Email</label></td><td><input type="email" id="regemail" required/></td></tr>
<tr><td><label>Password</label></td><td><input type="password" id="regpass" required/></td></tr>

</table>

</form>
 
 
  </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Close </button> <button type="button" class="btn" style="background:#e67e22; color:#FFF;" id="reg"> Create Account </button> </div> </div><!-- /.modal-content --> </div><!-- /.modal -->


</div>

<?php


if(isset($_POST['sendbtn'])){
	$email=$_POST['email'];
	$password=$_POST['pass'];
	
	$email=mysqli_real_escape_string($email);
	$password=mysqli_real_escape_string($password);
	
	$password=md5($password);
echo $password;
	
	include 'connect.php';
	$check=mysqli_query($db,"select * from dataentrants where email='$email' and password='$password'");
	
	if(mysqli_num_rows($check)>0){
		
		echo "Yes";
		
		}else{
			
			echo "No".mysqli_error($db);
			
			}
	
	
	
	
	$db=NULL;
	
	
	}



?>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>


<script>


$(function(){
	
	
	
	$('#reg').on('click',function(){
		
		var email=$('#regemail').val();
		var pass=$('#regpass').val();
		
		var passurl="?email="+email;
		passurl+="&pass="+pass;
		
		$.get('validator.php'+passurl,function(data){
			
			alert(data);
			
			
			});
		
		
		});
	
	
	
	
	
	});


</script>


</body>
</html>