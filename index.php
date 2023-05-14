<?php
session_start();

if (isset($_SESSION['username'])) {
  // Nëse një user është i kyçur brenda, shfaqe faqen e tij të personalizuar
  echo "Tungjatjeta, " . $_SESSION['username'] . "! <br>";
  echo "<a href='logout.php'>Çkyçu</a>";
} else {
  // Nëse nuk ka user të kyçur brenda, shfaqe formën për kyçje ose krijim të një user-i të ri
  echo "
    <form method='post' action='login.php'>
      <label for='username'>Emri i përdoruesit:</label>
      <input type='text' id='username' name='username'><br>

      <label for='password'>Fjalëkalimi:</label>
      <input type='password' id='password' name='password'><br>

      <button type='submit'>Kyçu</button>
    </form>
    <br>
    <p>nuk keni nje llogari? <a href='create_user.php'>Regjistrohuni këtu</a></p>
  ";
}
?>