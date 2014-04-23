<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: registration.php
	# Attempts to create a new user given information in the registration form
	# Last updated March 20, 2014 by KC

	# Connects to database
	include "connect.php";
		
 	# Initializes name, email, and password
 	$name = $_GET['name'];
 	$email = $_GET['email'];
 	$password = $_GET['password'];
 	
 	# Checks if email is already in use
 	$result = mysql_query("SELECT * FROM Teachers WHERE Email='$email'");
 	$values = mysql_fetch_array($result);
 	
	# Otherwise, create new user
	addUserToDatabase($name, $email, $password);
	
	# Start session - http://stackoverflow.com/questions/10097887/using-sessions-session-variables-in-a-php-login-script
	session_start();
	$_SESSION['name'] = $name;
	$_SESSION['email'] = $email;
	
	# Escape User Input to help prevent SQL Injection
	$email = mysql_real_escape_string($email);
	
	# Store teacher ID in $_SESSION['id'] - will make future queries easier
	$result = mysql_query("SELECT * FROM Teachers WHERE Email='$email'");
	$result = mysql_fetch_array($result);
	$teacher_id = $result['Teacher_ID'];
	$_SESSION['id'] = $teacher_id;
	
	# Upon successful registration, users will be redirected to the following URL
	header("Location: ../teacherhub.php");

	# -------------------------------------------------------------
	# Encrypts password, and inserts user into the database
	function addUserToDatabase($name, $email, $password) {
		# Encrypts password
		# Sources: http://highedwebtech.com/2008/04/25/season-your-passwords-with-some-salt/,
		# http://dev.mysql.com/doc/refman/5.5/en/encryption-functions.html#function_sha1
		$password = sha1($email.$password);
	
		# Escape User Input to help prevent SQL Injection
		$name = mysql_real_escape_string($name);
		$email = mysql_real_escape_string($email);
		$password = mysql_real_escape_string($password);
	
		# Inserts user into database
		$result = mysql_query("INSERT INTO Teachers (Teacher_ID, Name, Email, Password) VALUES ( 'mysql_insert_id()', '$name', '$email', '$password' )")
			or die("<p>Error inserting into the database: " .
					mysql_error() . "</p>");
	}

?>