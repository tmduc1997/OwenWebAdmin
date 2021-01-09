
<?php
include ("../header.php");
?>
<script type="text/javascript">
    function deletePromotion(id) {
        if(confirm("Do you want to delete this record ?")){
            location.href = "../DELETE/process_delete_promotion.php?Promotion_ID="+id;           
        }
    }
</script>
<div class="content mt-3">
<?php
    if($_SESSION["permission"]==3){

    }
    else{
    echo '
    <a href="../POST/Create_Promotion.php"><button type="button" class="btn btn-success"><i class="fa fa-magic"></i>&nbsp; Add new</button></a>
    ';
    }

    ?>

            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">PROMOTION</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Date start</th>
                                            <th>Date end</th>
                                            <th>Condition</th>
                                            <th>Value</th>
                                            <th>Staff</th>
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
                                    $query ="SELECT Promotion.Promotion_ID, promotion.Name, promotion.Image, promotion.Description, promotion.Start, promotion.End, promotion.Condition_a, promotion.Value_a, staff.Name FROM promotion JOIN staff ON promotion.Admin_ID = staff.Admin_ID";
                                    $result=mysqli_query($connect,$query);
                                    $data=array();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $data[]=$row;
                                    }
                                    for($i=0;$i<count($data);$i++){
                                        echo '
                                        <tr>
                                    
                                        <td>'.$data[$i]['Promotion_ID'].'</td>
                                        <td>'.$data[$i]['Name'].'</td>' ?>

                                        <td><img width="60px" height="60px" src="<?php echo''.$data[$i]['Image'].'' ?>" alt="" ></td>

                                        <?php
                                        echo '
                                        <td>'.$data[$i]['Description'].'</td>
                                        <td>'.$data[$i]['Start'].'</td>
                                        <td>'.$data[$i]['End'].'</td>
                                        <td>'.$data[$i]['Condition_a'].'</td>
                                        <td>'.$data[$i]['Value_a'].'</td>
                                        <td>'.$data[$i]['Name'].'</td>' ?>

                                        <?php
                                            if($_SESSION["permission"]==3){

                                            }
                                            else{
                                                echo '
                                                <td><a href="../PUT/Update_Promotion.php?Promotion_ID='.$data[$i]['Promotion_ID'].'"><img src="../images/update.png" width="30px" height="30px"/></a></td>
                                                <td><a onclick="deletePromotion ('.$data[$i]['Promotion_ID'].');"><img src="../images/delete.png" width="30px" height="30px"/></a></td>
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
