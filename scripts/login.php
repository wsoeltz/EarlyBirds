<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: registration.php
	# Attempts to login into account
	# Last updated March 9, 2014 by KC
	
	# Connects to database
	include "connect.php";
 	
 	# Initializes email and password
	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	
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
			echo "<br>Validation message will eventually be added - No account is associated with this email.<br>";
		} else {
			# Incorrect password
			echo "<br>Validation message will eventually be added - Incorrect password.<br>";
  		}
  	} else {
  		# User found

		# Start session - http://stackoverflow.com/questions/10097887/using-sessions-session-variables-in-a-php-login-script
  		session_start();
  			
  		# Retrieves name associated w/ account in database
    	$result = mysql_query("SELECT Name FROM Teachers WHERE Email='$email' AND Password='$password'");
    	$row = mysql_fetch_array($result);
		$name=$row['Name'];

		# Sets current session email and name variables
 		$_SESSION['email'] = $email;
  		$_SESSION['name'] = $name;
 		
 		# Store teacher ID in $_SESSION['id'] - will make future queries easier
 		$result = mysql_query("SELECT * FROM Teachers WHERE Email='$email'");
 		$result = mysql_fetch_array($result);
 		$teacher_id = $result['Teacher_ID'];
 		$_SESSION['id'] = $teacher_id;
 		
 		# Redirects user to teacher hub
  		header("Location: ../teacherhub.php");
  	}
?>