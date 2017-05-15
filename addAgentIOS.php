<?php
 ob_start();
 session_start();

 include_once 'connect.php';

   //getting values 

   //getting values
    $First_Name = $_POST['First_Name'];
    $Last_Name = $_POST['Last_Name'];
    $Street = $_POST['Street'];
    $City = $_POST['City'];
    $Zip_Code = $_POST['Zip_Code'];
    $Date_Hired = $_POST['Date_Hired'];
    $Phone_Number= $_POST['Phone_Number'];
    $State = $_POST['State'];
    $Agent_Email = $_POST['Agent_Email'];
    $Agent_ID= $_POST['Agent_ID'];

   $query = "INSERT INTO AGENT(First_Name,Last_Name,Street,City,State,Zip_Code,Phone_Number,Agent_Email,Date_Hired) VALUES('$First_Name',
   '$Last_Name','$Street','$City','$State','$Zip_Code','$Phone_Number','$Agent_Email',$Date_Hired'')";
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