<?php
  $host="localhost";
  $username="root";
  $password="";
  $database="owen2";

  $connect=mysqli_connect($host,$username,$password,$database);
  mysqli_query($connect,"SET NAMES 'utf8'");

 ?>