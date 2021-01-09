<?php
  include ("Connect.php");
  $ProCat_ID=$_POST['ProCat_ID'];
  $array_product=array();
  $query="SELECT * FROM product WHERE ProCat_ID=$ProCat_ID AND Display=1 ORDER BY RAND() LIMIT 6";
  $data = mysqli_query($connect,$query);
  while ($row = mysqli_fetch_assoc($data)) {
    array_push($array_product,new product(
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

  echo json_encode($array_product);

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
