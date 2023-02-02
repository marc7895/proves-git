<?php
$servername = "db";
$username = "root";
$password = "iesmanacor";

try {
  $conn = new PDO("mysql:host=$servername;dbname=pelicules", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connexió exitosa";
} catch (PDOException $e) {
  echo "Connexio fallida: " . $e->getMessage();
}
?>