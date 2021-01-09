
<?php
include ("../header.php");
?>
<?php
    require_once("../Connection.php");
    $query1 ="select * from provider";
    $result1=mysqli_query($connect,$query1);
    $data1=array();
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $data1[]=$row1;
    }

    $query2 ="select * from product";
    $result2=mysqli_query($connect,$query2);
    $data2=array();
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $data2[]=$row2;
    }
    ?>
<div class="card-body card-block">
        <form action="process_create_receipt.php" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Goods receipt</label></div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static">Detail</p>
                </div>
            </div>
            <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Provider's name</label></div>
                    <div class="col-12 col-md-9">
                        <select name="provider_id" id="select" class="form-control">
                        <?php
                            for($i=0;$i<count($data1);$i++){
                                echo '<option value="'.$data1[$i]['Provider_ID'].'">'.$data1[$i]['Name'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Product's name</label></div>
                    <div class="col-12 col-md-9">
                        <select name="product_id" id="select" class="form-control">
                        <?php
                            for($i=0;$i<count($data2);$i++){
                                echo '<option value="'.$data2[$i]['Product_ID'].'">'.$data2[$i]['Product_ID'].'-'.$data2[$i]['Name'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
               
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Price import</label></div>
                <div class="col-12 col-md-9"><input type="number" id="text-input" name="price_imp" required placeholder="Ex: 125000,200000,..." class="form-control" ><small class="form-text text-muted"></small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Quantity</label></div>
                <div class="col-12 col-md-9"><input type="number" id="email-input" name="quantity" required placeholder="Ex: 100,300,500,..." class="form-control"><small class="help-block form-text"></small></div>
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
