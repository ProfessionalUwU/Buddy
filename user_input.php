<?php

// Include config file
require_once "config.php";

//$vn = $nn = $str = $plz = $email = $tel = $passwort = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$vn = $_POST["vn"];
$nn = $_POST["nn"];
$str = $_POST["str"];
$plz = $_POST["plz"];
$tel = $_POST["tel"];
$email = $_POST["email"];
$passwort = $_POST["passwort"];

/*
//passwort überprüfen, Für Anmeldung, True False
if (password_verify($passwort, $hashedPasswort)) {
    echo 'Passwort stimmt überein!';
} else {
    echo 'Nope.';
}
*/

    $sql = "INSERT INTO user (vn, nn, str, plz, tel, email, passworthash) VALUES (:vn, :nn, :str, :plz, :tel, :email, :hashedPasswort)";
    
            if($stmt = $pdo->prepare($sql)){
                // Bindet die Variablen an das Statement
                $stmt->bindParam(":vn", $param_vn);
                $stmt->bindParam(":nn", $param_nn);
                $stmt->bindParam(":str", $param_str);
                $stmt->bindParam(":plz", $param_plz);
                $stmt->bindParam(":tel", $param_tel);
                $stmt->bindParam(":email", $param_email);
                $stmt->bindParam(":hashedPasswort", $param_hashedPasswort);
                
                // Parameter setzen
                $param_vn = $vn;
                $param_nn = $nn;
                $param_str = $str;
                $param_plz = $plz;
                $param_tel = $tel;
                $param_email = $email;
                $param_hashedPasswort = password_hash($passwort, PASSWORD_DEFAULT); //hash passwort

                if($stmt->execute()){
                    // Es hat funktioniert
                    header("location: index.html");
                    exit();
                } else{
                    // Nope
                    echo "Es ist etwas schiefgelaufen. Bitte versuchen Sie es später wieder.";
                }

                unset($stmt);
        }
        
        // Close connection
        unset($pdo);
    }
?>