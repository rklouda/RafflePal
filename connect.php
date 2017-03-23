<?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "12345678";
    $database = "Agent";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);
  //  mysql_select_db("$database")or die("cannot select DB");
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    echo '<script language="javascript">';
echo 'alertConnected successfully (".$db->host_info.")';
//    echo "Connected successfully (".$db->host_info.")";
    echo '</script>';