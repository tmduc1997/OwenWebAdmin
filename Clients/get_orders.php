<?php
  include ("Connect.php");
  $Customer_ID=$_POST['Customer_ID'];
  $array_order=array();
  $query="SELECT * FROM order_a WHERE Customer_ID=$Customer_ID AND Status =1 AND Cancel=0 AND Shipping_status!=4 ORDER BY Order_ID DESC";
  $data = mysqli_query($connect,$query);
  while ($row = mysqli_fetch_assoc($data)) {
    array_push($array_order,new product(
      $row['Order_ID'],
      $row['Customer_ID'],
      $row['CreateDate'],
      $row['Shipping_status'],
      $row['Discount'],
      $row['Shipped_Date'],
    ));
  }
  echo json_encode($array_order);

  class product{
    function product($Order_ID,$Customer_ID,$CreateDate,$Shipping_status,$Discount,$Shipped_Date){
      $this->Order_ID=$Order_ID;
      $this->Customer_ID=$Customer_ID;
      $this->CreateDate=$CreateDate;
      $this->Shipping_status=$Shipping_status;
      $this->Discount=$Discount;
      $this->Shipped_Date=$Shipped_Date;
    }
  }
 ?>
