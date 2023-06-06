<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['name'])) {
  // Redirect to the login page or display an error message
  header('Location: login.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Message</title>
  <link rel="stylesheet" href="message_style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('form').submit(function(event) {
        event.preventDefault();

        var formData = {
          message: $('input[name=message]').val()
        };

        $.ajax({
          type: 'POST',
          url: 'message_back.php',
          data: formData,
          success: function(response) {
            alert('Message sent!');
            location.reload(); // Refresh the page after successful submission
          },
          error: function() {
            alert('Error occurred. Please try again.');
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
        <li><a href="account.html" style="text-decoration: none">ACCOUNT</a></li>
      </ul>
    </nav>
  </header>

  <div class="container">
    <h2 class="welcome">Welcome, <?php echo $_SESSION['name']; ?></h2>
    <form>
      <input type="text" name="message" placeholder="Enter the message you want to send to the artist" required>
      <button type="submit" class="submit-button">Submit</button>
    </form>
  </div>
</body>
</html>
