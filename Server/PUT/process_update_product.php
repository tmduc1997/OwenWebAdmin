<?php
require_once("../Connection.php");
$Product_ID=$_GET['Product_ID'];
$name=$_POST['name_product'];
$image=$_POST['image_product'];
$descr=$_POST['description_product'];
$price=$_POST['price_product'];
$procat_id=$_POST['procat_id'];
$new=$_POST['new'];
$top=$_POST['top'];
$freeship=$_POST['freeship'];
$available=$_POST['available_product'];
$display=$_POST['display'];


echo $freeship;


$query="UPDATE product SET Name='$name',Image='$image',Description='$descr',Price=$price,ProCat_ID=$procat_id,New=$new,Top=$top,Freeship=$freeship,Available=$available,Display=$display WHERE Product_ID=$Product_ID" or die ("Error !");
if(mysqli_query($connect, $query)){
    header("Location: ../GET/Product.php");
}

?>
