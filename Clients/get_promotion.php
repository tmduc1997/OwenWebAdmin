<?php
  include ("Connect.php");
  $Customer=array();
  $query ="select * from promotion Order By Promotion_ID DESC";
  $result=mysqli_query($connect,$query);

  if($row = mysqli_fetch_assoc($result)){
    array_push($Customer,new customer(
      $row['Promotion_ID'],
      $row['Name'],
      $row['Image'],
      $row['Description'],
      $row['Start'],
      $row['End'],
      $row['Condition_a'],
      $row['Value_a']
    ));
    echo json_encode($Customer);
  }
  else{
    
  }

  class customer{
    function customer($Promotion_ID,$Name,$Image,$Description,$Start,$End,$Condition_a,$Value_a){
      $this->Promotion_ID=$Promotion_ID;
      $this->Name=$Name;
      $this->Image=$Image;
      $this->Description=$Description;
      $this->Start=$Start;
      $this->End=$End;
      $this->Condition_a=$Condition_a;
      $this->Value_a=$Value_a;
    }
  }

 ?>
