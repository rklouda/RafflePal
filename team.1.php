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
 


    <link rel="stylesheet" href="https://cdn.lenderhomepage.com/themes/responsivetemplate1/css/style.css" type="text/css"  media="all">
    <link rel="stylesheet" href="https://cdn.lenderhomepage.com/themes/responsivetemplate1/css/flexslider.css" type="text/css"  media="all">
    <link rel="stylesheet" href="https://cdn.lenderhomepage.com/themes/admin/css/font-awesome.min.css" type="text/css"  media="all">
    <link rel="stylesheet" href="https://cdn.lenderhomepage.com/css/fonts.css" type="text/css" media="all">

    <script type="text/javascript" src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/jquery.min.js" ></script>
    <!--[if lt IE 9]>
    <script src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/modernizr.custom.11889.js" type="text/javascript"></script>
    <script src="https://cdn.lenderhomepage.com/themes/responsivetemplate1/js/media.js" type="text/javascript"></script>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

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
				<span class='icon-phone' style='margin-right: 13px;'></span><a href="tel:203-452-9899">203-452-9899</a>
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
		
						<li class="current">
			  <a class="drp-aro" href="/team.php" >The Team </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="/ApplyNow.php">Apply Now  </a>
			            </li>
		

                <li class="nav navbar-nav navbar-right">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
         </span>Hi <?php echo $userRow['First_Name']; ?></span class="caret"></span></a>
                  <ul class="dropdown-menu nav navbar-nav navbar-right">
                    <li><a href="/logout.php?logout"></span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                  </ul>
                </li>  
                </ul>
<?php
}
else { ?>
	<nav id="nav-wrap" class="nav-wrap2">
		<div class="container">
			<ul id="nav" class="sixteen columns">
		
						<li class="">
			  <a class="drp-aro" href="/index.php" >Home  </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="/About.php" >About  </a>
			            </li>
		
						<li class="current">
			  <a class="drp-aro" href="/team.php" >The Team </a>
			            </li> 
 		        <li class="nav navbar-nav navbar-right">
                  <a class="drp-aro"href="/login.php" role="button" >Login</a>
                </li>
            </ul>
            
<?php
}

?>
		</div>
	</nav>	 <!-- /END nav-wrap -->
</header>  <!-- end-header -->

  <div class='container'>
	  <div style='margin-top:10px'></div>
		  <div class='sixteen columns'>
	<!-- START BODY -->	
	<p><strong>About our team.</strong></p>
<p>Robby Klouda</p>
<p>Tom</p>
<p>Phil</p>
<p>Andrew</p>
<p>Talia</p>

<p> Contact us today in order to schedule an appointment with an agent near you. We are ready to help you, now.</p>
         	</div>

	<center>
<p>
	<span style="font-weight: bold; font-size: 125%;">Help Now ,LLC </span>
	<br />
	11 Red Barn Rd	<br />
	Trumbull, Connecticut 06611	<br />
	Phone: (203) 452-9899		<br />
	<a href="mailto:robert.klouda@quinnipiac.edu">robert.klouda@quinnipiac.edu</a>
</p>
</center>  </div>
 
  <!-- home-portfolio -->
  
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
<p><strong>Phone: </strong> <a href="tel:(203) 452-9899"> (203) 452-9899 </a> </p>
<p><strong>Email: </strong> <a href="mailto:robert.klouda@quinnipiac.edu"> robert.klouda@quinnipiac.edu </a> </p>

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
