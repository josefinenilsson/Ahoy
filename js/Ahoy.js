/* ######################################
              Caption Position
   ###################################### */

function captionPosition() {
	$("#caption").css("top",String(($("#featured-image").height() - $("#caption").height() )/2) + "px");
}

$("#featured-image").load(function() {
    captionPosition();
    
});


$(window).resize(function() {
	captionPosition();
});

    