// Early Birds Opening Splashcreen
// Created 5/1/2014 by Kaitlyn Carcia
// 
// Will Soeltz and Kaitlyn Carcia
// University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
// File: studentlogin.js
// Contains JS for student login validation
// Last updated May 1, 2014 by KC

$(document).ready(function(){
	// Removes div content if form is submitted
	$('#assignmentToLab').click(function() {
		$('#lab_message').empty();
	});

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
		}, //end messages
		// Submit handler: if valid, then calls ajax function to make sure email isn't already taken
		submitHandler: function(form) {
			var url = "scripts/new_lab.php?sname=" + $('#assignment_code').val();
			location.href = url;
		}
	});
});