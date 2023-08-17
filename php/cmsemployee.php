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
          <div class="nav-row active">
            <img src="../Resources/Icons/employee-2.svg" />
            <a href="./cmsemployee.php">
              <h5>Employee</h5>
            </a>
          </div>
          <div class="nav-row">
            <img src="../Resources/Icons/project.svg" />
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
          <form id="emp_search_form" method="post" class="search-bar">
            <input type="text" id="search_emp_txt" name="search_emp_txt" placeholder="Search Employee here..." />
            <img onclick="submit_emp_form()" src="../Resources/Icons/search btn.svg">
          </form>
          <button id="newemp_btn" class="cta-btn-2">
            <img src="../Resources/Icons/plus.svg" />
            <h6>New Employee</h6>
          </button>
        </div>

        <div class="emp-row">
          <div class="emp-row-sec " id="emp-det-wrap" style="max-height: 450px;">
            <div>
              <h3>Employee Detail</h3>
              <div class="sort-filter"></div>
            </div>
            <hr class="thick_hr" />
            <div class="emp-detail-container" id="emp-detail-container">
            </div>
          </div>
        </div>

        <div class="emp-row" id="emp-des-wrap" style="display: none;">
          <div class="emp-row-sec">
            <div class="edit-div">
              <h3>Employee Description</h3>
              <div class="cta-btn-1" id="edit-btn"><img src="../Resources/Icons/edit icon.svg">Edit</div>
            </div>
            <hr />
            <div class="emp-description-container" id="emp-description-container"></div>
          </div>
        </div>
      </div>

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

      <section id="new_emp" class="newemp-wrap" style="display: none;">
        <button class="closebtn" id="newemp_close">
          <img src="../Resources/Icons/close button.png">
        </button>
        <div class="newemp-head">
          <div class="newemp-headtxt">
            <h2>Employee Application</h2>
            <hr />
            <p>Please complete the form.</p>
          </div>
        </div>
        <br />
        <br />
        <br />
        <form action="NewEmp_Push.php" method="post" class="new_form">
          <div class="newemp-row2">
            <div class="newemp-input">
              <h3>Full Name</h3>
              <div class="newemp-txt">
                <input type="text" placeholder="First Name" name="firstName" id="firstName" required />
                <input type="text" placeholder="Last Name" name="lastName" id="lastName" required />
              </div>
            </div>
            <div class="newemp-input">
              <h3>Basic Salary</h3>
              <input type="text" placeholder="Salary" name="salary" id="salary" />
            </div>
          </div>
          <div class="newemp-row1">
            <h3>Residential Address</h3>
            <div class="newemp-txt">
              <input type="text" placeholder="Street Address" name="street" id="street" />
              <input type="text" placeholder="Line Name" name="line" id="line" />
              <input type="text" placeholder="City" name="city" id="city" required />
            </div>
            <div class="newemp-txt">
              <input type="text" placeholder="State / Povince" name="state" id="state" required />
              <input type="text" placeholder="Postal / Zip code" name="zip" id="zip" required />
            </div>
          </div>
          <div class="newemp-row2">
            <div class="newemp-input">
              <h3>Birth Date</h3>
              <input type="date" placeholder="Date of Birth" name="dob" id="dob" />
            </div>
            <div class="newemp-input">
              <h3>Email Address</h3>
              <input type="text" placeholder="Email address" name="email" id="email" />
            </div>
            <div class="newemp-input">
              <h3>Contact Number</h3>
              <input type="text" placeholder="Phone number" name="number" id="number" />
            </div>
          </div>
          <div class="newemp-row2">
            <div class="newemp-input">
              <h3>Date of Joining</h3>
              <input type="date" placeholder="Date of employement" name="doe" id="doe" />
            </div>
            <div class="newemp-input">
              <h3>Designation</h3>
              <input type="text" placeholder="Postion" name="designation" id="designation" />
            </div>
            <div class="newemp-input">
              <h3>Employee Id</h3>
              <input type="text" placeholder="Emp-Id" name="empid" id="empid" required />
            </div>
          </div>
          <div class="newemp-regbtn">
            <button type="submit" name="newemp_submit" class="cta-btn-2">
              <h5>Register</h5>
            </button>
          </div>
        </form>
      </section>
    </div>
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
    <section id="emp-edit" style="display: none">
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
      <form id="editEmpForm" action="edit_emp.php" method="post" class="new_form">
        <div class="newemp-row2">
          <div class="newemp-row1">
            <input type="hidden" id="employeeId" name="employeeId">
            <label for="firstName">First Name:</label>
            <input type="text" name="firstNameE" id="firstNameE" required />
          </div>
          <div class="newemp-row1">
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastNameE" id="lastNameE" required />
          </div>
        </div>
        <div class="newemp-row1">
          <h5>Residential Address</h5>
          <div class="newemp-txt">
            <input type="text" placeholder="Street Address" name="streetE" id="streetE" />
            <input type="text" placeholder="Line Name" name="lineE" id="lineE" />
            <input type="text" placeholder="City" name="cityE" id="cityE" required />
          </div>
          <div class="newemp-txt">
            <input type="text" placeholder="State / Povince" name="stateE" id="stateE" required />
            <input type="text" placeholder="Postal / Zip code" name="zipE" id="zipE" required />
          </div>
        </div>
        <div class="newemp-row2">
          <div class="newemp-row1">
            <label for="dob">Date of Birth:</label>
            <input type="text" name="dobE" id="dobE" onfocus="(this.type='date')" />
          </div>
          <div class="newemp-row1">
            <label for="email">Email:</label>
            <input type="text" name="emailE" id="emailE" />
          </div>
          <div class="newemp-row1">
            <label for="number">Phone number:</label>
            <input type="text" name="numberE" id="numberE" />
          </div>
        </div>
        <div class="newemp-row2">
          <div class="newemp-row1">
            <label for="doe">Date of employement:</label>
            <input type="text" name="doeE" id="doeE" onfocus="(this.type='date')" />
          </div>
          <div class="newemp-row1">
            <label for="designation">Designation:</label>
            <input type="text" name="designationE" id="designationE" />
          </div>
          <input type="submit" value="Save">
        </div>
      </form>
    </section>
  </div>
  <script src="../js/newEmp.js"></script>
  <script src="../js/changeDP.js"></script>
  <script src="../js/fetchEmp.js"></script>
  <script src="../js/search.js"></script>
  <script src="../js/clickEmp.js"></script>
  <script src="../js/editEmp.js"></script>
  <script src="../js/notification.js"></script>

</body>

</html>