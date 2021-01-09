
<?php
include ("../header.php");
require_once("../Connection.php");
$Product_ID=$_GET['Product_ID'];
?>
<script type="text/javascript">
    function deleteClassify(id) {
        if(confirm("Do you want to delete this record ?")){
            location.href = "../DELETE/process_delete_classify.php?Classify_ID="+id;           
        }
    }
</script>
<div class="content mt-3">
<?php
    if($_SESSION["permission"]==3){

    }
    else{
    echo '
    <a href="../POST/Create_Classify.php?Product_ID='.$Product_ID.'"><button type="button" class="btn btn-success"><i class="fa fa-magic"></i>&nbsp; Add new</button></a>
    ';
    }

    ?>

            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Classify</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        
                                            <th>Classify_ID</th>
                                            <th>Name</th>
                                            <th>Image</th>

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
                                    
                                    $query ="SELECT classify.Classify_ID,classify.Name, classify.Display, product.Image FROM classify JOIN product ON classify.Product_ID=product.Product_ID WHERE product.Product_ID=$Product_ID";
                                    $result=mysqli_query($connect,$query);
                                    $data=array();
                                
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $data[]=$row;
                                    }
                                
                                    for($i=0;$i<count($data);$i++){
                                        echo '
                                        <tr>
                                       
                                        <td>'.$data[$i]['Classify_ID'].'</td>
                                        <td>'.$data[$i]['Name'].'</td>' ?>

                                        <td><img width="60px" height="60px" src="<?php echo''.$data[$i]['Image'].'' ?>" alt="" ></td>

                                        <?php
                                            if($_SESSION["permission"]==3){

                                            }
                                            else{
                                                echo '
                                                
                                                <td><a href="../PUT/Update_Classify.php?Classify_ID='.$data[$i]['Classify_ID'].'"><img src="../images/update.png" width="30px" height="30px"/></a></td>
                                                <td><a onclick="deleteClassify('.$data[$i]['Classify_ID'].');"><img src="../images/delete.png" width="30px" height="30px"/></a></td>
                                        
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
