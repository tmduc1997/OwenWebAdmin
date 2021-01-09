<?php
require_once("../Connection.php");
$Customer_ID=$_GET['Customer_ID'];
$enable=$_POST['enable'];
$query="UPDATE customer set Enable=$enable where Customer_ID=$Customer_ID" or die ("Error !");
if(mysqli_query($connect, $query)){
    header("Location: ../GET/Customer.php");
}

?>
