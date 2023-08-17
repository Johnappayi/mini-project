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
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
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

  <div class="apply-wrapper">
    <div class="apply-img">
      <div class="apply-heading">
        <h3>Apply Now</h3>
      </div>
    </div>
    <form class="apply-input" method="post" action="Apply_Push.php" required>
      <div class="apply-in-row">
        <input type="text" placeholder="First Name" name="firstName" id="firstName" required/>
        <input type="text" placeholder="Last Name" name="lastName" id="lastName" required/>
      </div>
      <div class="apply-in-row">
        <input type="text" placeholder="Occupation" name="occupation" id="occupation" required/>
        <input type="text" placeholder="Experience" name="experience" id="experience" required/>
      </div>
      <div class="apply-in-row">
        <input type="text" placeholder="Email Address" name="email" id="email" required/>
        <input type="text" placeholder="Contact No." name="number" id="number" required/>
      </div>
      <div class="apply-in-row">
        <input type="text" placeholder="Date of birth" name="dob" id="dob" onfocus="(this.type='date')" required/>
        <input type="text" placeholder="Address" name="address" id="address" required/>
      </div>
      <div class="apply-in-row" style="justify-content: flex-end;">
        <button type="submit" name="apply_submit" class="lar-pri-btn-1">SUBMIT
      </div>
  </div>
  </form>
  </div>
</body>

</html>