<?php
 session_start();
 $id=$_SESSION["admin_id"];
?>
<?php
    if(!isset($_SESSION["email"])) {
        header("Location: ../login.php");
    }else{
        
    }
?>
<?php
require_once("../Connection.php");
$name=$_POST['name'];
$image=$_POST['image'];
$descr=$_POST['description'];
$start=$_POST['start'];
$end=$_POST['end'];
$condition=$_POST['condition'];
$value=$_POST['value'];

$query="INSERT INTO promotion (Name,Image,Description,Start,End,Condition_a,Value_a,Admin_ID) VALUES('$name','$image','$descr','$start','$end',$condition,$value,$id)" or die ("Error !");
if(mysqli_query($connect, $query)){
    header("Location: ../GET/Promotion.php");
}

?>
