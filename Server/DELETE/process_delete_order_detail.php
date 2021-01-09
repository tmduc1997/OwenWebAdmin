<?php
require_once("../Connection.php");
$OrderDetail_ID=$_GET['OrderDetail_ID'];
$Order_ID=$_GET['Order_ID'];
$New_Quantity;
$Product_ID;
$flag=0;

$query="SELECT product.Product_ID,product.Available, order_detail.Quantity FROM product 
JOIN order_detail ON product.Product_ID=order_detail.Product_ID 
WHERE order_detail.OrderDetail_ID=$OrderDetail_ID" or die ("Error !");
$result=mysqli_query($connect,$query);
if($row = mysqli_fetch_assoc($result)){
    $Product_ID=$row['Product_ID'];
    $New_Quantity=$row['Available']+$row['Quantity'];

    $query1="UPDATE product SET Available=$New_Quantity WHERE Product_ID=$Product_ID" or die ("Error !");
    if(mysqli_query($connect, $query1)){
        $flag=1;
    }
}
if($flag==1){
    $query="DELETE  FROM order_detail WHERE OrderDetail_ID=$OrderDetail_ID;" or die ("Error !");
    if(mysqli_query($connect, $query)){
        header("Location: ../GET/Order_Detail.php?Order_ID=$Order_ID");
}
}

?>
