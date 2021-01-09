<?php
  include "Connect.php";
  $flag=0;
  $Order_ID=$_POST['Order_ID'];
  $SL=$_POST['SL'];
  $array_ID=array();
  $array_SL=array();

 for($i=0; $i<$SL; $i++){
     $a ='OrderDetail_ID'.$i;
     $b ='Quantity'.$i;
     $id=$_POST[$a];
     $sl=$_POST[$b];
     array_push($array_ID,$id);
     array_push($array_SL,$sl);
 }


 for($i=0; $i<$SL; $i++){
    $query ="UPDATE product SET Available=$array_SL[$i] WHERE Product_ID=$array_ID[$i]";
    if(!mysqli_query($connect,$query)){
        $flag=1;
    }
}
if($flag==0){
    $query1 ="UPDATE order_a SET Cancel=1 WHERE Order_ID=$Order_ID";
    if(mysqli_query($connect,$query1)){
        echo '1';
      }
}
?>
