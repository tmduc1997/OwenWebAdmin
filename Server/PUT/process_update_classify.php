<?php
require_once("../Connection.php");
$Classify_ID=$_GET['Classify_ID'];
$name=$_POST['name_classify'];
$display=$_POST['display'];
$product_ID=$_POST['productid'];
$query="UPDATE classify SET Name='$name', Display=$display WHERE Classify_ID=$Classify_ID" or die ("Error !");
if(mysqli_query($connect, $query)){
    header("Location: ../GET/Classify.php?Product_ID=$product_ID");
}

?>
