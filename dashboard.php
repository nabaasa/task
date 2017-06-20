<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Users</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>

input{
	width:100%;
	height:45px;
	border-bottom:2px solid #EEE;
	border:0;
	transition: border-bottom 1s ease;}
input:focus{
	outline:none;
	border-bottom:2px solid cornflowerblue;}
	


</style>
</head>

<body>


<nav class="navbar navbar-default navbar-fixed-top" role="navigation"> <div class="navbar-header"> <a class="navbar-brand" href="#">Users</a> </div> <div> <form class="navbar-form navbar-left" role="search"> <div class="form-group"> <input type="text" class="form-control" placeholder="Search"> </div> <button type="submit" class="btn btn-default">Find User</button> </form> </div> </nav>

<br/><br/><br/><br/>
<div class="row" style="margin-left:5px; margin-right:5px;">

<div class="col-lg-5 col-md-5">
<br/>
<form>
<table width="100%">
<tr><td><label>Name</label></td><td><input type="text" id="getname" placeholder="enter name"/></td></tr>
<tr><td><label>Mobile</label></td><td><input type="text" id="getmobile" placeholder="enter mobile"/></td></tr>
<tr><td><label>Company</label></td><td><input type="text" id="getcompany" placeholder="enter company"/></td></tr>
<tr><td><input type="submit" value="create user" class="btn btn-success" id="sub"/></td></tr>





</table>




</form>


</div>


<div class="col-lg-7 col-md-7" id="results">



</div>

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> <h4 class="modal-title" id="myModalLabel"> Update/Edit User data </h4> </div> <div class="modal-body" id="cn">
 
  </div> <div class="modal-footer"> <button type="button" class="btn btn-default" data-dismiss="modal">Close </button> <button type="button" class="btn btn-success" id="got"> Submit changes </button> </div> </div><!-- /.modal-content --> </div><!-- /.modal-dialog --> </div><!-- /.modal -->


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>

function editID(id){
	
	//$('#cn').html(id);
	
	$.get('getuser.php?id='+id,function(data){
			console.log(data);
			var data2=JSON.parse(data);
			
			console.log(data2.name);
				$('#cn').html('<table width="100%"><tr><td>Name: </td><td><input type="text" value="'+data2.name+'" class="editname"/></td></tr><tr><td>Mobile: </td><td><input type="text" value="'+data2.mobile+'" class="editmobile"/></td></tr><tr><td>Company:</td><td><input type="text" value="'+data2.company+'" class="editcompany"/></td></tr></table>');
				
				
				$('#got').on('click',function(){
					
			var theeditname=$('.editname').val();
		var theeditmobile=$('.editmobile').val();
		var theeditcompany=$('.editcompany').val();
			//alert(theeditname+theeditmobile+theeditcompany);
			var url="?id="+id;
			url+="&name="+theeditname;
			url+="&company="+theeditcompany;
			url+="&mobile="+theeditmobile;
			
					
				$.get('editUser.php'+url,function(data){
					
					alert(data);
					});	
					
					
					});
				
				
				
				
			
			});
	
	
	

	
	
	}
	
	function deleteID(id){
		
		
		$.get('getuser.php?id='+id,function(data){
			console.log(data);
			var data2=JSON.parse(data);
			
			console.log(data2.name);
			
			
			var n=window.confirm("Delete \n Name: "+data2.name +"\nMobile: "+data2.mobile+"\nCompany: "+data2.company+" ?");
			if(n){
				
				
				
				$.get('deleteUser.php?id='+id,function(data){
					
					alert(data);
					
					});
				
				}
			
			
			
			});
		
		/*var n=window.confirm("Delete ?");
		if(n){
			
			//alert("Data was deleted successfully");
			$.get('getUser.php',function(data){
				
				alert(data);
				
				});
			
			}*/
		
		
		
		}
		
		function cardID(id){
			
			alert("Generate CSV for only "+id);
			
			}

$(function(){
	//$('#myModal').modal({ keyboard: true});
	
	
	
	
	
	$('#sub').on('click',function(){
		
		var name=$('#getname').val();;
		var company=$('#getcompany').val();
		var mobile=$('#getmobile').val();
		
		var saveurl="?name="+name;
		saveurl+="&company="+company;
		saveurl+="&mobile="+mobile;
		
		$.get('saveusertodb.php'+saveurl,function(data){
			
			alert(data);
			
			});
		
		
		});
	
	
	
	
	
	//setInterval(function(){
		
		$.ajax({
		
		url:'getUsers.php',
		type:"POST",
		
		beforeSend: function(){
			$('#results').html('<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar"aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">40%</div></div>');
			
			},
		success: function(data){
			
			
			$('#results').html(data);
			
			},
		error: function(error){
			alert("error");
			
			}
		});
		
		
		
		//},3000);
	
	
	
	
	
	
	

	});

</script>


</body>
</html>
