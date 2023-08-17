var emp_id ='';

function handleEmpClick(event, id) {
  var rowId = id;
  const selectedRow = document.getElementById(rowId);
  const rowElements = selectedRow.children;
  emp_id = rowElements[1].textContent;// Get the text content of the div element
  // console.log(emp_id);
  if (event.target.id == "delete-icon") {
    if (window.confirm('Are you sure you want to proceed?')) {
      console.log(emp_id);
      fetch('delete_emp.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `emp_id=${encodeURIComponent(emp_id)}`
      }).then((response) => response.text())
        .then(text => {
          if (text == 'true') {
            console.log("deletion success");
            selectedRow.remove();

          } else {
            console.log("deletion failed");
          }

        }).catch((error) => {
          console.log("Error fetching data: ", error);
        });
    } else {
      // User clicked "Cancel" or closed the dialog
      console.log('User canceled.');
      // Add any alternative actions or code here
    }
  } else {
    const firstWrap = document.getElementById("emp-det-wrap");
    firstWrap.style.maxHeight = "200px";
    const firstCon = document.getElementById("emp-detail-container");
    firstCon.style.maxHeight = "80%";

    const secondWrap = document.getElementById("emp-des-wrap");
    secondWrap.style.display = "flex";

    fetch('fetch_empDesc.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: `emp_id=${encodeURIComponent(emp_id)}`
    }).then((response) => response.text())
      .then((data) => {
        document.getElementById("emp-description-container").innerHTML = data;

      }).catch((error) => {
        console.log("Error fetching data: ", error);
      });
  }
}



function addELemp() {
  var parentContainer = document.getElementById("emp-detail-container");
  var childElements = parentContainer.children;
  for (let i = 0; i < childElements.length; i++) {
    const child = childElements[i];
    const uniqueID = 'dyn-row-' + i;
    child.id = uniqueID;
    child.addEventListener("click", (e) => handleEmpClick(e, uniqueID), false);
  }
};

