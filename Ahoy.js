/* ######################################
              Sticky Footer
   ###################################### */

var mainContent = document.getElementById("main-content");
var footer = document.getElementById("site-footer");

function stickyFooter() {
	mainContent.style.paddingBottom = String(footer.offsetHeight) + "px";
}

window.onresize = stickyFooter();
window.onload = stickyFooter();