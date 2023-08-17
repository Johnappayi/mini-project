function fetchPayroll(){
    fetch("fetch_pay.php")
    .then((response) => response.text())
    .then((data) => {
        document.getElementById("pay-detail-container").innerHTML = data;
        
        var innerDivs= document.querySelectorAll(".dyn-row-id");
        innerDivs.forEach(innerDiv => {
            innerDiv.classList.add('hide-user-id');  // Add the class to hide the elements
          });
        
        addELpay();
    })
    .catch((error) => {
        console.log("Error fetching data: ", error);
    });
}

window.onload = function () {
    fetchPayroll();
    
};