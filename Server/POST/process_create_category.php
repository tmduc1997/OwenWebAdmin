<?php
require_once("../Connection.php");
$name=$_POST['name_category'];
$image=$_POST['image_category'];
$descr=$_POST['description_category'];

$query="INSERT INTO productcategory (Name,Image,Description) VALUES('$name','$image','$descr')" or die ("Error !");
if(mysqli_query($connect, $query)){
    header("Location: ../GET/Category.php");
}

?>
