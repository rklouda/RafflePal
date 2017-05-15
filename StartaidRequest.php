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
  
  //////THIS IS A DATE COMPARISON BETWEEN TWO DATABASES
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
<html>
  <style>
body {
   background: transparent url('https://secure-apps.smartapp1003.com/uploads/house%20background.jpg')  no-repeat center center fixed;
   filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='https://secure-apps.smartapp1003.com/uploads/house%20background.jpg', sizingMethod='scale');
                    -ms-filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='https://secure-apps.smartapp1003.com/uploads/house%20background.jpg', sizingMethod='scale')";
                }
            </style>
<style type="text/css">
     .close {
  position: absolute;
  right: 0;
  top: 0;
  padding: 12px 16px 12px 16px

}

.close:hover {
  background-color: #f44336;
  color: white;
}   
</style>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
<!--<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />-->
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
         <a><img src="/HelpNowlogo1.png" width="50" height="50" alt="MyLogo" border="0" /></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>


<?php

if (isset($_SESSION['user'])) { ?>
     <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
             <li><a href="Agents.php">Agents</a></li>
             <li><a href="clients.php">Clients</a></li>
             <li><a href="team.php">The Development Team</a></li>
             <li><a href="aidRequest.php">Request Aid</a></li>
              <li><a href="StartaidRequest.php">Start Aid Request</a></li>
              <li><a href="CoolPage.php" target="blank">Cool Page</a></li>
          </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
     <span class="glyphicon glyphicon-user"></span>&nbsp;Hi <?php echo $userRow['First_Name']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
<?php 
} else { ?>
   <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
             <li><a href="team.php">The Development Team</a></li>
          </ul>
           <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="login.php" role="button" >Login</a>
            </li>
          </ul>
<?php 
}



?>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 
    <li></li>
     <li></li>

<div class="container">  


    <h3 class="landing_headline">Help Now - Aid Request Application</h3>

        <div class="" style="padding-bottom: 10px;">
    <div id="content" class="container guestmode">
          
<div class="row">
    <fieldset>
        <div class="col-sm-4 col-xs-10 text-center">
            <div class="entry-box panel panel-default" id="main_panel">
                <div class="panel-heading">
                    <h3> New Applicants</h3>
                    <h4 style="display: none;"> New Applicants</h4>
                   </div>
                <div class="panel-body">
                        <p> Start a new Aid Request Application </p><br/>
                         <div class="bottom text-center">
                               <div id="myBtn" class="btn btn-lg btn-info">Get Started Now!</div>
                            </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-4 col-xs-10 text-center">
            <div class="entry-box panel panel-default" id="main_panel2">
                <div class="panel-heading">
                    <h3> Returning Applicants</h3>
              </div>
                <div class="panel-body">
                    <p>If an existing client click here to continue</p><br/>
                    <div class="bottom text-center">
                        <div id="myBtn2" class="btn btn-lg btn-success">Continue</div>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</div>
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

 
    
<!-- dependencies (jquery, handlebars and bootstrap) -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.3/handlebars.min.js"></script>
<link type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet"/>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>
<?php ob_end_flush(); ?>