<?php
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Merrni vlerat e formës së postuar
  $username = $_POST['username'];
  $password = $_POST['password'];
   // Bëni SaltedHash të fjalëkalimit
   $salt = bin2hex(random_bytes(16));
   $saltedPassword = $password . $salt;
   $hashedPassword = hash('sha256', $saltedPassword);
 
   // Kontrolloni nëse përdoruesi ekziston tashmë në bazën e të dhënave
   $query = "SELECT * FROM users WHERE username = '$username'";
   $result = mysqli_query($conn, $query);
   if (mysqli_num_rows($result) > 0) {
     echo "Përdoruesi '$username' ekziston tashmë.";
   } else {
     // Shtoni përdoruesin e ri në bazën e të dhënave
     $query = "INSERT INTO users (username, password, salt) VALUES ('$username', '$hashedPassword', '$salt')";
     if (mysqli_query($conn, $query)) {
       echo "Përdoruesi u krijua me sukses.";
     } else {
       echo "Gabim gjatë krijimit të përdoruesit: " . mysqli_error($conn);
     }
   }
 
   // Mbyll lidhjen me bazën e të dhënave
   mysqli_close($conn);
 }
 ?>
 
 <!DOCTYPE html>
 <html>
 <head>
     <title>Krijo Llogari</title>
 </head>
 <body>
     <h2>Krijo Llogari</h2>
     <form method="POST" action="">
         <label for="username">Përdoruesi:</label>
         <input type="text" name="username" id="username" required>
         <br>
         <label for="password">Fjalëkalimi:</label>
         <input type="password" name="password" id="password" required>
         <br>
         <button type="submit">Regjistrohu</button>
     </form>
 </body>
 </html>