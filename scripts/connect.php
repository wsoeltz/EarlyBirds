<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: connect.php
	# Connect to database
	# Last updated May 3, 2014 by WS
	
	require "userpass.php";
 	
	# Connect to database
	mysql_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD);
	
	# Selects database
	$db =  DATABASE_NAME;
	mysql_select_db( $db );
?>