<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: leave_page_login.php
	# Removes login message if user leaves login div on splash screen
	# Last updated May 1, 2014 by KC

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