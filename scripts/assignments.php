<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: assignments.php
	# Creates a new assignment
	# Last updated March 12, 2014 by KC
	
	# File includes database, username, and password information
	require "userpass.php";
 	
 	# Connects to database
 	connect();
 	
 	session_start();
 	
 	# Initializes name, email, and password
 	$name = $_REQUEST['name'];
 	$code = $_SESSION['code'];
 	$teacher_id = $_SESSION['id'];
 	 	
 	addAssignmentToDatabase($name, $code, $teacher_id);
 	
 	header("Location: ../teacherhub.php");
 	
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
	# Adds assignment to database
	function addAssignmentToDatabase($name, $code, $teacher_id) {
		# Inserts user into database
		$result = mysql_query("INSERT INTO Assignments (Assignment_Code, Name, Teacher_ID) VALUES ( '$code', '$name', '$teacher_id' )")
			or die("<p>Error inserting into the database: " .
					mysql_error() . "</p>");
	}
 	
 	?>
