<?php
require_once("../Connection.php");
$id=$_GET['Classify_ID'];
$Product_ID=$_GET['Product_ID'];
$query="DELETE  FROM classify WHERE Classify_ID=$id;" or die ("Error !");
if(mysqli_query($connect, $query)){
    header("Location: ../GET/Classify.php?Product_ID=$Product_ID");
}
?>
