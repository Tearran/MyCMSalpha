<?php

ini_set( "display_errors", true );				 //display errors if they exist
date_default_timezone_set( "America/Chicago" );  // List of Supported Timezones http://www.php.net/manual/en/timezones.php

//database configurations 
$CMS_NAME = "alphacms";					 // Name of the database
$DB_DSN = "mysql:host=localhost;dbname=".$CMS_NAME; // mySQL Database host address
$DB_USERNAME = "root";				 // database username
$DB_PASSWORD = "";					 // database password	

?>