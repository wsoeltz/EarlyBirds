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
        Last updated May 1, 2014 by KC
-->
<html>
    <head>
        <!-- Favicon -->
        <link rel="shortcut icon" href="css/assets/ebfavicon.ico" type="image/x-icon">
        <link rel="icon" href="css/assets/ebfavicon.ico" type="image/x-icon">
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

        <!-- content wrapping div designed to push footer to bottom of page -->
        <div id="footerPusher">
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
                                <h2 class="welcomeBox darkGray">View Labs</h2>
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
                                <!-- Displayslab name -->
                                <?php
									include "scripts/display_aname.php";
                                ?>
                                <h3 class="info">Click below to view individual labs for this assignment.</h3>

                                <!-- White space -->
                                <div style="height: 20px;"></div>

                                <?php
									include "scripts/show_labs_teacherhub.php";
                                ?>
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
            </div>
        </div>
    </body>
</html>
<?php
	# Otherwise redirect to splash screen
	} else {
		header("Location: index.php");
	}
?>