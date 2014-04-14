<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: submit.php
	# "Submits" lab to teacher
	# Last updated April 10, 2014 by KC
	
	# Connects to database
	include "connect.php";
	
	session_start();
	
	# Gets Lab_ID session variable
	$id = $_SESSION['Lab_ID'];
	
	# Sets lab to completed
	$result = mysql_query("UPDATE Labs SET Completed='1' WHERE Lab_ID='$id'")
				or die("<p>Error inserting into the database: " .
						mysql_error() . "</p>"); 
					
	# Gets Lab_ID session variable
	$_SESSION['submit_here'] = "true";				
						
	# Need to add lightbox here
	# Redirect to studenthub
	$url = "../studentsubmit.php?id=" . $id;
	header("Location: $url");
?>