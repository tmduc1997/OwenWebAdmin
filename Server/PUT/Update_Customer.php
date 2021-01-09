
<?php
include ("../header.php");
?>
<?php
require_once("../Connection.php");
$Customer_ID=$_GET['Customer_ID'];
$query ="select * from customer where Customer_ID=$Customer_ID";
$result=mysqli_query($connect,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<div class="card-body card-block">
        <form action="process_update_customer.php?Customer_ID=<?php echo $Customer_ID?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">CUSTOMER</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Update customer information</p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="name_product" placeholder="Tên sản phẩm" class="form-control" disabled value="<?php echo $row['Customer_ID'];?>"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="name_product" placeholder="Tên sản phẩm" class="form-control" disabled value="<?php echo $row['FullName'];?>"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                <div class="col-12 col-md-9"><input type="text" id="email-input" name="image_product" placeholder="Ảnh sản phẩm" class="form-control" disabled value="<?php echo $row['Email'];?>"><small class="help-block form-text"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Phone</label></div>
                <div class="col-12 col-md-9"><input type="phone" id="text-input" name="price_product" placeholder="Giá" class="form-control" disabled value="<?php echo $row['Phone'];?>"><small class="form-text text-muted"></small></div>
            </div>
        
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Enable</label></div>
                    <div class="col-12 col-md-9">
                        <select name="enable" id="select" class="form-control">
                        <?php
                            if($row['Enable']==1){
                                echo '<option value="0">No</option>';
                                echo '<option value="1" selected="true">Yes</option>';
                            }
                            else{
                                echo '<option value="0" selected="true">No</option>';
                                echo '<option value="1">Yes</option>';
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
