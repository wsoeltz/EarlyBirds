<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: load_lab.php
	# Loads student previous work
	# Last updated April 4, 2014 by KC

	# connects to database
	include "connect.php";

	$id = $_GET['id'];
	
	# Selects all assignments given a specific Teacher ID
	$result = mysql_query("SELECT * FROM Labs WHERE Lab_ID='$id'");
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}

	# Sets Lab ID session variable to the variable of the selected lab
	$_SESSION['Lab_ID'] = $id;
	
	# Gets any results from query
	$values = mysql_fetch_array($result);

	# Sets student name if unset (since it might be unset if this is not a new lab)
	if (!isset($_SESSION['sname'])) {
		$_SESSION['sname'] = $values['Student_Name'];
	}

	# Fill all the textareas with what's currently saved in the database
	echo "<script type=\"text/javascript\">";
		echo "$(function () {";
			echo "$('#tabs-1-box').val('" . $values['Problem'] . "');";
			echo "$('#tabs-2-box').val('" . $values['Hypothesis'] . "');";
			echo "$('#tabs-3-box').val('" . $values['Materials'] . "');";
 			echo "$('#tabs-4-box').val('" . $values['Proced'] . "');";
 			echo "$('#tabs-5-box').val('" . $values['Results'] . "');";
 			echo "$('#tabs-6-box').val('" . $values['Conclusion'] . "');";
		echo "});";
	echo "</script>";
?>