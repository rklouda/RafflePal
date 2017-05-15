<?php
 ob_start();
 session_start();

 include_once 'connect.php';

   //getting values
    $name = $_POST['name'];
    $last = $_POST['last'];
    $pass= $_POST['pass'];
    $email=$_POST['email'];


  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $last= trim($_POST['last']);
  $last = strip_tags($last);
  $last = htmlspecialchars($last);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }
  
    if (empty($last)) {
   $error = true;
   $lastnameError = "Please enter your full name.";
  } else if (strlen($last) < 3) {
   $error = true;
   $lastnameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$last)) {
   $error = true;
   $lastnameError = "Name must contain alphabets and space.";
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT Agent_Email FROM AGENT WHERE Agent_Email='$email'";
   $result = mysqli_query($db,$query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
   $query = "INSERT INTO AGENT(First_Name,Agent_Email,Password,Last_Name) VALUES('$name','$email','$password','$last')";
  $res = mysqli_query($db,$query);
     
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
  //   $res["success"] = "1";
     
    echo json_encode($res);
    unset($name);
    unset($email);
    unset($pass);
    unset($last);
    
   
    
   } else {
     echo json_encode($res);
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
   mysqli_close($db);
?>