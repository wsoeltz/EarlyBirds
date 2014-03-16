<?php
	# Displays page ONLY if a session is currently active
	# http://stackoverflow.com/questions/10097887/using-sessions-session-variables-in-a-php-login-script
	session_start();
 	if (isset($_SESSION['email']) && isset($_SESSION['name'])) {
?>
<!DOCTYPE html>
<!--
    Teacher Hub
    Created 2/19/2014 by Kaitlyn Carcia
    
        Will Soeltz and Kaitlyn Carcia
        University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
        File: teacherhub.php
        Main menu for teachers -contains informational sheet, assignments, and welcome message
        Last updated March 12, 2014 by KC
-->
<html>
    <head>
        <meta charset = "utf-8" />

        <!-- Styling for this page -->
        <link rel = "stylesheet" href = "css/reset.css" />
        <link rel = "stylesheet" href = "css/colorbox.css" />
        <link rel = "stylesheet" href = "css/teacherhub.css" />
        

        <!-- Open Sans Google Font API -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

        <!-- JavaScript pages for create assignment -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/jquery.colorbox.js"></script>
        <script>
            $(document).ready(function(){
                // code for embeding external page
                //$(".createNewAssignment").colorbox({iframe:true, width:"80%", height:"80%"});
                
                //code for using inline html
                $(".createNewAssignment").colorbox({inline:true, width:"488px", height: "334px"});

            });
        </script>

        <title>Early Birds</title>
    </head>
    <body>
        <!-- Header includes logo, blue line, and logout link -->
        <div id="header">
            <!-- Blue line -->
            <div id="blueLine"></div>
            <!-- Top container inclues logo and logout link -->
            <div id="topContainer">
                <!-- Keeps parents of floating elements from collasping -->
                <div class="clearfix">
                    <!-- Logo image appears as link
                             Source: http://ran.ge/2009/11/11/css-trick-turning-a-background-image-into-a-clickable-link/ -->
                    <a href="teacherhub.php" id="logo" title="Early Birds">Early Birds</a> 
                    <!-- Contains logout link -->
                    <div id="logout">
                        <a class="logout" href="scripts/logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Container includes containers for content/egg shell background -->
        <div id="mainContainer">
            <!-- Contains Welcome, Assignments, and Info Sheet blocks -->
            <div id="container">
                <!-- Keeps parents of floating elements from collasping -->
                <div class="clearfix">
                    <!-- Green background for welcome container -->
                    <div id="greenBg">
                    </div>
                    <!-- Welcome container -->
                    <div id="welcomeContainer">
                        <div id="welcomeContent">
                            <h2 class="white">Welcome to Early Birds</h2>
                            <!-- Displays user's name -->
                            <?php
                            	echo "<h3 class='name'>" . $_SESSION['name'] . "</h3>";
                            ?>
                            <!-- Displays user's email -->
                            <?php
                            	echo "<h4>" . $_SESSION['email'] . "</h4>";
                            ?>
                        </div>
                    </div>

                    <!-- Assignments container -->
		           <div id="assignmentsContainer">
                        <!-- Seperate div needed to draw vertical line without causing any alignment issues -->
                        <div class="verticalLine">
                            <!-- Container for content in assignments container -->
                            <div id="contentContainer">
                                <h2 class="gray">Assignments</h2>
                                <!-- Generate New assignment button -->
                                <div class="right">
                                    <!-- This version opens the php page
                                    <a class="createNewAssignment" href="create_assignment.php">Create New Assignment</a>
                                    -->
                                    <a class="createNewAssignment" href="#create_assignment_content">Create New Assignment</a>
                                </div>	
                                <!-- White space for visual purposes -->
                                <div style="height:20px;"></div>
                                 <?php
                                 	# connects to database
                                	include "scripts/connect.php";
                                	
                                	$Teacher_id = $_SESSION['id'];
                                	
                                	# Selects all assignments given a specific teacher ID
									$result = mysql_query("SELECT * FROM Assignments WHERE Teacher_id='$Teacher_id' ORDER BY Timestamp ASC;");
									if (!$result) {
    									die('Invalid query: ' . mysql_error());
									}
									$values = mysql_fetch_array($result);
									
									# No results found - no assignments
                                	if (!$values) {
                                		echo "<h3 class='info'>You don't have any assignments. Click above to create one.</h3>";
                                	} else {
                                		# Populate array with all search results	
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
                                        			echo "<a class='teacherLink viewLabs' href='teacherhub_labs.php'>View Labs</a>";
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
						</div>
					 </div>
 					</div>
                                
                    
                    <div id="line"></div>

                    <!-- Informational sheet container -->                    
                    <div id="infoSheetContainer">
                        <div id="contentContainer">
                            <h2 class="gray">Information Sheet</h2>
                            <h3 class="info">Print this informational sheet to hand out to your students.
                                Includes a 'How-To' on using the Early Birds system as well as a location
                                to write down your assignment code and their lab codes so they can return
                                to their saved work.</h3>
                            <div class="center">
                                <a class="teacherLink open" href="#">Open</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer container -->
            <div id="footer">
                <div id="bottomContent">
                    <!-- Contains contactinfo -->
                    <div id="contact">
                        <div style="margin:20px">
                            Early Birds created by Kaitlyn Carcia and William Soeltz 2014. For questions, comments, or issues please contact us at:
                            <a class="footer" href="mailto:help@earlybirdswriting.com">help@earlybirdswriting.com</a>
                        </div>
                    </div>
                    <!-- Contains learn more info/link -->
                    <div id="learnMore">
                        <div style="margin:20px">
                            In one single swoop, Early Birds helps familiarize students with a computer all while teaching them the basics of writing a science lab report. 
                            <a class="footer" href="#">Learn More ></a>
                        </div>
                    </div>
                </div>
            </div>


        <!-- Contains hidden content for creating assignments -->
            <div style='display:none'>
                <div id="create_assignment_content">
                                        
                    <div id="new_assignmentTitle">New Assignment</div>
                    <form method="post" action="scripts/assignments.php">
                        <input type="text" name="name" id="name" placeholder="Assignment Name"><br>
                        <div id="labCode_new">
                            <h2 class="acode">Assignment Code</h2>
                            <div id="acode" style="display:inline-block">
                                hairyturtle97
                            </div>
                        </div>
                        <input type="submit" class="button" value="Create" id="createAssignment_button">
                    </form>

                </div>
            </div>
        <!-- end hidden content -->


    </body>
</html>
<?php
	# Otherwise redirect to splash screen
	 } else {
	 	header("Location: index.html");
	}
?>
