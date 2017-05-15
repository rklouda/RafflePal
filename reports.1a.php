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
   
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "2", {packages: ['corechart', 'bar']});
 google.setOnLoadCallback(drawChart);
 function drawChart() {

 var data = google.visualization.arrayToDataTable([
 ['ZipCode', 'Sum'],
 <?php 
 $sql = "SELECT AID_REQUEST.Client_ID, AID_REQUEST.Decision, CLIENT.Zip_Code, SUM(AWARD.Amount_Granted) AS sum, 
 AWARD.Date_Received FROM AID_REQUEST 
 INNER JOIN CLIENT ON AID_REQUEST.Client_ID = CLIENT.Client_ID
 INNER JOIN AWARD ON AWARD.Request_ID = AID_REQUEST.Request_ID
 WHERE AID_REQUEST.Decision = 'Approved'
 GROUP BY CLIENT.Zip_Code";
 $exec = mysqli_query($db,$sql);
 
 //SELECT itmes to display from any database
 //FROM any starting database, main one that joins multple tables.
 //INNER JOIN Keys from each database
 //All data from each database is available to sort, or pull, Group
 
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['Zip_Code']."',".$row['sum']."],";
 }
 ?>
 ]);

   var options = {'title':'Finacial Aid Granted per Zipcode',
                       'width':300,
                       'height':300,
                       'legend': 'bottom',
       is3D: true};

 var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

 chart.draw(data, options);
 }
 </script>
    
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {

 var data = google.visualization.arrayToDataTable([
 ['AidType', 'count'],
 <?php 
// "SELECT AID_REQUEST.Aid_ID, AID_TYPE.Category count(Aid_ID) AS count , Aid_ID FROM AID_REQUEST INNER JOIN AID_TYPE ON AID_REQUEST.AID_ID = AID_TYPE.Aid_ID GROUP BY Aid_ID"
 $exec = mysqli_query($db,"SELECT AID_REQUEST.Aid_ID, AID_TYPE.Category, count(AID_REQUEST.Aid_ID) AS count FROM AID_REQUEST INNER JOIN AID_TYPE ON AID_REQUEST.AID_ID = AID_TYPE.Aid_ID GROUP BY Aid_ID");
 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['Category']."',".$row['count']."],";
 }
 ?>
 ]);

   var options = {'title':'Type of Aid Requests',
                       'width':300,
                       'height':300,
                       'legend': 'bottom',
       is3D: true
   };

 var chart = new google.visualization.PieChart(document.getElementById('chart2_div'));

 chart.draw(data, options);
 
 }
 </script>

    <div>

  <div class="" id="chart2_div"></div>
</div>



</body>
</html>