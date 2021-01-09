<?php
require_once("../Connection.php");
$Order_ID=$_GET['Order_ID'];
$flag=0;
$query="SELECT product.Available, product.Product_ID, order_detail.Quantity 
FROM order_detail JOIN product ON product.Product_ID=order_detail.Product_ID 
WHERE order_detail.Order_ID=$Order_ID" or die ("Error !");
$array_ID=array();
$array_new_quantity=array();
$data = mysqli_query($connect,$query);
while ($row = mysqli_fetch_assoc($data)) {
    array_push($array_ID, $row['Product_ID']);
    array_push($array_new_quantity, $row['Available']+$row['Quantity']);
}

for($i=0; $i<count($array_ID); $i++){
    $query3="UPDATE product SET Available=$array_new_quantity[$i] WHERE Product_ID=$array_ID[$i]" or die ("Error !");
    if(!mysqli_query($connect, $query3)){
        $flag=1;
    }
}

if($flag==0){
    $query1="DELETE  FROM order_detail WHERE Order_ID=$Order_ID;" or die ("Error !");
    $query2="DELETE  FROM order_a WHERE Order_ID=$Order_ID;" or die ("Error !");
    if(mysqli_query($connect, $query1)){
        if(mysqli_query($connect, $query2)){
            header("Location: ../GET/Order.php");
        }
    }
}


?>
