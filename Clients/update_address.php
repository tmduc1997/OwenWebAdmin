<?php
  include("Connect.php");

  if($_SERVER['REQUEST_METHOD']=='POST'){

    $Address=$_POST['Address'];
    $ID=$_POST['Customer_ID'];
    
    $query ="UPDATE customer set Address='$Address' WHERE Customer_ID=$ID";

    if(mysqli_query($connect,$query)){
      echo '1';
    }
    else {
    
    }
  }
 ?>
