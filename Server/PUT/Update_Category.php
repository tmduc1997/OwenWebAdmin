
<?php
include ("../header.php");
?>
<?php
require_once("../Connection.php");
$ProCat_ID=$_GET['ProCat_ID'];
$query ="select * from productcategory where ProCat_ID=$ProCat_ID";
$result=mysqli_query($connect,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>

<div class="card-body card-block">
        <form action="process_update_category.php?ProCat_ID=<?php echo $ProCat_ID?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Category</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Detail</p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category's name</label></div>
                <div class="col-12 col-md-9"><input required type="text" id="text-input" name="name_category" placeholder="Ex: T-shirt, Jean,..." class="form-control" value="<?php echo $row['Name'];?>"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Image</label></div>
                <div class="col-12 col-md-9"><input required type="text" id="email-input" name="image_category" placeholder="Link" class="form-control" value="<?php echo $row['Image'];?>"><small class="help-block form-text"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                <div class="col-12 col-md-9"><textarea required name="description_category" id="textarea-input" rows="9" placeholder="Description" class="form-control" ><?php echo $row['Description'];?></textarea></div>
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
