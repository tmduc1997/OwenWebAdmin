<?php
require_once("../Connection.php");
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



echo $new;
echo $top;
echo $freeship;
echo $display;
$query="INSERT INTO product (Name,Image,Description,Price,ProCat_ID,New,Top,Freeship,Available,Display) VALUES('$name','$image','$descr',$price,$procat_id,$new,$top,$freeship,$available,$display)" or die ("Error !");
if(mysqli_query($connect, $query)){
    header("Location: ../GET/product.php");
}

?>
