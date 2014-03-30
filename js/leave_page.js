// Early Birds Opening Splashcreen
// Created 3/30/2014 by Kaitlyn Carcia
// 
// Will Soeltz and Kaitlyn Carcia
// University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
// File: leave_page.js
// Detects if a user leaves page
// Last updated March 30, 2014 by KC

window.onbeforeunload = confirmExit;
function confirmExit()
{
	return "";
}
