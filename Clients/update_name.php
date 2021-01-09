<?php
  include("Connect.php");

  if($_SERVER['REQUEST_METHOD']=='POST'){

    $Name=$_POST['Name'];
    $ID=$_POST['Customer_ID'];
    
    $query ="UPDATE customer set FullName='$Name' WHERE Customer_ID=$ID";

    if(mysqli_query($connect,$query)){
      echo '1';
    }
    else {
    
    }
  }
 ?>
