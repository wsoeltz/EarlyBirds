<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: find_assignment_code.php
	# Finds an assignment code in the database
	# Last updated March 25, 2014 by KC
	
	include "connect.php";
	
	$code = $_GET['assignment_code'];
 	
 	# Verifies this code is unique
 	$result = mysql_query("SELECT * FROM Assignments WHERE Assignment_Code='$code'");
 	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
 	$values = mysql_fetch_array($result);
 	
 	if ($values == false) {
 		echo "Validation message will be added - You entered in an assignment code that does not exist.";
 	} else {
 		session_start();
		$_SESSION['acode'] = $code;
 		header("Location: ../studentlogin.php");
 	}
?>