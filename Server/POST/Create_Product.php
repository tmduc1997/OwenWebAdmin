
<?php
include ("../header.php");
?>
<div class="card-body card-block">
        <form action="process_create_product.php" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Product</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Detail</p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product's name</label></div>
                <div class="col-12 col-md-9"><input required type="text" id="text-input" name="name_product" placeholder="Ex: MAN Unisex Simple t shirt for Men,..." class="form-control"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Image</label></div>
                <div class="col-12 col-md-9"><input required type="text" id="email-input" name="image_product" placeholder="Link" class="form-control"><small class="help-block form-text"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Price</label></div>
                <div class="col-12 col-md-9"><input required type="number" id="text-input" name="price_product" placeholder="Ex: $100, $120,..." class="form-control"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Available</label></div>
                <div class="col-12 col-md-9"><input required type="number" id="email-input" name="available_product" placeholder="100, 200, 500,..." class="form-control"><small class="help-block form-text"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                <div class="col-12 col-md-9"><textarea required name="description_product" id="textarea-input" rows="9" placeholder="Description" class="form-control"></textarea></div>
            </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Category</label></div>
                    <div class="col-12 col-md-9">
                        <select name="procat_id" id="select" class="form-control">
                    
                        <?php
                            require_once("../Connection.php");
                            $query ="select * from productcategory";
                            $result=mysqli_query($connect,$query);
                            $data=array();
                            while ($row = mysqli_fetch_assoc($result)) {
                                $data[]=$row;
                            }
                            for($i=0;$i<count($data);$i++){
                
                                echo '
                                <option value="'.$data[$i]['ProCat_ID'].'">'.$data[$i]['Name'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Is new product</label></div>
                    <div class="col-12 col-md-9">
                        <select name="new" id="select" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Is top hot product</label></div>
                    <div class="col-12 col-md-9">
                        <select name="top" id="select" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Is freeship product</label></div>
                    <div class="col-12 col-md-9">
                        <select name="freeship" id="select" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                        </select>
                    </div>
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
