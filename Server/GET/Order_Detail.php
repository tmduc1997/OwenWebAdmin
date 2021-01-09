
<?php
include ("../header.php");
require_once("../Connection.php");
$Order_ID=$_GET['Order_ID'];
?>
<script type="text/javascript">
    function deleteOrderDetail(orderdetail_id,order_id) {
        if(confirm("Do you want to delete this record ?")){
            location.href = "../DELETE/process_delete_order_detail.php?OrderDetail_ID="+orderdetail_id+"&Order_ID="+order_id;           
        }
    }
</script>
<div class="content mt-3"> 
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th>Order detail ID</th>
                                            <th>Name</th>
                                            <th>Image</th>

                                            <th>Price</th>
                                            <th>Classify</th>
                                            <th>Quantity</th>

                                            <!-- <th>Edit</th> -->
                                            <th>Delete</th>
                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require_once("../Connection.php");
                                    $query ="SELECT order_detail.OrderDetail_ID, product.Name,product.Image,product.Price,order_detail.Classify,order_detail.Quantity FROM product JOIN order_detail ON product.Product_ID=order_detail.Product_ID WHERE order_detail.Order_ID=$Order_ID";
                                    $result=mysqli_query($connect,$query);
                                    $data=array();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $data[]=$row;
                                    }
                                    for($i=0;$i<count($data);$i++){
                                        echo '
                                        <tr>
                                        <td>'.$data[$i]['OrderDetail_ID'].'</td>
                                        <td>'.$data[$i]['Name'].'</td>' ?>

                                        <td><img width="50px" height="50px" src="<?php echo''.$data[$i]['Image'].'' ?>" alt="" ></td>       

                                        <?php
                                        echo '
                                        <td>'.$data[$i]['Price'].'</td>
                                        <td>'.$data[$i]['Classify'].'</td>
                                        <td>'.$data[$i]['Quantity'].'</td> ' ?>
    
                                        <!-- <td><a href="../PUT/Update_Category.php?ProCat_ID=<?php echo $data[$i]['ProCat_ID']?>"><img src="../images/update.png" width="30px" height="30px"/></a></td> -->
                                        <td><a onclick="deleteOrderDetail (<?php echo $data[$i]['OrderDetail_ID']?>,<?php echo $Order_ID?>);"><img src="../images/delete.png" width="30px" height="30px"/></a></td>
                                   
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
