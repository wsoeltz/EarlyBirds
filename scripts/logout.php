<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: logout.php
	# "Logs out of account" - removes all info associated with current sessions
	# Last updated May 1, 2014 by KC

	# Unsets the session email and name, and redirects user to splash screen
	# Source: http://stackoverflow.com/questions/4608182/logout-and-redirecting-session-in-php
	session_start();
	unset($_SESSION['email']);
	unset($_SESSION['name']);
	unset($_SESSION['here']);
	header("Location: ../index.php#logout");
?>