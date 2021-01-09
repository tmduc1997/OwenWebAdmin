
<?php
include ("../header.php");
?>
<div class="content mt-3">

<script>
function myFunction() {
 <?php
    header ("Location: ../GET/Category.php")
    ?>
}
</script>  
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th>ID</th>
                                            <th>Customer</th>
                                            <th>Email</th>

                                            <th>Phone</th>
                                        
                                            <th>Detail</th>

                                           <?php
                                             if($_SESSION["permission"]==3){
                                                
                                            }
                                            else{
                                                echo '
                                                <th>Edit</th>
                                                ';
                                            }
                                            
                                            ?>
                                            <!-- <th>Delete</th> -->
                                          
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require_once("../Connection.php");
                                    $query ="select * from customer";
                                    $result=mysqli_query($connect,$query);
                                    $data=array();
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $data[]=$row;
                                    }
                                    for($i=0;$i<count($data);$i++){
                                        echo '
                                        <tr>
                                        <td>'.$data[$i]['Customer_ID'].'</td>
                                        <td>'.$data[$i]['FullName'].'</td>
                                        <td>'.$data[$i]['Email'].'</td>
                                        <td>'.$data[$i]['Phone'].'</td>';
                                        ?>
                                         <td><a href="../GET/Customer_detail.php?Customer_ID=<?php echo $data[$i]['Customer_ID']?>"><img src="../images/dashboard.png" width="30px" height="30px"/></a></td>

                                         <?php
                                            if($_SESSION["permission"]==3){

                                            }
                                            else{
                                                echo '
                                                <td><a href="../PUT/Update_Customer.php?Customer_ID='.$data[$i]['Customer_ID'].'"><img src="../images/update.png" width="30px" height="30px"/></a></td>
                                                ';
                                            }
                                           
                                        ?>

                                       
                                        <!-- <td><a href="../DELETE/process_delete_customer.php?Customer_ID=<?php echo $data[$i]['Customer_ID']?>"><img src="../images/delete.png" width="30px" height="30px"/></a></td> -->
                                       
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
