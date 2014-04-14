<?php
	# Displays page ONLY if a session is currently active
	# http://stackoverflow.com/questions/10097887/using-sessions-session-variables-in-a-php-login-script
	session_start();
 	if (isset($_SESSION['here'])) {
?>
<!DOCTYPE html>

<!--
    Early Birds Opening Splashcreen
    Created 2/15/2014 by Will Soeltz
    
	Will Soeltz and Kaitlyn Carcia
	University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	File: lab_report.php
	Contains lab report template, which will be populated with information
	Last updated April 7, 2014 by KC
-->

<html>
  <head>
  	<!-- Favicon -->
    <link rel="shortcut icon" href="css/assets/ebfavicon.ico" type="image/x-icon">
    <link rel="icon" href="css/assets/ebfavicon.ico" type="image/x-icon">
    <meta charset = "utf-8" />
    <!-- Styling for this page -->
    <link rel = "stylesheet" href = "css/reset.css" />
    <link rel = "stylesheet" href = "css/labsFormat.css" />
    <title>Early Birds</title>
  </head>
  <body>
    <div id="wrapper">
    	<?php
    		# Conencts to database, select table
    		include "scripts/connect.php";
    		
    		# Gets lab ID from URL
    		$id = $_GET['id'];
    		$page = $_GET['page'];	
    		
    		if ($page == "submit") {
				echo "<script>";
				# Detects if user leaves page; if detected call confirm Exist
				echo "window.onbeforeunload = confirmExit;";
				echo "function confirmExit()";
				echo "{";
				# Unset variable signifying a user on the studenthub
				unset($_SESSION['here']);
				echo "}";
				echo "</script>";
    		}	
    			
			# Selects all labs given a specific lab ID
			$result = mysql_query("SELECT * FROM Labs WHERE Lab_ID='$id'");
			if (!$result) {
				die('Invalid query: ' . mysql_error());
			}
	
			# Gets any results from query - LABS
			$values = mysql_fetch_array($result);
	
			# Gets assignment code
			$acode = $values['Assignment_Code'];
	
			// # Redirect to another page is assignment code does not match
 			if ($_SESSION['acode'] != $acode ) {
 				header("Location: teacherhub.php");
 			}

			# Selects all assignments given a specific assignment code
			$result2 = mysql_query("SELECT * FROM Assignments WHERE Assignment_Code='$acode'");
			if (!$result) {
				die('Invalid query: ' . mysql_error());
			}
	
			# Gets any results from query - ASSIGNMENTS
			$values2 = mysql_fetch_array($result2);
			
			# Gets Teacher_ID associated with lab
			$id = $values2['Teacher_ID'];
			
			# Selects all Teachers given a specific Teacher ID
			$result3 = mysql_query("SELECT * FROM Teachers WHERE Teacher_ID='$id'");
			if (!$result) {
				die('Invalid query: ' . mysql_error());
			}
	
			# Gets any results from query - TEACHERS
			$values3 = mysql_fetch_array($result3);
	
    		echo "<h2>" . $values['Student_Name'] . "</h2>";
    		
    		# Display timestamp in Month day, year format
    		# Source: http://stackoverflow.com/questions/5339339/format-mysql-timestamp-using-php
        	echo "<h2>" . date('F j, Y', strtotime($values['Timestamp'])) . "</h2>";
        	
        	# Teacher Name
         	echo "<h2>Teacher Name: " . $values3['Name'] . "<h2>";
         	
         	# Lab sections
			echo "<h1>" . $values2['Name'] ." </h1>";
         	echo "<h3>Statement of Problem</h3>";
        	echo "<p>" . $values['Problem'] . "</p>";
         	echo "<h3>Hypothesis</h3>";
			echo "<p>" . $values['Hypothesis'] . "</p>";
         	echo "<h3>Materials</h3>";
			echo "<p>" . $values['Materials'] . "</p>";
         	echo "<h3>Procedure</h3>";
			echo "<p>" . $values['Proced'] . "</p>";
         	echo "<h3>Results</h3>";
			echo "<p>" . $values['Results'] . "</p>";			
         	echo "<h3>Conclusion</h3>";
			echo "<p>" . $values['Conclusion'] . "</p>";
		?>
    </div>
  </body>
</html>
<?php
	# Otherwise redirect to splash screen
	 } else {
	 	header("Location: teacherhub.php");
	}
?>