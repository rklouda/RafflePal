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
 
  $error = false;

 if ( isset($_POST['btn-save-client']) ) {
  
  // clean user inputs to prevent sql injections
  $First_Name = trim($_POST['First_Name']);
  $First_Name = strip_tags($First_Name);
  $First_Name = htmlspecialchars($First_Name);
  
  $Last_Name = trim($_POST['Last_Name']);
  $Last_Name = strip_tags($Last_Name);
  $Last_Name = htmlspecialchars($Last_Name);
  
  $Street = trim($_POST['Street']);
  $Street = strip_tags($Street);
  $Street = htmlspecialchars($Street);
  
  $Phone_Number = trim($_POST['Phone_Number']);
  $Phone_Number = strip_tags($Phone_Number);
  $Phone_Number = htmlspecialchars($Phone_Number);
  
  $City = trim($_POST['City']);
  $City = strip_tags($City);
  $City = htmlspecialchars($City);
  
  $State = trim($_POST['State']);
  $State = strip_tags($State);
  $State = htmlspecialchars($State);
  
  $SSN_Test = trim($_POST['Social_Security_Number']);
  $Social_Security_Number = trim($_POST['Social_Security_Number']);
  $Social_Security_Number= strip_tags($Social_Security_Number);
  $Social_Security_Number= htmlspecialchars($Social_Security_Number);
  

  
//$Date= trim($_POST['Date']); //echo "Today is " . date("Y/m/d") . "<br>";
//  $Date = strip_tags($Date);
//  $Date = htmlspecialchars($Date);
  date_default_timezone_set("America/New_York");
  $Date =date("Y/m/d"); 
  // basic name validation
  
/*  if (empty($First_Name)) {
   $error = true;
   $First_NameError = "Please enter your full name.";
  } else if (strlen($First_Name) < 3) {
   $error = true;
   $First_NameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$First_Name)) {
   $error = true;
   $First_NameError = "Name must contain alphabets and space.";
  }
*/
  // if there's no error, continue to check if SSN exists
     echo "<script type='text/javascript'>alert($SSN_Test)</script>";
      
   //See if client already exists with social security number
   $querySSN = mysqli_query($db,"SELECT Social_Security_Number FROM `CLIENT` WHERE Social_Security_Number=$SSN_Test");
 
   $count = mysqli_num_rows($querySSN); // if SSN Exists it return 1 row
 //FOR TESTING IF SSN EXISTS  IF Count is more then 1, SSN exists else new SSN
//  echo "<script type='text/javascript'>alert($count)</script>";
  
   if($count > 0) {
 
  echo "<script type='text/javascript'>alert('SSN Already Exists. Enter a new SSN')</script>";
//header("Refresh:0");

  // header("Location: index.php");
   } else {
       
          $query = "INSERT INTO CLIENT(First_Name, Last_Name, Street, Phone_Number, City, State, Social_Security_Number,Date, Agent_ID) VALUES('$First_Name', '$Last_Name', '$Street', '$Phone_Number','$City','$State','$Social_Security_Number','$Date', '$userRow[Agent_ID]')";
   $res = mysqli_query($db,$query);
// echo "<script type='text/javascript'>confirm('Are you sure?')</script>";

   echo "<script type='text/javascript'>
   alert('Client Saved...Continue to Aid Request Application'); 
   window.location.href ='/aidRequestAppForm.1.php';
   </script>";
  
//header("Refresh:0");
 // header("Location: /aidRequestAppForm.php");
   }
    

  }


 
 
?>


<!DOCTYPE html>
<html lang="en">
<!-- start head- -->
<head>
 <title>HelpNow</title>
    <meta charset="utf-8">
        <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
   <!link href="https://www.secure-apps.smartapp1003.com/css/app.css" rel="stylesheet">
   <link rel="stylesheet" href="styletemplate.css" type="text/css" />
  
    <link rel="stylesheet" href="https://cdn.lenderhomepage.com/themes/responsivetemplate1/css/style.css" type="text/css"  media="all">
 
  <!---  <style>
                body {
                    background: transparent url('/images/Tulsa1920x1280.jpg')  no-repeat center center fixed;
                      filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='/images/Tulsa1920x1280.jpg', sizingMethod='scale');
                    -ms-filter: "/images/Tulsa1920x1280.jpg', sizingMethod='scale')";
                }
            </style>
  --->
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
		
	</nav>	 <!-- /END nav-wrap -->
		
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

    <h1 class="landing_headline" style="color: #64d655;">Client Information</h1>

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
    
				<li class="active">
			  <a class="drp-aro" href="/clientAppForm.php" >Add New Client  </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="aidRequestAppForm.php" >Eligibility </a>
			            </li>
		
						<li class="">
			  <a class="drp-aro" href="aidRequestAppForm.1.php">Aid Request Form </a>
			            </li>
		
           
                  </ul>
      
  
      	<!-- START BODY -->	      
   
<div class="w3-content" style="max-width:800px">
    <div class="mySlides">
      <h3> <strong>Add New Client</strong></h3>
    

  <div id="login-form" >
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
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
          <div class="form-group" >
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
             <input type="text" id="numbersOnly" pattern="[0-9.]+" style="font-size: 14pt" name="Social_Security_Number" class="form-control" placeholder="Social Security Number NO DASHES" maxlength="40" required="true"  value="<?php echo $Social_Security_Number?>" />
                </div>
                <span class="text-danger"><?php echo $Social_Security_NumberError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" style="font-size: 14pt" name="First_Name" class="form-control" placeholder="Enter Client First Name" maxlength="50"required="true"  id="<?php echo $First_Name?>" />
                </div>
                <span class="text-danger"><?php echo $First_NameError; ?></span>
            </div>
            
            
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" style="font-size: 14pt" name="Last_Name" class="form-control" placeholder="Enter Client Last Name" maxlength="40" required="true" "<?php echo $Last_Name ?>"/>
                </div>
                <span class="text-danger"><?php echo $Last_NameError; ?></span>
            </div>
             
            
              <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
             <input type="text" style="font-size: 14pt" name="Phone_Number" class="form-control" placeholder="Enter Client Phone Number" maxlength="40" value="<?php echo $Phone_Number ?>" />
                </div>
                <span class="text-danger"><?php echo $Phone_NumberError; ?></span>
            </div>     
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
             <input type="text" style="font-size: 14pt" name="Street" class="form-control" placeholder="Enter Client Street Address" maxlength="40" value="<?php echo $Street ?>" />
                </div>
                <span class="text-danger"><?php echo $StreetError; ?></span>
            </div>
            
      
            
            
              <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
             <input type="text" style="font-size: 14pt" name="City" class="form-control" placeholder="Enter Client City" maxlength="40" value="<?php echo $City ?>" />
                </div>
                <span class="text-danger"><?php echo $CityError; ?></span>
            </div>
            
               <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
             <input type="text" style="font-size: 14pt" name="State" class="form-control" placeholder="Enter Client State" maxlength="40" value="<?php echo $State ?>" />
                </div>
                <span class="text-danger"><?php echo $StateError; ?></span>
            </div>
            
                <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
             <input type="text" style="font-size: 14pt" name="Zip_Code" class="form-control" placeholder="Enter Client Zip Code" maxlength="40" value="<?php echo $Zip_Code ?>" />
                </div>
                <span class="text-danger"><?php echo $Zip_CodeError; ?></span>
            </div>
        
          <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
             <input type="text" style="font-size: 14pt" name="Number_Of_Residents" class="form-control" placeholder="Enter Number of Residents in the Home" maxlength="40" value="<?php echo $Number_Of_Residents ?>" />
                </div>
                <span class="text-danger"><?php echo $Number_Of_ResidentsError; ?></span>
            </div>
  
 <h4>Date of Birth</h4>
      <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                
             <input type="date" style="font-size: 14pt" name="Date" class="form-control" placeholder="Date of Birth" maxlength="40" value="<?php echo $Date ?>" />
                </div>
                <span class="text-danger"><?php echo $DateError; ?></span>
            </div>
        
            
            <div class="form-group">
                 <div class="input-group">
             <button type="submit" class="btn btn-lg btn-inf" name="btn-save-client">Save & Continue</button>
              &nbsp;
           <button type="cancel" class="btn btn-lg btn-inf"  onclick="window.location='/ApplyNow.php';return false;">Cancel</button>

            </div>
            <br> </br>
            
        </div>
        
           <div class="form-group">
                 <div class="input-group">
           </div>
             </div>
   
         </div>

</form>
           



                                                                                </div>
                    </section>
                </div>

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
</html>






