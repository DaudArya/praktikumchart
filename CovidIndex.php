<?php include ('koneksiCovid.php') ;
$covid = mysqli_query ($link," select * from tb_penderita") ; 
while ($row = mysqli_fetch_array ($covid) ) {
    $datacovid[] = $row['country'] ;
    $query = mysqli_query ($link, "select totalcases from tb_penderita where id  ='". $row['id']."'");
    $row = $query-> fetch_array () ;
	$jumlahdatacovid [] = $row['totalcases'] ; 
}
?>
<!DOCTYPE html>  
<html>
<head>
<title>Grafik Covid</title>
<script type="text/javascript" src="chart.js"></script>
</head>

<body>
<style type="text/css">
		body{
			font-family: roboto;
		}
	</style>
 <div style="width: 1000px ; height: 1000px ;">
		<canvas id="myChart"></canvas>
	</div>
  <script>
   var ctx = document.getElementById("myChart").getContext('2d') ; 
  var myChart = new Chart (ctx, {
    type: 'bar',
    data : {
        labels : <?php echo json_encode($datacovid);?>,
        datasets: [{
            label : 'Grafik Covid',
            data : <?php echo json_encode ($jumlahdatacovid);?>,
            backgroundColor : 'rgba(255, 99, 132, 0.2)',
            borderColor : 'rgba (255, 99, 132, 1)', 
            borderWidth : 1
            
        }]
  },
  options:{
    scales:{
        yAxes:[{
            ticks:{
                beginAtZero : true
            }
        }]
    }
   }
   }); 
   </script>
 </body>
    </html>


 


