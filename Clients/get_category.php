<?php
  include "Connect.php";

  $query ="SELECT * FROM productcategory WHERE Display=1";
  //$query ="select ProCat_ID,Name,Image from productcategory";
  $data=mysqli_query($connect,$query);
  $array_category=array();

  while ($row = mysqli_fetch_assoc($data)) {
    // code...
    array_push($array_category,new productcategory(
      $row['ProCat_ID'],
      $row['Name'],
      $row['Image'],
      $row['Description']
    ));
  }
  echo json_encode($array_category);
  class productcategory{
    function productcategory($Pro_ID,$Name,$Image,$Description){
      $this->ProCat_ID=$Pro_ID;
      $this->Name=$Name;
      $this->Image=$Image;
      $this->Description=$Description;

    }
  }
?>
