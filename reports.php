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
 <title>Dashboard</title>
    <meta charset="utf-8">
        <meta name="author" content="">
   <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
   <!link href="https://www.secure-apps.smartapp1003.com/css/app.css" rel="stylesheet">
   <link rel="stylesheet" href="styletemplate.css" type="text/css" />
  
    <link rel="stylesheet" href="https://cdn.lenderhomepage.com/themes/responsivetemplate1/css/style.css" type="text/css"  media="all">
 
    <style>
                body {
                    background: transparent url('/images/Tulsa1920x1280.jpg')  no-repeat center center fixed;
                      filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='/images/Tulsa1920x1280.jpg', sizingMethod='scale');
                    -ms-filter: "/images/Tulsa1920x1280.jpg', sizingMethod='scale')";
                }
            </style>
 
    <!--[if lt IE 9]>
    <script src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/modernizr.custom.11889.js" type="text/javascript"></script>
    <script src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/media.js" type="text/javascript"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

         <link href="https://www.secure-apps.smartapp1003.com/css/landing-page-background.css" rel="stylesheet">
            
           
            
    <link rel="stylesheet" href="https://cdn.lenderhomepage.com/themes/responsivetemplate1/css/flexslider.css" type="text/css"  media="all">
    <link rel="stylesheet" href="https://cdn.lenderhomepage.com/themes/admin/css/font-awesome.min.css" type="text/css"  media="all">
    
       <link rel="stylesheet" href="https://cdn.lenderhomepage.com/css/fonts.css" type="text/css" media="all">
      
<script type="text/javascript" src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/jquery.min.js" ></script>
   
<script type="text/javascript" src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/nav-resp.js"></script>
 
 
 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>     
</head>
<!-- end head- -->

<body class="colorskin-6">

<div id="wrap">
<header id="header">
	<div  class="container">
		<div class="eight columns logo">
	
				<a href="/index.php">
				<img class ="topRightLogo" src="images/HelpNow Logo HD Dark Grey resized.png">
		        </a>
		
					</div>

		<div class="eight columns alignright">
			<div class='phone'>
				<span class='phonetxt lhp-edit' data-edit-type="global-replace" data-edit-field="tagline">Help Now Agents are standing by!</span>
				<br>
				<span class='icon-phone' style='margin-right: 13px;'></span><a href="tel:1800-helpnow">1-800-HelpNow</a>
			</div>
			<div class='lhp-edit' data-edit-type="global-replace" data-edit-field="subtagline"></div>
	
		</div>
	</div>
<?php
 if (isset($_SESSION['user'])) { ?> <!-- If logged in ?> adding html inside php command ?php  -->	
	<nav id="nav-wrap" class="nav-wrap2">
		<div class="container">
	
			<ul id="nav" class="sixteen columns">
		
						<li class="">
			  <a class="drp-aro" href="/index.php" >Home  </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="/About.php" >About  </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="/team.php" >The Team </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="/ApplyNow.php">Create Aid Request  </a>
			            </li>
			<li class="current">
			  <a class="drp-aro" href="/reports.php">Reports  </a>
			            </li>

                <li class="nav navbar-nav navbar-right">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
         </span>Hi <?php echo $userRow['First_Name']; ?></span class="caret"></span></a>
                  <ul class="dropdown-menu nav navbar-nav navbar-right">
                    <li><a href="/logout.php?logout"></span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                       <li><a href="/agentprofile.php"></span class="glyphicon glyphicon-user"></span>&nbsp;Profile</a></li>
                  </ul>
                </li>  
                </ul>
<?php
}
else { ?>
	<nav id="nav-wrap" class="nav-wrap2">
		<div class="container">
			<ul id="nav" class="sixteen columns">
		
						<li class="current">
			  <a class="drp-aro" href="/index.php" >Home  </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="/About.php" >About  </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="/team.php" >The Team </a>
			            </li> 
 		        <li class="nav navbar-nav navbar-right">
                  <a class="drp-aro"href="/login.php" role="button" >Login</a>
                </li>
            </ul>
            
<?php
}

?>
		
	</nav>	 <!-- /END nav-wrap -->
</header>  <!-- end-header -->


<!-- if($profile->slogan) -->

	</nav>
	<!-- /nav-wrap -->
</header>  <!-- end-header -->
  <div class='container'>
	  <div style='margin-top:10px'></div>
		  <div class='sixteen columns'>
    		</div>


<div class="clearfix"></div>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.3/handlebars.min.js"></script>

<script id="infowindow-template" type="text/x-handlebars-template">
    <div style="max-width:250px;">
        <strong>{{name}}</strong> <br/><br/>
        {{address}}<br/>
        <a  href="tel:{{phone}}"> {{phone}} </a><br/><br/>
    </div>
    <hr/>
    <div style="max-width:300px;padding-top:15px; text-center;">
        <a href="{{directions}}"> Get Directions </a>
    </div>
</script>            
</div>
        </section>
</div>

<div class="">
    <div id="app-messages" class="col-xs-12 alert alert-danger animated shake hidden">
    </div>
    </div>
    
        
 <!-- Modal Category of Aid Report-->
  <div class="modal fade" id="myModal" role="dialog">
      
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3><strong>Category of Aid Report</strong></h3>
        </div>
        <div class="modal-body">
       <?php   
                   $results = mysqli_query($db,"SELECT AID_REQUEST.Aid_ID, AID_TYPE.Category, count(AID_REQUEST.Aid_ID) AS count FROM AID_REQUEST INNER JOIN AID_TYPE ON AID_REQUEST.AID_ID = AID_TYPE.Aid_ID GROUP BY Aid_ID");//WHERE Agent_ID =$userRow[Agent_ID]
  //  echo '<h4> "$results = mysqli_query($db,"SELECT AID_REQUEST.Aid_ID, AID_TYPE.Category, count(AID_REQUEST.Aid_ID) AS count FROM AID_REQUEST INNER JOIN AID_TYPE ON AID_REQUEST.AID_ID = AID_TYPE.Aid_ID GROUP BY Aid_ID");"</h4>';
  // echo '<h3><strong>Category of Aid Report</strong></h3>';
    echo  '<table class="table table-condensed">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Aid_ID</th>';
    echo '<th>Aid Category</th>';
    echo '<th>Number of Requests</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
            while($row = mysqli_fetch_array($results)) {
      echo '<tr>';        
      echo '<td>',$row['Aid_ID'],'</td>';
      echo '<td>',$row['Category'],'</td>';
      echo '<td>',$row['count'],'</td>';
    
     echo '<tr>'; 
}
echo '</tbody></table>';
echo '<A HREF="javascript:window.print()">Click to Print This Page</A>';



          ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 
 
 <div class="">
    <div id="app-messages" class="col-xs-12 alert alert-danger animated shake hidden">
    </div>
    </div>
  <!--End Model---> 
  
        
 <!-- Modal APPOITMENTS-->
  <div class="modal fade" id="myModalAppts" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3><strong>Appointments</strong></h3>
        </div>
        <div class="modal-body">
       <?php   
 $results = mysqli_query($db,"SELECT * FROM `APPOINTMENTS` ");//WHERE Agent_ID =$userRow[Agent_ID]
  
  //  echo '<h4> "$results = mysqli_query($db,"SELECT * FROM `APPOINTMENTS` ");"</h4>';
    echo  '<table class="table table-condensed">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Name</th>';
    echo '<th>Phone Number</th>';
     echo '<th>Date</th>';
    echo '<th>Time</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
            while($row = mysqli_fetch_array($results)) {
      echo '<tr>';        
      echo '<td>',$row['Name'],'</td>';
       echo '<td>',$row['Phone_Number'],'</td>';
       echo '<td>',$row['Date'],'</td>';
      echo '<td>',$row['Time'],'</td>';
     echo '<tr>'; 
}
echo '</tbody></table>';
?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 
<!--End Model---> 
 
<!-- Modal Clients-->
  <div class="modal fade" id="myModalClients" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3><strong>Clients</strong></h3>
        </div>
        <div class="modal-body">
       <?php   
             $results = mysqli_query($db,"SELECT * FROM `CLIENT` ");//WHERE Agent_ID =$userRow[Agent_ID]
 //   echo '<h4> "$results = mysqli_query($db,"SELECT * FROM `CLIENT` ");"</h4>';
    echo  '<table class="table table-condensed">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Client ID</th>';
    echo '<th>First Name</th>';
    echo '<th>Last Name</th>';
    echo '<th>Zip Code</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
            while($row = mysqli_fetch_array($results)) {
      echo '<tr>';        
      echo '<td>',$row['Client_ID'],'</td>';
      echo '<td>',$row['First_Name'],'</td>';
      echo '<td>',$row['Last_Name'],'</td>';
      echo '<td>',$row['Zip_Code'],'</td>';
     echo '<tr>'; 
}
echo '</tbody></table>';

?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 
<!--End Model---> 

<!-- Modal Agents-->
  <div class="modal fade" id="myModalAgents" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3><strong>Agents</strong></h3>
        </div>
        <div class="modal-body">
       <?php   
             $results = mysqli_query($db,"SELECT * FROM `AGENT` ");//WHERE Agent_ID =$userRow[Agent_ID]
 //   echo '<h4> "$results = mysqli_query($db,"SELECT * FROM `CLIENT` ");"</h4>';
    echo  '<table class="table table-condensed">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Agent ID</th>';
    echo '<th>First Name</th>';
    echo '<th>Last Name</th>';
    echo '<th>Date Hired</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
            while($row = mysqli_fetch_array($results)) {
      echo '<tr>';        
      echo '<td>',$row['Agent_ID'],'</td>';
      echo '<td>',$row['First_Name'],'</td>';
      echo '<td>',$row['Last_Name'],'</td>';
      echo '<td>',$row['Date_Hired'],'</td>';
     echo '<tr>'; 
}
echo '</tbody></table>';

?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 
<!--End Model---> 


 <!-- Modal ALLAidRequest-->
  <div class="modal fade" id="myModalAidAll" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3><strong>All Aid Requests</strong></h3>
        </div>
        <div class="modal-body">
       <?php   
        $sql1 = "SELECT AID_REQUEST.Decision, CLIENT.Client_ID, CLIENT.Zip_Code, CLIENT.First_Name, CLIENT.Last_Name, 
 AWARD.Date_Received, AWARD.Amount_Granted FROM AID_REQUEST 
 INNER JOIN CLIENT ON AID_REQUEST.Client_ID = CLIENT.Client_ID
 INNER JOIN AWARD ON AWARD.Request_ID = AID_REQUEST.Request_ID";
    $results = mysqli_query($db,$sql1);
  //  echo '<h4> "$results = mysqli_query($db,"SELECT * FROM `AGENT` ");"</h4>';
    echo  '<table class="table table-condensed">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Client_ID</th>';
     echo '<th>First Name</th>';
      echo '<th>Last Name</th>';
     echo '<th>Date Received</th>';
    echo '<th>Zip_Code</th>';
    echo '<th>Amount Requested</th>';
    echo '<th>Decision</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
            while($row = mysqli_fetch_array($results)) {
      echo '<tr>';        
      echo '<td>',$row['Client_ID'],'</td>';
      echo '<td>',$row['First_Name'],'</td>';
      echo '<td>',$row['Last_Name'],'</td>';
      echo '<td>',$row['Date_Received'],'</td>';
      echo '<td>',$row['Zip_Code'],'</td>';
      echo '<td>','$',$row['Amount_Granted'],'</td>';
       echo '<td>',$row['Decision'],'</td>';

     echo '<tr>'; 
}
echo '</tbody></table>';


?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
    
    <ul class="pagination">
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
</ul>
  </div>
 
<!--End Model--->




 <!-- Modal Agents-->
  <div class="modal fade" id="myModalAidZip" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3><strong>Financial Aid Totals</strong></h3>
        </div>
        <div class="modal-body">
       <?php   
        $sql1 = "SELECT count(AID_REQUEST.Client_ID) as count, AID_REQUEST.Decision, CLIENT.Zip_Code, SUM(AWARD.Amount_Granted) AS sum, 
 AWARD.Date_Received FROM AID_REQUEST 
 INNER JOIN CLIENT ON AID_REQUEST.Client_ID = CLIENT.Client_ID
 INNER JOIN AWARD ON AWARD.Request_ID = AID_REQUEST.Request_ID
 GROUP BY CLIENT.Zip_Code";
    $results = mysqli_query($db,$sql1);
  //  echo '<h4> "$results = mysqli_query($db,"SELECT * FROM `AGENT` ");"</h4>';
    echo  '<table class="table table-condensed">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Number of Clients</th>';
    echo '<th>Zip_Code</th>';
    echo '<th>Total Amount Granted</th>';

    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
            while($row = mysqli_fetch_array($results)) {
      echo '<tr>';        
      echo '<td>',$row['count'],'</td>';
      echo '<td>',$row['Zip_Code'],'</td>';
      echo '<td>','$',$row['sum'],'</td>';

     echo '<tr>'; 
}
echo '</tbody></table>';


?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 
<!--End Model---> 
 
 <!-- Modal Aid Totals-->
  <div class="modal fade" id="myModalTotals" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3><strong>Financial Aid Totals Approved, Denied & Pending</strong></h3>
        </div>
        <div class="modal-body">
       <?php   
        $sql1 = "SELECT count(AID_REQUEST.Client_ID) as count, AID_REQUEST.Decision, CLIENT.Zip_Code, SUM(AWARD.Amount_Granted) AS sum, 
 AWARD.Date_Received FROM AID_REQUEST 
 INNER JOIN CLIENT ON AID_REQUEST.Client_ID = CLIENT.Client_ID
 INNER JOIN AWARD ON AWARD.Request_ID = AID_REQUEST.Request_ID
 GROUP BY AID_REQUEST.Decision";
    $results = mysqli_query($db,$sql1);
  //  echo '<h4> "$results = mysqli_query($db,"SELECT * FROM `AGENT` ");"</h4>';
    echo  '<table class="table table-condensed">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Number of Clients</th>';
    echo '<th>Total Amount Granted</th>';
    echo '<th>Decision</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
            while($row = mysqli_fetch_array($results)) {
      echo '<tr>';        
      echo '<td>',$row['count'],'</td>';
      echo '<td>','$',$row['sum'],'</td>';
      echo '<td>',$row['Decision'],'</td>';
     echo '<tr>'; 
}
echo '</tbody></table>';


?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 
<!--End Model---> 
 
    
<div class="clearfix"></div>

    <h1 class="landing_headline">HelpNow Dashboard</h1>

<div class="" style="padding-bottom: 10px;">
    <div id="content" class="container guestmode">
    
        <div class="padding-wrapper">
            <div class="row">
                <div class="col-md-16">
                    <section class="app-content">
                        <div class="col-xs-16" id="content-holder">
                                                            <input type="hidden" name="site-owner" value="203218">

    <fieldset>
    
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
  <div class="left" id="chart_div"></div>
  <div class="center" id="chart1_div"></div>
  <div class="right" id="chart2_div"></div>
</div>

  <div class="center">
      <h3><strong>Report Links</strong></h3>

        
     <ul>        
   <li> <a data-toggle="modal" data-target="#myModalAppts"><strong>Appointments</strong></a>    </li>
  <li><a data-toggle="modal" data-target="#myModalClients"><strong>Clients by ZipCode</strong></a></li>    
  <li><a data-toggle="modal" data-target="#myModalAidZip"><strong>Financial Aid Totals by Zipcode</strong></a></li>     
  <li></li><a data-toggle="modal" data-target="#myModalTotals"><strong>Financial Aid Totals (Approved, Denied & Pending)</strong></a></li>     
  <li></li><a data-toggle="modal" data-target="#myModal"><strong>Type of Aid Requests</strong></a></li>  
    <li></li><a data-toggle="modal" data-target="#myModalAgents"><strong>All Agents</strong></a></li>    
     <li></li><a data-toggle="modal" data-target="#myModalAidAll"><strong>All Aid Requests</strong></a></li>    
   
    
  </ul> 
  
  

 </div> 
 
 
   <?php   
        $sql1 = "SELECT AID_REQUEST.Decision, AID_REQUEST.Request_ID, CLIENT.Client_ID, CLIENT.Zip_Code, CLIENT.First_Name, CLIENT.Last_Name, 
 AWARD.Date_Received, AWARD.Amount_Granted FROM AID_REQUEST 
 INNER JOIN CLIENT ON AID_REQUEST.Client_ID = CLIENT.Client_ID
 INNER JOIN AWARD ON AWARD.Request_ID = AID_REQUEST.Request_ID
 ORDER BY AID_REQUEST.Request_ID ASC";
    $results = mysqli_query($db,$sql1);
  //  echo '<h4> "$results = mysqli_query($db,"SELECT * FROM `AGENT` ");"</h4>';
    echo  '<table class="table table-condensed">';
    echo '<thead>';
    echo '<tr>';
      echo '<th>Request_ID</th>';
    echo '<th>Client_ID</th>';
     echo '<th>First Name</th>';
      echo '<th>Last Name</th>';
     echo '<th>Date Received</th>';
    echo '<th>Zip_Code</th>';
    echo '<th>Amount Requested</th>';
    echo '<th>Decision</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
            while($row = mysqli_fetch_array($results)) {
      echo '<tr>';     
      echo '<td>',$row['Request_ID'],'</td>';
      echo '<td>',$row['Client_ID'],'</td>';
      echo '<td>',$row['First_Name'],'</td>';
      echo '<td>',$row['Last_Name'],'</td>';
      echo '<td>',$row['Date_Received'],'</td>';
      echo '<td>',$row['Zip_Code'],'</td>';
      echo '<td>','$',$row['Amount_Granted'],'</td>';
       echo '<td>',$row['Decision'],'</td>';

     echo '<tr>'; 
}
echo '</tbody></table>';


?>

  
  <ul class="pagination">
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
</ul>
    </fieldset>
    
 
 
<style>
.navigation {
    display: none;
}
.alertNoLO{
    border-color: #ebccd1;
}
.alertNoLO .panel-heading{
    border-color: #ebccd1;
    background-color: #f2dede;
}
.alertNoLO .panel-heading h3{
    display: none;
}
.alertNoLO .panel-heading h4{
    color: #a94442;
    display: block !important;
    margin: 0;
    font-size: 1.8em;
}
.alertNoLO .pleaseSelectLO{
    display: block !important;
}
.container {right: 0; text-align: center;}

.container .left, .container .center, .container .right { display: inline-block; }

.container .left { float: left; }
.container .center { margin: 0 auto; }
.container .right { float: right; }




</style>

 </div>
   </section>
                </div>
            </div>
        </div>
    </div>
    
    <div style="clear: both;"></div>
</div>	
	

	
  <!-- home-portfolio -->
  	
		<center>
<p>
	<span style="font-weight: bold; font-size: 125%;">Help Now, LLC </span>
	<br />
	<img  src="images/HelpNow logo 1.png" style="width:50px;height:50px;" >
		<br />

</center>  </div>
 

  <!-- start footer- -->
    <footer id="footer">
    <div class="container footer-in">
        <div class='one columns'></div>
    
        <!-- Disclaimer /end -->
        
        <!-- end-stay connected /end -->

        <!-- flickr  /end -->
                    <div class="five columns contact-inf">
                <h4 class="subtitle">Contact Information</h4>
                <br />
                <div>
<p><strong>Address: </strong> 11 Red Barn Rd Tulsa, OK 80400</p>
<p><strong>Phone: </strong> <a href="tel:(203) 985-5807"> (203) 985-5807 </a> </p>
<p><strong>Email: </strong> <a href="robert.klouda@quinnipiac.edu"> Contact@Helpnow.com </a> </p>
<p>Copyright © 2017 HelpNow Inc. All Rights Reserved </p>

</div>                <div class="lhp-edit" data-edit-type="global-replace" data-edit-field="footer2"></div>
            </div>
                <!-- end-contact-info /end -->
        <div style="clear:both;"></div>
    <!-- end-footer-in -->

    <!-- end-footbot -->

</footer>

<span id="scroll-top"><a class="scrollup"></a></span>

<!-- end-wrap -->

<!-- End Document
================================================== -->

<script type="text/javascript" src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/quentin-custom.js" ></script>
<script src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/bootstrap-alert.js"></script>
<script src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/bootstrap-dropdown.js"></script>
<script src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/bootstrap-tab.js"></script>


  <!-- end-footer -->
</div>
</body>
</html>

 
 