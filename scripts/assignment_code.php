<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: code.php
	# Generates an assignment code
	# Last updated April 22, 2014 by KC
	
	do {
		# Generates assignment code
		$html = file_get_contents("http://www.dinopass.com/password/simple");
		
		# Sets session code to the assignment code
		$_SESSION['code'] = $html;
		$code = $_SESSION['code'];
		
		# Escape User Input to help prevent SQL Injection
		$code = mysql_real_escape_string($code);
		
		# Verifies this code is unique
		$result = mysql_query("SELECT * FROM Assignments WHERE Assignment_Code='$code'");
 		$values = mysql_fetch_array($result);
	} while ( (strlen($html) > 15) && ($values != false) ); # Repeats loop the assignment code is greater than 14 characters or if it's not unique
	echo $html; #Displays code
?>