<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: assignments.php
	# Creates a new assignment
	# Last updated May 1, 2014 by KC
	
	# Connects to database
	include "connect.php";
 	
 	# Start session
 	session_start();
 	
 	# Initializes name, email, and password
 	$name = $_REQUEST['name'];
 	$code = $_SESSION['code'];
 	$teacher_id = $_SESSION['id'];
 	 	
 	# Escape User Input to help prevent SQL Injection
	$name = mysql_real_escape_string($name);
	$code = mysql_real_escape_string($code);
	$teacher_id = mysql_real_escape_string($teacher_id);
	
 	# Add assignment to database
 	addAssignmentToDatabase($name, $code, $teacher_id);
 	
 	# Redirect to teacherhub
 	header("Location: ../teacherhub.php");
 	
	# -------------------------------------------------------------
	# Adds assignment to database
	function addAssignmentToDatabase($name, $code, $teacher_id) {
		# Inserts user into database
		$result = mysql_query("INSERT INTO Assignments (Assignment_Code, Name, Teacher_ID) VALUES ( '$code', '$name', '$teacher_id' )")
			or die("<p>Error inserting into the database: " .
					mysql_error() . "</p>");
	}
 	
 ?>
