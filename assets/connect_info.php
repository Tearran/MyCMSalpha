<?php

//
require( "config.php" );
;
// Create connection
$conn = new mysqli($DB_SERVERNAME, $DB_USERNAME, $DB_PASSWORD);

// Check connection
if ($conn->connect_error) {
	echo $loginfo;
    die("Connection failed: " . $conn->connect_error);
} 

// Successful connection
if (!$conn->connect_error) {
	echo "Connection successfull: <br />" .
		$DB_SERVERNAME."<br />".
		$CMS_NAME ."<br />".
		$DB_USERNAME ."<br />".
		$DB_PASSWORD;
		die();
	} 
?>