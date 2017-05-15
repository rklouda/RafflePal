<?php
 ob_start();
 session_start();

 include_once 'connect.php';

   //getting values 
    $Client_ID = $_POST['Client_ID'];
    $Last_Name = $_POST['Last_Name'];
    $First_Name = $_POST['First_Name'];
    $Street = $_POST['Street'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $Zip_Code = $_POST['Zip_Code'];
    $Date = $_POST['Date'];
    $Phone_Number = $_POST['Phone_Number'];
    $Number_Of_Residents= $_POST['Number_Of_Residents'];
    $Agent_ID = $_POST['Agent_ID'];
    $Social_Security_Number = $_POST['Social_Security_Number'];
  // clean user inputs to prevent sql injections
   //  
 //   $query = "UPDATE AGENT SET Last_Name='$Last_Name', First_Name='$First_Name', Street='$Street', City='$City',State='$State', Zip_Code='$Zip_Code', 
 //   Date_Hired='$Date_Hired',Phone_Number='$Phone_Number',Agent_Email='$Agent_Email' WHERE Agent_ID='$Agent_ID'";
   
   
   
 $query = "UPDATE CLIENT SET Last_Name='$Last_Name', First_Name='$First_Name', Street='$Street', City='$City',State='$State', Zip_Code='$Zip_Code',Date='$Date',Phone_Number='$Phone_Number',Social_Security_Number='$Social_Security_Number',Number_Of_Residents='$Number_Of_Residents' WHERE Client_ID='$Client_ID'";
 $res = mysqli_query($db,$query);
     
   if ($res) {

    echo json_encode($res);
 
 
   } else {
  
   echo json_encode($res);

   } 
   // Close connections
mysqli_close($db);

?>