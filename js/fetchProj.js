function fetchProData() {
    fetch("fetch_pro.php")
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("pro-detail-container").innerHTML = data;

            var innerDivs= document.querySelectorAll(".dyn-row-id");
            innerDivs.forEach(innerDiv => {
                innerDiv.classList.add('hide-user-id');  // Add the class to hide the elements
                // element.classList.remove('hidden'); // Remove the class to show the elements
              });

              addELpro();
        })
        .catch((error) => {
            console.log("Error fetching data: ", error);
        });
}

window.onload = function () {
    fetchProData();
};