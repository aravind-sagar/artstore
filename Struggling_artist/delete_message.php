<?php
  // Connect to the database
  $db = new PDO("mysql:host=localhost;dbname=artstore", "root", "");

  // Check if the id parameter is present
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM message WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    // Display a confirmation message
    echo "<script>alert('Entry Deleted!'); window.location.href = 'index.php';</script>";
    exit();
  } else {
    // Redirect back to the admin page if id is not provided
    header("Location: index.php");
    exit();
  }
?>
