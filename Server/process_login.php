<?php
require_once("Connection.php");
  session_start();
  $Email=$_POST['Email'];
  $PassWord=$_POST['PassWord'];

  $Customer=array();
  $query ="select * from staff where Email='$Email' and PassWord='$PassWord'";
  //$query ="select * from customer where Username='".$Username."' and PassWord='".$PassWord."'";

  $result=mysqli_query($connect,$query);

  if($row=mysqli_fetch_assoc($result)){
    
    // echo $row['Email'];
    // echo $row['Password'];
    // echo $row['Permission'];

    $_SESSION["email"] = $row['Email'];
    $_SESSION["password"] = $row['Password'];
    $_SESSION["permission"] = $row['Permission'];
    $_SESSION["avatar"] = $row['Avatar'];
    $_SESSION["admin_id"] = $row['Admin_ID'];

    header("Location: ../Server/GET/Category.php");
  }
  else{
    header("Location: ../Server/login.php");
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
