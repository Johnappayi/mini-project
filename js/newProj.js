var newProButton = document.getElementById("newpro_btn");
var newProSection = document.getElementById("new_proj");
var newProjCloseBtn = document.getElementById("newproj_close");

// NEW PROJECT SECTION
newProButton.addEventListener("click",function() {
    newProSection.style.display = "flex";
});
newProjCloseBtn.addEventListener("click",function(){
    newProSection.style.display = "none";
});