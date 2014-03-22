<?php
	# Displays page only if current session is active
	# http://stackoverflow.com/questions/10097887/using-sessions-session-variables-in-a-php-login-script
	session_start();
	if (isset($_SESSION['email']) && isset($_SESSION['name'])) {
?>
<!DOCTYPE html>
<!--
    Teacher Hub Labs
    Created 2/23/2014 by Kaitlyn Carcia
    
        Will Soeltz and Kaitlyn Carcia
        University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
        File: teacherhub_labs.php
        Shows teachers labs available
        Last updated March 19, 2014 by KC
-->
<html>
    <head>
        <meta charset = "utf-8" />

        <!-- Styling for this page -->
        <link rel = "stylesheet" href = "css/reset.css" />
        <link rel = "stylesheet" href = "css/teacherhub.css" />
        <link rel = "stylesheet" href = "css/teacherhub_labs.css" />

        <!-- Open Sans Google Font API -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

        <title>Early Birds</title>
    </head>
    <body>
        <!-- Header includes logo, blue line, and logout link -->
		<?php
			include "include/teacherhub_header.html";
		?>
    
        <!-- Main Container includes containers for content/egg shell background -->
        <div id="mainContainer">
            <!-- Contains Welcome and Labs blocks -->
            <div id="container">
                <!-- Keeps parents of floating elements from collasping -->
                <div class="clearfix">
                    <!-- Orange background for welcome container -->
                    <div id="orangeBg"></div>
                    <!-- Welcome container -->
                    <div id="welcomeContainer">
                        <div id="welcomeContent">
                            <h2 class="white">View Labs</h2>
                            <!-- Displays user's name -->
                            <?php
                            	echo "<h3 class='name'>" . $_SESSION['name'] . "</h3>";
                            ?>
                            <!-- Will eventually use PHP for email -->
                            <?php
                            	echo "<h4 style='margin-bottom: 30px;'>" . $_SESSION['email'] . "</h4>";
                            ?>
                            <a class="return" href="teacherhub.php">Return to Assignments</a>
                        </div>
                    </div>

                    <!-- Labs container -->
                    <div id="labsContainer">
                        <!-- Container for content in labs container -->
                        <div id="contentContainer">
                            <!-- Will evenutally be PHP for lab name -->
                            <h2 class="gray">Gravity Apples</h2>
                        	<!-- Code for when no lab reports exist -->
                        	<!-- <h3 class="info">No lab reports have been created for this assignment yet.</h3> -->
                            <h3 class="info">Click below to view individual labs for this assignment.</h3>
                            <!-- White space -->
                            <div style="height: 20px;"></div>
							<!-- Headers for list of labs -->
							<!-- Keeps parents of floating elements from collasping -->
                            <div class="clearfix">
                            	<!-- Single lab report container -->
                                <div id="lab">
                                    <div id="nameHeader" class="nameH">Student Name</div>
                                    <div id="dateHeader" class="dateH">Date Last Worked On</div>
                                    <div id="completeHeader" class="completeH"> Completed</div>
                                </div>
                            </div>
							
							<!-- Decreases space between headers and 1st lab report -->
							<div style="margin-top: -15px;"></div>
							
							<!-- Will eventually implement PHP code -->
							<!-- Keeps parents of floating elements from collasping -->
                            <div class="clearfix">
                                <div id="lab">
                                    <!-- Single lab report container -->	
                                    <div id="name" class="studentname">Eric Andrews</div>
                                    <div id="date" class="date">12/05/2013 01:32:01PM</div>
                                    <div id="complete" class="complete yes">YES</div>
                                    <a class="viewLab" href="#">View</a>
                                </div>
                            </div>

							<!-- Will eventually implement PHP code -->
							<!-- Keeps parents of floating elements from collasping -->
                            <div class="clearfix">
                                <div id="lab">
                                    <!-- Single lab report container -->	
                                    <div id="name" class="studentname">Jenna Berts</div>
                                    <div id="date" class="date">12/06/2013 12:17:23PM</div>
                                    <div id="complete" class="complete yes">YES</div>
                                    <a class="viewLab" href="#">View</a>
                                </div>
                            </div>

							<!-- Will eventually implement PHP code -->
							<!-- Keeps parents of floating elements from collasping -->
                            <div class="clearfix">
                                <div id="lab">
                                    <!--Single lab report container -->	
                                    <div id="name" class="studentname">Balthazar McAndrews Junior</div>
                                    <div id="date" class="date">12/05/2013 10:49:29AM</div>
                                    <div id="complete" class="complete no">NO</div>
                                    <a class="viewLab" href="#">View</a>
                                </div>
                            </div>
                        </div>
                        <!-- White space -->
                        <div style="height: 20px"></div>
                    </div>
                </div>
            </div>
            
            <!--  Includes page footer -->
			<?php
				include "include/footer.html";
			?>

    </body>
</html>
<?php
	# Otherwise redirect to splash screen
	 } else {
	 	header("Location: index.html");
	}
?>