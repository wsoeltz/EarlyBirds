// Early Birds Opening Splashcreen
// Created 3/30/2014 by Kaitlyn Carcia
// 
// Will Soeltz and Kaitlyn Carcia
// University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
// File: auto-save.js
// Uses ajax to auto-save information to the database every 15 seconds
// Last updated March 26, 2014 by KC


// Sets information to database every 15 seconds
setInterval(function(){ajaxFunction()},15000);

// Function sends information to the the database
// Source: http://www.tutorialspoint.com/ajax/ajax_database.htm
function ajaxFunction(){
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
		  var ajaxDisplay = document.getElementById('tabs-1-box');
		  ajaxDisplay.innerHTML = ajaxRequest.responseText;
		  var ajaxDisplay = document.getElementById('tabs-2-box');
		  ajaxDisplay.innerHTML = ajaxRequest.responseText;
		  var ajaxDisplay = document.getElementById('tabs-3-box');
		  ajaxDisplay.innerHTML = ajaxRequest.responseText;
		  var ajaxDisplay = document.getElementById('tabs-4-box');
		  ajaxDisplay.innerHTML = ajaxRequest.responseText;
		  var ajaxDisplay = document.getElementById('tabs-5-box');
		  ajaxDisplay.innerHTML = ajaxRequest.responseText;
		  var ajaxDisplay = document.getElementById('tabs-6-box');
		  ajaxDisplay.innerHTML = ajaxRequest.responseText;
	   }
	 }
	 // Now get the value from user and pass it to
	 // server script.
	 var problem = document.getElementById('tabs-1-box').value;
	 var hypothesis = document.getElementById('tabs-2-box').value;
	 var materials = document.getElementById('tabs-3-box').value;
	 var procedure = document.getElementById('tabs-4-box').value;
	 var results = document.getElementById('tabs-5-box').value;
	 var conclusion = document.getElementById('tabs-6-box').value;
	 var queryString = "?problem=" + problem + "&hypothesis=" + hypothesis + "&materials=" + materials + "&procedure=" + procedure + "&results=" + results + "&conclusion=" + conclusion;
	 ajaxRequest.open("GET", "scripts/auto-save.php" + 
								  queryString, true);
	 ajaxRequest.send(null); 
}