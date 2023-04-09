<?php

  // create the database connection using constants previously created.

 // inserting constants content
require_once "constants.php";

// create the databese connection 
 $dbConn = new mysqli(HOSTNAME, HOSTUSER, HOSTPASS, DBNAME);

// VERIFY THE CONNECTION 
if($dbConn->connect_error){
	die("connection Failed: " . $dbConn->connect_error);
} else{
	//print "the connection was successful!! :-)";
}
?>