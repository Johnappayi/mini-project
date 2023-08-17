var editButton = document.getElementById("edit-btn");
var editProSection = document.getElementById("pro-edit");
var editProCloseBtn = document.getElementById("edit_close");

// NEW EMPLOYEE SECTON
editButton.addEventListener("click",function() {
    editProSection.style.display = "flex";
    fetchProject();
});
editProCloseBtn.addEventListener("click",function(){
    editProSection.style.display = "none";
});



function fetchProject() {
    const projectId = proj_id ;
    fetch('get_project.php?id2=' + projectId)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data); // Log the response data
            // Update the form fields with the retrieved data
            document.getElementById('projectId').value = data.proj_id;
            document.getElementById('project_nameE').value = data.project_name;
            document.getElementById('pro_locE').value = data.location;
            document.getElementById('pro_manE').value = data.manager;
            document.getElementById('due_dateE').value = data.due_date;
            document.getElementById('expenseE').value = data.expense;
            document.getElementById('pro_statE').value = data.status;
            
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle error case
        });
}

// Submit form using AJAX
document.getElementById('editProForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent form submission

    var form = e.target;
    var formData = new FormData(form);

    // Make an AJAX request to update the employee data
    fetch('edit_pro.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            // Handle the response
            if (data.success) {
                // Display a success message or redirect to another page
                alert('Project details updated successfully!');
            } else {
                // Display an error message
                alert('Error updating project details: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle error case
        });
    // Make an AJAX request to update the employee data using fetch API for this
    // On successful update, display a success message or redirect to another page
});