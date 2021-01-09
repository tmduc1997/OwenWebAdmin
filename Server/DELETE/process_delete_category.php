<?php
require_once("../Connection.php");
$id=$_GET['ProCat_ID'];
$query="DELETE  FROM productcategory WHERE ProCat_ID=$id;" or die ("Error !");
if(mysqli_query($connect, $query)){
    header("Location: ../GET/Category.php");
}

?>
