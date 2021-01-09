
<?php
include ("../header.php");
require_once("../Connection.php");
$Receipt_ID=$_GET['Receipt_ID'];
$query ="SELECT goods_receipt.Receipt_ID,provider.Name,goods_receipt.CreateDate,sum(goods_receipt_detail.Total) as Total,goods_receipt.Paid 
FROM provider JOIN goods_receipt ON provider.Provider_ID=goods_receipt.Provider_ID 
JOIN goods_receipt_detail ON goods_receipt.Receipt_ID = goods_receipt_detail.Receipt_ID 
WHERE goods_receipt.Receipt_ID=$Receipt_ID";
$result=mysqli_query($connect,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<div class="card-body card-block">
        <form action="process_update_goods_receipt.php?Receipt_ID=<?php echo $Receipt_ID?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Update</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Information</p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Provider</label></div>
                <div class="col-12 col-md-9"><input type="text" disabled id="text-input" name="name_classify" class="form-control" value="<?php echo $row['Name'];?>"><small class="form-text text-muted"></small></div>
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
                <div class="col col-md-3"><label for="select" class=" form-control-label">Paid</label></div>
                <div class="col-12 col-md-9">
                    <select name="paid" id="select" class="form-control">
                   <?php
                    if($row['Paid']==1){
                        echo '<option value="0">Not yes</option>';
                        echo '<option value="1" selected="true">Paid</option>';
                    }
                    else{
                        echo '<option value="0" selected="true">Not yes</option>';
                        echo '<option value="1">Paid</option>';
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
