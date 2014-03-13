<?php
	# Displays page only if current session is active
	# http://stackoverflow.com/questions/10097887/using-sessions-session-variables-in-a-php-login-script
	session_start();
	if (isset($_SESSION['email']) && isset($_SESSION['name'])) {
?>
<!DOCTYPE html>
<!--
    Create Assignments
    Created 2/19/2014 by Kaitlyn Carcia
    
        Will Soeltz and Kaitlyn Carcia
        University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
        File: create_assignment.php
        Filler page for creating assignments
        Last updated March 11, 2014 by KC
-->
<html>
    <head>
        <meta charset = "utf-8" />
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<title>Early Birds</title>
    </head>
    <body>
    	<font size="6px">New Assignment</font>
    	<br><br>
		<form method="post" action="scripts/assignments.php">
  			<label for="name">Assignment Name</label><br>
  			<input type="text" name="name" id="name"><br>
  			<br>Assignment Code<br>
  			<div id="acode" style="display:inline-block">
				<?php
					# Generate assignment code
					include "scripts/code.php";
				?>
			</div>
			<br><br>
  			<input type="submit" value="Create">
		</form>
    </body>
</html>
<?php
	# Otherwise redirect to splash page
	 } else {
	 	header("Location: index.html");
	}
?>