<?php
 ob_start();
 session_start();

 include_once 'connect.php';

   //getting values 

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
  
   $query = "INSERT INTO CLIENT(First_Name,Last_Name,Street,City,State,Zip_Code,Date,Phone_Number,Number_Of_Residents,Agent_ID,Social_Security_Number) VALUES('$First_Name','$Last_Name','$Street','$City','$State','$Zip_Code','$Date','$Phone_Number','$Number_Of_Residents','$Agent_ID','$Social_Security_Number')";
  $res = mysqli_query($db,$query);
     
   if ($res) {

    echo json_encode($res);
    unset($name);
    unset($last);
 
   } else {
  //  $res["success"] = "0";
     
   echo json_encode($res);

   } 
   // Close connections
mysqli_close($db);
?>