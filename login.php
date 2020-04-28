<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
	<title>Login</title>
	<script type='text/javascript'>
	function refreshCaptcha(){
		var img = document.images['captchaimg'];
		img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
	}
	</script>
  </head>
  <body>


   <?php
		
        // Hier werden die DB verlinkung und die Navigation eingefügt
		// navigation.php ist für Navigation
		// datenbank.php ist für die Verbindung zu Datenbank 
		include "navigation.php";
		include "datenbank.php";
		include "phptextClass.php";
        
		if(isset($_POST['Abschicken'])){
		// code for check server side validation
		if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){  
			$msg="<span style='color:red'>Code ist nicht korrekt. Bitte wiederholen</span>";// Captcha verification is incorrect.		
		}else{// Captcha verification is Correct. Final Code Execute here!		
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
			}
		}



?>

 <?php 
if(isset($errorMessage)) {
    echo $errorMessage;
}

if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
<?php }?>
 
 <!-- Formular für das Login -->
<form action="?login=1" method="post">
E-Mail:<br>
<input type="email" size="40" maxlength="250" name="Email"><br><br>
 
Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="Passwort"><br>

<tr>
      <td align="right" valign="top"> Ich bin kein Roboter:</td>
      <td><img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
        <label for='message'>Bitte Code hier eingeben :</label>
        <br>
        <input id="captcha_code" name="captcha_code" type="text">
        <br>
        Neues Bild  <a href='javascript: refreshCaptcha();'>laden</a></td>
</tr>
 
  <!-- Submit Button -->
<input name="Abschicken" type="submit" value="Abschicken">

 <!-- Falls man das Passwort vergessen hat, kann man mit diesem Link zum Passwort vergessen Formular gelabgen -->
<a href="passwortvergessen.php">Passwort Vergessen</a>


  </body>
</html>
