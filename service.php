
<?php
 //DO NOT DELETE  - THIS FILE IS A CONNECTOR TO IOS for Iphone APP
 
// Create connection
include("connect.php");

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
     //getting values
    $Agent_Email = $_POST['Agent_Email'];
    $password = $_POST['Password'];

//$sql = "SELECT Agent_Email,Password FROM AGENT WHERE Agent_Email = 'robk@gmail.com' AND Password = '12345678'";
//$sql="SELECT * FROM AGENT WHERE Agent_Email='$Agent_Email' and Password='$Password'";
//$sql = "SELECT * FROM AGENT";
//$sql="SELECT * FROM AGENT WHERE Agent_Email='$Agent_Email' and Password='$Password'";

 $password = hash('sha256', $password); // password hashing using SHA256
  
   $res=mysqli_query($db,"SELECT * FROM AGENT WHERE Agent_Email='$Agent_Email'");
   $row=mysqli_fetch_array($res);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
 
   if($count == 1 && $row['Password']==$password ) {

 //  $str = '{"success":"1"}';
 
 $row["success"] = "1";
 
 //  $arr = array($row["success"]=>$row["1"]);
  //  $row["success"] = $row["1"];

 //array_push( $row, $arr );

   echo json_encode($row);
   
   } else {
    echo '{"success":"0"}'; 
   }


// Close connections
mysqli_close($db);
?>