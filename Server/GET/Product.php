
<?php
include ("../header.php");
?>
<script type="text/javascript">
    function deleteProduct(id) {
        if(confirm("Do you want to delete this record ?")){
            location.href = "../DELETE/process_delete_product.php?Product_ID="+id;           
        }
    }
</script>
<div class="content mt-3">

<script>
function myFunction() {
 <?php
    header ("Location: ../GET/Category.php")
    ?>
}
</script>  

<?php
    if($_SESSION["permission"]==3){

    }
    else{
    echo '
    <a href="../POST/Create_Product.php"><button type="button" class="btn btn-success"><i class="fa fa-magic"></i>&nbsp; Add new</button></a>
    ';
    }

    ?>

            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Products</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th>ID</th>
                                            <th>Product's name</th>
                                            <th>Image</th>

                                            <th>Price</th>
                                            <th>Available</th>
                                        
                                            <th>Classify</th>


                                           <?php
                                             if($_SESSION["permission"]==3){
                                                
                                            }
                                            else{
                                                echo '
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                ';
                                            }
                                            
                                            ?>
                                            
                                            


                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require_once("../Connection.php");
                                    $query ="select * from product";
                                    $result=mysqli_query($connect,$query);
                                    $data=array();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $data[]=$row;
                                    }
                                    for($i=0;$i<count($data);$i++){
                                        echo '
                                        <tr>
                                        <td>'.$data[$i]['Product_ID'].'</td>
                                        <td>'.$data[$i]['Name'].'</td>' ?>

                                        <td><img width="50px" height="50px" src="<?php echo''.$data[$i]['Image'].'' ?>" alt="" ></td>       

                                        <?php
                                        echo '
                                        <td>'.$data[$i]['Price'].'</td>
                                        <td>'.$data[$i]['Available'].'</td>' ?>
                                       

                                       <td><a href="../GET/Classify.php?Product_ID=<?php echo $data[$i]['Product_ID']?>"><img src="../images/dashboard.png" width="30px" height="30px"/></a></td>

                                       <?php
                                            if($_SESSION["permission"]==3){

                                            }
                                            else{
                                                echo '
                                                
                                                <td><a href="../PUT/Update_Product.php?Product_ID='.$data[$i]['Product_ID'].'"><img src="../images/update.png" width="30px" height="30px"/></a></td>
                                                <td><a onclick="deleteProduct ('.$data[$i]['Product_ID'].');"><img src="../images/delete.png" width="30px" height="30px"/></a></td>
                                        
                            
                                                ';
                                            }
                                        ?>
                                        
                                        <?php 
                                        echo '
                                
                                    </tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
<?php
include ("../footer.php");
?>
