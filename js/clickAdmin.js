document.getElementById("send-announce").addEventListener("click", function () {
    var message = document.getElementById("admin-announce").value;

    if (window.confirm('Confirm Submission?')) {
        fetch("send_announce.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "announce_msg=" + encodeURIComponent(message)
        })
            .then(function (response) {
                if (response.ok) {
                    return response.text();
                }
                throw new Error("Error: " + response.status);
            })
            .then(function (data) {
                console.log(data);
                // You can perform any additional actions here
            })
            .catch(function (error) {
                console.log(error);
            });

        document.getElementById("admin-announce").value = '';
    };
});



function handleEnqClick(event, id) {
    var rowId = id;
    var bg = document.getElementById('dynamic-sec')
    bg.classList.add("blur");
    const selectedRow = document.getElementById(rowId);
    const rowElements = selectedRow.children;
    const enq_id = rowElements[0].textContent; // Get the text content of the div element
    var enqSection = document.getElementById("enqSection");
    enqSection.style.display = "flex";
    var enqClose = document.getElementById("enq_close");
    enqClose.addEventListener("click", function () {
        enqSection.style.display = "none";
        bg.classList.remove("blur");
    });

    fetch('fetch_enqUser.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `enq_id=${encodeURIComponent(enq_id)}`
    }).then((response) => response.text())
        .then((data) => {
            document.getElementById("enq-container").innerHTML = data;

        }).catch((error) => {
            console.log("Error fetching data: ", error);
        });
}
function addELenq() {
    var parentContainer = document.getElementById("enquiries-container");
    var childElements = parentContainer.children;
    for (let i = 0; i < childElements.length; i++) {
        const child = childElements[i];
        const uniqueID = 'dyn-row-enq' + i;
        child.id = uniqueID;
        child.addEventListener("click", (e) => handleEnqClick(e, uniqueID), false);
    }
};

function handleRecClick(event, id) {
    var rowId2 = id;
    var bg = document.getElementById('dynamic-sec')
    bg.classList.add("blur");
    const selectedRow = document.getElementById(rowId2);
    const rowElements = selectedRow.children;
    var applicantID = rowElements[0].textContent; // Get the text content of the div element
    var appSection = document.getElementById("recSection");
    appSection.style.display = "flex";
    var recClose = document.getElementById("rec_close");
    recClose.addEventListener("click", function () {
        appSection.style.display = "none";
        bg.classList.remove("blur");
    });

    fetch('fetch_appUser.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `applicantID=${encodeURIComponent(applicantID)}`
    }).then((response) => response.text())
        .then((data) => {
            document.getElementById("rec-container").innerHTML = data;

        }).catch((error) => {
            console.log("Error fetching data: ", error);
        });
}
function addELrec() {
    var parentContainer = document.getElementById("recruitment-container");
    var childElements = parentContainer.children;
    for (let i = 0; i < childElements.length; i++) {
        const child = childElements[i];
        const uniqueID = 'dyn-row-rec' + i;
        child.id = uniqueID;
        child.addEventListener("click", (e) => handleRecClick(e, uniqueID), false);
    }
};
