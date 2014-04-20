<?php
	# Displays page ONLY if a session is currently active
	# http://stackoverflow.com/questions/10097887/using-sessions-session-variables-in-a-php-login-script
	session_start();
 	if (isset($_SESSION['here'])) {
?>
<!DOCTYPE html>
<!--
	Early Birds Student Hub
	Created 2/27/2014 by Kaitlyn Carcia
	
	Will Soeltz and Kaitlyn Carcia
	University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	File: studenthub.php
	Screen contains all tools necessary to create lab report
	Last updated March 26, 2014 by KC
-->

<html>
    <head>
        <!-- Favicon -->
        <link rel="shortcut icon" href="css/assets/ebfavicon.ico" type="image/x-icon">
        <link rel="icon" href="css/assets/ebfavicon.ico" type="image/x-icon">
        <meta charset = "utf-8" />

        <!-- Styling for this page - also includes general styling used in the student login -->
        <link rel = "stylesheet" href = "css/reset.css" />
        <link rel = "stylesheet" href = "css/studentlogin.css" />
        <link rel = "stylesheet" href = "css/studenthub.css" />

        <!-- Open Sans Google Font API -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,300italic,400italic,800,700' rel='stylesheet' type='text/css'>

		<!-- jQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        
        <!-- jQuery UI -->
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        
        <!-- js for jQuery Tabs from jQuery UI -->
        <script src="tabs/js/jquery.ui.widget.js"></script>
        <script src="tabs/js/jquery.ui.tabs.js"></script>
        
        <!-- Styling for jQuery tabs from jQuery UI -->
        <link rel="stylesheet" href="tabs/css/jquery.ui.all.css">
        
        <!-- Scripts to get jQuery tabs working w/ site -->
        <script src="js/tabs.js"></script>
     
		<!-- Scripts for auto-saving -->
     	<script src="js/auto_save.js"></script> 

        <title>Early Birds</title>
    </head>
    <body>
    	<?php
    		# Detects if user leaves page
     		include "scripts/leave_page.php";
    		
    		# Loads all existing lab content into textareas
			include "scripts/load_lab.php";
		?>
        <!-- content wrapping div designed to push footer to bottom of page -->
        <div id="footerPusher">
            <div id="contentWrapper">
            
                <!-- Container for all main content -->
                <div id="mainBodyContent">

                 <!-- Keeps parents of floating elements from collasping -->
                    <div class="clearfix">

                        <div class="labInfo">
                            <a href="index.php"><img src="css/assets/logo_small.png" title="Early Birds" alt="Early Birds" width="203" height="58"/></a>
                        </div>
                        <div class="labInfo">
                            <?php
                            	# Displays assignment name and student name
                                echo '<h2>' . $_SESSION['aname'] . '</h2>';
    	                    	echo '<h3>' . $_SESSION['sname'] .  '</h3><br>';
    	                    ?>
                        </div>
                        <div class="labInfo">
                                <?php
                                    # Displays teacher name and teacher email 
                                    echo '<h3 class="bold">Teacher:</h3> <h3>' . $_SESSION['tname'] . '</h3><br>';
                                    echo '<h3 class="bold">Contact:</h3> <h3>' . $_SESSION['temail'] . '</h3><br>';
                                ?>
                        </div>
                        <div class="labInfo">
                            <a class="stdButton saveQuit" href="index.php">Save &amp; Quit</a>
                        </div>
                    </div>               
                    <!-- Div for auto-saving messages -->
                    <div style="height: 20px; margin-left: 35px" id="saving"></div>
    				<!-- All tabs for lab report -->
                    <div id="tabs">
                        <ul>
                            <li><a id="#tabs1" href="#tabs-1">Problem</a></li>
                            <li><a id="#tabs2" href="#tabs-2">Hypothesis</a></li>
                            <li><a id="#tabs3" href="#tabs-3">Materials</a></li>
                            <li><a id="#tabs4" href="#tabs-4">Procedure</a></li>
                            <li><a id="#tabs5" href="#tabs-5">Results</a></li>
                            <li><a id="#tabs6" href="#tabs-6">Conclusion</a></li>
                        </ul>
                        <div id="tabs-1">
    						<!-- Input box -->
    						<textarea name="problemInput" class="textInput" id="tabs-1-box" placeholder="Start writing your Problem here."></textarea>
                        </div>
                        
                        <div id="tabs-2">
    						<!-- Input box -->
    						<textarea name="hypothesisInput" class="textInput" id="tabs-2-box" placeholder="Start writing your Hypothesis here."></textarea>
                        </div>
                        <div id="tabs-3">
    						<!-- Input box -->
    						<textarea name="materialsInput" class="textInput" id="tabs-3-box" placeholder="Start writing your Materials here."></textarea>
                        </div>
                        <div id="tabs-4">
    						<!-- Input box -->
    						<textarea name="procedureInput" class="textInput" id="tabs-4-box" placeholder="Start writing your Procedure here."></textarea>
                        </div>
                        <div id="tabs-5">
    						<!-- Input box -->
    						<textarea name="resultsInput" class="textInput" id="tabs-5-box" placeholder="Start writing your Results here."></textarea>
                        </div>
                        <div id="tabs-6">
    						<!-- Input box -->
    						<textarea name="conclusionInput" class="textInput" id="tabs-6-box" placeholder="Start writing your Conclusion here."></textarea>
                        </div>
                    </div>
                    
                    <script>

                    </script>
                    
                    <!-- Hint section -->
                    <div id="labHelp">
                     <!-- Keeps parents of floating elements from collasping -->
                        <div class="clearfix">
                            <div id="hintContainer">
                                <!-- First problem hint that shows on site -->
                                <h3>Need Help Writing your</h3><h3 class="bold">&nbsp;Problem?</h3><br>
                                <p>Why are you doing this experiment? What question are you trying to answer? One way to write it is <span class="italics">I am doing this experiment to __________.</span></p>
                            </div>
                            <!-- Container for cartoon bird image -->
                            <div id="bird">
                                <img src="css/assets/earlybird1.png" title="Early Birds" alt="Early Birds" width="266" height="147"/>
                            </div>
                        </div>
                    </div>
                    
                    <div id="navButtons">
                        <!-- Save, Next, and Previous buttons -->
                        <a id="previous" class="stdButton stdButton-hover previous">Previous Section</a>
                        <a id="next" class="stdButton stdButton-hover next">Next Section</a>
                        <a id="submit" class="stdButton submit" href="scripts/submit.php">Submit</a>
                        
                    
                    <!-- Reminder for lab code - eventually PHP code will exist here -->
                    </div>
                    <!-- Adding some space -->
                    <div style="height: 170px"></div>
                </div>
            </div>
            
        	<?php
    			include "include/footer.html";
    		?>
        </div>
    </body>
</html>
<?php
	# Otherwise redirect to splash screen
	 } else {
	 	header("Location: index.php");
	}
?>