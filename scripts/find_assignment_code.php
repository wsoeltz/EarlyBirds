<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: find_assignment_code.php
	# Finds an assignment code in the database
	# Last updated March 26, 2014 by KC
	
	# Connects to database, selects table
	include "connect.php";
	
	# Gets the assignment code
	$code = $_GET['assignment_code'];
		
 	# Verifies this code is unique
 	$result = mysql_query("SELECT * FROM Assignments WHERE Assignment_Code='$code'");
 	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
 	$values = mysql_fetch_array($result);
 	
 	session_start();
 	
 	# If no assignment code exists, there's an error
 	if ($values == false) {
 		$_SESSION['acode_message'] = "The assignment code you entered is incorrect. Please try again.";
		header("Location: ../index.php");
 	# Otherwise, set the session variables (assignment code, teacher name)	
 	} else {
 		# Assignment code
		$_SESSION['acode'] = $code;
		
		# Assignment name
		$_SESSION['aname'] = $values['Name'];
		
		# Teacher ID
		$_SESSION['teacher_id'] = $values['Teacher_ID'];
		$teacher_id = $_SESSION['teacher_id'];
	
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