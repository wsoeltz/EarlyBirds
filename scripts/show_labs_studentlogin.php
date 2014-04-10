<?php		
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: show_labs_studentlogin.php
	# Shows labs on studentlogin
	# Last updated March 26, 2014 by KC
			
	# Connects to database
	include "scripts/connect.php";
	
	# Sets the assignment code
	$acode = $_SESSION['acode'];
	
	# Selects all labs with given assignment code
	$result = mysql_query("SELECT * FROM Labs WHERE Assignment_Code='$acode'");
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
	# Displays all labs available for an assignment
	# Styling will be implemented here
	while ( $values = mysql_fetch_array($result)) {
		# Adds ID of the student lab being selected to the link to load all previous work
		# Redirects to php file that will appropriately load existing lab
		$url = 'scripts/redirect.php?page=student&id=' . $values['Lab_ID'];
		echo "<a class='lablink' href='$url'>" . $values['Student_Name'] . "</a><br>";
	}
?>
