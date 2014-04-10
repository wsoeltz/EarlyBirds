// Early Birds Opening Splashcreen
// Created 3/26/2014 by Kaitlyn Carcia
// 
// Will Soeltz and Kaitlyn Carcia
// University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
// File: index.js
// Contains various js functionality for index.php - learn more lightbox, scroll for lightbox, detecting logout
// Last updated March 26, 2014 by KC
	
$(document).ready(function(){

	// code for using inline html with colorbox
	$(".learnMoreLight").colorbox({inline:true, width:"609px", height: "450px"});
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
              required: "<div class='errors'>You need to enter an email.</div>",
              email: "<div class='errors'>Invalid email.</div>"
            },
            password:  {
              required: "<div class='errors'>You need to enter a password.</div>"
            }
          },//end messages 
        });

	$('#registerForm').validate({
          rules:  {
          	name: {
          		required: true
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
              equalTo: "#registerPassword"
            }
          },//end rules
          messages:  {
          	name: {
          		required: "<div class='errors'>You need to enter your name.</div>"
          	},
            email:  {
              required: "<div class='errors'>You need to enter an email.</div>",
              email: "<div class='errors'>Invalid email.</div>"
            },
            confirm_email:  {
              required: "<div class='errors'>You need to confirm your email.</div>",
              equalTo: "<div class='errors'>Email does not match.</div>"
            },
            password:  {
              required: "<div class='errors'>You need to enter a password.</div>",
              minlength: "<div class='errors'>Password must be at least 8 characters</div>"
            },
            confirm_password: {
            	equalTo: "<div class='errors'>Passwords do not match.</div>"
            }
          },//end messages 
        });


	$('#assignmentForm').validate({
          rules:  {
            assignment_code:  {
              required: true
            }
          },//end rules
          messages:  {
            assignment_code:  {
              required: "You need to enter an assignment code."
            }
          },//end messages 
          errorPlacement: function(error, element) {
            $(error).appendTo( $("#assignmentErrors") );
            } // end errorPlacement       
        });
	

});