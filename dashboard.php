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
 
    <meta charset="utf-8">
        <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://www.secure-apps.smartapp1003.com/css/app.css" rel="stylesheet">
  
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
 
            
            
            
</head>
<!-- end head- -->

<body class="colorskin-6">

<div id="wrap">
<header id="header">
	<div  class="container">
		<div class="eight columns logo">
	
				<img class ="topRightLogo" src="images/HelpNow Logo HD Dark Grey resized.png">
		
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
		
						<li class="current">
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
			<li class="">
			  <a class="drp-aro" href="/reports.php">Reports  </a>
			            </li>
			           


        <li class="nav navbar-nav navbar-right">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"></span>Hi <?php echo $userRow['First_Name']; ?></span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-6">
						
   <form  method="GET" action="/logout.php?logout" autocomplete="off">
  
						<!--		 <form class="form" role="form" method="post" accept-charset="UTF-8" id="login-nav"> -->
									<br> </br>
										<div class="form-group">
											 <button type="submit"  id="logout" name="logout" class="btn btn-lg btn-inf">Sign Out</button>
										</div>
										
								 </form>
							</div>
						
					 </div>
				</li>
			</ul>
        
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
			  <a class="drp-aro" href="/team.php" >Meet Our Agents </a>
			            </li> 
 		    <!---    <li class="nav navbar-nav navbar-right">
                  <a class="drp-aro"href="/login.php" role="button" >Login</a>
                </li> -->
                
                <li class="">
			  <a class="drp-aro" href="/Testimonials.php" >Testimonials  </a>
			            </li>
                 <li class="">
			  <a class="drp-aro" href="/Schedule.php" >Schedule an Appointment</a>
			            </li>
			            
                 <li class="">
			  <a class="drp-aro" href="/chat.php" >Chat</a>
			            </li>
			            
			            
			            
           <li class="dropdown nav navbar-nav navbar-right">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
			    </li>
				 <div class="row">
							<div class="col-md-12"> 
						
   <form  method="POST" action="/login.php">
   <li class=" nav navbar-nav">
						<!--		 <form class="form" role="form" method="post" accept-charset="UTF-8" id="login-nav"> -->
						 
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Email address</label>
											 <input type="email" style="font-size: 14pt" class="form-control" name="email" id="email" placeholder="Email address" >
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Password</label>
											 <input type="password" style="font-size: 14pt" class="form-control" name="pass" id="pass" placeholder="Password" >
                                             <div class="help-block text-right"><a href="">Forget the password ?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" id="btn-login" name="btn-login" class="btn btn-primary btn-block">Sign in</button>
										</div>
									<div class="form-group">
									 <button type="submit" id="btn-signup" name="btn-signup" class="btn btn-primary btn-block">Sign up</button>
										</div>
								 </form>
							</div>
						
					 </div>
				</li>
			</ul>
			            
			            
			            
            </ul>
            
            
            
<?php
}

?>
		
	</nav>	 <!-- /END nav-wrap -->
</header>  <!-- end-header -->

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
<div class="clearfix"></div>

    <h1 class="landing_headline">Dashboard</h1>

<div class="" style="padding-bottom: 10px;">
    <div id="content" class="container guestmode">
    
        <div class="padding-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <section class="app-content">
                        <div class="col-xs-12" id="content-holder">
                                                            <input type="hidden" name="site-owner" value="203218">
<div class="row">
    <fieldset>
    
     <ul class="nav nav-tabs" id="sub-section-nav">
    
						<li class="current">
			  <a class="drp-aro" href="/dashboard.php" >Dashboard  </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="/clientAppForm.php" >Clients  </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="/aidRequestAppForm.php" >Aid Requests </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="#">other </a>
			            </li>
			<li class="">
			  <a class="drp-aro" href="#">other </a>
			            </li>
			          
           
                  </ul>
  
  
<style>
.mySlides {display:none}
</style>

<div class="w3-content" style="max-width:800px">
    <div class="mySlides">
        <h3>All Aid Requests</h3>

<div id="login-form" id="ShowClientHistory">
    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
               <?php
   if ( isset($errMSG) ) {
    
    ?>
    <div class="form-group">
             <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
             </div>
                <?php
   }
    date_default_timezone_set("America/New_York");
//  $Date =date("Y/m/d"); 
//  $Date_Requested = $Date;
   ?>
   
        <!--   <div class="col-sm-6" id="info_table" style=" float:right!important;">  -->

  </div>
  
       
   <div class="form-group" >
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
             <input type="text" style="font-size: 14pt" name="Social_Security_Number" class="form-control" placeholder="Enter Client Social Security Number" maxlength="40" required="true"  value="<?php echo $Social_Security_Number?>" />
                </div>
                <span class="text-danger"><?php echo $Social_Security_NumberError; ?></span>
            </div>

         <div class="form-group">
                 <div class="input-group">
             <button type="submit" class="btn btn-lg btn-inf" name="btn-check">Search</button>
            
            </div>
            
        </div>
     <?php
if ( isset($_POST['btn-check']) ) {
   //Get Client_ID from SSN
   
     
 $SSN_Test = trim($_POST['Social_Security_Number']);

 //   echo "<script type='text/javascript'>alert($SSN_Test)</script>";
   
   
   $querySSN = mysqli_query($db,"SELECT * FROM `CLIENT` WHERE Social_Security_Number=$SSN_Test");
  $count = mysqli_num_rows($querySSN); // if SSN Exists it return 1 row
  $userRow1=mysqli_fetch_array($querySSN);
 
  
 
//  echo "<script type='text/javascript'>alert($userRow1[Client_ID])</script>";
     
     //Get Aid Requests for Client_ID
     $res2 = mysqli_query($db,"SELECT * FROM AID_REQUEST WHERE Client_ID = $userRow1[Client_ID]");
//Get Aid Category from Aid_ID

   //  $AidTypeQuery= mysqli_query($db,"SELECT * FROM `AID_REQUEST` INNER JOIN AID_TYPE ON `Request_ID` = AID_REQUEST['Request_ID']");
   //  $AidTypeQuery = mysqli_query($db,"SELECT * FROM `AID_TYPE` INNER JOIN AID_REQUEST ON Aid_ID = Aid_ID");
  
$results= mysqli_query($db,"SELECT * FROM `AID_REQUEST` INNER JOIN AID_TYPE ON `Request_ID` = $userRow1[Client_ID]");


    
//$results = mysqli_query($db,"SELECT * FROM `AID_REQUEST` ");//WHERE Agent_ID =$userRow[Agent_ID]
   echo  '<table class="table table-condensed">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Request_ID</th>';
    echo '<th>Date Requested</th>';
    echo '<th>Amount Requested</th>';
     echo '<th>Client_ID</th>';
    echo '<th>Client Notes</th>';
    echo '<th>Documentation</th>';
    echo '<th>Aid ID</th>';
    echo '<th>Decision</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
            while($row = mysqli_fetch_array($results)) {
      echo '<tr>';        
      echo '<td>',$row['Request_ID'],'</td>';
      echo '<td>',$row['Date_Requested'],'</td>';
      echo '<td>',$row['Amount_Requested'],'</td>';
      echo '<td>',$row['Client_ID'],'</td>';
       echo '<td>',$row['Client_Notes'],'</td>';
        echo '<td>',$row['Documentation_Provided'],'</td>';
         echo '<td>',$row['Aid_ID'],'</td>';
      echo '<td>',$row['Decision'],'</td>';
     echo '<tr>'; 
            }
echo '</tbody></table>';
      
        
    
} 

    

?>

    </form>

    </div>
    <div id="Show" >
       <img class="mySlides" src="HelpNow logo HD dark grey.png" style="width:100%">
   
    </div>
  <img class="mySlides" src="HelpNow logo HD.png" style="width:100%">
  <img class="mySlides" src="helpnowcover.jpg" style="width:100%">
</div>



<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-red", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-red";
}
</script>




</div>

                    </section>
                    
                            <section class="app-nav-content" style="padding: 20px;">
                            <div class="row">

     <div class="w3-section">
    <button class="col-md-2 col-md-push-1 col-xs-12 btn btn-default btn-previous btn-lg  hidden-sm hidden-xs" onclick="plusDivs(-1)">&nbsp;Back</button>
    <button class="col-md-2 col-md-offset-2 col-xs-12 btn btn-default btn-next btn-lg btn-right" onclick="plusDivs(-1)">Continue </button>
            
            
  </div>
    </section>                    

  
   
                </div>
            </div>
        </div>
    </div>
    
    <div style="clear: both;"></div>
</div>

 
 
    </fieldset>
    


    </div> 
</div>
<style>
.item {
  display: none;
  }

.item.current {
  display: block;
  }


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









