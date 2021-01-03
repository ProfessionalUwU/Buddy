<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>    
    <link rel="stylesheet" href="reg_log.css">
</head>
<body>

<?php
// Initialize the session
session_start();
 

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.html");
    exit;
}
 
// Include config file
require_once "config.php";

$email = $passwort = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $sql = "SELECT userID, email, passworthash FROM user WHERE email = :email";

    if($stmt = $pdo->prepare($sql)){
        // Bindet die Variablen an das Statement
        $stmt->bindParam(":email", $param_email);

        // Parameter setzen
        $param_email = $email;

        if($stmt->execute()){
            // Checkt ob email exestiert, dann checkt es das Passwort
            if($stmt->rowCount() == 1){
                if($row = $stmt->fetch()){
                    $userID = $row["userID"];
                    $email = $row["email"];
                    $passworthash = $row["passworthash"];
                    if(password_verify($passwort, $passworthash)){
                        // Wenn Passwort korekt dann neue session starten
                        session_start();
                        
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["userID"] = $userID;
                        $_SESSION["email"] = $email;             
                        
                        // Redirect user to welcome page
                        header("location: index.html");
                        exit();
                    } else {
                        header("location: reg.php");
                        exit();
                    }
                }
            }
        }
    unset($stmt);
}    
// Close connection
unset($pdo);
}


/*
require_once "config.php";

if(isset($_GET['login'])) {
  $email = $_POST['email'];
  $passwort = $_POST['passwort'];
  
  $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
  $result = $statement->execute(array('email' => $email));
  $user = $statement->fetch();
      
  //Überprüfung des Passworts
  if ($user !== false && password_verify($passwort, $user['passwort'])) {
      $_SESSION['userID'] = $user['userID'];
      die('Login erfolgreich. Weiter zu <a href="index.html">internen Bereich</a>');
  } else {
      header("location: reg.php");
      exit();
  }
*/
?>

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
          <li class="tab"><a href="#signup">Sign Up</a></li>
          <li class="tab active"><a href="#login">Log In</a></li>
        </ul>
        
        <div class="tab-content">
          
          <div id="login">   
            <h2>Einloggen!</h2>
            
            <form action="?login=1" method="POST"> <!-- <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> -->
            
              <div class="label-field">
              <label>
                Email Addresse<span class="req">*</span>
              </label>
              <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            
            <div class="label-field">
              <label>
                Passwort<span class="req">*</span>
              </label>
              <input type="password" id="passwort" name="passwort" value="<?php echo $passwort; ?>" required><br>
            </div>
            
            <p class="forgot"><a href="#">Passwort vergessen?</a></p>
            
            <button type="submit" class="button button-block">Einloggen</button>
            
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