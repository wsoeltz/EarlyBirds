<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: find_assignment_code.php
	# Finds an assignment code in the database
	# Last updated poril 13, 2014 by KC
	
	# Connects to database, selects table
	include "connect.php";
	
	# Gets the assignment code
	$acode = $_GET['assignment_code'];
		
	# Escape User Input to help prevent SQL Injection
	$acode = mysql_real_escape_string($acode);
	
 	# Verifies this code is unique
 	$result = mysql_query("SELECT * FROM Assignments WHERE Assignment_Code='$acode'");
 	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
 	$values = mysql_fetch_array($result);
 	
 	# If assignment code is found
 	if ($values != false ) {
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
	
		# Teacher Name
		$_SESSION['tname'] = $values['Name'];

		# Teacher Email
		$_SESSION['temail'] = $values['Email'];

		# Redirect to studentlogin page
		header("Location: ../studentlogin.php");
	}
?>