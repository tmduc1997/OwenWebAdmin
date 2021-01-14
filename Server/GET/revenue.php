
<?php
include ("../header.php");
require_once("../Connection.php");
?>

<?php
$data=array();
$a=0;
for($i=1; $i<=12; $i++){
  $query="SELECT MONTH(Shipped_Date) as Month, sum(Total) as Total FROM order_a where MONTH(Shipped_Date)=$i and Cancel=0 and Shipping_status=3" or die ("Error !");
  $result=mysqli_query($connect,$query); 
  if($row = mysqli_fetch_assoc($result)) {
    if($row['Total']!=''){
      //echo $row['Total'];
      array_push($data,$row['Total']);
    }else{
      //echo '0';
      array_push($data,0);
    }
  } 
}

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

    var data = google.visualization.arrayToDataTable([
         ['Element', 'Density', { role: 'style' }],
         ['Jan', <?php echo $data[0]; ?>, '#0770CA'],            // RGB value
         ['Feb', <?php echo $data[1]; ?>, '#0770CA'],            // English color name
         ['Mar', <?php echo $data[2]; ?>, '#0770CA'],
         ['Apr', <?php echo $data[3]; ?>, '#0770CA'],            // RGB value
         ['May', <?php echo $data[4]; ?>, '#0770CA'],            // English color name
         ['Jun', <?php echo $data[5]; ?>, '#0770CA'],
         ['Jul', <?php echo $data[6]; ?>, '#0770CA'],            // RGB value
         ['Aug', <?php echo $data[7]; ?>, '#0770CA'],            // English color name
         ['Seb', <?php echo $data[8]; ?>, '#0770CA'],
         ['Oct', <?php echo $data[9]; ?>, '#0770CA'],            // RGB value
         ['Nov', <?php echo $data[10]; ?>, '#0770CA'],            // English color name
         ['Dec', <?php echo $data[11]; ?>, '#0770CA'],
      ]);

      var options = {'title':'Statistics of the number of sales during the year (VNĐ)', 'width':1000, 'height':300}; 

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
    }

</script>

 <div class="content mt-3">
<div id="chart_div"></div>
</div><!-- .content -->


<?php
include ("../footer.php");
?>
