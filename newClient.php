<?php
 ob_start();
 session_start();
 include 'connect.php';
 
echo "<script type='text/javascript'>alert('New Client PHP.')</script>";
 // if session is not set this will redirect to login page
 if(isset($_SESSION['user']) ) {


 // select loggedin AGENT detail
 $res=mysqli_query($db,"SELECT * FROM AGENT WHERE Agent_ID=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);
  }
  
$error = false;

 if ( isset($_POST['btn-save-client']) ) {
  
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
    echo "<script type='text/javascript'>alert('New Client Saved. Next: Create Aid Request Application')</script>";
  }else
  {
     echo "<script type='text/javascript'>alert('New Client ERROR.')</script>";
     
  }
}


?>
<?php ob_end_flush(); ?>