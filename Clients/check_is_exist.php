<?php
  include ("Connect.php");

  $Customer_ID=$_POST['Customer_ID'];
  $Product_ID=$_POST['Product_ID'];
  $Classify=$_POST['Classify'];

  $OrderDetail=array();
  $query ="SELECT order_detail.OrderDetail_ID, order_detail.Quantity FROM order_detail JOIN order_a ON order_detail.Order_ID=order_a.Order_ID 
  WHERE order_a.Customer_ID=$Customer_ID AND order_detail.Product_ID=$Product_ID AND order_detail.Classify='$Classify' AND order_a.Status=0";

  $result=mysqli_query($connect,$query);
  if($row = mysqli_fetch_assoc($result)){
    array_push($OrderDetail,new orderdetail (
        $row['OrderDetail_ID'],
        $row['Quantity']
      ));
    echo json_encode($OrderDetail);
  }
  else{
    
  }

  class orderdetail{
    function orderdetail($OrderDetail_ID,$Quantity){
      $this->OrderDetail_ID=$OrderDetail_ID;
      $this->Quantity=$Quantity;
    }
  }
 ?>
