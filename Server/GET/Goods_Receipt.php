
<?php
include ("../header.php");
?>
<script type="text/javascript">
    function deleteGoods_Receipt(id) {
        if(confirm("Do you want to delete this record ?")){
            location.href = "../DELETE/process_delete_goods_receipt.php?Receipt_ID="+id;           
        }
    }
</script>
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Goods receipt</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Receipt ID</th>
                                            <th>Provider</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Paid</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Detail</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require_once("../Connection.php");
                                    $query ="SELECT goods_receipt.Receipt_ID,provider.Name,goods_receipt.CreateDate,sum(goods_receipt_detail.Total) as Total,goods_receipt.Paid 
                                    FROM provider JOIN goods_receipt ON provider.Provider_ID=goods_receipt.Provider_ID 
                                    JOIN goods_receipt_detail ON goods_receipt.Receipt_ID = goods_receipt_detail.Receipt_ID 
                                    GROUP BY goods_receipt.Receipt_ID";
                                    $result=mysqli_query($connect,$query);
                                    $data=array();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $data[]=$row;
                                    }
                                    for($i=0;$i<count($data);$i++){
                                        echo '
                                        <tr>
                                    
                                        <td>'.$data[$i]['Receipt_ID'].'</td>
                                        <td>'.$data[$i]['Name'].'</td>
                                        <td>'.$data[$i]['CreateDate'].'</td>
                                        <td>'.$data[$i]['Total'].'</td>';
                                        
                                        if($data[$i]['Paid']==1){
                                            echo '  <td>Paid</td> ';
                                        }
                                        else{
                                            echo '  <td>Not yes</td> ';
                                        }
                                        
                                        ?>
                                        

                
                                        <td><a href="../PUT/Update_Goods_Receipt.php?Receipt_ID=<?php echo $data[$i]['Receipt_ID']?>"><img src="../images/update.png" width="30px" height="30px"/></a></td>
                                        <td><a onclick="deleteGoods_Receipt (<?php echo $data[$i]['Receipt_ID']?>);"><img src="../images/delete.png" width="30px" height="30px"/></a></td>
                                        <td><a href="../GET/Goods_Receipt_Detail.php?Receipt_ID=<?php echo $data[$i]['Receipt_ID']?>"><img src="../images/detail.png" width="30px" height="30px"/></a></td>
                                        <?php 
                                        echo '
                                    </tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
<?php
include ("../footer.php");
?>
