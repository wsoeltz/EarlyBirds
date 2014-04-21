// Early Birds Opening Splashcreen
// Created 3/26/2014 by Kaitlyn Carcia
// 
// Will Soeltz and Kaitlyn Carcia
// University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
// File: index.js
// Contains various js functionality for index.php - learn more lightbox, scroll for lightbox, detecting logout
// Last updated March 26, 2014 by KC
	
$(document).ready(function(){

	// Removes "email already taken error message is user begins typing again
	$('#registerEmail').on('keyup', function() {
		$('#ajaxDivReg').empty();
	});

	// code for using inline html with colorbox
	//$(".learnMoreLight").colorbox({inline:true, width:"609px", height: "450px"});
	$(".logout").colorbox({inline:true, width:"300px", height: "200px"});
	
	// Scrolling for learn more
	$(function(){
		$('#about').jScrollPane();
	});
				
	// Checks if a user just logged out
	// http://stackoverflow.com/questions/298503/how-can-you-check-for-a-hash-in-a-url-using-javascript
	if(window.location.hash == "#logout") {
		// If there's a hash in the URL, the user logged out
		// 400 seconds delays the alert message
		// http://www.w3schools.com/js/js_timing.asp
		setTimeout(function(){
			$('.logout').click();
			},400);
		
		// Remove hash from URL after alert goes away
		// http://stackoverflow.com/questions/4508574/remove-hash-from-url
		setTimeout(function(){
			var loc = window.location.href,
			index = loc.indexOf('#');

			if (index > 0) {
				window.location = loc.substring(0, index);
		}},1600);
	}

  // jQuery validation- validate for letters only
  // http://stackoverflow.com/questions/2794162/jquery-validation-plugin-accept-only-alphabetical-characters
  jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z\s]*$/i.test(value);
  }, "<div class='errors'><i class='fa fa-asterisk'></i>Letters only please.</div>");

	$('#loginForm').validate({
          rules:  {
            email:  {
              required: true,
              email: true
            },
            password:  {
              required: true
            }
          },//end rules
          messages:  {
            email:  {
              required: "<div class='errors'><i class='fa fa-asterisk'></i>You need to enter an email.</div>",
              email: "<div class='errors'><i class='fa fa-asterisk'></i>Invalid email.</div>"
            },
            password:  {
              required: "<div class='errors'><i class='fa fa-asterisk'></i>You need to enter a password.</div>"
            }
          },//end messages 
        });

	$('#registerForm').validate({
          rules:  {
          	name: {
          		required: true,
              lettersonly: true
          	},
            email:  {
              required: true,
              email: true
            },
            confirm_email:  {
              required: true,
              equalTo: "#registerEmail"
            },
            password:  {
              required: true,
              minlength: 8
            },
            confirm_password:  {
              required: true,
              equalTo: "#registerPassword"
            }
          },//end rules
          messages:  {
          	name: {
          		required: "<div class='errors'><i class='fa fa-asterisk'></i>You need to enter your name.</div>"
          	},
            email:  {
              required: "<div class='errors'><i class='fa fa-asterisk'></i>You need to enter an email.</div>",
              email: "<div class='errors'><i class='fa fa-asterisk'></i>Invalid email.</div>"
            },
            confirm_email:  {
              required: "<div class='errors'><i class='fa fa-asterisk'></i>You need to confirm your email.</div>",
              equalTo: "<div class='errors'><i class='fa fa-asterisk'></i>Email does not match.</div>"
            },
            password:  {
              required: "<div class='errors'><i class='fa fa-asterisk'></i>You need to enter a password.</div>",
              minlength: "<div class='errors'><i class='fa fa-asterisk'></i>Password must be at least 8 characters</div>"
            },
            confirm_password: {
              required: "<div class='errors'><i class='fa fa-asterisk'></i>You need to confirm your password.</div>",
            	equalTo: "<div class='errors'><i class='fa fa-asterisk'></i>Passwords do not match.</div>"
            }
          }, //end messages
          // Submit handler: if valid, then calls ajax function to make sure email isn't already taken
          submitHandler: function(form) {
          	ajaxFunction2();
          }
        });
});

// Function sends information to the the database
// Source: http://www.tutorialspoint.com/ajax/ajax_database.htm
function ajaxFunction2(){
		var ajaxRequest;  // The variable that makes Ajax possible!
	
		try{
			// Opera 8.0+, Firefox, Safari
			ajaxRequest = new XMLHttpRequest();
		}catch (e){
			// Internet Explorer Browsers
			try{
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			}catch (e) {
				try{
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				}catch (e){
					// Something went wrong
					alert("Your browser broke!");
					return false;
				}
			}
		}
		// Create a function that will receive data 
		// sent from the server and will update
		// div section in the same page.
		ajaxRequest.onreadystatechange = function(){
			if(ajaxRequest.readyState == 4){
				if(ajaxRequest.responseText === "success") {
					// Redirect to register user if successful, meaning an account with the same email exists
					var url = "scripts/registration.php?name=" + name + "&email=" + email + "&password=" + password;
					location.href = url;
				} else {
					var ajaxDisplay = document.getElementById('ajaxDivReg');
					ajaxDisplay.innerHTML = ajaxRequest.responseText;
					return false;
				}
			}
		}
		// Now get the value from user and pass it to
		// server script.
		var name = document.getElementById('name').value;
		var email = document.getElementById('registerEmail').value;
		var password = document.getElementById('registerPassword').value;
		var queryString = "?email=" + email;
		ajaxRequest.open("GET", "scripts/reg_ajax.php" + 
			queryString, true);
		ajaxRequest.send(null); 
}     
