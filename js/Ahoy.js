/* ######################################
              Caption Position
   ###################################### */

function captionPosition() {
	$("#caption").css("margin-top","-"+String($("#caption").height()/2) + "px");
}

/* ######################################
              Responsive Header
   ###################################### */

function responsiveHeader() {
    console.log("responsiveHeader()");
	if($("#header-wrapper").width() < ($("#site-title").width() + $("#site-navigation").width() + 10)) {
        console.log("wrapper too narrow");
        if (!($("#site-name").hasClass("hidden"))){
            console.log("site-name hidden");
            $("#site-name").addClass("hidden");
        }
    }
}

/* ######################################
             Execution
   ###################################### */

$("#featured-image").load(function() {
    captionPosition();
    responsiveHeader();
    $(window).resize(function() {
        captionPosition();
        responsiveHeader();
    });
});




    