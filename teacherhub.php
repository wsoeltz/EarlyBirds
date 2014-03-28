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
        Last updated March 19, 2014 by KC
-->
<html>
    <head>
        <meta charset = "utf-8" />

        <!-- Styling for this page -->
        <link rel = "stylesheet" href = "css/reset.css" />
        <link rel = "stylesheet" href = "css/colorbox.css" />
        <link rel = "stylesheet" href = "css/teacherhub.css" />

        <!-- Open Sans Google Font API -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

        <!-- JavaScript pages for create assignment -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/jquery.colorbox.js"></script>
        <script>
            $(document).ready(function(){
                // code for using inline html
                $(".createNewAssignment").colorbox({inline:true, width:"488px", height: "334px"});
            });
        </script>
        <title>Early Birds</title>
    </head>
    <body>
        <!-- Header includes logo, blue line, and logout link -->
        <?php
			include "include/teacherhub_header.html";
		?>

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
                                	# Shows all the assignments associated with a user
                                	include "scripts/show_assignments.php";
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
                                Includes a 'How-To' on using Early Birds as well as a location
                                to write down their assignment code.</h3>
                            <div class="center">
                                <a class="teacherLink open" href="#">Open</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

		<!--  Includes page footer -->
		<?php
			include "include/footer.html";
		?>

        <!-- Contains hidden content for creating assignments -->
            <div style='display:none'>
                <div id="create_assignment_content">
                                        
                    <div id="new_assignmentTitle">New Assignment</div>
                    <form method="post" action="scripts/assignments.php">
                        <input type="text" name="name" id="name" placeholder="Assignment Name"><br>
                        <div id="labCode_new">
                            <h2 class="acode">Assignment Code</h2>
                            <div id="acode" style="display:inline-block">
                                <?php
                                	# Generates assignment code
                                	include "scripts/assignment_code.php";
                                ?>
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
	 	header("Location: index.php");
	}
?>
