<?php		
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: show_labs_studentlogin.php
	# Shows labs on studentlogin
	# Last updated April 14, 2014 by KC
			
	# Connects to database
	include "scripts/connect.php";
	
	# Sets the assignment code
	$acode = $_SESSION['acode'];
	
	# Selects all labs with given assignment code
	$result = mysql_query("SELECT * FROM Labs WHERE Assignment_Code='$acode'");
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
	$values = mysql_fetch_array($result);
	if ($values != false) {
		echo "<h2>Select your name below</h2>";
		# Displays all labs available for an assignment
		# Styling will be implemented here
		do {
			if ($values['Completed'] == 1 ){
			# Adds ID of the student lab being selected to the link to load all previous work
			# Redirects to php file that will appropriately load existing lab
			$_SESSION['submit_here'] = "here";
			$url = 'studentsubmit.php?id=' . $values['Lab_ID'];
			echo "<a class='lablink' href='$url'>" . $values['Student_Name'] . "</a><br>";
			} else {
			# Adds ID of the student lab being selected to the link to load all previous work
			# Redirects to php file that will appropriately load existing lab
			$url = 'scripts/redirect.php?page=student&id=' . $values['Lab_ID'];
			echo "<a class='lablink' href='$url'>" . $values['Student_Name'] . "</a><br>";
			}
		} while ( $values = mysql_fetch_array($result));
		echo "<h2>Or if your name isn’t on the list, enter it here</h2>";
	} else {
		 echo "<h2>To begin a new lab, enter your name here</h2>";
	}
?>
