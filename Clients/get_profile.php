<?php
  include ("Connect.php");

  $Customer_ID=$_POST['Customer_ID'];

  $Customer=array();
  $query ="select * from customer where Customer_ID=$Customer_ID AND Enable=1 ";
  //$query ="select * from customer where Username='".$Username."' and PassWord='".$PassWord."'";

  $result=mysqli_query($connect,$query);

  if($row = mysqli_fetch_assoc($result)){
    array_push($Customer,new customer(
      $row['Customer_ID'],
      $row['FullName'],
      $row['Email'],
      $row['Phone'],
      $row['PassWord'],
      $row['Gender'],
      $row['Address'],
      $row['Score'],
      $row['CreateDate'],
      $row['City'],
      $row['Attendance'],
      $row['Avatar']
    ));
    echo json_encode($Customer);
  }
  else{
    
  }

  class customer{
    function customer($Customer_ID,$FullName,$Email,$Phone,$PassWord,$Gender,$Address,$Score,$CreateDate,$City,$Attendance,$Avatar){
      $this->Customer_ID=$Customer_ID;
      $this->FullName=$FullName;
      $this->Email=$Email;
      $this->Phone=$Phone;
      $this->PassWord=$PassWord;
      $this->Gender=$Gender;
      $this->Address=$Address;
      $this->Score=$Score;
      $this->CreateDate=$CreateDate;
      $this->City=$City;
      $this->Attendance=$Attendance;
      $this->Avatar=$Avatar;
    }
  }

 ?>
