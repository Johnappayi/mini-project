
function fetchEmpData() {
    fetch("fetch_emp.php")
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("emp-detail-container").innerHTML = data;
            
            var innerDivs= document.querySelectorAll(".dyn-row-id");
            innerDivs.forEach(innerDiv => {
                innerDiv.classList.add('hide-user-id');  // Add the class to hide the elements
                // element.classList.remove('hidden'); // Remove the class to show the elements
              });
            
            addELemp();
        })
        .catch((error) => {
            console.log("Error fetching data: ", error);
        });
}

window.onload = function () {
    fetchEmpData();
};
