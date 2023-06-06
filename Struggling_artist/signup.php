<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="signupstyle.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      $(document).ready(function () {
        $('form').submit(function (event) {
          event.preventDefault();

          var formData = {
            name: $('input[name=name]').val(),
            email: $('input[name=email]').val(),
            password: $('input[name=password]').val()
          };

          $.ajax({
            type: 'POST',
            url: 'signup_back.php',
            data: formData,
            success: function () {
              // Redirect to message.php after successful signup
              window.location.href = 'message.php';
            },
            error: function () {
              // Redirect to signup.php if an error occurs
              window.location.href = 'signup.php';
            }
          });
        });
      });
    </script>
  </head>
  <body>
    <header class="header">
      <nav>
        <ul class="nav_links">
          <li><a href="HomePage.html" style="text-decoration: none">HOME</a></li>
          <li><a href="Gallerie.html" style="text-decoration: none">GALLERY</a></li>
          <li><a href="About.html" style="text-decoration: none">ABOUT</a></li>
          <li><a href="#" style="text-decoration: none">ACCOUNT</a></li>
        </ul>
      </nav>
    </header>

    <div class="container">
      <div class="screen-1">
        <div class="logo">
          <a href="HomePage.html">
            <img src="C:\Users\harma\Downloads\LOGO.jpg" alt="Logo" />
          </a>
        </div>
        <form>
          <div class="name">
            <ion-icon name="person-outline"></ion-icon>
            <input type="text" name="name" placeholder="Name" required />
          </div>
          <div class="email">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="text" name="email" placeholder="Email" required />
          </div>
          <div class="password">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" name="password" placeholder="Password" required />
          </div>
          <button type="submit" class="signup-button">SIGN UP</button>
        </form>
      </div>
    </div>
  </body>
</html>
