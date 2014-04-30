<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: userpass.php
	# Database constants used for connecting to the database
	# Last updated March 30, 2014 by KC

	# connects to database
	include "connect.php";
	
	session_start();
	$acode = $_SESSION['acode'];
	# Gets student name from assignment_code input box
	$sname = $_GET['sname'];
	$_SESSION['sname'] = $sname;
		
	$result = mysql_query("SELECT * FROM Labs WHERE  Assignment_Code='$acode' AND Student_Name='$sname'")
			or die("<p>Error inserting into the database: " .
					mysql_error() . "</p>");	

	$values = mysql_fetch_array($result);

	if ( count($values) == 1 ) {
		addLabToDatabase($acode, $sname);
	} else {
		$_SESSION['lab_message'] = "<div class='errors'><i class='fa fa-asterisk'></i>Please enter a name that is not already on the list.</div>";
		# Redirect back to login div with error message
		header("Location: ../studentlogin.php");
	}
	
	# Adds new lab to the database
	function addLabToDatabase($acode, $sname) {
 		
 		# Escape User Input to help prevent SQL Injection
		$acode = mysql_real_escape_string($acode);
		$sname = mysql_real_escape_string($sname);
 		
		# Inserts user into database
		$result = mysql_query("INSERT INTO Labs (Lab_ID, Assignment_Code, Student_Name) VALUES ( 'mysql_insert_id()', '$acode', '$sname')")
			or die("<p>Error inserting into the database: " .
					mysql_error() . "</p>");
 		
		# Sets lab_ID session variable 		
 		$id = mysql_insert_id();
 		$_SESSION['Lab_ID']=$id;

		# Here variable signifies user is on the studenthub page
		$_SESSION['here'] = "true";

		# Redirect to studenthub with lab id in URL
		$url = " ../studenthub.php?page=student&id=" . $id;
 		header("Location: $url");
	}
?>