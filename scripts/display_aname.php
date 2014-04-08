<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: display_aname.php
	# Displays assignment name on teacherhub
	# Last updated April 8, 2014 by KC

	# Connects to databse
	include "scripts/connect.php";
	
	# Assignment code 
	$acode = $_GET['acode'];

	# Selects all assignments given a specific Teacher ID
	$result = mysql_query("SELECT * FROM Assignments WHERE Assignment_Code='$acode'");
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}

	# Gets any results from query
	$values = mysql_fetch_array($result);
	
	# Show assignment title
	echo '<h2 class="gray">' . $values['Name'] . '</h2>';
?>