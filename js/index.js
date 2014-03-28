// Early Birds Opening Splashcreen
// Created 3/26/2014 by Kaitlyn Carcia
// 
// Will Soeltz and Kaitlyn Carcia
// University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
// File: index.js
// Contains various js functionality for index.php - learn more lightbox, scroll for lightbox, detecting logout
// Last updated March 26, 2014 by KC
	
$(document).ready(function(){

	// code for using inline html
	$(".learnMoreLight").colorbox({inline:true, width:"609px", height: "450px"});
	
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
			alert("Successfully logged out.")
			},400);
		
		// Remove hash from URL after alert goes away
		// http://stackoverflow.com/questions/4508574/remove-hash-from-url
		setTimeout(function(){
			var loc = window.location.href,
			index = loc.indexOf('#');

			if (index > 0) {
				window.location = loc.substring(0, index);
		}},550);
	}	
});