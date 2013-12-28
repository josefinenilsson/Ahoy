/* ######################################
              Caption Position
   ###################################### */

function captionPosition() {
	$("#caption").css("margin-top","-"+String($("#caption").height()/2) + "px");
}

/* ######################################
             Execution
   ###################################### */

$("#featured-image").load(function() {
    captionPosition();
    $(window).resize(function() {
        captionPosition();
    });
});




    