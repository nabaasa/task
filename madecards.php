<?php
 
header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=Usercard.csv');  
	  include 'connect.php';
      $output = fopen("php://output", "a+");  
      fputcsv($output, array( 'AccountName', 'PAN'));  
      $query = "SELECT AccountName,PAN from useraccounts";  
      $result = mysqli_query($db, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);
	  $db=NULL;



