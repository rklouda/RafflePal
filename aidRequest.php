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
  $sqlClientDate = "SELECT * FROM CLIENT WHERE Client_ID = '55'";
$res1 = mysqli_query($db,$sqlClientDate);

$sqlAidRequestDate = "SELECT * FROM AID_REQUEST WHERE Request_ID = '102'";
$res2 = mysqli_query($db,$sqlAidRequestDate);

   if ("res1['$Date'] == res2['$Date_Requested']"){

     echo "<script type='text/javascript'>alert('The Date in CLIENT ID 55 Equals the the DATE in AID_REQUEST this code in on line 30 in aidRequest.PHP  now set Approval, etc...')</script>";
    
}

 

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
   


   
 
   
   
   
   
   
   
   
   
 header("Refresh:0");

} //end btn_push
 
?>
<!DOCTYPE html>
<html>

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
  <h3>Create Aid Request </h3>
<div class="col-sm-6">
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
      <label for="sel1">Select Client:</label>
       <select class="form-control" id="sel1" >
         <?php
         //Only Clients for logged in Agent
            $results = mysqli_query($db,"SELECT * FROM `CLIENT`");
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
                <span class="text-danger"><?php echo $Documentation_ProvidedError; ?></span>
              
            </div>
                     <div class="form-group">
             <div class="input-group">
             <input type="file" name="name">
                </div>
            </div>
         
            <div class="form-group">
             <hr />
            </div>
            
            <div class="form-group">
             <button type="submit" class="btn btn-block btn-primary" name="btn-save">Submit</button>
            </div>
    </form>
</div> 

 <div class="col-sm-6">
         <h2>Aid Request in Table</h2>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Client</th>
          <th>Agent</th>
        <th>Aid_ID</th>
        <th>Amount</th>
          <th>Client Notes</th>
        <th>Decision</th>
        <th>Docs</th>
      </tr>
    </thead>
    <tbody>
       <?php
            $results = mysqli_query($db,"SELECT * FROM `AID_REQUEST`");
            while($row = mysqli_fetch_array($results)) {
            ?>
      <tr>
        <td><?php echo $row['Request_ID']?></td>
        <td><?php echo $row['Date_Requested']?></td>
        <td><?php echo $row['Client_ID']?></td>
        <td><?php echo $row['Agent_ID']?></td>
        <td><?php echo $row['Aid_ID']?></td>
        <td><?php echo $row['Amount_Requested']?></td>
         <td><?php echo $row['Client_Notes']?></td>
        <td><?php echo $row['Decision']?></td>
        <td><?php echo $row['Documentation_Provided']?></td>
      </tr>
     <?php
            }
           
            ?>
    </tbody>
  </table>
  
  
         
        <h2>Awards</h2>
  <p></p>            
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Award ID</th>
        <th>Request Id</th>
        <th>Amount Granted</th>
         <th>Date Recieved</th>
      </tr>
    </thead>
    <tbody>
    <?php
 $sql="SELECT * FROM `AWARD`";
 $result_set=mysqli_query($db,$sql);
 while($row=mysqli_fetch_array($result_set))
 {
  ?>
        <tr>
        <td><?php echo $row['Award_ID']?></td>
        <td><?php echo $row['Request_ID']?></td>
        <td><?php echo $row['Amount_Granted']?></td>
         <td><?php echo $row['Date_Received']?></td>
        </tr>
        <?php
 }
 ?>
</table> 
     
     
     
  <h2>Clients in Table</h2>
  <p></p>            
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Client ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date Enter</th>
      </tr>
    </thead>
    <tbody>
       <?php
            $results = mysqli_query($db,"SELECT * FROM `CLIENT`"); // WHERE Agent_ID =$userRow[Agent_ID]");
            while($row = mysqli_fetch_array($results)) {
            ?>
      <tr>
        <td><?php echo $row['Client_ID']?></td>
        <td><?php echo $row['First_Name']?></td>
        <td><?php echo $row['Last_Name']?></td>
        <td><?php echo $row['Date']?></td>
      </tr>
     <?php
            }
           
            ?>
    </tbody>
  </table>
  
    <h2>Agents in Table</h2>
  <p></p>            
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Agent ID</th>
        <th>First Name</th>
        <th>Last Name</th>
      </tr>
    </thead>
    <tbody>
       <?php
            $results = mysqli_query($db,"SELECT * FROM `AGENT`");
            while($row = mysqli_fetch_array($results)) {
            ?>
      <tr>
        <td><?php echo $row['Agent_ID']?></td>
        <td><?php echo $row['First_Name']?></td>
        <td><?php echo $row['Last_Name']?></td>
      </tr>
     <?php
            }
           
            ?>
    </tbody>
  </table>



    <h2>Aid Type in Table</h2>
  <p></p>            
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Aid ID</th>
        <th>Time Restriction (Days)</th>
        <th>Category</th>
      </tr>
    </thead>
    <tbody>
       <?php
            $results = mysqli_query($db,"SELECT * FROM `AID_TYPE`");
            while($row = mysqli_fetch_array($results)) {
            ?>
      <tr>
        <td><?php echo $row['Aid_ID']?></td>
        <td><?php echo $row['Time_Restriction']?></td>
        <td><?php echo $row['Category']?></td>
      </tr>
     <?php
            }
           
            ?>
    </tbody>
  </table>
  

  
  
</div>
</div>

    
<!-- dependencies (jquery, handlebars and bootstrap) -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.3/handlebars.min.js"></script>
<link type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet"/>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="delete.js"></script>
  
</body>
</html>
<?php ob_end_flush(); ?>