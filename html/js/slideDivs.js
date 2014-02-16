 /***************

    Code modified from code taken from stack overflow:
    http://stackoverflow.com/questions/10961298/slide-move-divs-with-jquery
    http://jsfiddle.net/ben1729/CtNsE/2/
    Modified by Will Soeltz 2/15/2014


 ****************/


 $(document).ready(function(){
    
    //functions for up and down
    function slideAnimationAbsoluteVertical(targetDown) {
        return function() {
            $('#sideContent').animate({
                'top': targetDown + 'px'
            }, 
            1000);
        };
    };

    function slideAnimationRelativeVertical(offset) {
        return function() {
            $('#sideContent').animate({
                'top': (parseInt($('#sideContent').css('top'), 10) + offset) + 'px'
            }, 
            1000);
        };
    };


    //functions for left and right
    function slideAnimationAbsoluteHorizontal(targetLeft) {
        return function() {
            $('#sideContent').animate({
                'left': targetLeft + 'px'
            }, 
            1000);
        };
    };

    function slideAnimationRelativeHorizontal(offset) {
        return function() {
            $('#sideContent').animate({
                'left': (parseInt($('#sideContent').css('left'), 10) + offset) + 'px'
            }, 
            1000);
        };
    };



    $('#assignmentToSplash').click(slideAnimationRelativeVertical(-700));
    $('#assignmentToLab').click(slideAnimationRelativeHorizontal(-513));

    $('#labToAssignment').click(slideAnimationRelativeHorizontal(513));


    $('#student').click(slideAnimationRelativeVertical(700));
    $('#teacher').click(slideAnimationRelativeVertical(-700));
    $('#learnMore').click(slideAnimationRelativeHorizontal(-513));

    $('#aboutToRegister').click(slideAnimationRelativeVertical(-700));
    $('#aboutToSplash').click(slideAnimationRelativeHorizontal(513));

    $('#loginToRegister').click(slideAnimationRelativeHorizontal(-513));
    $('#loginToSplash').click(slideAnimationRelativeVertical(700));

    $('#registerToLogin').click(slideAnimationRelativeHorizontal(513));
    $('#registerToAbout').click(slideAnimationRelativeVertical(700));


});