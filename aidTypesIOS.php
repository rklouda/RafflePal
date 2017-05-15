<?php
 //DO NOT DELETE  - THIS FILE IS A CONNECTOR TO IOS for Iphone APP
 
// Create connection
include("connect.php");

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 

$sql = "SELECT * FROM AID_TYPE";

   $res=mysqli_query($db, $sql);
   $row=mysqli_fetch_array($res);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

 
// Check if there are results
if ($res)
{
	// If so, then create a results array and a temporary one
	// to hold the data
	$resultArray = array();
	$tempArray = array();
 
	// Loop through each row in the result set
	while($row = $res->fetch_object())
	{
		// Add each row into our results array
		$tempArray = $row;
	    array_push($resultArray, $tempArray);
	}
 
	// Finally, encode the array to JSON and output the results
	echo json_encode($resultArray);
}
// Close connections
mysqli_close($db);
?>