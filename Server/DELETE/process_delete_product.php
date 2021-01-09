<?php
require_once("../Connection.php");
$Product_ID=$_GET['Product_ID'];
$query="SELECT * FROM classify WHERE Product_ID =$Product_ID" or die ("Error !");
$result=mysqli_query($connect,$query);

if(mysqli_num_rows($result)>0){
    echo '<script type="text/javascript"> alert("Can not delete this record !");location.href = "../GET/Product.php"; </script>';
}
else{
    $query="DELETE  FROM product WHERE Product_ID=$Product_ID;" or die ("Error !");
    if(mysqli_query($connect, $query)){
        header("Location: ../GET/Product.php");
    }
}

?>
