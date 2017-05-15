<?php
 ob_start();
 session_start();
 include 'connect.php';
 
 // if session is not set this will redirect to login page
 if(isset($_SESSION['user']) ) {


 // select loggedin AGENT detail
 $res=mysqli_query($db,"SELECT * FROM AGENT WHERE Agent_ID=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);
  }
  
  
$error = false;

 if ( isset($_POST['btn-save']) ) {
  
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
  
  $Social_Security_Number = trim($_POST['Social_Security_Number']);
  $Social_Security_Number= strip_tags($Social_Security_Number);
  $Social_Security_Number= htmlspecialchars($Social_Security_Number);
  
//$Date= trim($_POST['Date']); //echo "Today is " . date("Y/m/d") . "<br>";
//  $Date = strip_tags($Date);
//  $Date = htmlspecialchars($Date);
  date_default_timezone_set("America/New_York");
  $Date =date("Y/m/d"); 
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

  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO CLIENT(First_Name, Last_Name, Street, Phone_Number, City, State, Social_Security_Number,Date, Agent_ID) VALUES('$First_Name', '$Last_Name', '$Street', '$Phone_Number','$City','$State','$Social_Security_Number','$Date', '$userRow[Agent_ID]')";
   $res = mysqli_query($db,$query);
   header("Refresh:0");
  }
}


?>
<!DOCTYPE html>
<html>

<style type="text/css">
 /*    .close {
  position: absolute;
  right: 0;
  top: 0;
  padding: 12px 16px 12px 16px

}

.close:hover {
  background-color: #f44336;
  color: white;
  
} */  
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
  <h3>Add New Client</h3>
  <div class="row">
<div class="col-sm-6">
  <div id="login-form">
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
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="First_Name" class="form-control" placeholder="Enter your First Name" maxlength="50" required="true" value="<?php echo $First_Name ?>" />
                </div>
                <span class="text-danger"><?php echo $First_NameError; ?></span>
            </div>
            
            
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="Last_Name" class="form-control" placeholder="Enter Your Last Name" maxlength="40" value="<?php echo $Last_Name ?>" />
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
                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
             <input type="text" name="Social_Security_Number" class="form-control" placeholder="Enter Your Social Security Number" maxlength="40" value="<?php echo $Social_Security_Number ?>" />
                </div>
                <span class="text-danger"><?php echo $Social_Security_NumberError; ?></span>
            </div>
            
            
      <!--       <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
             <input type="text" name="Date" class="form-control" placeholder="Date" maxlength="40" value="<?php echo $Date ?>" />
                </div>
                <span class="text-danger"><?php echo $StateError; ?></span>
            </div>
         -->   
            
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-save">Submit</button>
            </div>
            
        </div>
   
    </form>
</div> 

<div class="container">
 <div class="col-sm-6">
  <h2>Query: If client qualifies based on Date Received compared to the Time Restriction (Last award)</h2>
  <p></p>            
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Date_Received</th>
        <th>Time_Restriction</th>

      </tr>
    </thead>
    <tbody>
       <?php
         $results = mysqli_query($db,"SELECT Date_Received, Time_Restriction FROM `AWARD` INNER JOIN AID_TYPE ON Aid_ID = Award_ID");
         
         //mysqli_query($db,"SELECT * FROM `CLIENT` ");//WHERE Agent_ID =$userRow[Agent_ID]
            while($row = mysqli_fetch_array($results)) {
            ?>
      <tr>
        <td><?php echo $row['Date_Received']?></td>
        <td><?php echo $row['Time_Restriction']?></td>
  
      </tr>
     <?php
            }
           
            ?>
    </tbody>
  </table>
</div>

<div class="container">
 <div class="col-sm-6">
  <h2>All Clients by Agent : <?php echo $userRow['First_Name']; ?></h2>
  <p></p>            
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Client ID</th>
        <th>First Name</th>
        <th>Last Name</th>
         <th>Agent ID</th>
      </tr>
    </thead>
    <tbody>
       <?php
            $results = mysqli_query($db,"SELECT * FROM `CLIENT` WHERE Agent_ID =$userRow[Agent_ID]");
            while($row = mysqli_fetch_array($results)) {
            ?>
      <tr>
        <td><?php echo $row['Client_ID']?></td>
        <td><?php echo $row['First_Name']?></td>
        <td><?php echo $row['Last_Name']?></td>
        <td><?php echo $row['Agent_ID']?></td>
      </tr>
     <?php
            }
           
            ?>
    </tbody>
  </table>
</div>

<div class="container">
 <div class="col-sm-6">
  <h2>Aid Requests</h2>
  <p></p>            
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Request ID</th>
        <th>Amount Requested</th>
        <th>Client Notes</th>
        
      </tr>
    </thead>
    <tbody>
       <?php
            $results = mysqli_query($db,"SELECT * FROM `AID_REQUEST` ");//WHERE Agent_ID =$userRow[Agent_ID]
            while($row = mysqli_fetch_array($results)) {
            ?>
      <tr>
        <td><?php echo $row['Request_ID']?></td>
        <td><?php echo $row['Amount_Requested']?></td>
        <td><?php echo $row['Client_Notes']?></td>
        
      </tr>
     <?php
            }
           
            ?>
    </tbody>
  </table> 
</div>


<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Client Application</h4>
        </div>
        <div class="modal-body">
               <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="First_Name" class="form-control" placeholder="Enter your First Name" maxlength="50" required="true" value="<?php echo $First_Name ?>" />
                </div>
                <span class="text-danger"><?php echo $First_NameError; ?></span>
            </div>
  
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="Last_Name" class="form-control" placeholder="Enter Your Last Name" maxlength="40" value="<?php echo $Last_Name ?>" />
                </div>
                <span class="text-danger"><?php echo $Last_NameError; ?></span>
            </div>
            
            
                  <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="First_Name" class="form-control" placeholder="Enter your First Name" maxlength="50" required="true" value="<?php echo $First_Name ?>" />
                </div>
                <span class="text-danger"><?php echo $First_NameError; ?></span>
            </div>
            
            
            
            <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
             <input type="text" name="Last_Name" class="form-control" placeholder="Enter Your Last Name" maxlength="40" value="<?php echo $Last_Name ?>" />
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
                <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
             <input type="text" name="Social_Security_Number" class="form-control" placeholder="Enter Your Social Security Number" maxlength="40" value="<?php echo $Social_Security_Number ?>" />
                </div>
                <span class="text-danger"><?php echo $Social_Security_NumberError; ?></span>
            </div>
            
            
             <div class="form-group">
             <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
             <input type="text" name="Date" class="form-control" placeholder="Date" maxlength="40" value="<?php echo $Date ?>" />
                </div>
                <span class="text-danger"><?php echo $StateError; ?></span>
            </div>
            
            
            
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="btn btn-default" name="btn-update">Update</button> 
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            
        </div>
   
    </form>
       </div>
        <div class="modal-footer">
</div>
 
    
<!-- dependencies (jquery, handlebars and bootstrap) -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.3/handlebars.min.js"></script>
<link type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet"/>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="delete.js"></script> -->
  
</body>
</html>
<?php ob_end_flush(); ?>