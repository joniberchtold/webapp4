<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
	<title>Shop</title>
  </head>
  <body>
    <?php
	// Hier werden die DB verlinkung und die Navigation eingefügt
			// navigation.php ist für Navigation
			// datenbank.php ist für die Verbindung zu Datenbank
        include "navigation.php";
        include "datenbank.php";
        
	// Hier wird geprüft ob der ein User angemeldet ist, falls nicht kriegt er eine Rückmeldung für die Anmeldung	
		if(!isset($_SESSION['userid'])) {
			die('Bitte zuerst <a href="login.php">einloggen</a>');
		}
	
        $suchstring = $_POST["searchtext"];
        
    ?>
    

    <?php
	
	//Hier wir die Suchfunktion erstellt
	//Kleiner als 3 Zeichen ist nicht erlaubt
	//Falls korrekt werden zutreffende Artikel angezeigt
            if (strlen($suchstring) < 3)
            {
                echo "<div id='produkt'>Suchstring ist zu kurz</div>";
                die;
            }else{
            
                $sql = "SELECT ProductID, Fahrzeugname, Einsatzgebiet, Bild, Name_des_Halters, Telefonnummer, Email FROM fahrzeuge WHERE Fahrzeugname LIKE '%$suchstring%'";
                
                $count_var = 0;
                
				foreach ($pdo->query($sql) as $row) {
					$produkt_id = $row['ProductID'];
					$produkt_name = $row['Fahrzeugname'];
					$produkt_gebiet = $row['Einsatzgebiet'];
					$produkt_bild = $row['Bild'];
					$produkt_halter = $row['Name_des_Halters'];
					$produkt_telefon = $row['Telefonnummer'];
					$produkt_email = $row['Email'];
					$count_var++;
    ?>
			<div id="produkt">
            <div id="produkt_titel"><h1><?php echo $produkt_name; ?></h1></div>
            <div id="produkt_bild"><img src="bild/<?php echo $produkt_bild; ?>" width="300px;"/></div>
			<div id="produkt_gebiet"><?php echo $produkt_gebiet; ?></div>
            <div id="produkt_halter"><?php echo $produkt_halter; ?></div>
			<div id="produkt_telefon"><?php echo $produkt_telefon; ?></div>
			<div id="produkt_email"><?php echo $produkt_email; ?></div>

    <?php
        }
    ?>
	
    <?php
	
	//Falls keine Resultate vorhanden sind wird dieses ausgeführt
            }
            if ($count_var == 0)
            {
                echo "<div id='produkt'>Keine Resultate gefunden</div>";
            }
        
    ?>

    </body>
</html>
