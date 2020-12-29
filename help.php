<?php
// Config wird includiert damit eine Verbindung aufgebaut werden kann
require_once "config.php";

$hilfeart = $_GET["hilfeart"];
$datum = $_GET["datum"];
$wichtigkeit = $_GET["wichtigkeit"];

$anrede = $_POST["anrede"];
$vn = $_POST["vn"];
$nn = $_POST["nn"];
$str = $_POST["str"];
$plz = $_POST["plz"];
$tel = $_POST["tel"]; //Optional
$email = $_POST["email"];
$passwort = $_POST["passwort"]; // Plain
$passwortverify = $_POST["passwortverify"]; //Plain

//hash passwort
$hashedPasswort = password_hash($passwort, PASSWORD_DEFAULT);

//passwort überprüfen
if (password_verify($passwort, $hashedPasswort)) {
    echo 'Passwort stimmt überein';
} else {
    echo 'Nope';
}

$sql = "INSERT INTO user (VN, NN, Str, PLZ, Tel, Email) VALUES (:vn, :nn, :str, :plz, :tel, :email)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bindet die Variablen an das Statement
            $stmt->bindParam(":vn", $param_vn);
            $stmt->bindParam(":nn", $param_nn);
            $stmt->bindParam(":str", $param_str);
            $stmt->bindParam(":plz", $param_plz);
            $stmt->bindParam(":tel", $param_tel);
            $stmt->bindParam(":email", $param_email);
            
            // Parameter setzen
            $param_vn = $vn;
            $param_nn = $nn;
            $param_str = $str;
            $param_plz = $plz;
            $param_tel = $tel;
            $param_email = $email;

            if($stmt->execute()){
                // Es hat funktioniert oder nicht
                header("location: main-dark.html");
                exit();
            } else{
                echo "Es ist etwas schiefgelaufen. Bitte versuchen sie später wieder.";
            }

            unset($stmt);
    }
    
    // Close connection
    unset($pdo);
?>