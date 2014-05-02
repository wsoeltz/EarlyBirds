<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: leave_page_studentlogin.php
	# Removes lab message if user leaves student login page
	# Last updated May 1, 2014 by KC

	echo "<script>";
		# Detects if user leaves page; if detected call confirm Exist
		echo "window.onbeforeunload = confirmExit;";
		
		echo "function confirmExit()";
		echo "{";
			# Unset variable signifying the lab message should be removed
			unset($_SESSION['lab_message']);
		echo "}";
	echo "</script>";
?>