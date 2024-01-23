<?php
session_start();

if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
} else {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <p>Hello, <?php echo htmlspecialchars($username); ?>!</p>
        <a href="login.php">Log out</a>
    </div>
</body>
</html>
