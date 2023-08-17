var newEmpButton = document.getElementById("newemp_btn");
var newEmpSection = document.getElementById("new_emp");
var newEmpCloseBtn = document.getElementById("newemp_close");

// NEW EMPLOYEE SECTON
newEmpButton.addEventListener("click",function() {
    newEmpSection.style.display = "flex";
});
newEmpCloseBtn.addEventListener("click",function(){
    newEmpSection.style.display = "none";
});

