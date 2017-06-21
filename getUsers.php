<?php

include 'connect.php';

$data=mysqli_query($db,"select * from users");


echo '<table class="table"><th>AccountName</th><th>PAN</th><th>Phone</th><th>Edit</th><th>Delete</th><th><a href="cards.php" class="btn btn-primary">Generate Card</a></th>';
while($row=mysqli_fetch_array($data)){
	
	echo "<tr><td>".$row['AccountName']."</td><td>".$row['PAN']."</td><td>".$row['phone']."</td><td><a href='#' class='btn btn-success' data-toggle='modal' data-target='#myModal' onclick='editID(".$row['id'].")'>Edit</a></td><td><a href='#' class='btn btn-danger' onclick='deleteID(".$row['id'].")'>Delete</a></td><td></td></tr>";
	
	}
echo "<table>";

$db=NULL;