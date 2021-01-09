
<?php
include ("../header.php");
require_once("../Connection.php");
$Order_ID=$_GET['Order_ID'];
$query ="SELECT order_a.Order_ID, customer.FullName, order_a.CreateDate,SUM(order_detail.Total) as Total, order_a.Shipping_status FROM customer JOIN order_a ON customer.Customer_ID=order_a.Customer_ID JOIN order_detail ON order_a.Order_ID=order_detail.Order_ID WHERE order_a.Order_ID=$Order_ID";
$result=mysqli_query($connect,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<div class="card-body card-block">
        <form action="process_update_order.php?Order_ID=<?php echo $Order_ID?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Update</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Information</p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Customer</label></div>
                <div class="col-12 col-md-9"><input type="text" disabled id="text-input" name="name_classify" class="form-control" value="<?php echo $row['FullName'];?>"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date</label></div>
                <div class="col-12 col-md-9"><input type="text" disabled id="text-input" name="name_classify"  class="form-control" value="<?php echo $row['CreateDate'];?>"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Total</label></div>
                <div class="col-12 col-md-9"><input type="text" disabled id="text-input" name="name_classify" class="form-control" value="<?php echo $row['Total'];?>"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">approved</label></div>
                <div class="col-12 col-md-9">
                    <select name="approved" id="select" class="form-control">
                   <?php
                   switch ($row['Shipping_status']) {
                    case 0:
                        echo '<option value="0" selected="true" >Waitting for checked</option>';
                        echo '<option value="1">The order has been received.</option>';
                        echo '<option value="2">The package is being prepared.</option>';
                        echo '<option value="3">The package is being shipped.</option>';
                      break;
                    case 1:
                        echo '<option value="0">Waitting for checked</option>';
                        echo '<option value="1" selected="true" >The order has been received.</option>';
                        echo '<option value="2">The package is being prepared.</option>';
                        echo '<option value="3">The package is being shipped.</option>';
                      break;
                    case 2:
                        echo '<option value="0">Waitting for checked</option>';
                        echo '<option value="1">The order has been received.</option>';
                        echo '<option value="2" selected="true" >The package is being prepared.</option>';
                        echo '<option value="3">The package is being shipped.</option>';
                      break;
                    case 3:
                        echo '<option value="0">Waitting for checked</option>';
                        echo '<option value="1">The order has been received.</option>';
                        echo '<option value="2">The package is being prepared.</option>';
                        echo '<option value="3" selected="true">The package is being shipped.</option>';
                    break;
                    
                    default:
                     
                  }
                    
                   ?>
                    </select>
                </div>
            </div>
               
                
                
                <div class="card-footer">
    <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Submit
        </button>
    </div>
        </form>
    </div>
    
</div>
<?php
include ("../footer.php");
?>
