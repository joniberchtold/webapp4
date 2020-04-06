<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
	<title>Registrieren</title>
  </head>
  <body>
  
   <?php
        // Hier werden die DB verlinkung und die Navigation eingefügt
		// navigation.php ist für Navigation
		// datenbank.php ist für die Verbindung zu Datenbank
        include "navigation.php";
		include "datenbank.php";
       

?>

<?php
		// Aufnahme und übermittlung von Daten von User
		$showFormular = true; 
 
		if(isset($_GET['register'])) {
			$error = false;
			$Passwort = $_POST['Passwort'];
			$Passwort2 = $_POST['Passwort2'];
			$Vorname = $_POST['Vorname'];
			$Nachname = $_POST['Nachname'];
			$Strasse = $_POST['Strasse'];
			$Hausnummer = $_POST['Hausnummer'];
			$PLZ = $_POST['PLZ'];
			$Email = $_POST['Email'];
			$Telefonnummer = $_POST['Telefonnummer'];
 
		if(!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
			echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
			$error = true;
		}    
			
		if(strlen($Passwort) == 0) {
			echo 'Bitte ein Passwort angeben<br>';
			$error = true;
		}
		
		if($Passwort != $Passwort2) {
			echo 'Die Passwörter müssen übereinstimmen<br>';
			$error = true;
		}
    
		//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
		if(!$error) { 
			$statement = $pdo->prepare("SELECT * FROM benutzer WHERE Email = :Email");
			$result = $statement->execute(array('Email' => $Email));
			$user = $statement->fetch();
        
        if($user !== false) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }    
		}
    
		//Keine Fehler, wir können den Nutzer registrieren
		if(!$error) {    
			$passwort_hash = password_hash($Passwort, PASSWORD_DEFAULT);
        
			$statement = $pdo->prepare("INSERT INTO benutzer ( Passwort, Vorname, Nachname, Strasse, Hausnummer, PLZ, Email, Telefonnummer) VALUES (:Passwort, :Vorname, :Nachname, :Strasse, :Hausnummer, :PLZ, :Email, :Telefonnummer)");
			$result = $statement->execute(array('Passwort' => $passwort_hash, 'Vorname' => $Vorname, 'Nachname' => $Nachname, 'Strasse' => $Strasse, 'Hausnummer' => $Hausnummer, 'PLZ' => $PLZ, 'Email' => $Email, 'Telefonnummer' => $Telefonnummer ));
        
        if($result) {        
            echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    } 
}
 
		if($showFormular) {
?>
		<!-- Normales Formular -->
		<form action="?register=1" method="post">
		E-Mail:<br>
		<input  type="email" size="40" maxlength="250" name="Email"><br><br>
 
		Dein Passwort:<br>
		<input type="password" size="40"  maxlength="250" name="Passwort"><br>
 
		Passwort wiederholen:<br>
		<input type="password" size="40" maxlength="250" name="Passwort2"><br><br>

		Vorname:<br>
		<input size="40" maxlength="250" name="Vorname"><br><br>

		Nachname:<br>
		<input size="40" maxlength="250" name="Nachname"><br><br>

		Strasse:<br>
		<input size="40" maxlength="250" name="Strasse"><br><br>

		Hausnummer:<br>
		<input size="40" maxlength="250" name="Hausnummer"><br><br>

		PLZ:<br>
		<input size="40" maxlength="250" name="PLZ"><br><br>

		Telefonnummer:<br>
		<input size="40" maxlength="250" name="Telefonnummer"><br><br>
 
		<input type="submit" value="Abschicken">
		</form>
 
<?php
		} //Ende von if($showFormular)
?>
  </body>
</html>
