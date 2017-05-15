    <div class="mySlides">
        <h3><strong>Aid Requests</strong></h3>
<!---
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

    </form>  -->
    </div>