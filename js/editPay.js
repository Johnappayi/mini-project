var editButton = document.getElementById("edit-btn");
var editPaySection = document.getElementById("pay-edit");
var editPayCloseBtn = document.getElementById("editpay_close");

// NEW EMPLOYEE SECTON
editButton.addEventListener("click",function() {
    editPaySection.style.display = "flex";
    fetchPayrollEdit();
});
editPayCloseBtn.addEventListener("click",function(){
    editPaySection.style.display = "none";
});


function fetchPayrollEdit() {
    const empID = emp1_id ;
    fetch('get_payroll.php?id2=' + empID)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data); // Log the response data
            // Update the form fields with the retrieved data
            document.getElementById('employeeId').value = data.user_id;
            document.getElementById('firstNameE').value = data.firstname;
            document.getElementById('lastNameE').value = data.lastname;
            document.getElementById('salaryE').value = data.salary;
            document.getElementById('overtime_hrE').value = data.overtime_hour;
            document.getElementById('overtime_rtE').value = data.overtime_rate;
            document.getElementById('food_allowE').value = data.food_allow;
            document.getElementById('house_allowE').value = data.house_allow;
            document.getElementById('tax_redE').value = data.tax_reduction;
            document.getElementById('property_damE').value = data.property_damage;
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle error case
        });
}

// Submit form using AJAX
document.getElementById('editPayForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent form submission

    var form = e.target;
    var formData = new FormData(form);

    // Make an AJAX request to update the employee data
    fetch('edit_pay.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            // Handle the response
            if (data.success) {
                // Display a success message or redirect to another page
                alert('Payroll details updated successfully!');
            } else {
                // Display an error message
                alert('Error updating payroll details: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle error case
        });

    // Make an AJAX request to update the employee data using fetch API for this
    // On successful update, display a success message or redirect to another page
});