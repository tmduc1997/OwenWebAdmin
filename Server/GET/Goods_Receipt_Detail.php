
<?php
include ("../header.php");
require_once("../Connection.php");
$Receipt_ID=$_GET['Receipt_ID'];
?>
<div class="content mt-3"> 
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Goods Receipt Detail</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th>Receipt Detail ID</th>
                                            <th>Name</th>
                                            <th>Image</th>

                                            <th>Price</th>
                                        
                                            <th>Quantity</th>
                                            <th>Total</th>

                                            <!-- <th>Edit</th> -->
                                            <!-- <th>Delete</th> -->
                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require_once("../Connection.php");
                                    $query ="SELECT product.Name,product.Image,goods_receipt_detail.Receipt_Detail_ID,goods_receipt_detail.Price,goods_receipt_detail.Quantity,goods_receipt_detail.Total 
                                    FROM goods_receipt JOIN goods_receipt_detail ON goods_receipt.Receipt_ID=goods_receipt_detail.Receipt_ID 
                                    JOIN product ON goods_receipt_detail.Product_ID=product.Product_ID 
                                    WHERE goods_receipt.Receipt_ID=$Receipt_ID";
                                    $result=mysqli_query($connect,$query);
                                    $data=array();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $data[]=$row;
                                    }
                                    for($i=0;$i<count($data);$i++){
                                        echo '
                                        <tr>
                                        <td>'.$data[$i]['Receipt_Detail_ID'].'</td>
                                        <td>'.$data[$i]['Name'].'</td>' ?>

                                        <td><img width="50px" height="50px" src="<?php echo''.$data[$i]['Image'].'' ?>" alt="" ></td>       

                                        <?php
                                        echo '
                                        <td>'.$data[$i]['Price'].'</td>
                                       
                                        <td>'.$data[$i]['Quantity'].'</td> 
                                        <td>'.$data[$i]['Total'].'</td>' ?>
    
                                        <!-- <td><a href="../PUT/Update_Category.php?ProCat_ID=<?php echo $data[$i]['ProCat_ID']?>"><img src="../images/update.png" width="30px" height="30px"/></a></td> -->
                                        <!-- <td><a href="../DELETE/process_delete_order_detail.php?OrderDetail_ID=<?php echo $data[$i]['OrderDetail_ID']?>&Order_ID=<?php echo $Order_ID?>"><img src="../images/delete.png" width="30px" height="30px"/></a></td> -->
                                   
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
