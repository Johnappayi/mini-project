var editButton = document.getElementById("edit-btn");
var editEmpSection = document.getElementById("emp-edit");
var editEmpCloseBtn = document.getElementById("edit_close");

// NEW EMPLOYEE SECTON
editButton.addEventListener("click",function() {
    editEmpSection.style.display = "flex";
    fetchEmployee();
});
editEmpCloseBtn.addEventListener("click",function(){
    editEmpSection.style.display = "none";
});


function fetchEmployee() {
    const employeeId = emp_id;
    fetch('get_employee.php?id2=' + employeeId)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
           
            // Update the form fields with the retrieved data
            document.getElementById('employeeId').value = data.user_id;
            document.getElementById('firstNameE').value = data.firstname;
            document.getElementById('lastNameE').value = data.lastname;
            document.getElementById('streetE').value = data.street;
            document.getElementById('lineE').value = data.line;
            document.getElementById('cityE').value = data.city;
            document.getElementById('stateE').value = data.state;
            document.getElementById('zipE').value = data.zip;
            document.getElementById('dobE').value = data.dob;
            document.getElementById('emailE').value = data.email;
            document.getElementById('numberE').value = data.number;
            document.getElementById('doeE').value = data.dob_join;
            document.getElementById('designationE').value = data.designation;
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle error case
        });
}

// Submit form using AJAX
document.getElementById('editEmpForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent form submission

    var form = e.target;
    var formData = new FormData(form);

    // Make an AJAX request to update the employee data
    fetch('edit_emp.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            // Handle the response
            if (data.success) {
                // Display a success message or redirect to another page
                alert('Employee details updated successfully!');
            } else {
                // Display an error message
                console.log(data);
                alert('Error updating employee details: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle error case
        });
    // Make an AJAX request to update the employee data using fetch API for this
    // On successful update, display a success message or redirect to another page
});