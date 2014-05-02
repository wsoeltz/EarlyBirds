// Early Birds Opening Splashcreen
// Created 5/1/2014 by Kaitlyn Carcia
// 
// Will Soeltz and Kaitlyn Carcia
// University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
// File: teacherhub.js
// Contains JS for creating a new assignment, and jQuery validation for the assignment form creation sheet
// Last updated May 1, 2014 by KC

$(document).ready(function(){
	// code for using inline html - new assignment lightbox
	$(".createNewAssignment").colorbox({inline:true, width:"488px", height: "334px"});
	
	// Validate new assignment form
	$('#newAssignForm').validate({
		rules:  {
			name:  {
				required: true,
				maxlength: 28
			}
		},//end rules
		messages:  {
			name:  {
				required: "<div class='errors'><i class='fa fa-asterisk'></i>You need to enter an assignment name.</div>",
				maxlength: "<div class='errors'><i class='fa fa-asterisk'></i>Assignment name can't be longer than 28 characters.</div>"
			}
		},//end messages 
	});
});