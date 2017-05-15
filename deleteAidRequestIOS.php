<?php
 ob_start();
 session_start();

 include_once 'connect.php';

   //getting values
   $Request_ID = $_POST['Request_ID'];

 
    $query = "DELETE FROM AID_REQUEST WHERE Request_ID='$Request_ID'";
    
 //   UPDATE `CLIENT` SET `Client_ID`=[value-1],`First_Name`=[value-2],`Last_Name`=[value-3],`Street`=[value-4],`City`=[value-5],`State`=[value-6],`Zip_Code`=[value-7],`Date`=[value-8],`Phone_Number`=[value-9],`Social_Security_Number`=[value-10],`Number_Of_Residents`=[value-11],`Agent_ID`=[value-12] WHERE 1
    
    
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