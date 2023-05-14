<?php
$host = "localhost";
$username = "db_username"; // zëvendëso me emrin e vërtetë të përdoruesit të bazës së të dhënave
$password = "db_password"; // zëvendëso me fjalëkalimin e vërtetë të përdoruesit të bazës së të dhënave
$database = "db_name"; // zëvendëso me emrin e vërtetë të bazës së të dhënave

// Lidhja me databazën
$conn = mysqli_connect($host, $username, $password, $database);

// Kontrolli i lidhjes
if (!$conn) {
  die("Lidhja dështoi: " . mysqli_connect_error());
}
?>