<?php
session_start();
$db = new PDO("mysql:host=localhost;dbname=artstore", "root", '');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch();
    
    if ($user) {
        $_SESSION['email'] = $email;
        
        // Get the name of the user
        $nameSql = 'SELECT name FROM users WHERE email = :email';
        $nameStmt = $db->prepare($nameSql);
        $nameStmt->bindParam(':email', $email);
        $nameStmt->execute();
        $nameResult = $nameStmt->fetch();
        $name = $nameResult['name'];
        
        $_SESSION['name'] = $name;
        
        // Return the URL of the message.php page
        echo 'message.php';
    } else {
        echo 'not_found';
    }
} else {
    echo 'invalid_request';
}
?>
