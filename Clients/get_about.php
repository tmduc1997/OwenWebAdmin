<?php
  include "Connect.php";
  $query ="SELECT * FROM about ";
  $data=mysqli_query($connect,$query);
  $array_about=array();

  while ($row = mysqli_fetch_assoc($data)) {
    // code...
    array_push($array_about,new about(
      $row['About_ID'],
      $row['Name'],
      $row['Image'],
      $row['Email'],
      $row['Description'],
      $row['CreateDate'],
      $row['Phone'],
      $row['Address']
    ));
  }
  echo json_encode($array_about);
  class about{
    function about($About_ID,$Name,$Image,$Email,$Description,$CreateDate,$Phone,$Address){
      $this->About_ID=$About_ID;
      $this->Name=$Name;
      $this->Image=$Image;
      $this->Email=$Email;
      $this->Description=$Description;
      $this->CreateDate=$CreateDate;
      $this->Phone=$Phone;
      $this->Address=$Address;
    }
  }
?>
