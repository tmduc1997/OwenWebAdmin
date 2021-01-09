
<?php
include ("../header.php");
require_once("../Connection.php");
$Promotion_ID=$_GET['Promotion_ID'];
$query ="SELECT * FROM promotion WHERE Promotion_ID=$Promotion_ID";
$result=mysqli_query($connect,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<div class="card-body card-block">
        <form action="process_update_promotion.php?Promotion_ID=<?php echo $Promotion_ID?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">PROMOTION</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">EDIT PROMOTION</p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="Promotion name" class="form-control" value="<?php echo $row['Name'];?>"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Image</label></div>
                <div class="col-12 col-md-9"><input type="text" id="email-input" name="image" placeholder="Promotion image" class="form-control" value="<?php echo $row['Image'];?>"><small class="help-block form-text"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                <div class="col-12 col-md-9"><textarea name="description" id="textarea-input" rows="9" placeholder="Description" class="form-control"><?php echo $row['Description'];?></textarea></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Date start</label></div>
                <div class="col-12 col-md-9"><input type="date" id="file-input" name="start" class="form-control-file" value="<?php echo $row['Start'];?>" required></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Date end</label></div>
                <div class="col-12 col-md-9"><input type="date" id="file-input" name="end" class="form-control-file" value="<?php echo $row['End'];?>" required></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Condition</label></div>
                <div class="col-12 col-md-9"><input type="number" id="email-input" name="condition" placeholder="300,000, 500,000,..." class="form-control" value="<?php echo $row['Condition_a'];?>"><small class="help-block form-text"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Value</label></div>
                <div class="col-12 col-md-9"><input type="number" id="email-input" name="value" placeholder="0.1, 0.15, 0.2,..." class="form-control" value="<?php echo $row['Value_a'];?>"><small class="help-block form-text"></div>
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
