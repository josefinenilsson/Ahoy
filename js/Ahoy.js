/* ######################################
              Caption Position
   ###################################### */

var captionPosition = function() { // Update the margin of every caption element so that it's perfectly positioned in the middle.
    var caption = document.getElementsByClassName('caption');
    for (var i = 0; i < caption.length; i++) {
        var marginTop = "-"+String(caption[i].offsetHeight/2) + "px";
        caption[i].style.marginTop = marginTop;
    }
	
}

/* ######################################
             Execution
   ###################################### */

window.onload=captionPosition; // Run on page load
window.onresize=captionPosition; // Run on window resize




    