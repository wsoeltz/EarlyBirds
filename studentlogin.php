<?php
	# Displays page ONLY if a session is currently active
	# http://stackoverflow.com/questions/10097887/using-sessions-session-variables-in-a-php-login-script
	session_start();
 	if (isset($_SESSION['acode'])) {
?>
<!DOCTYPE html>
<!--
    Early Birds Opening Splashcreen
    Created 2/22/2014 by Will Soeltz
    
	Will Soeltz and Kaitlyn Carcia
	University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
	File: studentlogin.php
  	Page for students to input their lab code to continue working on their assignments.
	Last updated March 26, 2014 by KC
-->

<html>
  <head>
    <!-- Favicon -->
    <link rel="shortcut icon" href="css/assets/ebfavicon.ico" type="image/x-icon">
    <link rel="icon" href="css/assets/ebfavicon.ico" type="image/x-icon">
    <meta charset = "utf-8" />
    
    <link rel = "stylesheet" href = "css/reset.css" />
    <link rel = "stylesheet" href = "css/studentlogin.css" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    
    <!-- Open Sans Google Font API -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    
  <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <!-- Inlclude jQuery Validation Plugin -->
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script> 
  <script type="text/javascript">
    $(document).ready(function(){
      $('#login').validate({
        rules:  {
          assignment_code:  {
            required: true
          }
        },//end rules
        messages:  {
          assignment_code:  {
            required: "<div class='errors'><i class='fa fa-asterisk'></i>Please enter your name.</div>"
          }//end messages 
        }
      });
    });
  </script>
	
    <title>Early Birds</title>
    
  </head>
  <body>
    <!-- content wrapping div designed to push footer to bottom of page -->
    <div id="footerPusher">
      <div id="contentWrapper" class="center">
        <!-- the Early Bird -->
        <div id="theEarlyBird">
          <img src="css/assets/earlyBird_bigBG.png" title="The Early Bird writes the words!" alt="The Early Bird writes the words!" width="809" height="621"/>
        </div>
        <!-- Div containing all of the main body content -->
        <div id="mainBodyContent">
          <div id="logoText">
            <a href="index.php"><img src="css/assets/logo_textonly.png" title="Early Birds" alt="Early Birds" width="409" height="138"/></a>
          </div>
          
          <?php
            include "scripts/show_labs_studentlogin.php";
          ?>
         
          <form id="login" name="login" method="post" action="scripts/new_lab.php">
              <input type="text" id="assignment_code" name="assignment_code" placeholder="What Is Your Name?">
              <br><br>
              <div class="center">
                  <input type="submit" class="stdButton" name="acode" id="assignmentToLab" value="Begin New Lab">
              </div>
          </form>
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