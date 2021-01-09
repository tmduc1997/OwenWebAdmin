
<?php
include ("../header.php");
require_once("../Connection.php");
$Product_ID=$_GET['Product_ID'];
?>
<div class="card-body card-block">
        <form action="process_create_classify.php?Product_ID=<?php echo $Product_ID?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Classify</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Detail </p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="name_classify" placeholder="Ex: M,L,XL..." class="form-control"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Display</label></div>
                <div class="col-12 col-md-9">
                    <select name="display" id="select" class="form-control">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
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
