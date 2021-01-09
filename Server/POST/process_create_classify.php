<?php
require_once("../Connection.php");
$name=$_POST['name_classify'];
$display=$_POST['display'];
$product_id=$_GET['Product_ID'];

$query="INSERT INTO classify (Name,Product_ID,Display) VALUES('$name',$product_id,$display)" or die ("Error !");
if(mysqli_query($connect, $query)){
    header("Location: ../GET/Classify.php?Product_ID=$product_id");
}

?>
