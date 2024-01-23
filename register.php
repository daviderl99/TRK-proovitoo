<?php
$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $mysqli = require __DIR__ . "/database.php";

  if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
  }

  $sql = "INSERT INTO user (username) VALUES (?)";
  $stmt = $mysqli->prepare($sql);

  if ($stmt) {
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $stmt->bind_param("s", $username);

    try {
      if ($stmt->execute()) {
        session_start();
        $_SESSION['username'] = $username;
        $message = "Account created successfully!";
      }
    } catch (mysqli_sql_exception $e) {
      if ($e->getCode() === 1062) {
        $message = 'Username already taken';
      } else {
        throw $e;
      }
    }

    $stmt->close();
  }

  $mysqli->close();

  echo json_encode(['message' => $message]);
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
    <script src="./js/register.js" defer></script>
  </head>
  <body>
    <div class="container">
      <h1>Register</h1>

      <div id="message" class="message"></div>
      <form id="registrationForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <button>Sign up</button>
      </form>
      <a href="login.php">Login page</a>
    </div>
  </body>
</html>
