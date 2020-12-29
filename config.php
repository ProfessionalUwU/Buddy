<?php
/* Wird defenieren die Variablen um sie einfacher ändern zu können */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'u188345db1');
define('DB_PASSWORD', 'BuddyIsTheBest4002!');
define('DB_NAME', 'u188345db1');
 
/* Verbindung mit der Datenbank aufbauen */
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Der PDO Error mode wird auf Exeptions gestelllt
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>