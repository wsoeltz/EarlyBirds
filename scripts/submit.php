<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: submit.php
	# "Submits" lab to teacher
	# Last updated April 22, 2014 by KC
	
	# Connects to database
	include "connect.php";
	
	# Starts session to get Lab_ID session variable
	session_start();
	$id = $_SESSION['Lab_ID'];
	
	# Escape User Input to help prevent SQL Injection
	$id = mysql_real_escape_string($id);

	# Sets lab to completed
	$result = mysql_query("UPDATE Labs SET Completed='1', Timestamp=NOW() WHERE Lab_ID='$id'")
				or die("<p>Error inserting into the database: " .
						mysql_error() . "</p>"); 
					
	# Submission page variable is set to true
	$_SESSION['submit_here'] = "true";				
						
	# Redirect to lab submission page
	$url = "../studentsubmit.php?id=" . $id;
	header("Location: $url");
?>