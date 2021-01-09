<?php
  include ("Connect.php");

  $Email=$_POST['Email'];
  $PassWord=$_POST['PassWord'];
  $query ="INSERT INTO customer (Email,PassWord) VALUES('$Email','$PassWord')";
  if(mysqli_query($connect,$query)){
    echo '1';
  }
  else {
  }
 ?>
