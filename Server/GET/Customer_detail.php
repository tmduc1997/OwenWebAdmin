
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
        <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">CUSTOMER</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Customer information</p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID</label></div>
                <div class="col-12 col-md-9"><input type="text" disabled id="text-input" name="name_product" placeholder="Tên sản phẩm" class="form-control" value="<?php echo $row['Customer_ID'];?>"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                <div class="col-12 col-md-9"><input type="text" disabled id="email-input" name="image_product" placeholder="Ảnh sản phẩm" class="form-control" value="<?php echo $row['FullName'];?>"><small class="help-block form-text"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                <div class="col-12 col-md-9"><input type="phone" disabled id="text-input" name="price_product" placeholder="Giá" class="form-control" value="<?php echo $row['Email'];?>"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Phone</label></div>
                <div class="col-12 col-md-9"><input type="phone" disabled id="email-input" name="available_product" placeholder="Sẵn hàng" class="form-control" value="<?php echo $row['Phone'];?>"><small class="help-block form-text"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Address</label></div>
                <div class="col-12 col-md-9"><textarea name="description_product" disabled id="textarea-input" rows="9" placeholder="Mô tả" class="form-control"><?php echo $row['Address'];?></textarea></div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Score</label></div>
                <div class="col-12 col-md-9"><input type="phone" id="email-input" disabled name="available_product" placeholder="Sẵn hàng" class="form-control" value="<?php echo $row['Score'];?>"><small class="help-block form-text"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Create Date</label></div>
                <div class="col-12 col-md-9"><input type="phone" id="text-input" disabled name="price_product" placeholder="Giá" class="form-control" value="<?php echo $row['CreateDate'];?>"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">City</label></div>
                <div class="col-12 col-md-9"><input type="phone" id="text-input" disabled name="price_product" placeholder="Giá" class="form-control" value="<?php echo $row['City'];?>"><small class="form-text text-muted"></small></div>
            </div>
        </form>
    </div>
    
</div>
<?php
include ("../footer.php");
?>
