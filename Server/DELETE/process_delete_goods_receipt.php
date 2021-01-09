<?php
require_once("../Connection.php");
$flag=0;
$Receipt_ID=$_GET['Receipt_ID'];
$array_ID=array();
$query="SELECT Receipt_Detail_ID FROM goods_receipt_detail WHERE Receipt_ID=$Receipt_ID" or die ("Error !");
$data = mysqli_query($connect,$query);
while ($row = mysqli_fetch_assoc($data)) {
    array_push($array_ID, $row['Receipt_Detail_ID'],);
}
echo count($array_ID);
for($i=0; $i<count($array_ID); $i++){
    $query1 ="DELETE FROM goods_receipt_detail WHERE Receipt_Detail_ID=$array_ID[$i]";
    if(!mysqli_query($connect,$query1)){
        $flag=1;
    }
}
if($flag==0){
    $query2 ="DELETE FROM goods_receipt WHERE Receipt_ID=$Receipt_ID";
    if(mysqli_query($connect,$query2)){
        header("Location: ../GET/Goods_Receipt.php");
    }
}

?>