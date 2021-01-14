
<?php
include ("../header.php");
?>
<?php
require_once("../Connection.php");
$Product_ID=$_GET['Product_ID'];
$query ="select * from product where Product_ID=$Product_ID";
$result=mysqli_query($connect,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
<div class="card-body card-block">
        <form action="process_update_product.php?Product_ID=<?php echo $Product_ID?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Product</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Detail</p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product's name</label></div>
                <div class="col-12 col-md-9"><input required type="text" id="text-input" name="name_product" placeholder="Tên sản phẩm" class="form-control" value="<?php echo $row['Name'];?>"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Image</label></div>
                <div class="col-12 col-md-9"><input required type="text" id="email-input" name="image_product" placeholder="Ảnh sản phẩm" class="form-control" value="<?php echo $row['Image'];?>"><small class="help-block form-text"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Price</label></div>
                <div class="col-12 col-md-9"><input required type="number" id="text-input" name="price_product" placeholder="Giá" class="form-control" value="<?php echo $row['Price'];?>"><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Available</label></div>
                <div class="col-12 col-md-9"><input required type="number" id="email-input" name="available_product" placeholder="Sẵn hàng" class="form-control" value="<?php echo $row['Available'];?>"><small class="help-block form-text"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                <div class="col-12 col-md-9"><textarea required name="description_product" id="textarea-input" rows="9" placeholder="Mô tả" class="form-control"><?php echo $row['Description'];?></textarea></div>
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
                            while ($row1 = mysqli_fetch_assoc($result)) {
                                $data[]=$row1;
                            }
                            for($i=0;$i<count($data);$i++){
                                if($row['ProCat_ID']==$data[$i]['ProCat_ID']){
                                    echo '
                                <option value="'.$data[$i]['ProCat_ID'].'" selected="true" >'.$data[$i]['Name'].'</option>';
                                }else{
                                    echo '
                                <option value="'.$data[$i]['ProCat_ID'].'">'.$data[$i]['Name'].'</option>';
                                }
                                
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Is a new product</label></div>
                    <div class="col-12 col-md-9">
                        <select name="new" id="select" class="form-control">
                        <?php
                            if($row['New']==1){
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
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Is a top hot product</label></div>
                    <div class="col-12 col-md-9">
                        <select name="top" id="select" class="form-control">
                        <?php
                            if($row['Top']==1){
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
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Is a freeship product</label></div>
                    <div class="col-12 col-md-9">
                        <select name="freeship" id="select" class="form-control">
                        <?php
                            if($row['Top']==1){
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
