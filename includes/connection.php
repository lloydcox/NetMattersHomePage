<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "netmatters";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sqli = "CREATE DATABASE myDBPDO";
  // use exec() because no results are returned

  echo "Database created successfully<br>";
} catch(PDOException $e) {
  echo $sqli . "<br>" . $e->getMessage();
}

$conn = null;
?>