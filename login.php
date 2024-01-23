<?php
$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $mysqli = require __DIR__ . "/database.php";

  $query = sprintf("
    SELECT * FROM user 
    WHERE username = '%s'", 
    $mysqli->real_escape_string($_POST["username"])
  );

  $result = $mysqli->query($query);
  $user = $result->fetch_assoc();

  if ($user) {
    session_start();
    session_regenerate_id();
    $_SESSION['username'] = $user["username"];

    echo json_encode(['redirect' => 'index.php']);
    exit;
  } else {
    $message = 'Username does not exist';

    echo json_encode(['message' => $message]);
    exit;
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="./js/login.js" defer></script>
    <title>Login</title>
</head>
  <body>
    <div class="container">
      <h1>Login</h1>

      <div id="message" class="message"></div>
      <form id="loginForm" method="post">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <button>Log in</button>
      </form>
      <a href="register.php">Register page</a>
    </div>
  </body>
</html>
