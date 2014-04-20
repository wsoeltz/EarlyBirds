 /***************

    Code modified from code taken from stack overflow:
    http://stackoverflow.com/questions/10961298/slide-move-divs-with-jquery
    http://jsfiddle.net/ben1729/CtNsE/2/
    Modified by Will Soeltz 2/15/2014


 ****************/
 var aboutDirection = 154;

 $(document).ready(function(){

    
    
    //functions for up and down
    function slideAnimationAbsoluteVertical(div,targetDown) {
        return function() {
            $(div).animate({
                'top': targetDown + 'px'
            }, 
            1000);
        };
    };

    function slideAnimationRelativeVertical(div,offset) {
        return function() {
            $(div).animate({
                'top': (parseInt($('#sideContent').css('top'), 10) + offset) + 'px'
            }, 
            1000);
        };
    };


    //functions for left and right
    function slideAnimationAbsoluteHorizontal(div,targetLeft) {
        return function() {
            console.log(aboutDirection);
            $(div).animate({
                'left': targetLeft + 'px'
            }, 
            1000);
        };
    };

    function slideAnimationRelativeHorizontal(div,offset) {
        return function() {
            $(div).animate({
                'left': (parseInt($('#sideContent').css('left'), 10) + offset) + 'px'
            }, 
            1000);
        };
    };



    $('#assignmentToSplash').click(slideAnimationRelativeVertical('#sideContent',-700));
    //$('#assignmentToLab').click(slideAnimationAbsoluteHorizontal('#sideContent',-513));

    $('#labToAssignment').click(slideAnimationRelativeHorizontal('#sideContent',513));

    $('#student').click(slideAnimationRelativeVertical('#sideContent',700));
    $('#teacher').click(slideAnimationRelativeVertical('#sideContent',-700));
    $('#learnMore').click(slideAnimationAbsoluteHorizontal('#sideContent',-513));

    $('#aboutToRegister').click(slideAnimationRelativeVertical('#sideContent',-700));
    $('#aboutToSplash').click(slideAnimationRelativeHorizontal('#sideContent',513));

    $('#loginToRegister').click(slideAnimationAbsoluteHorizontal('#sideContent',-513));
    $('#loginToSplash').click(slideAnimationRelativeVertical('#sideContent',700));

    $('#registerToLogin').click(slideAnimationRelativeHorizontal('#sideContent',513));
    $('#registerToAbout').click(slideAnimationRelativeVertical('#sideContent',700));


    $('#learnMoreTab').click(slideAnimationAbsoluteHorizontal('#about',154));
    $('#learnMoreTab').click(slideAnimationAbsoluteHorizontal('#learnMoreTab',154-56));
    $('#learnMoreTab').click(slideAnimationAbsoluteHorizontal('#learnMoreTab-reverse',154-56));


    $('#learnMoreTab-reverse').click(slideAnimationRelativeHorizontal('#about',763));
    $('#learnMoreTab-reverse').click(slideAnimationRelativeHorizontal('#learnMoreTab',763-56));
    $('#learnMoreTab-reverse').click(slideAnimationRelativeHorizontal('#learnMoreTab-reverse',763-56));

    $('#learnMoreTab').click(function(){
        $('#learnMoreTab').css("display","none");
        $('#learnMoreTab-reverse').css("display","block");
        $('#contentWrapper').css("overflow","visible");
    });

    $('#learnMoreTab-reverse').click(function(){
        $('#learnMoreTab').css("display","block");
        $('#learnMoreTab-reverse').css("display","none");
        $('#contentWrapper').css("overflow","hidden");
    });

});