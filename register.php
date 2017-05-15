<?php
 ob_start();
 session_start();
 include_once 'connect.php';
 // if session is not set this will redirect to login page
 if( isset($_SESSION['user']) ) {

 // select loggedin AGENT detail
 $res=mysqli_query($db,"SELECT * FROM AGENT WHERE Agent_ID=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res); 
     
 }
 
 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $First_Name = trim($_POST['First_Name']);
  $First_Name = strip_tags($First_Name);
  $First_Name = htmlspecialchars($First_Name);
  
    $Last_Name = trim($_POST['Last_Name']);
  $Last_Name = strip_tags($Last_Name);
  $Last_Name = htmlspecialchars($Last_Name);
  
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
   // basic name validation
  if (empty($First_Name)) {
   $error = true;
   $First_NameError = "Please enter your first name.";
  } else if (strlen($First_Name) < 3) {
   $error = true;
   $First_NameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$First_Name)) {
   $error = true;
   $First_NameError = "Name must contain alphabets and space.";
  }
  
  
  // basic name validation
  if (empty($Last_Name)) {
   $error = true;
   $Last_NameError = "Please enter your last name.";
  } else if (strlen($Last_Name) < 3) {
   $error = true;
   $Last_NameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$Last_Name)) {
   $error = true;
   $last_NameError = "Name must contain alphabets and space.";
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT Agent_Email FROM AGENT WHERE Agent_Email='$email'";
   $result = mysqli_query($db,$query);
   $count = mysqli_num_rows($result);
   
   
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO AGENT(First_Name,Last_Name,Agent_Email,Password) VALUES('$First_Name','$Last_Name','$email','$password')";
   $res = mysqli_query($db,$query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($First_Name);
    unset($Last_Name);
    unset($email);
    unset($pass);

       
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    
  }
  
  
 }
?>

<!DOCTYPE html>
<html lang="en">
<!-- start head- -->
<head>
     <title>Help Now</title>
    <meta charset="utf-8">
        <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
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
			  <a class="drp-aro" href="/ApplyNow.php">Create Aid Request </a>
			            </li>
			<li class="">
			  <a class="drp-aro" href="/reports.php">Reports  </a>
			            </li>

                <li class="nav navbar-nav navbar-right">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
         </span>Hi <?php echo $userRow['First_Name']; ?></span class="caret"></span></a>
                  <ul class="dropdown-menu nav navbar-nav navbar-right">
                    <li><a href="/logout.php?logout"></span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
                      <li><a href="/agentprofile.php"></span class="glyphicon glyphicon"></span>&nbsp;Profile</a></li>
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
			  <a class="drp-aro" href="/team.php" >Meet Our Agents </a>
			            </li> 
 		        <li class="nav navbar-nav navbar-right">
                  <a class="drp-aro"href="/login.php" role="button" >Login</a>
                  
                </li>
                
                <li class="">
			  <a class="drp-aro" href="/Testimonials.php" >Testimonials  </a>
			            </li>
                 <li class="">
			  <a class="drp-aro" href="/Schedule.php" >Schedule an Appointment</a>
			            </li>
			      
            </ul>
            
<?php
}

?>

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

<div style="height: 50px;"></div>

<div class="">
    <div id="app-messages" class="col-xs-12 alert alert-danger animated shake hidden">
    </div>
    </div>
<div class="clearfix"></div>

    <h1 class="landing_headline">Add New Agent - System Admin ONLY</h1>

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

  <div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    
     <div class="col-md-12">
        
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
   ?>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="First_Name" style="font-size: 14pt" class="form-control" placeholder="Enter First Name" maxlength="50" value="<?php echo $First_Name ?>" />
                </div>
                <span class="text-danger"><?php echo $Fist_NameError; ?></span>
            </div>
            
             <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="Last_Name" style="font-size: 14pt" class="form-control" placeholder="Enter Last Name" maxlength="50" value="<?php echo $Last_Name ?>" />
                </div>
                <span class="text-danger"><?php echo $Last_NameError; ?></span>
            </div>
            
            
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
             <input type="email" name="email" style="font-size: 14pt" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
             <input type="password" name="pass"style="font-size: 14pt" class="form-control" placeholder="Enter Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="btn btn-lg btn-inf" name="btn-signup">Add New Agent</button>
            </div>
            
 
        
        </div>
   
    </form>
 
    </fieldset>
</div>
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
</html


