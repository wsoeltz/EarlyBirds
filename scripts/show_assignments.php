<?php
	# connects to database
	include "connect.php";

	# Teacher ID
	$Teacher_id = $_SESSION['id'];

	# Selects all assignments given a specific Teacher ID
	$result = mysql_query("SELECT * FROM Assignments WHERE Teacher_id='$Teacher_id' ORDER BY Timestamp ASC;");
	if (!$result) {
	die('Invalid query: ' . mysql_error());
	}
	
	# Gets any results from query
	$values = mysql_fetch_array($result);

	# No results found - no assignments
	if (!$values) {
		echo "<h3 class='info'>You don't have any assignments. Click above to create one.</h3>";
	} else {
		# Populate array with all assignments	
		$i = 0;
		do {
			$array2[$i] = $values;
			$i++;	
		} while ( $values = mysql_fetch_array($result));

		# Print array backwards (newest assignment first) 
		for ($i = count($array2)-1; $i >= 0; $i--) {
			echo "<div id='assignment'>";
					echo "<div id='assignmentTitle'>";
						echo $array2[$i][1];
					echo "</div>";
					echo "<div class='clearfix'>";
						echo "<a class='teacherLink viewLabs' href='teacherhub_labs.php#'>View Labs</a>";
						echo "<div id='assignmentContent'>";
							echo "<h2 class='acode'>Assignment Code:</h2><br>";
							echo "<h3 class='acode'>" . $array2[$i][0] . "</h3>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
				echo "<div style='height: 38px'></div>";	
			}
	}
?>