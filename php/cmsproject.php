<?php
// Start the session
session_start();
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  //Redirect the user to login page
  header("location: login.php");
  exit();
}

include 'upload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ACE BUILDERS</title>
  <link rel="stylesheet" href="../Style/styles2.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>

<body>
  <div class="wrapper">
    <div class="nav-sec">
      <div class="nav-sec-1">
        <div class="nav-logo">
          <img src="../Resources/Assets/Horizontal.png" alt="ACE Builders Logo" />
        </div>
        <div class="nav-dp">
          <?php include('getPP.php') ?>
          <div type="button" class="edit-icon" id="changedp_btn">
            <img src="../Resources/Icons/edit icon.svg" />
          </div>
        </div>
        <div class="nav-text">
          <h2 style="text-transform: capitalize;"><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></h2>
          <h4 style="text-transform: capitalize;"><?php echo $_SESSION['designation']; ?></h4>
        </div>
      </div>

      <div class="nav-sec-2">
        <div class="nav-bar">
          <div class="nav-row ">
            <img src="../Resources/Icons/home.svg" />
            <a href="./cmsadmin.php">
              <h5>Home</h5>
            </a>
          </div>
          <div class="nav-row ">
            <img src="../Resources/Icons/employee.svg" />
            <a href="./cmsemployee.php">
              <h5>Employee</h5>
            </a>
          </div>
          <div class="nav-row active">
            <img src="../Resources/Icons/project-2.svg" />
            <a href="./cmsproject.php">
              <h5>Project</h5>
            </a>
          </div>
          <div class="nav-row">
            <img src="../Resources/Icons/timesheet.svg" />
            <a href="./cmstimesheet.php">
              <h5>Time sheet</h5>
            </a>
          </div>
          <div class="nav-row">
            <img src="../Resources/Icons/payroll.svg" />
            <a href="./cmspayroll.php">
              <h5>Payroll</h5>
            </a>
          </div>
          <form method="post" action="logout.php" style="width: 100%;">
            <button class="nav-row" type="submit" name="logout_user">
              <img src="../Resources/Icons/logout.svg" />
              <h5>Log Out</h5>
            </button>
          </form>
        </div>
      </div>
    </div>

    <div class="dynamic-sec">
      <div class="dyn-header">
        <h1>Dashboard</h1>
        <div class="header-icons">
          <div>
            <div id="notification-count"></div>
            <img src="../Resources/Icons/notification.svg" id="notif-icon" class="notif-icon" />
          </div>
          <img src="../Resources/Icons/calendar.svg" />
          <img src="../Resources/Icons/setting-2.svg" />
        </div>
      </div>
      <h2 style="margin-top: 1.25rem; text-transform: capitalize;">Hello <?php echo $_SESSION['firstName']; ?></h2>
      <p style="margin-top: 0.5rem">Nice to have you back</p>

      <div class="dyn-body">
        <div class="search-cta">
          <form id="pro_search_form" method="post" class="search-bar">
            <input type="text" id="search_pro_txt" name="search_pro_txt" placeholder="Search Project here..." />
            <img onclick="submit_pro_form()" src="../Resources/Icons/search btn.svg">
          </form>
          <button id="newpro_btn" class="cta-btn-2">
            <img src="../Resources/Icons/plus.svg" />
            <h6>New Project</h6>
          </button>
        </div>

        <div class="emp-row">
          <div class="emp-row-sec " id="pro-det-wrap" style="max-height: 450px;">
            <div>
              <h3>Project Detail</h3>
              <div class="sort-filter"></div>
            </div>
            <hr class="thick_hr" />
            <div class="pro-detail-container" id="pro-detail-container">
            </div>
          </div>
        </div>

        <div class="emp-row" id="pro-des-wrap" style="display: none;">
          <div class="emp-row-sec">
            <div class="edit-div">
              <h3>Project Description</h3>
              <div class="cta-btn-1" id="edit-btn"><img src="../Resources/Icons/edit icon.svg">Edit</div>
            </div>
            <hr />
            <div class="pro-description-container" id="pro-description-container"></div>
          </div>
        </div>
      </div>

      <section id="new_proj" class="newpro-wrap" style="display: none;">
        <button class="closebtn" id="newproj_close">
          <img src="../Resources/Icons/close button.png">
        </button>
        <div class="newpro-headtxt">
          <h2>Project Application</h2>
          <hr />
          <p>Please complete the form.</p>
        </div>
        <br />
        <br />
        <form action="NewProj_Push.php" method="post" class="new_form">
          <div class="newpro-row">
            <div class="newpro-input">
              <h3>Project Name</h3>
              <input type="text" placeholder="Name of the project" name="proj_name" id="proj_name" required />
            </div>
            <div class="newpro-input">
              <h3>Location</h3>
              <input type="text" placeholder="Project Location" name="proj_loc" id="proj_loc" required />
            </div>
          </div>
          <div class="newpro-row">
            <div class="newpro-input">
              <h3>Manager</h3>
              <input type="text" placeholder="Project Incharge" name="Proj_man" id="Proj_man" required />
            </div>
            <div class="newpro-input">
              <h3>Due Date</h3>
              <input type="date" placeholder="Date of Completiion" name="doc" id="doc" required />
            </div>
          </div>
          <div class="newpro-row">
            <div class="newpro-input">
              <h3>Expense</h3>
              <input type="text" placeholder="Project cost" name="proj_cost" id="proj_cost" required />
            </div>
            <div class="newpro-input">
              <h3>Status</h3>
              <input type="text" placeholder="Current Status" name="Proj_status" id="Proj_status" required />
            </div>
          </div>
          <div class="newemp-regbtn">
            <button type="submit" name="newproj_submit" class="cta-btn-2">
              <h5>Create Project</h5>
            </button>
          </div>
        </form>
      </section>

      <section id="change_dp" class="changeDp-wrap" style="display: none;">
        <div class="changeDP-head">
          <h5>Change Your Profile Picture</h5>
          <button class="closebtn" id="changeDP_close">
            <img src="../Resources/Icons/close button.png">
          </button>
        </div>
        <div class="changeDP_frame">
          <?php include('getPP.php') ?>
        </div>
        <form action="" method="post" enctype="multipart/form-data" class="changeDP-form">
          <input type="file" name="file_upload" style="width: 197px ;">
          <input type="submit" name="pp_submit" value="Upload" class="cta-btn-2">
        </form>
      </section>
      <section id="notification-tab" class="notif-wrap" style="display: none;">
        <div class="notif-header">
          <h2>Notifications</h2>
          <button class="closebtn" id="notif_close">
            <img src="../Resources/Icons/close button.png">
          </button>
        </div>
        <hr>
        <div class="scrollable-notif" id="scrollable-notif"></div>
      </section>
    </div>
    <section id="pro-edit" style="display: none">
      <button class="closebtn" id="edit_close">
        <img src="../Resources/Icons/close button.png">
      </button>
      <div class="newemp-head">
        <div class="newemp-headtxt">
          <h2>Edit Application</h2>
          <hr />
          <p>Please complete the form.</p>
        </div>
      </div>
      <br />
      <br />
      <br />
      <form id="editProForm" action="edit_pro.php" method="post" class="new_form">
        <div class="newemp-row2">
          <div class="newemp-row1">
            <input type="hidden" id="projectId" name="projectId">
            <label for="project_nameE">Project Name:</label>
            <input type="text" name="project_nameE" id="project_nameE" required />
          </div>
          <div class="newemp-row1">
            <label for="pro_locE">Project location:</label>
            <input type="text" name="pro_locE" id="pro_locE" required />
          </div>
        </div>
        <div class="newemp-row2">
          <div class="newemp-row1">
            <label for="pro_manE">Manager:</label>
            <input type="text" name="pro_manE" id="pro_manE" />
          </div>
          <div class="newemp-row1">
            <label for="due_dateE">Due Date:</label>
            <input type="text" name="due_dateE" id="due_dateE" onfocus="(this.type='date')" />
          </div>
          <div class="newemp-row1">
            <label for="expenseE">Expense:</label>
            <input type="text" name="expenseE" id="expenseE" />
          </div>
        </div>
        <div class="newemp-row2">
          <div class="newemp-row1">
            <label for="pro_statE">Projectt Status:</label>
            <input type="text" name="pro_statE" id="pro_statE" />
          </div>
        </div>

        <br>
        <div class="newemp-row2" style="justify-content: flex-end;">
          <div class="newemp-row1">
            <input type="submit" value="Save">
          </div>
        </div>
  </div>
  </form>
  </section>
  </div>
  <script src="../js/newProj.js"></script>
  <script src="../js/changeDP.js"></script>
  <script src="../js/fetchProj.js"></script>
  <script src="../js/search.js"></script>
  <script src="../js/clickProj.js"></script>
  <script src="../js/editProj.js"></script>
  <script src="../js/notification.js"></script>
</body>

</html>