<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: code.php
	# Generates an assignment code
	# Last updated March 12, 2014 by KC
	

	# File includes database, username, and password information
	require "userpass.php";
 	
 	# Connects to database
 	connect();

	# -------------------------------------------------------------
	# Connects to database, selects database, shows table in database
	function connect() {
		# Connect to database
		mysql_connect("localhost", DATABASE_USERNAME, DATABASE_PASSWORD);

		# Selects database
		$db =  DATABASE_NAME;

		mysql_select_db( $db );

		# Shows table in database
		 $result = mysql_query("SHOW TABLES;");
 	}
 	
 	# -------------------------------------------------------------
 	
	do {
		# Generates assignment code
		$html = file_get_contents("http://www.dinopass.com/password/simple");
		
		# Sets session code to the assignment code
		$_SESSION['code'] = $html;
		$code = $_SESSION['code'];
		
		# Verifies this code is unique
		$result = mysql_query("SELECT * FROM Assignments WHERE Assignment_Code='$code'");
 		$values = mysql_fetch_array($result);
	} while ( (strlen($html) > 14) && ($values != false) ); # Repeats loop the assignment code is greater than 14 characters or if it's not unique
	echo "<div style='display:block; padding:25px; border: 1px black solid;'>";
	echo $html; # Displays code
	echo "</div>";
?>