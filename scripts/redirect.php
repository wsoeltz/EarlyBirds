<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: redirect.php
	# Redirects a user loading an existing lab to the studenthub page with correct information
	# Last updated May 1, 2014 by KC

	# Start session
	session_start();
	
	# Get lab id number
	$id = $_GET['id'];
	
	# Studenthub variable is set to true
	$_SESSION['here']="true";
	
	# Get page
	$page = $_GET['page'];
	
	if ($page == "teacher") {
		# Redirect to lab report
		$url = "../lab_report.php?page=teacher&id=" . $id;
		header("Location: $url");
	} else if ($page == "submit"){
		# Redirect to lab report from submission page
		$url = "../lab_report.php?page=submit&id=" . $id;
		header("Location: $url");
	} else if ($page == "student") {
		# Redirect to studenthub from student login
		$url = "../studenthub.php?id=" . $id;
		header("Location: $url");
	}
?>