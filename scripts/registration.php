<?php
	
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: registration.php
	# Attempts to create a new user given information in the registration form
	# Last updated February 16, 2014 by KC
	
	# File includes database, username, and password information
	require "userpass.php";

	# Connects to database
 	connect();
 	
 	# Initializes name, email, and password
 	$name = $_REQUEST['name'];
 	$email = $_REQUEST['email'];
 	$password = $_REQUEST['password'];
 	
 	# Checks if email is already in use
 	$result = mysql_query("SELECT * FROM Teachers WHERE Email='$email'");
 	$values = mysql_fetch_array($result);
 	
 	if ($values != false) {
 		# Email is already in use
 		echo "<br>Email is already in use.<br>";
 	} else {
	 	# Otherwise, create new user
 		addUserToDatabase($name, $email, $password);
 		echo "<br>Hooray! It worked.<br>";
 		
 		# Upon successful registration, users will be redirected to the following URL
		header("Location: http://weblab.cs.uml.edu/~kcarcia/EB_v1_remote/teacherhub.html");
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
	# Encrypts password, and inserts user into the database
	function addUserToDatabase($name, $email, $password) {
		# Encrypts password
		# Sources: http://highedwebtech.com/2008/04/25/season-your-passwords-with-some-salt/,
		# http://dev.mysql.com/doc/refman/5.5/en/encryption-functions.html#function_sha1
		$password = sha1($email.$password);
		
		# Inserts user into database
		$result = mysql_query("INSERT INTO Teachers (Teacher_ID, Name, Email, Password) VALUES ( 'mysql_insert_id()', '$name', '$email', '$password' )")
			or die("<p>Error inserting into the database: " .
					mysql_error() . "</p>");
	}
 
?>