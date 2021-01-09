<?php
//declare(strict_types=1);
require_once("../Connection.php");
$provider_id=$_POST['provider_id'];
$product_id=$_POST['product_id'];
$price_imp=$_POST['price_imp'];
$quantity=$_POST['quantity'];
$receipt_id;
$total=$quantity*$price_imp;
$flag=0;
$new_quantity;

$query1="SELECT Receipt_ID FROM goods_receipt WHERE Provider_ID=$provider_id AND Paid=0" or die ("Error !");
$result1=mysqli_query($connect,$query1);
if($row1 = mysqli_fetch_assoc($result1)){
    $receipt_id= $row1['Receipt_ID'];
    $query5="INSERT INTO goods_receipt_detail (Receipt_ID,Product_ID,Price,Quantity,Total) VALUES($receipt_id,$product_id,$price_imp,$quantity,$total)" or die ("Error !");
    if(mysqli_query($connect, $query5)){
        $query6="SELECT Available FROM product WHERE Product_ID=$product_id" or die ("Error !");
        $result6=mysqli_query($connect,$query6);
        if($row6 = mysqli_fetch_assoc($result6)){
            $new_quantity=$quantity+$row6['Available'];
            $query7="UPDATE product SET Available=$new_quantity WHERE Product_ID=$product_id" or die ("Error !");
            if(mysqli_query($connect, $query7)){
                header("Location: ../GET/Goods_Receipt.php");
            }
        }
    }
}else{
    $query2="INSERT INTO goods_receipt (Provider_ID) VALUE($provider_id);" or die ("Error !");
    if(mysqli_query($connect, $query2)){
        $query3="SELECT Receipt_ID FROM goods_receipt WHERE Provider_ID=$provider_id AND Paid=0" or die ("Error !");
        $result3=mysqli_query($connect,$query3);
        if($row3 = mysqli_fetch_assoc($result3)){
            $receipt_id= $row3['Receipt_ID'];
            $query8="INSERT INTO goods_receipt_detail (Receipt_ID,Product_ID,Price,Quantity,Total) VALUES($receipt_id,$product_id,$price_imp,$quantity,$total)" or die ("Error !");
            if(mysqli_query($connect, $query8)){
                $query9="SELECT Available FROM product WHERE Product_ID=$product_id" or die ("Error !");
                $result9=mysqli_query($connect,$query9);
                if($row9 = mysqli_fetch_assoc($result9)){
                    $new_quantity=$quantity+$row9['Available'];
                    $query10="UPDATE product SET Available=$new_quantity WHERE Product_ID=$product_id" or die ("Error !");
                    if(mysqli_query($connect, $query10)){
                        header("Location: ../GET/Goods_Receipt.php");
                    }
                }
            }
        }
    }
}




?>
