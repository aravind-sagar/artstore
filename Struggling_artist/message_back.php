<?php
session_start();
$db = new PDO("mysql:host=localhost;dbname=artstore", "root", '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $message = $_POST['message'];
  $email = $_SESSION['email'];

  $sql = 'INSERT INTO message (name, email, message) VALUES (:name, :email, :message)';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':name', $_SESSION['name']);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':message', $message);

  if ($stmt->execute()) {
    header("Location: message.php");
    exit();
  } else {
    echo 'Error occurred. Message not saved.';
  }
}
?>
