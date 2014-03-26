<?php
	# connects to database
	include "connect.php";

	# Assignment code 
	# $Assignment_Code = 
	
	# Selects all assignments given a specific Teacher ID
	$result = mysql_query("SELECT * FROM Labs WHERE Assignment_Code='$Assignment_Code' ORDER BY Timestamp ASC;");
	if (!$result) {
	die('Invalid query: ' . mysql_error());
	}
	
	# Gets any results from query
	$values = mysql_fetch_array($result);

	# No results found - no labs
	if (!$values) {
		echo "<h3 class='info'>No labs are currently associated with this assignment.</h3>";
	} else {					
		echo '<div class="clearfix">';
			#Headers for list of labs
			echo '<div id="lab">';
				echo '<div id="nameHeader" class="nameH">Student Name</div>';
				echo '<div id="dateHeader" class="dateH">Date Last Worked On</div>';
				echo '<div id="completeHeader" class="completeH"> Completed</div>';
			echo '</div>';
		echo '</div>';

		# Decreases space between headers and 1st lab report
		echo '<div style="margin-top: -15px;"></div>';

		echo '<div class="clearfix">';
		# Single lab report container
			echo '<div id="lab">';	
				echo '<div id="name" class="studentname">Eric Andrews</div>';
				echo '<div id="date" class="date">12/05/2013 01:32:01PM</div>';
				echo '<div id="complete" class="complete yes">YES</div>';
				echo '<a class="viewLab" href="#">View</a>';
			echo '</div>';
		echo '</div>';
	}
?>