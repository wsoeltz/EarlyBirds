// Early Birds Opening Splashcreen
// Created 4/13/2014 by Kaitlyn Carcia
// 
// Will Soeltz and Kaitlyn Carcia
// University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
// File: acode.js
// Checks if acode exists in database
// Last updated April 14, 2014 by KC

// Removes error message if begins typing in box again
$(document).ready(function(){
	$('#acode').on('keyup', function() {
		$('#ajaxDiv').empty();
	});
});

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
        	if(ajaxRequest.responseText === "success") {
        		// Redirects to finding the assignment if successful
        		var url = "scripts/find_assignment_code.php?assignment_code=" + acode;
        		location.href = url;
        	} else {
			var ajaxDisplay = document.getElementById('ajaxDiv');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
			}
        }
    }
    // Now get the value from user and pass it to
    // server script.
    var acode = document.getElementById('acode').value;
    var queryString = "?acode=" + acode;
    ajaxRequest.open("GET", "scripts/acode_ajax.php" + 
        queryString, true);
    ajaxRequest.send(null); 
}     
