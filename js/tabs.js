// Early Birds Opening Splashcreen
// Created 3/19/2014 by Kaitlyn Carcia
// 
// Will Soeltz and Kaitlyn Carcia
// University of Massachusetts Lowell, 91.462 GUI Programming II, Jesse M. Heines
// File: tabs.js
// Contains all JS for coloring tabs, moving through tabs, hints
// Last updated April 23, 2014 by KC

// Calls function as soon as the page loads
//Source: http://stackoverflow.com/questions/3842614/how-do-i-call-a-javascript-function-on-page-load
window.onload = function() {
  save();
};
	
// document ready function
$( document ).ready(function() {
	// Sets default tab to the first tab
	// http://stackoverflow.com/questions/4565128/set-default-tab-in-jquery-ui-tabs
    $( "#tabs" ).tabs();
    $( "#tabs" ).tabs( "option", "active", 0 );
    
	// Disable/enable next and previous buttons depending on where user is in lab report
	begin_or_end();
           
    focus_on_textbox();       
           
	// Goes to the next tab if user clicks the next button
	// http://stackoverflow.com/questions/3044654/jquery-tabs-next-button
    $("#next").click(function() {
    	// Gets active tab
        var active = ($( "#tabs" ).tabs( "option", "active" ));
        
        // Changes hint to be hint of next section
        hint(active);
        
        save();

        // Move to next tab
        $( "#tabs" ).tabs( "option", "active", active + 1 );
           
		// Disable/enable next and previous buttons depending on where user is in lab report
        begin_or_end();    
        
        // Focus on textbox of current tab
        focus_on_textbox();
    }); // end next
                  
	// Goes to the previous tab if user clicks the previous button
	// http://stackoverflow.com/questions/3044654/jquery-tabs-next-button         
    $("#previous").click(function() {
    	// Gets active tab
        var active = $( "#tabs" ).tabs( "option", "active" );
        
        // Changes hint to be hint of next section
        hint(active-2);
        
        // Moves to previous tab, but will not loop through all tabs
        if (active-1>=0){
            $( "#tabs" ).tabs( "option", "active", active - 1 );
        }
        
        save();
        
        // Disable/enable next and previous buttons depending on where user is in lab report
        begin_or_end();
        
        // Focus on textbox of current tab
        focus_on_textbox();
    }); // end previous
    
    // Upon save, change the current tab's style
    // http://stackoverflow.com/questions/7986086/using-a-jquery-variable-as-an-href-selector
    $("#save").click(function() {
    	// Gets active tab
        var index= ($( "#tabs" ).tabs( "option", "active"))+1;
        // ID of current tab
        var $tabID="#tabs-"+index;
        $('a[href="' + $tabID + '"]').css('background-color','#9ccf31'); // Changes background color to green
        $('a[href="' + $tabID + '"]').css('background-image','url(css/assets/checkbox_done.png)'); // Adds checkbox done
        $('a[href="' + $tabID + '"]').css('background-position','133px 23px'); // Position checkbox image
    }); // end save
    
    // Changes hint if you individual click a tab
    $(".ui-tabs-anchor").click(function() {
        var active = ($( "#tabs" ).tabs( "option", "active" ));
        hint(active-1);
        
        save();
        
        // Disable/enable next and previous buttons depending on where user is in lab report
        begin_or_end();
        
        // Focus on textbox of current tab// Focus on textbox of current tab
        focus_on_textbox();
    }); // end individual click        
}); // end document ready function

// Function hint empties the current hint and adds the given hint
function hint_content(hint){
	$( "div#hintContainer" ).empty();
	$( "div#hintContainer" ).append(hint);
}
            
// Function hint changes hint accordingly with current tab
// http://stackoverflow.com/questions/4995185/using-jquery-replacewith-to-replace-content-of-div-only-working-first-time
function hint(active){
    switch(active){
        case -1:
        	// Replaces with problem hint
            var problem = '<h3>Need Help Writing your<h3 class="bold"=">&nbsp;Problem?</h3><p>Why are you doing this experiment? What question are you trying to answer? One way to write it is <span class="italics">I am doing this experiment to __________.</span></p>';
			hint_content(problem);
            break;
        case 0:
        	// Replaces with hypothesis hint
            var hypothesis = '<h3>Need Help Writing your<h3 class="bold">&nbsp;Hypothesis?</h3><p>A hypothesis is a guess about what is going to happen in your experiment. One way to write it is <span class="italics">If ______, then ________.</span></p>';
            hint_content(hypothesis);
            break;
        case 1:
        	// Replaces with materials hint
            var materials = "<h3>Need Help Writing your<h3 class='bold'>&nbsp;Materials?</h3><p>List all the items you used. Don't forget to write down the amount of each item used.</p>";                    
           	hint_content(materials);
            break;
        case 2:
        	// Replaces with procedure hint
            var procedure = '<h3>Need Help Writing your<h3 class="bold">&nbsp;Procedure?</h3><p>Write down each step you took. One way to write it is <span class="italics">First, we ____. Second, we ____. Then, we ____.</span></p>';
            hint_content(procedure);
            break;
        case 3:
        	// Replaces with result hint
            var result = '<h3>Need Help Writing your<h3 class="bold">&nbsp;Result?</h3><p>What information did you collect during your experiment?</p>';
            hint_content(result);
            break;
        case 4:
        	// Replaces with conclusion hint
            var conclusion = '<h3>Need Help Writing your<h3 class="bold">&nbsp;Conclusion?</h3><p>What do your results mean? Do your results support your hypothesis? How do your results relate to the problem?</p>';
            hint_content(conclusion);
            break;
    }
}

// Function begin or end disabled or enables the next and previous buttons
// If a user is at the beginning of the lab report, the previous button is disabled 
// If a user is at the end of the lab report, the next button is disabled
function begin_or_end(){
	// Gets active tab
	var index= ($( "#tabs" ).tabs( "option", "active"))+1;
	
	// ID of current tab
	var tabID="#tabs-"+index;
	
	var title = $('a[href="' + tabID + '"]').text();
    
    // At end of lab report
    if (title == "Conclusion"){
    	// Disable next button
    	$('#next').removeClass("stdButton-hover");
    	$('#next').addClass("disabled");
    	// Enable previous button
    	$('#previous').removeClass("disabled");
    	$('#previous').addClass("stdButton-hover");
    // At beginning of lab report
    } else if (title == "Problem") {
    	// Disable previous button
    	$('#previous').removeClass("stdButton-hover");
    	$('#previous').addClass("disabled");
    	// Enable next button
    	$('#next').removeClass("disabled");
		$('#next').addClass("stdButton-hover");
    } else {
    	// Enable both previous and next buttons
    	$('#previous').removeClass("disabled");
    	$('#next').removeClass("disabled");
    	$('#previous').addClass("stdButton-hover");
		$('#next').addClass("stdButton-hover");
    }
}

// Function focus_on_textbox focuses on the textbox of the tab
// that's current open
function focus_on_textbox(){
	// Gets active tab
	var index= ($( "#tabs" ).tabs( "option", "active"))+1;
	
	// ID of current tab
	var tabID="#tabs-"+index+"-box";
	
	// Focuses on textbox
	$(tabID).focus();
}

// Change the tab's style to "save" if it has content
// http://stackoverflow.com/questions/7986086/using-a-jquery-variable-as-an-href-selector
function save() {
	// Go through all 6 input boxes and change tab color accordingly
	for ( index = 1; index < 7; index++ ) {	
		var tabID="#tabs-"+index+"-box";
		   
		if (($(tabID).val())) {
			var $tabID="#tabs-"+index;
			$('a[href="' + $tabID + '"]').css('background-color','#9ccf31'); // Changes background color to green
			$('a[href="' + $tabID + '"]').css('background-image','url(css/assets/checkbox_done.png)'); // Adds checkbox done
			$('a[href="' + $tabID + '"]').css('background-position','133px 23px'); // Position checkbox image        
		}
	}
}