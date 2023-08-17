var openButton = document.getElementById("changedp_btn");
var section = document.getElementById("change_dp");
var closeButton = document.getElementById("changeDP_close");


openButton.addEventListener("click",function() {
   
    section.style.display = "flex";

});
closeButton.addEventListener("click",function(){
    section.style.display = "none";

});
