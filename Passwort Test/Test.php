<!DOCTYPE html>
<html lang="de-DE">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<body>
    
<?php

// Include config file
require "config.php";

$vn = $nn = $passwort = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$vn = $_POST["vn"];
$nn = $_POST["nn"];
$passwort = $_POST["passwort"];

//hash passwort
$hashedPasswort = password_hash($passwort, PASSWORD_DEFAULT);

/*
//passwort überprüfen
if (password_verify($passwort, $hashedPasswort)) {
    echo 'Passwort stimmt überein!';
} else {
    echo 'Nope.';
}
*/

        $sql = "INSERT INTO test (vn, nn, passworthash) VALUES (:vn, :nn, :hashedPasswort)";
        
                if($stmt = $pdo->prepare($sql)){
                    // Bindet die Variablen an das Statement
                    $stmt->bindParam(":vn", $param_vn);
                    $stmt->bindParam(":nn", $param_nn);
                    $stmt->bindParam(":hashedPasswort", $param_hashedPasswort);
                    
                    // Parameter setzen
                    $param_vn = $vn;
                    $param_nn = $nn;
                    $param_hashedPasswort = $hashedPasswort;

                    if($stmt->execute()){
                        // Es hat funktioniert
                        header("location: Test.php");
                        exit();
                    } else{
                        // Nope
                        echo "Es ist etwas schiefgelaufen. Bitte versuchen sie später wieder.";
                    }

                    unset($stmt);
            }
            
            // Close connection
            unset($pdo);
        }
?>

<h1>Passort Test</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <div>
    <label>Vorname:</label><br>
    <input type="text" id="vn" name="vn" value="<?php echo $vn; ?>" required><br>
    <label>Nachname:</label><br>
    <input type="text" id="nn" name="nn" value="<?php echo $nn; ?>" required><br>
    <label>Passwort:</label><br>
    <input type="password" id="passwort" name="passwort" value="<?php echo $passwort; ?>" onkeyup='check();' required><br>
    <label>Passwort wiederholen:</label><br>
    <input type="password" id="passwortverify" name="passwortverify" value="" onkeyup='check();' required>
    <span id='message'></span><br><br>
    </div>
    <button type="submit" id="test">Submit</button>
</form>

<script>
     var check = function() {
      if (document.getElementById('passwort').value ==
            document.getElementById('passwortverify').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'matching';
            document.getElementById("test").style.display = "block";
      } else {
      		document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'not matching';
            document.getElementById("test").style.display = "none";
      }
  }
</script>

</body>
</html>