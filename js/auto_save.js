// Early Birds Opening Splashcreen
// Created 3/30/2014 by Kaitlyn Carcia
// 
// Will Soeltz and Kaitlyn Carcia
// University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
// File: auto_save.js
// Uses ajax to auto-save information to the database every 15 seconds
// Last updated April 13, 2014 by KC


// Handles auto-saving
idleTime = 0;
nonIdleTime = 0;

$(document).ready(function () {
    //Increment the idle time counter every second
    var idleInterval = setInterval(timerIncrement, 1000); // 1 second
    
    //Increment the non idle time counter every second
	var nonIdleInterval = setInterval(activeTimerIncrement, 1000); // 1 second

	// Idel time goes to 0 if user is actively typing
    $(this).keypress(function (e) {
        idleTime = 0;
    });
});

// For idle time
function timerIncrement() {
    idleTime = idleTime + 1;
    // If user idles for 3 seconds, save info
    if (idleTime > 1) { // 2 seconds
        auto_save();
        idleTime = -10000; // Prevents continuous auto save if use is away from the computer 
        nonIdleTime = 0; // Resets nonIdleTime
    }
}        

// For non idle time - saves every 30 seconds user is not idle
function activeTimerIncrement() {
    nonIdleTime = nonIdleTime + 1;
    if (nonIdleTime > 29) { // 30 seconds
        auto_save();
        nonIdleTime = 0;  
    }
}      

// Handles auto-saving all information
function auto_save() {
	// Changes div to Saving...
	// Source: http://stackoverflow.com/questions/5677799/how-to-append-data-to-div-using-javascript
    var div = document.getElementById('saving');
    div.innerHTML = 'Saving...';

	// Sends info to database via AJAX
    ajaxFunction();
	
	// After 4 seconds, display lasted saved at
    setTimeout(function(){
    	// Get current date/time and replace Saving... with this information
    	// Source: http://www.w3schools.com/jsref/jsref_obj_date.asp
        var dt = new Date();
        var t = dt.toLocaleTimeString();
        var dm = new Date(); 
        var m = dt.toLocaleDateString();

        var div = document.getElementById('saving');
        // div.innerHTML = 'Last saved on ' + m + ' at ' + t;
        div.innerHTML = 'Saved'
    }, 1500);
}

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
    ajaxRequest.open("GET", "scripts/auto_save.php" + 
        queryString, true);
    ajaxRequest.send(null); 
}     
