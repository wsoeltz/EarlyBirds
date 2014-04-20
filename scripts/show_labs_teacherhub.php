<?php
	# Kaitlyn Carcia and Will Soeltz
	# University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	# File: show_labs_teacherhub.php
	# Shows labs on teacherhub
	# Last updated April 10, 2014 by KC
	
	# Assignment code 
	$acode = $_GET['acode'];
	
	# Set session assignment code id
	$_SESSION['acode'] = $acode;
		
	# Selects all assignments given a specific Teacher ID
	$result = mysql_query("SELECT * FROM Labs WHERE Assignment_Code='$acode'");
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
	
	# Gets any results from query
	$values = mysql_fetch_array($result);

	# No results found - no labs
	if (!$values) {
		echo "<h3 class='info nolabs'>No labs are currently associated with this assignment.</h3>";
		echo "<div style='height:100px'></div>";
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

		do {
			echo '<div class="clearfix">';
			# Single lab report container
				echo '<div id="lab">';	
					echo '<div id="name" class="studentname">' . $values['Student_Name'] . '</div>';
					echo '<div id="date" class="date">' . $values['Timestamp'] . '</div>';					
					if ($values['Completed']) {
						echo '<div id="complete" class="complete yes">YES</div>';
					} else {
						echo '<div id="complete" class="complete no">NO</div>';
					}
					# URL to redirect to the lab report
					$url = 'scripts/redirect.php?page=teacher&id=' . $values['Lab_ID'];
					echo "<a class='viewLab' target='_blank' href='$url'>View</a>";
				echo '</div>';
			echo '</div>';
		} while ($values = mysql_fetch_array($result));

	}
?>