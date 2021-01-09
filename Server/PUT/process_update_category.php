<?php
require_once("../Connection.php");
$ProCat_ID=$_GET['ProCat_ID'];
$name=$_POST['name_category'];
$image=$_POST['image_category'];
$discription=$_POST['description_category'];
$query="UPDATE productcategory SET Name='$name',Image='$image',Description='$discription' WHERE ProCat_ID= $ProCat_ID " or die ("Error !");
if(mysqli_query($connect, $query)){
    header("Location: ../GET/Category.php");
}

?>
