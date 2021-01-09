
<?php
include ("../header.php");
require_once("../Connection.php");
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);



function drawBasic() {

    var data = google.visualization.arrayToDataTable([
         ['Element', 'Density', { role: 'style' }],
         ['Jan', 8.94, '#0770CA'],            // RGB value
         ['Feb', 10.49, '#0770CA'],            // English color name
         ['Mar', 19.30, '#0770CA'],
         ['Apr', 25.63, '#0770CA'],            // RGB value
         ['May', 24.89, '#0770CA'],            // English color name
         ['Jun', 30.17, '#0770CA'],
         ['Jul', 29.20, '#0770CA'],            // RGB value
         ['Aug', 31.18, '#0770CA'],            // English color name
         ['Seb', 32.60, '#0770CA'],
         ['Oct', 36.43, '#0770CA'],            // RGB value
         ['Nov', 45.80, '#0770CA'],            // English color name
         ['Dec', 19.30, '#0770CA'],
      ]);

      var options = {'title':'Statistics of the number of sales during the year (millions)', 'width':1000, 'height':300}; 

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
    }

</script>

 <div class="content mt-3">
<div id="chart_div"></div>
</div><!-- .content -->

<?php
$data=array();
$a=0;
for($i=1; $i<=12; $i++){
  $query="SELECT sum(Total) as Total FROM order_a where MONTH(Shipped_Date)=2" or die ("Error !");
  $result=mysqli_query($connect,$query); 
  if($row = mysqli_fetch_assoc($result)) {
    if(empty($row)){
      $a=0;
    }
  } 
}
echo ''.$a.'';
//echo''.$data[9]['Total'].'';
?>
<?php
include ("../footer.php");
?>
