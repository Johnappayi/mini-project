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
   <div class="wrapper2">
      <div class="dyn-header">
         <div class="nav-logo2">
            <img src="../Resources/Assets/Horizontal.png" alt="ACE Builders Logo" />
         </div>
         <div class="dyn-header" style="justify-content: right" >
            <div class="header-icons">
             <div>
               <div id="notification-count"></div>
               <img src="../Resources/Icons/notification.svg" id="notif-icon" class="notif-icon" />
             </div>
            </div>   
         </div> 
         <form method="post" action="logout.php">
            <button class="cta-btn-4 " type="submit" name="logout_user">
               <img src="../Resources/Icons/logout2.svg" />
               <h5>Log Out</h5>
            </button>
         </form>
         
      </div> 
      <hr>
      <br>
      <div class="dyn-header">
         <div>
            <h1>Dashboard</h1>
            <h2 style="margin-top: 1.25rem; text-transform: capitalize;">Hello <?php echo $_SESSION['firstName']; ?></h2>
            <p style="margin-top: 0.5rem">Nice to have you back</p>
         </div>
      </div>
      <br>
      <div class="dyn-body2">
         <div class="row-sec information">
            <h3>Information</h3>
            <hr />
            <div class="E_info-wrap">
               <div class="nav-dp2">
                  <?php include('getPP.php') ?>
                  <div type="button" class="edit-icon" id="changedp_btn">
                     <img src="../Resources/Icons/edit icon.svg" />
                  </div>
               </div>
               <div class="info-container" id="info-container"></div>
            </div>

         </div>
         <div class="home-row2">
            <div class="row-sec announcement">
               <h3>Announcements</h3>
               <hr />
               <div class="E_A-container " id="E_announcement-container"></div>
            </div>

            <div class="row-sec payroll">
               <h3>Payroll Details</h3>
               <hr />
               <div class="payroll-container" id="payroll-container">
               </div>
            </div>
         </div>
         <div class="home-row2">
            <div class="row-sec timesheet">
               <h3>Monthly Timesheet</h3>
               <div class="dyn-row" style="padding-left:1%; background-color: var(--col1); color: var(--stroke); margin-top:5px; border-radius: 12px 12px 0px 0px;">
              <div style="flex-basis:30%; ">
                <p>EMPLOYEE NAME</p>
              </div>
              <div style="padding-right:4%;">
                <p>TIME-IN</p>
              </div>
              <div >
                <p>TIME-OUT</p>
              </div>
              <div>
                <p>TOTAL HRS</p>
              </div>
              <div>
                <p>EXTRA HRS</p>
              </div>
            </div>
               <div class="E_B-container" id="E_timesheet-container"></div>
            </div>
            <div class="row-sec statistic">
               <h3>Statistics</h3>
               <hr />
               <div class="E_B-container">
                  <div class="stat-con-row">
                     <p style="font-weight: 600;">Leaves</p>
                     <div class="stat-con-subrow">
                        <div class="stat-con-subrow-avail">
                           <p>Available:</p>
                           <div class="avail-circle">
                              <p id="E_leave">2</p>
                           </div>
                        </div>
                     </div>
                  </div>
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
      <script src="../js/changeDP.js"></script>
      <script src="../js/fetchEmpHome.js"></script>
      <script src="../js/notificationEMP.js"></script>

</body>

</html>