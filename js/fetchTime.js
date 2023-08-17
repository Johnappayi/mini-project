
function fetchTimesheet(){
    fetch("fetch_time.php")
    .then((response) => response.text())
    .then((data) => {
        document.getElementById("timesheet-container").innerHTML = data;
        
        var innerDivs= document.querySelectorAll(".dyn-row-id");
        innerDivs.forEach(innerDiv => {
            innerDiv.classList.add('hide-user-id');  // Add the class to hide the elements
          });
        
        // addELemp();
    })
    .catch((error) => {
        console.log("Error fetching data: ", error);
    });
}

window.onload = function () {
    fetchTimesheet();
};