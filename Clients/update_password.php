<?php
  include("Connect.php");

  if($_SERVER['REQUEST_METHOD']=='POST'){

    $Pass=$_POST['PassWord'];
    $ID=$_POST['Customer_ID'];
    
    $query ="UPDATE customer set PassWord='$Pass' WHERE Customer_ID=$ID";

    if(mysqli_query($connect,$query)){
      echo '1';
    }
    else {
    
    }
  }
 ?>
