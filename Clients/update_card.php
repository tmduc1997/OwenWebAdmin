<?php
  include("Connect.php");

  if($_SERVER['REQUEST_METHOD']=='POST'){

    $OrderDetail_ID=$_POST['OrderDetail_ID'];
    $Quantity=$_POST['Quantity'];
    $Price=$_POST['Price'];

    $query ="UPDATE order_detail SET Quantity=$Quantity, Total=$Price WHERE OrderDetail_ID=$OrderDetail_ID";

    if(mysqli_query($connect,$query)){
      echo '1';
    }
    else {
      

    }
  }
 ?>
