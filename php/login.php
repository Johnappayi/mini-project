<?php include('server.php') ?>
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
    <link
      href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <section class="login-wrap">
      <div class="login-img">
        <img src="../Resources/Images/login.png" alt="ACE Builders Logo" />
      </div>
      <div class="login-card">
        <div class="login-logo">
          <img
            src="../Resources/Assets/Horizontal.png"
            alt="ACE Builders Logo"
          />
        </div>
        <br />
        <h2 style="font-weight: 600; color: var(--col1)">Log In</h2>
        <form method="post" action="login.php">
        <?php include('errors.php') ?>
        <div class="login-input">
          <input type="text" placeholder="Emp-Id" name="user_id" />
          <input type="password" placeholder="Password" name="password"/>
        </div>
        <button type="submit" name="login_user" class="lar-pri-btn-1" style="align-self: flex-end">SUBMIT</button>
        </form>
      </div>
    </section>
  </body>
</html>
