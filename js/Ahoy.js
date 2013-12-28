/* ######################################
              Caption Position
   ###################################### */

function captionPosition() {
	$("#caption").css("margin-top","-"+String($("#caption").height()/2) + "px");
}


/* ######################################
              Toggle Comments
   ###################################### */

function toggleComments() {
	console.log("Toggle Comments");
}

/* ######################################
             Execution
   ###################################### */

$("#toggle-comments").click(toggleComments);

$("#featured-image").load(function() {
    captionPosition();
    $(window).resize(function() {
        captionPosition();
    });
});




    