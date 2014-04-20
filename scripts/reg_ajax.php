<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: reg_ajax.php
	# Checks if user is already registered with given email
	# Last updated April 13, 2014 by KC
	
	# Connects to database, selects table
	require "connect.php";

	# Retrieve data from Query String
	$email = $_GET['email'];
	
	# Verifies this code is unique
 	$result = mysql_query("SELECT * FROM Teachers WHERE Email='$email'");
 	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
 	$values = mysql_fetch_array($result);

	# success if no matches
	if ($values == false ){ 
  		$display_string = "success";
  		echo $display_string;
  	} else {
 		$display_string = "<i class='fa fa-asterisk'></i>Email is already in use.";
 		echo $display_string;
 	}
	
?>