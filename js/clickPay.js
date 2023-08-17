var emp1_id='';

function handlePayClick(event, id) {
    var rowId = id;
    const selectedRow = document.getElementById(rowId);
    const rowElements = selectedRow.children;
    emp1_id = rowElements[0].textContent; // Get the text content of the div element


    const firstWrap = document.getElementById("pay-det-wrap");
    firstWrap.style.maxHeight = "180px";
    const firstCon = document.getElementById("pay-detail-container");
    firstCon.style.maxHeight = "40%";

    const secondWrap = document.getElementById("pay-des-wrap");
    secondWrap.style.display = "flex";

    fetch('fetch_payDesc.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `emp_id=${encodeURIComponent(emp1_id)}`
    }).then((response) => response.text())
        .then((data) => {
            document.getElementById("pay-description-container").innerHTML = data;

        }).catch((error) => {
            console.log("Error fetching data: ", error);
        });
}




function addELpay() {
    var parentContainer = document.getElementById("pay-detail-container");
    var childElements = parentContainer.children;
    for (let i = 0; i < childElements.length; i++) {
        const child = childElements[i];
        const uniqueID = 'dyn-row-' + i;
        child.id = uniqueID;
        child.addEventListener("click", (e) => handlePayClick(e, uniqueID), false);
    }
};

