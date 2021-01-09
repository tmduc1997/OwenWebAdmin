<?php
  include "Connect.php";
  $flag=0;
  $Customer_ID=$_POST['Customer_ID'];
  $Discount=$_POST['Discount'];
  $Order_ID=$_POST['Order_ID'];
  $CreateDate=$_POST['CreateDate'];
  $Score=$_POST['Score'];
  $SL=$_POST['SL'];
  $array_ID=array();
  $array_SL=array();
  $Total;

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

    $query3 ="SELECT SUM(order_detail.Total) as Total FROM order_a JOIN order_detail on order_a.Order_ID=order_detail.Order_ID WHERE order_a.Order_ID=$Order_ID";
      $result=mysqli_query($connect,$query3);
      if($row = mysqli_fetch_assoc($result)){
        $Total=$row['Total']; 
      }


    $query1 ="UPDATE order_a SET Status=1, CreateDate='$CreateDate', Discount=$Discount, Total=$Total WHERE Order_ID=$Order_ID";
    if(mysqli_query($connect,$query1)){
        $query2 ="UPDATE customer SET Score=$Score WHERE Customer_ID=$Customer_ID";
        if(mysqli_query($connect,$query2)){
            echo '1';
        }
      }
}
?>
