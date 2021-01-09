<?php
  include("Connect.php");

  if($_SERVER['REQUEST_METHOD']=='POST'){

    $OrderDetail_ID=$_POST['OrderDetail_ID'];

    $query ="DELETE FROM order_detail WHERE OrderDetail_ID=$OrderDetail_ID";

    if(mysqli_query($connect,$query)){
      echo '1';
    }
    else {
    }
  }
 ?>
