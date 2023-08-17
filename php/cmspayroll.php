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
          <div class="nav-row ">
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
          <div class="nav-row active">
            <img src="../Resources/Icons/payroll-2.svg" />
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
          <form id="pay_search_form" method="post" class="search-bar">
            <input type="text" id="search_pay_txt" name="search_pay_txt" placeholder="Search Project here..." />
            <img onclick="submit_pay_form()" src="../Resources/Icons/search btn.svg">
          </form>
          <!-- 
          <a>
            <div class="cta-btn-2">
              <img src="../Resources/Icons/edit-2.svg" />
              <h6>Edit</h6>
            </div>
          </a> -->
        </div>
        <div class="emp-row">
          <div class="emp-row-sec " id="pay-det-wrap" style="max-height: 450px; ">
            <div>
              <h3>Payroll Sheet</h3>
              <div class="sort-filter"></div>
            </div>
            <div class="dyn-row" style="padding-left:1%; background-color: var(--col1); color: var(--stroke); margin-top:5px; border-radius: 12px 12px 0px 0px;">
              <div style="flex-basis:50%; text-transform: capitalize;">EMPLOYEE NAME</div>
              <div>BASIC SALARY</div>
              <div style="color: var(--stroke);">NET PAY</div>
            </div>
            <div class="pay-detail-container" id="pay-detail-container"></div>
          </div>
        </div>
        <div class="emp-row" id="pay-des-wrap" style="display: none;">
          <div class="emp-row-sec">
            <div class="edit-div">
              <h3>Payment Breakdown</h3>
              <div class="cta-btn-1" id="edit-btn"><img src="../Resources/Icons/edit icon.svg">Edit</div>
            </div>

            <hr />

            <div class="pay-description-container" id="pay-description-container"></div>
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
    <section id="pay-edit" style="display:none;">
      <button class="closebtn" id="editpay_close">
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
      <form id="editPayForm" action="edit_pay.php" method="post" class="new_form">
        <div class="newemp-row2">
          <div class="newemp-row1">
            <input type="hidden" id="employeeId" name="employeeId">
            <label for="firstNameE">First Name</label>
            <input type="text" name="firstNameE" id="firstNameE" required />
          </div>
          <div class="newemp-row1">
            <label for="lastNameE">Last Name</label>
            <input type="text" name="lastNameE" id="lastNameE" required />
          </div>
        </div>
        <div class="newemp-row2">
          <div class="newemp-row1">
            <label for="overtime_hrE">Overtime Hours</label>
            <input type="text" name="overtime_hrE" id="overtime_hrE" required />
          </div>
          <div class="newemp-row1">
            <label for="overtime_rtE">Overtime Rate</label>
            <input type="text" name="overtime_rtE" id="overtime_rtE" required />
          </div>
        </div>
        <div class="newemp-row2">
          <div class="newemp-row1">
            <label for="property_damE">Property Damage</label>
            <input type="text" name="property_damE" id="property_damE" required />
          </div>
          <div class="newemp-row1">
            <label for="tax_redE">Tax Reductions</label>
            <input type="text" name="tax_redE" id="tax_redE" required />
          </div>
        </div>
        <div class="newemp-row2">
          <div class="newemp-row1">
            <label for="house_allowE">House allowance</label>
            <input type="text" name="house_allowE" id="house_allowE" required />
          </div>
          <div class="newemp-row1">
            <label for="food_allowE">Food allowance</label>
            <input type="text" name="food_allowE" id="food_allowE" required />
          </div>
        </div>
        <div class="newemp-row2">
          <div class="newemp-row1">
            <label for="salaryE">Basic Salary</label>
            <input type="text" name="salaryE" id="salaryE" required />
          </div>
        </div>
        <input type="submit" value="Save" style="align-self: flex-end;">
      </form>
    </section>
  </div>
  <script src="../js/changeDP.js"></script>
  <script src="../js/fetchPay.js"></script>
  <script src="../js/search.js"></script>
  <script src="../js/clickPay.js"></script>
  <script src="../js/editPay.js"></script>
  <script src="../js/notification.js"></script>
</body>

</html>