<?php
  include ("Connect.php");
  $Customer_ID=$_POST['Customer_ID'];
  $array_card=array();
  $query="SELECT order_a.Order_ID, product.Product_ID, product.Name, product.Image, product.Price, product.Available, order_detail.Quantity,order_detail.OrderDetail_ID,order_detail.Classify,order_detail.Total
  FROM product JOIN order_detail ON product.Product_ID=order_detail.Product_ID
  JOIN order_a ON order_detail.Order_ID=order_a.Order_ID
  JOIN customer ON order_a.Customer_ID=customer.Customer_ID WHERE customer.Customer_ID=$Customer_ID AND order_a.Status=0 AND order_a.Cancel=0";
  $data = mysqli_query($connect,$query);
  while ($row = mysqli_fetch_assoc($data)) {
    array_push($array_card,new product(
      $row['Order_ID'],
      $row['Product_ID'],
      $row['Name'],
      $row['Image'],
      $row['Price'],
      $row['Available'],
      $row['Quantity'],
      $row['OrderDetail_ID'],
      $row['Classify'],
      $row['Total']
    ));
  }
  echo json_encode($array_card);

  class product{
    function product($Order_ID,$Product_ID,$Name,$Image,$Price,$Available,$Quantity,$OrderDetail_ID,$Classify,$Total){
      $this->Order_ID=$Order_ID;
      $this->Product_ID=$Product_ID;
      $this->Name=$Name;
      $this->Image=$Image;
      $this->Price=$Price;
      $this->Available=$Available;
      $this->Quantity=$Quantity;
      $this->OrderDetail_ID=$OrderDetail_ID;
      $this->Classify=$Classify;
      $this->Total=$Total;
    }
  }
 ?>
