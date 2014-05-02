<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: reg_ajax.php
	# Checks if user is already registered with given email
	# Last updated May 1, 2014 by KC
	
	# Connects to database
	require "connect.php";

	# Retrieve data from Query String
	$email = $_GET['email'];
	
	# Escape User Input to help prevent SQL Injection
	$email = mysql_real_escape_string($email);
	
	# Verifies this code is unique
 	$result = mysql_query("SELECT * FROM Teachers WHERE Email='$email'");
 	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
 	$values = mysql_fetch_array($result);

	# Success if no matches (if email is unique)
	if ($values == false ){ 
  		$display_string = "success";
  		echo $display_string;
  	# Otherwise, error; no duplicate email addresses
  	} else {
 		$display_string = "<i class='fa fa-asterisk'></i>Email is already in use.";
 		echo $display_string;
 	}	
?>