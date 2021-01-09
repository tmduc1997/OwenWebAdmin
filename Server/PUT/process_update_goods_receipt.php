<?php
require_once("../Connection.php");
$Receipt_ID=$_GET['Receipt_ID'];
$paid=$_POST['paid'];
$query="UPDATE goods_receipt SET Paid =$paid WHERE Receipt_ID=$Receipt_ID" or die ("Error !");
if(mysqli_query($connect, $query)){
    header("Location: ../GET/Goods_Receipt.php");
}

?>
