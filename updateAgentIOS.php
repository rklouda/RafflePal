<?php
 ob_start();
 session_start();

 include_once 'connect.php';

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
  // clean user inputs to prevent sql injections

  
    //  $query = "INSERT INTO AGENT(First_Name,Last_Name) VALUES('$name',$last')";
    
 $query = "UPDATE AGENT SET Last_Name='$Last_Name', First_Name='$First_Name', Street='$Street', City='$City',State='$State', Zip_Code='$Zip_Code', 
    Date_Hired='$Date_Hired',Phone_Number='$Phone_Number',Agent_Email='$Agent_Email' WHERE Agent_ID='$Agent_ID'";
    

    
  $res = mysqli_query($db,$query);
     
   if ($res) {

    echo json_encode($res);
    unset($name);
    unset($last);
 
   } else {
  //  $res["success"] = "0";
     
   echo json_encode($res);

   } 
   mysqli_close($db);
?>