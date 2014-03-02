// document ready function
$(function() {

	// Sets default tab to the first tab
	// http://stackoverflow.com/questions/4565128/set-default-tab-in-jquery-ui-tabs
    $( "#tabs" ).tabs();
    $( "#tabs" ).tabs( "option", "active", 0 );
                
	// Goes to the next tab if user clicks the next button
	// http://stackoverflow.com/questions/3044654/jquery-tabs-next-button
    $("#next").click(function() {
    	// Gets active tab
        var active = ($( "#tabs" ).tabs( "option", "active" ));
        // Changes hint to be hint of next section
        hint(active);
        // Move to next tab
        $( "#tabs" ).tabs( "option", "active", active + 1 );
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
    }); // end individual click
         
}); // end document ready function
            
// Function hint changes hint accordingly with current tab
// http://stackoverflow.com/questions/4995185/using-jquery-replacewith-to-replace-content-of-div-only-working-first-time
function hint(active){
    switch(active){
        case -1:
        	// Replaces with problem hint
            var problem = '<h3>Need Help Writing your<h3 class="bold" style="margin-left: 4px">Problem?</h3><h3>Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah.</h3>';
            $( "div#hintContainer" ).empty();
            $( "div#hintContainer" ).append(problem);
            break;
        case 0:
        	// Replaces with hypothesis hint
            var hypothesis = '<h3>Need Help Writing your<h3 class="bold" style="margin-left: 4px">Hypothesis?</h3><h3>A hypothesis is an educated guess about how things work. Most of the time a hypothesis is written like this: "If _____[I do this]_____, then _____[this]_____ will happen." (Fill in the blanks with the appropriate information from your own experiment.)</h3>';
            $( "div#hintContainer" ).empty();
            $( "div#hintContainer" ).append(hypothesis);
            break;
        case 1:
        	// Replaces with materials hint
            var materials = '<h3>Need Help Writing your<h3 class="bold" style="margin-left: 4px">Materials?</h3><h3>Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah.</h3>';                    
            $( "div#hintContainer" ).empty();
            $( "div#hintContainer" ).append(materials);
            break;
        case 2:
        	// Replaces with procedure hint
            var procedure = '<h3>Need Help Writing your<h3 class="bold" style="margin-left: 4px">Procedure?</h3><h3>Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah.</h3>';
            $( "div#hintContainer" ).empty();
            $( "div#hintContainer" ).append(procedure);
            break;
        case 3:
        	// Replaces with result hint
            var result = '<h3>Need Help Writing your<h3 class="bold" style="margin-left: 4px">Result?</h3><h3>Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah.</h3>';
            $( "div#hintContainer" ).empty();
            $( "div#hintContainer" ).append(result);
            break;
        case 4:
        	// Replaces with conclusion hint
            var conclusion = '<h3>Need Help Writing your<h3 class="bold" style="margin-left: 4px">Conclusion?</h3><h3>Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah.</h3>';
            $( "div#hintContainer" ).empty();
            $( "div#hintContainer" ).append(conclusion);
            break;
    }
} 