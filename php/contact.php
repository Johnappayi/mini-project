<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ACEBuilders</title>
  <link rel="stylesheet" href="../Style/styles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:wght@400;500;600&display=swap"
    rel="stylesheet" />
</head>

<body>
  <!--Navigation Bar-->
  <header>
    <!--Logo-->
    <img src="../Resources/Assets/Logo white.png" alt="ACE Builders Logo" srcset="" class="brand-logo" />
    <!--Nav options-->
    <div class="main-nav">
      <a href="../html/index.html">Home</a>
      <a href="../html/services.html">Services</a>
      <a href="../html/project.html">Projects</a>
      <a href="./contact.php">Contact Us</a>
      <a href="../html/about.html">About</a>
    </div>
    <!--Login-->
    <div class="login-nav">
      <a href="./login.php">
        <div class="med-pri-btn-3">Log In</div>
      </a>
    </div>
  </header>
  <!-- Contact Us Page -->
  <section id="contact">
    <div class="contact-img"></div>
    <div class="contact-txt-container">
      <h1 class="center">Get In Touch</h1>
      <br>
      <div>
        <form action="Cont_Push.php" method="post" class="contact_form">
          <input type="text" placeholder="First Name" name="firstName" id="firstName" />
          <input type="text" placeholder="Last Name" name="lastName" id="lastName" />
          <input type="text" placeholder="Email" name="email" id="email" />
          <input type="text" placeholder="Contact No." name="number" id="number"/>
          <br />
          <input type="text" placeholder="Message" class="message-input" name="message" id="message"/>
          <button type="submit" name="contact_submit" class="lar-pri-btn-1" >SUBMIT</button>
        </form>
      </div>
    </div>
  </section>
  <div class="footer">
      <div class="foot-wrap">
        <div
          class="foot-sec"
          style="flex-basis: 39%;justify-content: center"
        >
          Thank you for using our services. If you have any further questions or
          need assistance, please don't hesitate to reach out to us.<br />
          <br /><span style="font-size:.9rem; color: var(--col2)">NIGHTROSE CREATION Copyright reserved.</span>
        </div>

        <div class="foot-sec">
          <h5>SITEMAP</h5>
          <br />
          <a href="../services.html">Services</a>
          <a href="../project.html">Projects</a>
          <a href="../php/contact.php">Contact Us</a>
          <a href="../html/about.html">About</a>
        </div>
        <div class="foot-sec">
          <h5>ACTIVITY</h5>
          <br />
          <a href="../php/contact.php">Get a Qoute</a>
          <a href="../php/apply.php">Apply Now</a>
        </div>
        <img
          src="../Resources/Assets/Logo white.png"
          alt="ACE Builders Logo"
          srcset=""
          class="brand-logo"
        />
      </div>
    </div>
</body>

</html>