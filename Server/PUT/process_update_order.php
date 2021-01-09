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
$Order_ID=$_GET['Order_ID'];
$approved=$_POST['approved'];
$query="UPDATE order_a SET Shipping_status=$approved, Admin_ID=$id  WHERE Order_ID=$Order_ID" or die ("Error !");
if(mysqli_query($connect, $query)){
    header("Location: ../GET/Order.php");
}

?>
