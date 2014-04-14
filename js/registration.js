// Early Birds Opening Splashcreen
// Created 4/13/2014 by Kaitlyn Carcia
// 
// Will Soeltz and Kaitlyn Carcia
// University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
// File: registration.js
// Checks if user is already registered under account with same email
// Last updated April 13, 2014 by KC

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
