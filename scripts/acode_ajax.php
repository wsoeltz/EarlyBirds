<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: acode_ajax.php
	# Checks if acode is in databsae
	# Last updated March 30, 2014 by KC
	
	# Connects to database, selects table
	require "connect.php";

	# Retrieve data from Query String
	$acode = $_GET['acode'];
	
	# Verifies this code is unique
 	$result = mysql_query("SELECT * FROM Assignments WHERE Assignment_Code='$acode'");
 	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
 	$values = mysql_fetch_array($result);

	if ($values == false ) {
 		$display_string = "Please try again.";
 		echo $display_string;
 	}
?>
