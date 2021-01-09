<?php
require_once("../Connection.php");
$ProCat_ID=$_GET['ProCat_ID'];
$query="SELECT * FROM product WHERE ProCat_ID =$ProCat_ID" or die ("Error !");
$result=mysqli_query($connect,$query);

if(mysqli_num_rows($result)>0){  
    echo '<script type="text/javascript"> alert("Can not delete this record !");location.href = "../GET/Category.php"; </script>';
}
else{
    $query="DELETE  FROM productcategory WHERE ProCat_ID=$ProCat_ID;" or die ("Error !");
    if(mysqli_query($connect, $query)){
    header("Location: ../GET/Category.php");
}
}
?>
