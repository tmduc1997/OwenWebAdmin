
<?php
include ("../header.php");
require_once("../Connection.php");
?>
<script type="text/javascript">
    function deleteCategory(id) {
        if(confirm("Do you want to delete this record ?")){
            location.href = "../DELETE/check_foreign_key.php?ProCat_ID="+id;           
        }
    }
</script>
<div class="content mt-3">
<?php
    if($_SESSION["permission"]==3){

    }
    else{
    echo '
    <a href="../POST/Create_Category.php"><button type="button" class="btn btn-success"><i class="fa fa-magic"></i>&nbsp; Add new</button></a>
    ';
    }

    ?>
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Categories</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Description</th>
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
                                    //require_once("../Connection.php");
                                    $query ="select * from productcategory";
                                    $result=mysqli_query($connect,$query);
                                    $data=array();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $data[]=$row;
                                    }
                                    for($i=0;$i<count($data);$i++){
                                        echo '
                                        <tr>
                                    
                                        <td>'.$data[$i]['ProCat_ID'].'</td>
                                        <td>'.$data[$i]['Name'].'</td>' ?>

                                        <td><img width="60px" height="60px" src="<?php echo''.$data[$i]['Image'].'' ?>" alt="" ></td>

                                        <?php
                                        echo '
                                        <td>'.$data[$i]['Description'].'</td>' ?>

                                        <?php
                                            if($_SESSION["permission"]==3){

                                            }
                                            else{
                                                echo '
                                                    <td><a href="../PUT/Update_Category.php?ProCat_ID='.$data[$i]['ProCat_ID'].'"><img src="../images/update.png" width="30px" height="30px"/></a></td>
                                                    <td><a onclick="deleteCategory('.$data[$i]['ProCat_ID'].');"><img src="../images/delete.png" width="30px" height="30px"/></a></td>
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
