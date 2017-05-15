<?php
 ob_start();
 session_start();

 include_once 'connect.php';

   //getting values 

 //  $Request_ID = $_POST['Request_ID'];
  //  $Agent_ID = $_POST['Agent_ID'];
    $Amount_Requested = $_POST['Amount_Requested'];
    $Decision = $_POST['Decision'];
    $Date_Requested= $_POST['Date_Requested'];
    $Documentation_Provided = $_POST['Documentation_Provided'];
    $Client_Notes = $_POST['Client_Notes'];
    $Client_ID = $_POST['Client_ID'];
     $Aid_ID = $_POST['Aid_ID'];
    //  $query = "INSERT INTO AGENT(First_Name,Last_Name) VALUES('$name',$last')";
    
    $query = "INSERT INTO AID_REQUEST(Amount_Requested, 
    Decision,Date_Requested,Documentation_Provided, 
    Client_Notes,Client_ID,Aid_ID) VALUES('$Amount_Requested','$Decision','$Date_Requested','$Documentation_Provided', 
     '$Client_Notes','$Client_ID','$Aid_ID')";
        $res = mysqli_query($db,$query); 
   if ($res) {

    echo json_encode($res);
    unset($name);
    unset($last);
 
   } else {

   echo json_encode($res);

   } 
   // Close connections
mysqli_close($db);
?>