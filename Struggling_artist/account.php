<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Account</title>
    <link rel="stylesheet" href="loginstyle.css">
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            const form = document.getElementById('login-form');

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                var email = document.getElementById("email").value;
                var password = document.getElementById("password").value;

                // Send login request to the server using AJAX
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'login.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = xhr.responseText;
                        if (response === 'not_found') {
                            alert('User not found');
                        } else if (response === 'invalid_request') {
                            alert('Invalid request');
                        } else {
                            window.location.href = response; // Redirect to message.php
                        }
                    }
                };
                xhr.send('email=' + email + '&password=' + password);
            });
        });
    </script>
</head>

<body>
    <div class="container">
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
        <div class="screen-1">
            <div class="logo">
                <a href="HomePage.html">
                    <img src="C:\Users\harma\Downloads\LOGO.jpg" alt="Logo">
                </a>
            </div>
            <form id="login-form">
                <div class="email">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="text" id="email" placeholder="Email" required>
                </div>
                <div class="password">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" id="password" placeholder="Password" required>
                </div>
                <button class="login-button" type="submit">LOGIN</button>
            </form>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>
</body>

</html>
