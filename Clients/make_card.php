<?php
  include("Connect.php");

  if($_SERVER['REQUEST_METHOD']=='POST'){
    $Customer_ID=$_POST['Customer_ID'];

    $query ="INSERT INTO order_a(Customer_ID) VALUES($Customer_ID)";

    if(mysqli_query($connect,$query)){
      echo '1';
    }
    else {
    }
  }
 ?>
