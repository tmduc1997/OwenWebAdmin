<?php
  include "Connect.php";

  $query ="SELECT * FROM product WHERE Top=1 AND Display=1 ORDER BY RAND() LIMIT 10";
  $data=mysqli_query($connect,$query);
  $array_products=array();

  while ($row = mysqli_fetch_assoc($data)) {
    // code...
    array_push($array_products,new product(
      $row['Product_ID'],
      $row['Name'],
      $row['Image'],
      $row['Description'],
      $row['Price'],
      $row['ProCat_ID'],
      $row['New'],
      $row['Top'],
      $row['Freeship'],
      $row['Available']
    ));
  }
  echo json_encode($array_products);
  class product{
    function product($Product_ID,$Name,$Image,$Description,$Price,$ProCat_ID,$New,$Top,$Freeship,$Available){
      $this->Product_ID=$Product_ID;
      $this->Name=$Name;
      $this->Image=$Image;
      $this->Description=$Description;
      $this->Price=$Price;
      $this->ProCat_ID=$ProCat_ID;
      $this->New=$New;
      $this->Top=$Top;
      $this->Freeship=$Freeship;
      $this->Available=$Available;
    }
  }
?>
