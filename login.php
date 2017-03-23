<?php
   include("connect.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
printf("User: %s", $myusername);
$sql="SELECT * FROM 'Table' WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);


   //  $sql = "SELECT * FROM 'Agent'  WHERE username = '$myusername' and passcode = '$mypassword'";
   //   $sql = "SELECT * FROM 'Agent' WHERE username = 'Klouda' and password = '12345678'";
//$sql = "SELECT * FROM `Table` WHERE `username` LIKE \'help\' AND `password` LIKE \'me\'";
// $sql = "SELECT id FROM Table WHERE username = '$myusername' and passcode = '$mypassword'";
     
      $result = mysqli_query($sql);
      $row = mysqli_fetch_array($result, mysqli_result);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      printf("Error: %s\n", mysqli_error($con));
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>