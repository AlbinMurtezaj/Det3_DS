<?php
session_start();
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Merrni vlerat e formës së postuar
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Gjej përdoruesin në bazën e të dhënave
  $query = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) === 1) {
    // Përdoruesi u gjet, kontrollo fjalekalimin
    $user = mysqli_fetch_assoc($result);
    $salt = $user['salt'];
    $hashedPassword = hash('sha256', $password . $salt);

    if ($hashedPassword === $user['password']) {
      // Autentifikimi suksesshëm, ruaj sesionin e përdoruesit
      $_SESSION['username'] = $username;
      header("Location: index.php");
    } else {
      echo "Fjalëkalimi i gabuar.";
    }
  } else {
    echo "Përdoruesi '$username' nuk ekziston.";
  }

  // Mbyll lidhjen me bazën e të dhënave
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kyçu</title>
</head>
<body>
    <h2>Kyçu</h2>
    <form method="POST" action="">
        <label for="username">Përdoruesi:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Fjalëkalimi:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Kyçu</button>
    </form>
</body>
</html>