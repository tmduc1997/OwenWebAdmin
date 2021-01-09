<?php
require_once("../Connection.php");
$id=$_GET['Promotion_ID'];
$name=$_POST['name'];
$image=$_POST['image'];
$description=$_POST['description'];
$start=$_POST['start'];
$end=$_POST['end'];
$condition=$_POST['condition'];
$value=$_POST['value'];
$query="UPDATE promotion SET Name='$name',Image='$image',Description='$description',Start='$start',End='$end',Condition_a=$condition,Value_a=$value WHERE Promotion_ID=$id" or die ("Error !");
if(mysqli_query($connect, $query)){
    header("Location: ../GET/Promotion.php");
}

?>
