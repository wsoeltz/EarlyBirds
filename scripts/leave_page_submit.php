<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: leave_page_submit.php
	# Determines if a user is redirected to a page from submission page
	# Last updated May 1, 2014 by KC

	echo "<script>";
		# Detects if user leaves page; if detected call confirm Exist
		echo "window.onbeforeunload = confirmExit;";
		
		echo "function confirmExit()";
			echo "{";
			# Unset variable signifying the user is on the page
			unset($_SESSION['submit_here']);
		echo "}";
	echo "</script>";
?>