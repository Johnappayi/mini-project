function submit_pro_form() {
    var form = document.getElementById("pro_search_form");

    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'search_pro.php');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            // Handle the response from the PHP file
            if (xhr.status === 200) {
                // Request successful
                var response = xhr.responseText;
                document.getElementById('pro-detail-container').innerHTML = response;
                var innerDivs= document.querySelectorAll(".dyn-row-id");
                innerDivs.forEach(innerDiv => {
                    innerDiv.classList.add('hide-user-id');  // Add the class to hide the elements
                    // element.classList.remove('hidden'); // Remove the class to show the elements
                  });
                  addELpro();

            } else {
                // Request failed
                console.error('Error:', xhr.status);
            }
        }
    };
    xhr.send(formData);

}

function submit_emp_form() {
    var form = document.getElementById("emp_search_form");

    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'search_emp.php');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            // Handle the response from the PHP file
            if (xhr.status === 200) {
                // Request successful
                var response = xhr.responseText;
                document.getElementById('emp-detail-container').innerHTML = response;
                var innerDivs= document.querySelectorAll(".dyn-row-id");
                innerDivs.forEach(innerDiv => {
                    innerDiv.classList.add('hide-user-id');  // Add the class to hide the elements
                    // element.classList.remove('hidden'); // Remove the class to show the elements
                  });

                addELemp();

            } else {
                // Request failed
                console.error('Error:', xhr.status);
            }
        }
    };
    xhr.send(formData);
}


function submit_time_form() {
    var form = document.getElementById("time_search_form");

    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'search_time.php');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            // Handle the response from the PHP file
            if (xhr.status === 200) {
                // Request successful
                var response = xhr.responseText;
                document.getElementById('timesheet-container').innerHTML = response;
                var innerDivs= document.querySelectorAll(".dyn-row-id");
                innerDivs.forEach(innerDiv => {
                    innerDiv.classList.add('hide-user-id');  // Add the class to hide the elements
                    // element.classList.remove('hidden'); // Remove the class to show the elements
                  });

                // addELemp();

            } else {
                // Request failed
                console.error('Error:', xhr.status);
            }
        }
    };
    xhr.send(formData);
}

function submit_pay_form() {
    var form = document.getElementById("pay_search_form");

    const formData = new FormData(form);
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'search_pay.php');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            // Handle the response from the PHP file
            if (xhr.status === 200) {
                // Request successful
                var response = xhr.responseText;
                document.getElementById('pay-detail-container').innerHTML = response;
                var innerDivs= document.querySelectorAll(".dyn-row-id");
                innerDivs.forEach(innerDiv => {
                    console.log(innerDiv);
                    innerDiv.classList.add('hide-user-id');  // Add the class to hide the elements
                    // element.classList.remove('hidden'); // Remove the class to show the elements
                  });
                addELpay();

            } else {
                // Request failed
                console.error('Error:', xhr.status);
            }
        }
    };
    xhr.send(formData);
}