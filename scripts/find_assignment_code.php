<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: find_assignment_code.php
	# Finds an assignment code in the database
	# Last updated May 1, 2014 by KC
	
	# Connects to database
	include "connect.php";
	
	# Gets the assignment code
	$acode = $_GET['assignment_code'];
		
	# Escape User Input to help prevent SQL Injection
	$acode = mysql_real_escape_string($acode);
	
 	# Find assignment with given assignment code
 	$result = mysql_query("SELECT * FROM Assignments WHERE Assignment_Code='$acode'");
 	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
 	$values = mysql_fetch_array($result);
 	
 	# If assignment code is found
 	if ($values != false ) {
 		# Start session
		session_start();

		# Assignment code
		$_SESSION['acode'] = $acode;
	
		# Assignment name
		$_SESSION['aname'] = $values['Name'];
	
		# Teacher ID
		$_SESSION['teacher_id'] = $values['Teacher_ID'];
		$teacher_id = $_SESSION['teacher_id'];

		# Escape User Input to help prevent SQL Injection
		$teacher_id = mysql_real_escape_string($teacher_id);

		# Verifies this code is unique
		$result = mysql_query("SELECT * FROM Teachers WHERE Teacher_ID='$teacher_id'");
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		}

		$values = mysql_fetch_array($result);
	
		# Set Teacher Name session variable
		$_SESSION['tname'] = $values['Name'];

		# Set Teacher Email session variable
		$_SESSION['temail'] = $values['Email'];

		# Redirect to studentlogin page
		header("Location: ../studentlogin.php");
	}
?>