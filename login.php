<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
	<title>Login</title>
	
  </head>
  <body>


   <?php
		
        // Hier werden die DB verlinkung und die Navigation eingefügt
		// navigation.php ist für Navigation
		// datenbank.php ist für die Verbindung zu Datenbank 
		include "navigation.php";
		include "datenbank.php";
        
		// Der untenstehende Code ist für das Login 
		// Es wird die Mail und das Passwort abgegleicht 
		if(isset($_GET['login'])) {
			$Email = $_POST['Email'];
			$Passwort = $_POST['Passwort'];
        
        $statement = $pdo->prepare("SELECT * FROM benutzer WHERE Email = :Email");
        $result = $statement->execute(array('Email' => $Email));
        $user = $statement->fetch();
            
        //Überprüfung des Passworts, falls Passwort nicht übereinstimmt, wird eine Meldung ausgegeben
        if ($user !== false && password_verify($Passwort, $user['Passwort'])) {
            $_SESSION['userid'] = $user['UserID'];
            die('Login erfolgreich.<br>Weiter zu <a href="traktoren.php">Traktoren</a>');
        } else {
            $errorMessage = "E-Mail oder Passwort war ungültig<br>";
        }
    
    }



?>

 <?php 
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>
 
 <!-- Formular für das Login -->
<form action="?login=1" method="post">
E-Mail:<br>
<input type="email" size="40" maxlength="250" name="Email"><br><br>
 
Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="Passwort"><br>
 
  <!-- Submit Button -->
<input type="submit" value="Abschicken">

 <!-- Falls man das Passwort vergessen hat, kann man mit diesem Link zum Passwort vergessen Formular gelabgen -->
<a href="passwortvergessen.php">Passwort Vergessen</a>


  </body>
</html>
