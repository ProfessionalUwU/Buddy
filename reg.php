<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impressum</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>    
    <link rel="stylesheet" href="reg_log.css">
</head>
<body>

<?php
session_start();

// Include config file
require "config.php";

$vn = $nn = $stre = $plz = $email = $tel = $passwort = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$vn = $_POST["vn"];
$nn = $_POST["nn"];
$stre = $_POST["stre"];
$plz = $_POST["plz"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$passwort = $_POST["passwort"];

/*
//passwort überprüfen
if (password_verify($passwort, $hashedPasswort)) {
    echo 'Passwort stimmt überein!';
} else {
    echo 'Nope.';
}
*/

        $sql = "INSERT INTO user (vn, nn, stre, plz, email, tel, passworthash) VALUES (:vn, :nn, :stre, :plz, :email, :tel, :hashedPasswort)";
        
                if($stmt = $pdo->prepare($sql)){
                    // Bindet die Variablen an das Statement
                    $stmt->bindParam(":vn", $param_vn);
                    $stmt->bindParam(":nn", $param_nn);
                    $stmt->bindParam(":stre", $param_stre);
                    $stmt->bindParam(":plz", $param_plz);
                    $stmt->bindParam(":email", $param_email);
                    $stmt->bindParam(":tel", $param_tel);
                    $stmt->bindParam(":hashedPasswort", $param_hashedPasswort);
                    
                    // Parameter setzen
                    $param_vn = $vn;
                    $param_nn = $nn;
                    $param_stre = $stre;
                    $param_plz = $plz;
                    $param_email = $email;
                    $param_tel = $tel;
                    $param_hashedPasswort = password_hash($passwort, PASSWORD_DEFAULT); //Passwort hash erzeugen

                    if($stmt->execute()){
                        // Es hat funktioniert
                        header("location: index.html");
                        exit();
                    } else{
                        // Nope
                        echo "Es ist etwas schiefgelaufen. Bitte versuchen sie es später wieder.";
                    }

                    unset($stmt);
            }
            
            // Close connection
            unset($pdo);
        }
?>

    <!--header-->
    <div class="impb">
      <div class="container">
          <div class="page-header hd">
              <h1>
                  Buddy
              </h1>
          </div>
      </div>

    <div class="form">
      
        <ul class="top-area">
          <li class="tab active"><a href="#signup">Sign Up</a></li>
          <li class="tab"><a href="#login">Log In</a></li>
        </ul>
        
        <div class="tab-content">
          <div id="signup">   
            <h2>Registrieren</h2>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            
            <div class="top-row">
              <div class="label-field">
                <label>
                  Vorname<span class="req">*</span>
                </label>
                <input type="text" id="vn" name="vn" value="<?php echo $vn; ?>" required>
              </div>
          
              <div class="label-field">
                <label>
                  Nachname<span class="req">*</span>
                </label>
                <input type="text" id="nn" name="nn" value="<?php echo $nn; ?>" required>
              </div>
            </div>

            <div class="label-field">
              <label>
                Straße<span class="req">*</span>
              </label>
              <input type="text" id="stre" name="stre" value="<?php echo $stre; ?>" required>
            </div>

            <div class="label-field">
              <label>
                PLZ<span class="req">*</span>
              </label>
              <input type="number" id="plz" name="plz" value="<?php echo $plz; ?>" required>
            </div>
  
            <div class="label-field">
              <label>
                Email Addresse<span class="req">*</span>
              </label>
              <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>

            <div class="label-field">
              <label>
                Telefonnummer
              </label>
              <input type="tel" id="tel" name="tel" value="<?php echo $tel; ?>">
            </div>
            
            <div class="label-field">
              <label>
                Passwort<span class="req">*</span>
              </label>
              <input type="password" id="passwort" name="passwort" value="<?php echo $passwort; ?>" onkeyup='check();' required><br>
            </div>

            <div class="label-field">
              <label>
                Passwort wiederholen<span class="req">*</span>
              </label>
              <input type="password" id="passwortverify" name="passwortverify" value="" onkeyup='check();' required>
              <span id='message'></span>
            </div>
            
            <button type="submit" id="test" class="button button-block">Registrieren</button>
            
          </form>
  
          </div>
          
          <div id="login">   
            <h2>Einloggen!</h2>
            
            <form action="/" method="post">
            
              <div class="label-field">
              <label>
                Email Addresse<span class="req">*</span>
              </label>
              <input type="email"required autocomplete="off"/>
            </div>
            
            <div class="label-field">
              <label>
                Passwort<span class="req">*</span>
              </label>
              <input type="password"required autocomplete="off"/>
            </div>
            
            <p class="forgot"><a href="#">Passwort vergessen?</a></p>
            
            <button class="button button-block">Einloggen</button>
            
            </form>
  
          </div>
          
        </div>  
  </div>
  
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="reg_log.js"></script>

    <!--navbar-->
    <nav class="navbar navbar-expand-md fixed-bottom">
        <a href="index.html" class="navbar-brand nlk">Buddy</a>
        <button type="button" class="navbar-toggler navbar-dark" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon nhb"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <div class="navbar-nav">
                <a href="index.html" class="nav-item nav-link nlk">Home</a>
                <a href="team.html" class="nav-item nav-link nlk">Team</a>
                <a href="impressum.html" class="nav-item nav-link active nlk">Impressum</a>
            </div>
            <a href="www.github.com" class="btn navbar-btn nbt">Source Code</a>
            <div class="navbar-nav ml-auto">
                <a href="reg.php" class="nav-item nav-link nlk">Registrieren/Login</a>
            </div>
        </div>
    </nav>
</body>
</html>