<?php
require_once("../Connection.php");
$Promotion_ID=$_GET['Promotion_ID'];
$query="DELETE  FROM promotion WHERE Promotion_ID=$Promotion_ID;" or die ("Error !");
if(mysqli_query($connect, $query)){
    header("Location: ../GET/Promotion.php");
}

?>
