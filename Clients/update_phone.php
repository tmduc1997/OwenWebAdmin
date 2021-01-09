<?php
  include("Connect.php");

  if($_SERVER['REQUEST_METHOD']=='POST'){

    $Phone=$_POST['Phone'];
    $ID=$_POST['Customer_ID'];
    
    $query ="UPDATE customer set Phone='$Phone' WHERE Customer_ID=$ID";

    if(mysqli_query($connect,$query)){
      echo '1';
    }
    else {
    
    }
  }
 ?>
