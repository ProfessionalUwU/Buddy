<?php
/* Wird defenieren die Variablen um sie einfacher änder zu können */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'u188345db1');
define('DB_CHARSET', 'utf8');

// Quality of Life Optionen, Sicherheit
$options = [
    PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
];

/* Verbindung mit der Datenbank aufbauen */
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USERNAME, DB_PASSWORD, $options);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>