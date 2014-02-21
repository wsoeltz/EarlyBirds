<?php

	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: registration.php
	# Attempts to login into account
	# Last updated February 16, 2014 by KC
	
	# File includes database, username, and password information
	require "userpass.php";
		
	# Connects to database
 	connect();
 	
 	# Initializes email and password
	$email =  $_REQUEST['email'];
	$password =  $_REQUEST['password'];
	
	# Encrypts password
	$password = sha1($email.$password);
	
	# For debugging:
	# echo "Password appears in database like: ";
	# echo $password;
	
	# Attempts to find user with given email and password
	$result = mysql_query("SELECT * FROM Teachers WHERE Email='$email' AND Password='$password'");
	$values = mysql_fetch_array($result);
	
	# Email and password don't match
 	if( $values == false ) {
 		# Checks if email inputted is associated with any account
 	 	$result = mysql_query("SELECT * FROM Teachers WHERE Email='$email'");
		$values = mysql_fetch_array($result);

		if ($values == false) {
			# No account associated with email
			echo "<br>No account is associated with this email.<br>";
		} else {
			# Incorrect password
			echo "<br>Incorrect password.<br>";
  			# header("Location: no-user.php");
  		}
  	} else {
  		# User found
  		echo "<br>User found.<br>";
  		header("Location: ../teacherhub.html");
  	}

	# -------------------------------------------------------------
	# Connects to database, selects database, shows table in database
	function connect() {
		# Connect to database
		mysql_connect("localhost", DATABASE_USERNAME, DATABASE_PASSWORD)
			or die("<p>Error connecting to database: " . 
				 mysql_error() . "</p>");

		echo "<p>Connected to MySQL!</p>";

		# Selects database
		$db =  DATABASE_NAME;

		mysql_select_db( $db )
			or die("<p>Error selecting the database your-database-name: " .
				 mysql_error() . "</p>");

		echo "<p>Connected to MySQL, using database <b>$db</b>.</p>";

		# Shows table in database
		 $result = mysql_query("SHOW TABLES;");

		if (!$result) {
			die("<p>Error in listing tables: " . mysql_error() . "</p>");
		}

		echo "<p>Tables in database:</p>";
		echo "<ul>";
		while ($row = mysql_fetch_row($result)) {
			echo "<li>Table: {$row[0]}</li>";
		}
		echo "</ul>";
 	}
	# -------------------------------------------------------------

?>