
<?php
include ("../header.php");
?>
<div class="card-body card-block">
        <form action="process_create_category.php" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Category</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Detail</p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="name_category" placeholder="Ex: T-shirt, Jean, ..." class="form-control"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Image</label></div>
                <div class="col-12 col-md-9"><input type="text" id="email-input" name="image_category" placeholder="Link" class="form-control"><small class="help-block form-text"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                <div class="col-12 col-md-9"><textarea name="description_category" id="textarea-input" rows="9" placeholder="Description" class="form-control"></textarea></div>
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
