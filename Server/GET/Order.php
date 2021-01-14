
<?php
include ("../header.php");
?>
<script type="text/javascript">
    function deleteOrder(id) {
        if(confirm("Do you want to delete this record ?")){
            location.href = "../DELETE/process_delete_order.php?Order_ID="+id;           
        }
    }
</script>
<div class="content mt-3">

            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">ORDERS</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Customer</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Discount</th>
                                            <th>State</th>
                                            <th>Staff</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Detail</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require_once("../Connection.php");
                                    $query ="SELECT order_a.Order_ID, customer.FullName, order_a.CreateDate,order_a.Shipping_status, SUM(order_detail.Total) as Total,order_a.Discount, staff.Name FROM customer JOIN order_a ON customer.Customer_ID=order_a.Customer_ID JOIN staff ON order_a.Admin_ID=staff.Admin_ID JOIN order_detail ON order_a.Order_ID=order_detail.Order_ID WHERE order_a.Status=1 AND order_a.Shipping_status!=4 AND order_a.Cancel=0 GROUP BY order_a.Order_ID";
                                    $result=mysqli_query($connect,$query);
                                    $data=array();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $data[]=$row;
                                    }
                                    for($i=0;$i<count($data);$i++){
                                        echo '
                                        <tr>
                                    
                                        <td>'.$data[$i]['Order_ID'].'</td>
                                        <td>'.$data[$i]['FullName'].'</td>
                                        <td>'.$data[$i]['CreateDate'].'</td>
                                        <td>'.$data[$i]['Total'].'</td>
                                        <td>'.$data[$i]['Discount'].'</td>' ;

                                        switch ($data[$i]['Shipping_status']) {
                                            case 0:
                                              echo '<td>Waitting for checked</td>';
                                              break;
                                            case 1:
                                                echo '<td>The order has been received.</td>';
                                              break;
                                            case 2:
                                                echo '<td>The package is being prepared.</td>';
                                              break;
                                            case 3:
                                                echo '<td>The package is being shipped.</td>';
                                                break;
                                            
                                            default:
                                             
                                          }

                                          echo '<td>'.$data[$i]['Name'].'</td>';
                                        
                                        
                                        ?>

                
                                        <td><a href="../PUT/Update_Order.php?Order_ID=<?php echo $data[$i]['Order_ID']?>"><img src="../images/update.png" width="30px" height="30px"/></a></td>
                                        <td><a onclick="deleteOrder (<?php echo $data[$i]['Order_ID']?>);"><img src="../images/delete.png" width="30px" height="30px"/></a></td>
                                        <td><a href="../GET/Order_Detail.php?Order_ID=<?php echo $data[$i]['Order_ID']?>"><img src="../images/detail.png" width="30px" height="30px"/></a></td>
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
