<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: leave_page.php
	# Determines if a user leaves the studenthub page; if he or she does,
	# the variable signifying they are on the studenthub page is unset
	# Last updated February 16, 2014 by KC

	echo "<script>";
	# Detects if user leaves page; if detected call confirm Exist
	echo "window.onbeforeunload = confirmExit;";
	echo "function confirmExit()";
	echo "{";
	# Unset variable signifying the login message should be removed
	unset($_SESSION['login_message']);
	echo "}";
	echo "</script>";
?>