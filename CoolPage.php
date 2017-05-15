<?php
 ob_start();
 session_start();
 include 'connect.php';
    //pop up message
  //  echo "<script type='text/javascript'>alert('submitted successfully!')</script>";

 // if session is not set this will redirect to login page
 if(isset($_SESSION['user']) ) {

 // select loggedin AGENT detail
 $res=mysqli_query($db,"SELECT * FROM AGENT WHERE Agent_ID=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);
  }
  
  //THIS IS A DATE COMPARISON BETWEEN TWO DATABASES
/*  $sqlClientDate = "SELECT * FROM CLIENT WHERE Client_ID = '55'";
$res1 = mysqli_query($db,$sqlClientDate);

$sqlAidRequestDate = "SELECT * FROM AID_REQUEST WHERE Request_ID = '102'";
$res2 = mysqli_query($db,$sqlAidRequestDate);

   if ("res1['$Date'] == res2['$Date_Requested']"){

     echo "<script type='text/javascript'>alert('The Date in CLIENT ID 55 Equals the the DATE in AID_REQUEST this code in on line 30 in aidRequest.PHP  now set Approval, etc...')</script>";
    
}
*/


 if ( isset($_POST['btn-save']) ) {
  
  // clean user inputs to prevent sql injections
  $Date_Requested= trim($_POST['Date_Requested']);
  $Date_Requested = strip_tags($Date_Requested);
  $Date_Requested = htmlspecialchars($Date_Requested);
  
  //NEED TO ADD CLIENT
//   $Client_ID = "10"; //isset($_POST['sel1']);
  //NEED TO ADD AID TYPE
//   $Aid_ID = "30"; //isset($_POST['sel2']);
  //NEED TO ADD AGENT
//  $Agent_ID = "2"; //isset($_POST['sel3']);
 
  
  $Amount_Requested = trim($_POST['Amount_Requested']);
  $Amount_Requested = strip_tags($Amount_Requested);
  $Amount_Requested = htmlspecialchars($Amount_Requested);
  
  $Client_Notes = trim($_POST['Client_Notes']);
 // $Client_Notes = strip_tags($Client_Notes);
 // $Client_Notes = htmlspecialchars($Client_Notes);
  
  $Decision= trim($_POST['Decision']);
 // $Decision = strip_tags($Decision);
 // $Decision = htmlspecialchars($Decision);
 
  $Documentation_Provided = trim($_POST['Documentation_Provided']);
 // $Documentation_Provided = strip_tags($Documentation_Provided);
 // $Documentation_Provided = htmlspecialchars($Documentation_Provided);
  

$sql="INSERT INTO AID_REQUEST(file,type,size) VALUES('$file','$file_type','$file_size')";
$res1 = mysqli_query($db,$sql);
 
//ADD DATA TO SQL

 $query =  "INSERT INTO AID_REQUEST(Date_Requested,Amount_Requested,Client_Notes,Decision,Documentation_Provided) VALUES('$Date_Requested','$Amount_Requested','$Client_Notes','$Decision','$Documentation_Provided')";
   $res = mysqli_query($db,$query);
   


} //end btn_push


$error = false;
$res = 0;
 if ( isset($_POST['btn-save-client']) ) {
  
   (string)$Social_Security_Number = ($_POST['Social_Security_Number']);
//  $Social_Security_Number= strip_tags($Social_Security_Number);
//  $Social_Security_Number= htmlspecialchars($Social_Security_Number);
  
     $query = "SELECT * FROM CLIENT WHERE Social_Security_Number='999'";
  $res = mysqli_query($db,$query);

    if (empty($Social_Security_Number)) {
   $error = true;
   $Social_Security_NumberError = "Please enter your SSN.";
  } else if (strlen($Social_Security_Number) < 9) {
   $error = true;
   $Social_Security_NumberError = "SSN must have 9 digits.";
  } else if (preg_match("/^[a-zA-Z ]+$/",$Social_Security_Number)) {
   $error = true;
   $Social_Security_NumberError = "SSN must be a digit with no spaces or letters.";
  }
  else if ($res) {
   $error = true;
   $Social_Security_NumberError = "SSN already Exists.";
   echo "<script type='text/javascript'>alert('SSN: '+$Social_Security_Number+' already Exists')</script>";
  }

  
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
  
   $Zip_Code = trim($_POST['Zip_Code']);
  $Zip_Code = strip_tags($Zip_Code);
  $Zip_Code= htmlspecialchars($Zip_Code);
  
    $Number_Of_Residents = trim($_POST['Number_Of_Residents']);
  $Number_Of_Residents = strip_tags($Number_Of_Residents);
  $Number_Of_Residents= htmlspecialchars($Number_Of_Residents);
  
    // basic name validation
  if (empty($First_Name)) {
   $error = true;
   $First_NameError = "Please enter your full name.";
  } else if (strlen($First_Name) < 3) {
   $error = true;
   $First_NameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$First_Name)) {
   $error = true;
   $First_NameError = "Name must contain alphabets and space.";
  }
  
    if (empty($Last_Name)) {
   $error = true;
   $Last_NameError = "Please enter your full name.";
  } else if (strlen($Last_Name) < 3) {
   $error = true;
   $Last_NameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$Last_Name)) {
   $error = true;
   $Last_NameError = "Name must contain alphabets and space.";
  }
  
//$Date= trim($_POST['Date']); //echo "Today is " . date("Y/m/d") . "<br>";
//  $Date = strip_tags($Date);
//  $Date = htmlspecialchars($Date);
  date_default_timezone_set("America/New_York");
  $Date =date("Y/m/d"); 
  // basic name validation
  

  // if there's no error, continue to signup
  if( !$error ) {
   $query = "INSERT INTO CLIENT(First_Name, Last_Name, Street, Phone_Number, City, State, Zip_Code, Social_Security_Number, Number_Of_Residents,Date, Agent_ID) VALUES('$First_Name', '$Last_Name', '$Street','$Zip_Code', '$Phone_Number','$City','$State','$Social_Security_Number','$Number_Of_Residents',$Date', '$userRow[Agent_ID]')";
   $res = mysqli_query($db,$query); 
  // header("Refresh:0"); 
  }
  

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Help Now Application</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://www.secure-apps.smartapp1003.com/css/flatty.bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="https://www.secure-apps.smartapp1003.com/css/drawer.css" rel="stylesheet"> -->
    <!-- <link href="https://www.secure-apps.smartapp1003.com/css/animate.min.css" rel="stylesheet"> -->
    <!-- <link href="https://www.secure-apps.smartapp1003.com/css/step-nav.css" rel="stylesheet"> -->
    <link href="https://www.secure-apps.smartapp1003.com/css/app.css" rel="stylesheet">
    
    
                <link href="https://www.secure-apps.smartapp1003.com/css/landing-page-background.css" rel="stylesheet">
            
            <style>
                body {
                    background: transparent url('https://secure-apps.smartapp1003.com/uploads/house%20background.jpg')  no-repeat center center fixed;
                      filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='https://secure-apps.smartapp1003.com/uploads/house%20background.jpg', sizingMethod='scale');
                    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='https://secure-apps.smartapp1003.com/uploads/house%20background.jpg', sizingMethod='scale')";
                }
            </style>
                
    
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.min.css" rel="stylesheet" type="text/css">
    <link href="//gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet" type="text/css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <style>
        #content h3{
            color: #5bc0de !important;
        }
        .btn-info{
            background-color: #5bc0de !important;
        }
        #sub-section-nav.nav-tabs > li.active > a, .nav-tabs > li > a:hover{
            color: #5bc0de !important;
        }
        #sub-section-nav.nav-tabs > li > a::after{
            background-color: #5bc0de !important;
        }
        
        bg_image_url
        
    </style>
</head>

<body>

<div id="disconnect-overlay">
    <div class="col-xs-12 load-container">
        <div class="text-center">
            <div class="loader"></div>
        </div>
    </div>
</div>

<div id="app-header" class="container-fluid guestmode">
    <div class="row">
        <section class="app-header col-md-12 col-xs-12">
            <div class="container">
                <div class="col-md-5 col-xs-12">
    <div class="row">
        <div class="logo text-center animated zoomInDown">
            <a href="http://afcmortgagegroup.net"><img id="main_logo" style="max-height: 100px; max-width: 100%;"  src=""/></a>
        </div>
    </div>
</div>
</div>
</div>

<!-- if($profile->slogan) -->
<div class="col-md-3 col-xs-6">
<!--
    <div class="logo-alternate"></div>
    <div class="slogan"></div> -->
    <img src="helpnowlogo2.png" style="width: 180; display: block; margin: 0 auto;" class="hidden-xs hidden-sm"/>
    
    </div>
    
    

<div class="clearfix"></div>
<div id="address-modal" class="modal" data-show="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Lenderhomepage</h4>
            </div>
            <div class="modal-body">
                <div id="address-map"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

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
</script>            </div>
        </section>
    </div>
</div>

<div style="height: 50px;"></div>

<div class="">
    <div id="app-messages" class="col-xs-12 alert alert-danger animated shake hidden">
    </div>
    </div>
<div class="clearfix"></div>

    <h1 class="landing_headline">HelpNow Aid Request Application</h1>


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
        <div class="col-sm-6 col-xs-12 text-center">
            <div class="entry-box panel panel-default" id="main_panel">
                <div class="panel-heading">
                    <h3> New Applicants</h3>
                    <h4 style="display: none;"> New Applicants</h4>
                </div>
                <div class="panel-body">
                
                                        
                        <p> Start by creating a client profile & new aid request </p><br/>
                             <form id="new-app-form" class="form-horizontal" role="form" action="/clientAppForm.php" method="POST">
                            <div class="bottom text-center">
                                <input type="submit" class="btn btn-lg btn-info" value="Get Started Now!"/>
                            </div>
                        </form>
                   
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xs-12 text-center">
            <div class="entry-box panel panel-default">
                <div class="panel-heading">
                    <h3> Returning Applicants</h3>
                </div>
                <div class="panel-body">
                    <p>
   If you are already a client? Please click the "Continue" to start a new aid request.
                                            </p>
                  <form id="new-app-form" class="form-horizontal" role="form" action="/aidRequestAppForm.php" method="POST">
                            <div class="bottom text-center">
                                <input type="submit" class="btn btn-lg btn-success" value="Continue"/>
                            </div>
                 </form>
                   
                </div>
            </div>
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

<footer class="footer">
    <div class="container">
        <div class="Copyright">
                        Copyright 2017 QU CIS TEAM. ,LLC . All rights reserved. <br>
    	    <a style="color: #5bc0de;" href="http://www.qu.org/" target="_blank">http://www.qu.org/ </a>
    	        	</div>
    </div>
</footer>


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
.hidden { display: none; }
</style>

 <!--   <input type="image" id="myBtn" src="HelpNowlogo1.png" width="250" height="250"/>
   <input type="image" id="myBtn2" src="helpnowlogo2.png" width="250" height="250"/>
-->

<!-- The Modal -->

  <!-- Modal content 
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>-->
      
      
<div id="myModal" style="display:none;"
   <div class="panel col-sm-6">  

      
  <h3>Add New Client</h3>
  <div class="row">
<div class="col-sm-12">
  <div id="login-form" >
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
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
                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
             <input type="text" name="Social_Security_Number" class="form-control" placeholder="Enter Your Social Security Number" maxlength="40" required="true" value="<?php echo (string)$Social_Security_Number ?>" />
                </div>
                <span class="text-danger"><?php echo $Social_Security_NumberError; ?></span>
            </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="First_Name" class="form-control" placeholder="Enter your First Name" maxlength="50"required="true"  value="<?php echo $First_Name ?>" />
                </div>
                <span class="text-danger"><?php echo $First_NameError; ?></span>
            </div>
            
            
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="Last_Name" class="form-control" placeholder="Enter Your Last Name" maxlength="40" required="true" value="<?php echo $Last_Name ?>" />
                </div>
                <span class="text-danger"><?php echo $Last_NameError; ?></span>
            </div>
             
            
              <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
             <input type="text" name="Phone_Number" class="form-control" placeholder="Enter Your Phone Number" maxlength="40" value="<?php echo $Phone_Number ?>" />
                </div>
                <span class="text-danger"><?php echo $Phone_NumberError; ?></span>
            </div>     
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
             <input type="text" name="Street" class="form-control" placeholder="Enter Your Street Address" maxlength="40" value="<?php echo $Street ?>" />
                </div>
                <span class="text-danger"><?php echo $StreetError; ?></span>
            </div>
            
      
            
            
              <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
             <input type="text" name="City" class="form-control" placeholder="Enter Your City" maxlength="40" value="<?php echo $City ?>" />
                </div>
                <span class="text-danger"><?php echo $CityError; ?></span>
            </div>
            
               <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
             <input type="text" name="State" class="form-control" placeholder="Enter Your State" maxlength="40" value="<?php echo $State ?>" />
                </div>
                <span class="text-danger"><?php echo $StateError; ?></span>
            </div>
            
                <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
             <input type="text" name="Zip_Code" class="form-control" placeholder="Enter Zip Code" maxlength="40" value="<?php echo $State ?>" />
                </div>
                <span class="text-danger"><?php echo $Zip_CodeError; ?></span>
            </div>
        
          <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
             <input type="text" name="Number_Of_Residents" class="form-control" placeholder="Enter number of residents in the home" maxlength="40" value="<?php echo $State ?>" />
                </div>
                <span class="text-danger"><?php echo $Number_Of_ResidentsError; ?></span>
            </div>
            
      <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
             <input type="text" name="Date" class="form-control" placeholder="Date" maxlength="40" value="<?php echo $Date ?>" />
                </div>
                <span class="text-danger"><?php echo $StateError; ?></span>
            </div>
        
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-save-client">Submit</button>
            </div>
   
    </form>
</div>
  
  </div>
 </div>
</div>
</div>  

<!-- The Modal -->
   
<div id="myModal2" style="display:none;">
<div class="panel col-sm-6"> 

<h3>Create Aid Request </h3>
<div class="row">
<div class="col-sm-12">
<div id="login-form">
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
   ?>
       <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
             <input type="text" name="Date_Requested" class="form-control" placeholder="Date" maxlength="40" value="<?php echo $Date_Requested ?>" />
                </div>
                <span class="text-danger"><?php echo $Date_RequestedError; ?></span>
            </div>
            
            <div class="form-group">
      <label for="sel1">Select Client:</label>
       <select class="form-control" id="sel1" >
         <?php
         //Only Clients for logged in Agent
            $results = mysqli_query($db,"SELECT * FROM `CLIENT` ");
            while($row = mysqli_fetch_array($results)) {
            ?>
          
 <option><value=$row['Client_ID']><?php echo $row['Client_ID'], ' ', $row['First_Name'], ' ', $row['Last_Name']?> </option>
            <?php
            }
           
            ?>
             </select>
         </div>

           <div class="form-group">
      <label for="sel2">Select Aid Type:</label>
       <select class="form-control" id="sel2">
         <?php
         //Only Clients for logged in Agent
            $results = mysqli_query($db,"SELECT * FROM `AID_TYPE`");
            while($row = mysqli_fetch_array($results)) {
            ?>
          
 <option><value=$row['Aid_ID']><?php echo $row['Aid_ID'], ' ', $row['Time_Restriction'], ' ', $row['Category']?> </option>
            <?php
            }
           
            ?>
             </select>
         </div>

             <div class="form-group">
      <label for="sel3">Select Agent:</label>
       <select class="form-control" id="sel3">
         <?php
            $results = mysqli_query($db,"SELECT * FROM `AGENT`");
            while($row = mysqli_fetch_array($results)) {
            ?>
          
 <option><value=$row['Agent_ID']><?php echo $row['Agent_ID'], ' ', $row['First_Name'], ' ', $row['Last_Name']?> </option>
            <?php
            }
 
            ?>
             </select>
         </div>
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
             <input type="text" name="Amount_Requested" class="form-control" placeholder="Enter Amount Requested" maxlength="50" required="true" value="<?php echo $Amount_Requested ?>" />
                </div>
                <span class="text-danger"><?php echo $Amount_RequestedError; ?></span>
            </div>
 
   <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
             <input type="text" name="Client_Notes" class="form-control" placeholder="Enter Client Notes" maxlength="50" value="<?php echo $Client_Notes ?>" />
                </div>
                <span class="text-danger"><?php echo $Client_NotesError; ?></span>
            </div>
 
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-ok"></span></span>
             <input type="text" name="Decision" class="form-control" placeholder="Enter Decision" maxlength="40" value="<?php echo $Decision ?>" />
                </div>
                <span class="text-danger"><?php echo $DecisionError; ?></span>
            </div>
            
      
            
            
              <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-file"></span></span>
             <input type="text" name="Documentation_Provided" class="form-control" placeholder="Enter Documentation Provided" maxlength="40" value="<?php echo $Documentation_Provided?>" />
                  
                </div>
                <span class="text-danger"><?php echo $Documentation_ProvidedError; ?></span></span>
            </div>
        
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-save">Submit</button>
            </div>
    </form>
</div>
  
  </div>
 </div>
  </div>
  
 
 </div>
<!-- Scripts -->
<script>
// Get the modal2
var modal2 = document.getElementById('myModal2');

// Get the button that opens the modal
var btn2 = document.getElementById("myBtn2");


 var main_panel = document.getElementById("main_panel");
var main_panel2 = document.getElementById("main_panel2");

// When the user clicks the button, open the modal 
btn2.onclick = function() {
  modal2.style.display = "block";
   main_panel.style.display = "none";
    main_panel2.style.display = "none";
}



// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");


// When the user clicks the button, open the modal 
btn.onclick = function() {
   modal.style.display = "block";
  main_panel.style.display = "none";
    main_panel2.style.display = "none";
  
}



// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>



<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="//gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.min.js"></script>
<script src="/js/router.jquery.js"></script>
<!--
<script src="/js/maskedinput.jquery.js"></script>

<script src="/js/helpers.jquery.js"></script>

<script src="/js/drawer.jquery.js"></script> -->


<script src="/oldjs/jquery.maskedinput.js"></script>
<script src="/js/app.guest.js"></script>
<!--
<script src="/oldjs/jquery.validate.js"></script>
<script src="/oldjs/jquery.calculation.js"></script>
<script src="/oldjs/jquery.form.js"></script>
<script src="/oldjs/additional-methods.js"></script> -->


</body>
</html>