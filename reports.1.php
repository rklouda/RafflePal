<?php
 ob_start();
 session_start();
 include 'connect.php';
 
 // if session is not set this will redirect to login page
 if( isset($_SESSION['user']) ) {

 // select loggedin AGENT detail
 $res=mysqli_query($db,"SELECT * FROM AGENT WHERE Agent_ID=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res); 
     
 }
?>

<!DOCTYPE html>
<html lang="en">
<!-- start head- -->
<head>
</head>
<!-- end head- -->

<body 
   
    <!--THIS FIELDSET MAKE THE OVERLAY --->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {

 var data = google.visualization.arrayToDataTable([
 ['ZipCode', 'Applications'],
 <?php 
 
 

// $query = "SELECT count(ip) AS count, browser FROM visitors GROUP BY browser";

 $exec = mysqli_query($db,"SELECT count(Zip_Code) AS count , Zip_Code FROM CLIENT GROUP BY Zip_Code");
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['Zip_Code']."',".$row['count']."],";
 }
 ?>
 ]);

   var options = {'title':'Clients by Top ZipCodes',
                       'width':300,
                       'height':300,
                       'legend': 'bottom',
       is3D: true
   };

 var chart = new google.visualization.PieChart(document.getElementById('chart1_div'));

 chart.draw(data, options);
 }
 </script>
 
 
 <div>

  <div class="" id="chart1_div"></div>

</div>
 
</body>
</html>

 
 