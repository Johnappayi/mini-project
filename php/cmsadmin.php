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
          <div class="nav-row active">
            <img src="../Resources/Icons/home-2.svg" />
            <a href="./cmsadmin.php">
              <h5>Home</h5>
            </a>
          </div>
          <div class="nav-row">
            <img src="../Resources/Icons/employee.svg" />
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

    <div class="dynamic-sec" id="dynamic-sec">
      <div class="dyn-header" id="dyn-header">
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
        <div class="home-row">
          <div class="row-sec enquiries">
            <h3>Enquiries</h3>
            <hr />
            <div class="enquiries-container" id="enquiries-container"></div>
          </div>
          <div class="row-sec recruitment">
            <h3>Recruitments</h3>
            <hr />
            <div class="recruitment-container" id="recruitment-container"></div>
          </div>
        </div>
        <div class="home-row">
          <div class="row-sec announcement_admin ">
            <h3>Announcement</h3>
            <hr />
            <textarea placeholder="Write the message here" class="message-input" id="admin-announce"></textarea>
            <button class="cta-btn-1" style="margin-left: auto" id="send-announce">Send</button>
          </div>
          <div class="row-sec planner">
            <h3>Planner</h3>
            <hr />
            <div class="planner-container">
              <iframe src="https://calendar.google.com/calendar/embed?src=20-6670%40marian.ac.in&ctz=UTC" style="border: 0 ;width:100%; height:100% ;" frameborder="0" ></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section id="recSection" class="rec-wrap" style="display: none;">
      <!-- style="display: none;" -->
      <div class="enq-head">
        <div class="enq-headtxt">
          <h2>Candidate Profile</h2>
          <hr />
          <p> Here's the information of applicant</p>
        </div>
        <button class="closebtn" id="rec_close" style="align-self: flex-start;">
          <img src="../Resources/Icons/close button.png">
        </button>
      </div>
      <br />
      <div class="rec-container" id="rec-container">
      </div>
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
    <section id="enqSection" class="enq-wrap" style="display: none;">
      <div class="enq-head">
        <div class="enq-headtxt">
          <h2>Enquiry Information</h2>
          <hr />
          <div>
            <!-- <h6>Someone tried to reach you</h6> -->
            <p> Here's all the info we gathered</p>
          </div>
        </div>
        <button class="closebtn" id="enq_close" style="align-self: flex-start;">
          <img src="../Resources/Icons/close button.png">
        </button>
      </div>
      <br />
      <div class="enq-container" id="enq-container"></div>
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
  <script src="../js/changeDP.js"></script>
  <script src="../js/fetchAdmin.js"></script>
  <script src="../js/clickAdmin.js"></script>
  <script src="../js/notification.js"></script>


</body>

</html>