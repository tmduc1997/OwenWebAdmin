<?php
  include ("Connect.php");

  $Customer_ID=$_POST['Customer_ID'];
  $OderID=array();
  $query ="SELECT order_a.Order_ID FROM order_a JOIN customer ON order_a.Customer_ID=customer.Customer_ID
  WHERE customer.Customer_ID=$Customer_ID AND order_a.Status=0";

  $result=mysqli_query($connect,$query);
  if($row = mysqli_fetch_assoc($result)){
    array_push($OderID,new order (
        $row['Order_ID'],
      ));
    echo json_encode($OderID);
  }
  else{
    
  }

  class order{
    function order($Order_ID){
      $this->Order_ID=$Order_ID;
    }
  }
 ?>
