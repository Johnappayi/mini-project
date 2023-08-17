function fetchReqData() {
    fetch("fetch_app.php")
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("recruitment-container").innerHTML = data; 
            addELrec();
        })
        .catch((error) => {
            console.log("Error fetching data: ", error);
        });
}

function fetchEnqData() {
    fetch("fetch_enq.php")
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("enquiries-container").innerHTML = data;
            
            var innerDivs= document.querySelectorAll(".dyn-row-id");
            innerDivs.forEach(innerDiv => {
                innerDiv.classList.add('hide-user-id');  // Add the class to hide the elements
              });
            addELenq();
        })
        .catch((error) => {
            console.log("Error fetching data: ", error);
        });
}

window.onload = function () {
    fetchEnqData();
    fetchReqData();
};
