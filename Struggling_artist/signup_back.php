<?php
session_start();
$db = new PDO("mysql:host=localhost;dbname=artstore", "root", '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':name', $name);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);

  if ($stmt->execute()) {
    // Set session variables
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    
    // Redirect to message.php
    header("Location: message.php");
    exit();
  } else {
    // Handle error if user not added
    header("Location: signup.php");
    exit();
  }
}
?>
