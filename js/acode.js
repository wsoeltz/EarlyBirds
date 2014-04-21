// Early Birds Opening Splashcreen
// Created 4/13/2014 by Kaitlyn Carcia
// 
// Will Soeltz and Kaitlyn Carcia
// University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
// File: acode.js
// Checks if acode exists in database
// Last updated April 21, 2014 by KC

$(document).ready(function(){
	// Overrides default enter key controls
    // Source: http://stackoverflow.com/questions/895171/prevent-users-from-submitting-form-by-hitting-enter
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            // Clicks "Continue" if user presses enter on acode input box
            if ($('#acode_box').is(':focus')) {
                $('#asubmit').click();
                return false;
            }
        	// Clicks "Register" if user presses enter on any register input boxes  
            if (($('#name').is(':focus')) || ($('#registerEmail').is(':focus')) || ($('#confirmEmail').is(':focus')) || ($('#registerPassword').is(':focus')) || ($('#confirmPassword').is(':focus')) ) {
                $('#register_submit').click();
                return false;
            }
            // Clicks "Login" if user presses enter on any login input boxes
            if (($('#loginEmail').is(':focus')) || ($('#loginPassword').is(':focus'))) {
                $('#login_submit').click();
                return false;
            }
        }
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
    var acode = document.getElementById('acode_box').value;
    var queryString = "?acode=" + acode;
    ajaxRequest.open("GET", "scripts/acode_ajax.php" + 
        queryString, true);
    ajaxRequest.send(null); 
}     
