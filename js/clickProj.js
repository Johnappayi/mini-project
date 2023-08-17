var proj_id = '';

function handleProClick(event, id) {
    var rowId = id;
    const selectedRow = document.getElementById(rowId);
    const rowElements = selectedRow.children;
    proj_id = rowElements[0].textContent; // Get the text content of the div element
    console.log(proj_id);
    
    if (event.target.id == "delete-icon") {
  
      if (window.confirm('Are you sure you want to proceed?')) {
        fetch('delete_pro.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: `pro_id=${encodeURIComponent(proj_id)}`
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
      const firstWrap = document.getElementById("pro-det-wrap");
      firstWrap.style.maxHeight = "200px";
      const firstCon = document.getElementById("pro-detail-container");
      firstCon.style.maxHeight = "80%";
  
      const secondWrap = document.getElementById("pro-des-wrap");
      secondWrap.style.display = "flex";
  
      fetch('fetch_proDesc.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `pro_id=${encodeURIComponent(proj_id)}`
      }).then((response) => response.text())
        .then((data) => {
          document.getElementById("pro-description-container").innerHTML = data;
  
        }).catch((error) => {
          console.log("Error fetching data: ", error);
        });
    }
  }
  
  
  
  function addELpro() {
    var parentContainer = document.getElementById("pro-detail-container");
    var childElements = parentContainer.children;
    for (let i = 0; i < childElements.length; i++) {
      const child = childElements[i];
      const uniqueID = 'dyn-row-pro' + i;
      child.id = uniqueID;
      child.addEventListener("click", (e) => handleProClick(e, uniqueID), false);
    }
  };
  