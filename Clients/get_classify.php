<?php
  include "Connect.php";
  $Product_ID=$_POST['Product_ID'];
  $query ="SELECT * FROM classify WHERE Product_ID=$Product_ID AND Display=1";
  $data=mysqli_query($connect,$query);
  $array_classify=array();

  while ($row = mysqli_fetch_assoc($data)) {
    // code...
    array_push($array_classify,new classify(
      $row['Classify_ID'],
      $row['Name'],
      $row['Display']
    ));
  }
  echo json_encode($array_classify);
  class classify{
    function classify($Classify_ID,$Name,$Display){
      $this->Classify_ID=$Classify_ID;
      $this->Name=$Name;
      $this->Display=$Display;
    }
  }
?>
