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
	
	# Escape User Input to help prevent SQL Injection
	$email = mysql_real_escape_string($email);
	$password = mysql_real_escape_string($password);
	
	# Attempts to find user with given email and password
	$result = mysql_query("SELECT * FROM Teachers WHERE Email='$email' AND Password='$password'");
	$values = mysql_fetch_array($result);
	
	# Start session - http://stackoverflow.com/questions/10097887/using-sessions-session-variables-in-a-php-login-script
  	session_start();
  		
	# Email and password don't match
 	if( $values == false ) {
 		# No account associated with email
		$_SESSION['login_message'] = "<div id='ajaxDivReg'><i class='fa fa-asterisk'></i>The email or password you entered is incorrect.</div>";
		# Redirect back to login div with error message
		header("Location: ../index.php#login");
  	} else {
  		# User found

  		# Retrieves name associated w/ account in database
    	$result = mysql_query("SELECT Name FROM Teachers WHERE Email='$email' AND Password='$password'");
    	$row = mysql_fetch_array($result);
		$name=$row['Name'];

		# Sets current session email and name variables
 		$_SESSION['email'] = $email;
  		$_SESSION['name'] = $name;
 		
 		# Escape User Input to help prevent SQL Injection
		$email = mysql_real_escape_string($email);
 		
 		# Store teacher ID in $_SESSION['id'] - will make future queries easier
 		$result = mysql_query("SELECT * FROM Teachers WHERE Email='$email'");
 		$result = mysql_fetch_array($result);
 		$teacher_id = $result['Teacher_ID'];
 		$_SESSION['id'] = $teacher_id;
 		
 		# Unset login_messge in case it is still set from a fail case
 		unset($_SESSION['login_message']);
 		
 		# Redirects user to teacher hub
  		header("Location: ../teacherhub.php");
  	}
?>