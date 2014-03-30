<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: show_labs_teacherhub.php
	# Auto saves student work to database
	# Last updated March 30, 2014 by KC
	

	# Connects to database, selects table
	require "connect.php";

	# Retrieve data from Query String
	$problem = $_GET['problem'];
	$hypothesis = $_GET['hypothesis'];
	$materials = $_GET['materials'];
	$procedure = $_GET['procedure'];
	$results = $_GET['results'];
	$conclusion = $_GET['conclusion'];


	# Escape User Input to help prevent SQL Injection
	$problem = mysql_real_escape_string($problem);
	$hypothesis = mysql_real_escape_string($hypothesis);
	$materials = mysql_real_escape_string($materials);
	$procedure = mysql_real_escape_string($procedure);
	$results = mysql_real_escape_string($results);
	$conclusion = mysql_real_escape_string($conclusion);

	# Starts session to get lab ID number
	session_start();
	$id = $_SESSION['Lab_ID'];

	# Updates information in database
	$result = mysql_query("UPDATE Labs SET Problem='$problem', Hypothesis='$hypothesis', Materials='$materials', Proced='$procedure', Results='$results', Conclusion='$conclusion' WHERE Lab_ID='$id'")
				or die("<p>Error inserting into the database: " .
						mysql_error() . "</p>");
?>
