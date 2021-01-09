<?php
  include ("Connect.php");
  $Order_ID=$_POST['Order_ID'];
  $array_order_detail=array();
  
  $query="SELECT product.Product_ID,product.Name,product.Available, product.Price,product.Image, order_detail.Quantity, order_detail.Total 
  FROM product JOIN order_detail ON product.Product_ID=order_detail.Product_ID 
  WHERE order_detail.Order_ID=$Order_ID";
  
  $data = mysqli_query($connect,$query);
  while ($row = mysqli_fetch_assoc($data)) {
    array_push($array_order_detail,new product(
      $row['Product_ID'],
      $row['Name'],
      $row['Available'],
      $row['Price'],
      $row['Image'],
      $row['Quantity'],
      $row['Total']
    ));
  }
  echo json_encode($array_order_detail);

  class product{
    function product($Product_ID,$Name,$Available,$Price,$Image,$Quantity,$Total){
      $this->Product_ID=$Product_ID;
      $this->Name=$Name;
      $this->Available=$Available;
      $this->Price=$Price;
      $this->Image=$Image;
      $this->Quantity=$Quantity;
      $this->Total=$Total;
    }
  }
 ?>
