
<?php
include ("../header.php");
require_once("../Connection.php");
$Classify_ID=$_GET['Classify_ID'];
$query ="SELECT * FROM classify WHERE Classify_ID=$Classify_ID";
$result=mysqli_query($connect,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<div class="card-body card-block">
        <form action="process_update_classify.php?Classify_ID=<?php echo $Classify_ID?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Classify</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Detail</p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12 col-md-9"><input style="display:none" type="text" id="text-input" name="productid" class="form-control" value="<?php echo $row['Product_ID'];?>"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Classify</label></div>
                <div class="col-12 col-md-9"><input required type="text" id="text-input" name="name_classify" placeholder="VD: M,L,XL..." class="form-control" value="<?php echo $row['Name'];?>"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Display</label></div>
                <div class="col-12 col-md-9">
                    <select name="display" id="select" class="form-control">
                   <?php
                    if($row['Display']==1){
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
