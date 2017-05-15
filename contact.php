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
				<span class='icon-phone' style='margin-right: 13px;'></span><a href="tel:1-800-helpnow">1-800-HelpNow</a>
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
			  <a class="drp-aro" href="/ApplyNow.php">Apply Now  </a>
			            </li>
			<li class="">
			  <a class="drp-aro" href="/reports.php">Reports  </a>
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
		</div>
	</nav>
	<!-- /nav-wrap -->
</header>  <!-- end-header -->
  <div class='container'>
	  <div style='margin-top:10px'></div>
		  <div class='sixteen columns'>
			
<div class="flexslider" style="width: 100%; margin: 0px auto;" role="region" aria-label="Carousel" >
	<ul class="slides">
				<li>
						<img src="/images/logocover.jpg" alt="	No matter what type of loan you need, we're with you every step of the way."/>
						
						<div class="flex-caption">No matter what type of need, we're with you every step of the way.</div>
					</li>
				<li>
						<img src="http://cdn.lenderhomepage.com/themes/responsivetemplate1/images/2.jpg" alt="						The PERFECT HOME is waiting for you -- let us find you the perfect loan to go with it."/>
						
						<div class="flex-caption">We understand your needs -- Let us help you.</div>
					</li>
				<li>
						<img src="http://cdn.lenderhomepage.com/themes/responsivetemplate1/images/3.jpg" alt="						Let us be the stepping stone to the home of your dreams."/>
						
						<div class="flex-caption">Let us keep life normal.</div>
					</li>
				<li>
						<img src="/images/Hands.jpg" alt="						REFINANCING is easy with our professionals' help."/>
						
						<div class="flex-caption">Applying for aid is easy with our professional Agents' by your side.</div>
					</li>
				<li>
						<img src="http://cdn.lenderhomepage.com/themes/responsivetemplate1/images/5.jpg" alt="						We make Refinancing a breeze!"/>
						
						<div class="flex-caption">We make Help Now a breeze!</div>
					</li>
			</ul>
</div>
<script type="text/javascript" src="https://cdn.lenderhomepage.com/js/flexslider/jquery.flexslider-min.js"></script>
<script type="text/javascript">
    if(typeof window.flexSliderSpeed == 'undefined') {
         window.flexSliderSpeed = 7000;
    }
$(function() {
	$('.flexslider').flexslider({
		controlNav: true,
		directionNav: false,
		animation: 'fade',
        slideshowSpeed:window.flexSliderSpeed
	});
});
</script>

		  </div>
  </div>

  <!-- start-home-content-->
  <div class="container home-content" >
  <!-- Quentin-Iconbox-start -->
    <div class="vertical-space1"></div>
   

    <div class="vertical-space1"></div>
	<!-- Quentin-Iconbox-end -->
    <!-- Latest Projects - Start -->
    <div class="vertical-space1"></div>
    <div class="eleven columns" id="rate-table">
			</div>
	<div class="five columns pull-right" id="branches">
				<br>
			</div>

	<div style="clear: both;"></div>

    <div class="lhp-edit" data-edit-type="content" data-edit-field="_body" style="margin-top:20px;">
	<p>
	<strong>Welcome to our website.</strong></p>
<p>
	We know that each family has specific needs, so we strive to meet those needs.</p>
<p>
	Today's technology is providing a more productive environment to work in. For example, through our website you can submit a complete on-line, secure aid request application.</p>
	</div>

	<center>
<p>
	<span style="font-weight: bold; font-size: 125%;">Help Now, LLC </span>
<br><img  src="images/HelpNow logo 1.png" style="width:50px;height:50px;" ></br>
	

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
         <br> </br>
                <div>
<p><strong>Address: </strong> 11 Red Barn Rd Tulsa, OK 80400</p>
<p><strong>Phone: </strong> <a href="tel:(203) 985-5807"> (203) 985-5807  </a> </p>
<p><strong>Email: </strong> <a href="mailto:robert.klouda@quinnipiac.edu">Contact@helpnow.com </a> </p>
<p>Copyright © 2017 HelpNow Inc. All Rights Reserved </p>

</div>                
<div class="lhp-edit" data-edit-type="global-replace" data-edit-field="footer2"></div>
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