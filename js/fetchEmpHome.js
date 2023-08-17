function fetchTimeData() {
    fetch("fetch_timeUser.php")
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("E_timesheet-container").innerHTML = data;

            var innerDivs = document.querySelectorAll(".dyn-row-id");
            innerDivs.forEach(innerDiv => {
                innerDiv.classList.add('hide-user-id');  // Add the class to hide the elements
            });
        })
        .catch((error) => {
            console.log("Error fetching data: ", error);
        });
}

function fetchAnnounceData() {
    fetch("fetch_announce.php")
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("E_announcement-container").innerHTML = data;

            var innerDivs = document.querySelectorAll(".dyn-row-id");
            innerDivs.forEach(innerDiv => {
                innerDiv.classList.add('hide-user-id');  // Add the class to hide the elements
            });
        })
        .catch((error) => {
            console.log("Error fetching data: ", error);
        });
}
function fetchInfoData() {
    fetch("fetch_empUser.php")
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("info-container").innerHTML = data;

            var innerDivs = document.querySelectorAll(".dyn-row-id");
            innerDivs.forEach(innerDiv => {
                innerDiv.classList.add('hide-user-id');  // Add the class to hide the elements
            });
        })
        .catch((error) => {
            console.log("Error fetching data: ", error);
        });
}
// function fetchLeaveData(){}
function fetchPayData() {
    fetch("fetch_payUser.php")
        .then((response) => response.text())
        .then((data) => {
            document.getElementById("payroll-container").innerHTML = data;

            var innerDivs = document.querySelectorAll(".dyn-row-id");
            innerDivs.forEach(innerDiv => {
                innerDiv.classList.add('hide-user-id');  // Add the class to hide the elements
            });
        })
        .catch((error) => {
            console.log("Error fetching data: ", error);
        });
}

window.onload = function () {
    fetchTimeData();
    fetchAnnounceData();
    fetchInfoData();
    fetchPayData() ;
};
