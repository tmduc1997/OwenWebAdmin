<?php
  include("Connect.php");
  $Order_ID=$_POST['Order_ID'];
  $Product_ID=$_POST['Product_ID'];
  $Price=$_POST['Price'];
  $Classify=$_POST['Classify'];

  $query ="INSERT INTO order_detail(Order_ID,Product_ID,Quantity,Total,Classify) VALUES($Order_ID,$Product_ID,1,$Price,'$Classify')";

  if(mysqli_query($connect,$query)){
    echo '1';
  }
  else {
    }
 ?>
