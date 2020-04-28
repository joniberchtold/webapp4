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
		//Hier werden die Daten aus der Datenbank gelesen
        $edit_id = $_POST['produkt_nr']; 
        
		$sql = "SELECT ProductID, Fahrzeugname, Einsatzgebiet, Bild, Name_des_Halters, Telefonnummer, Email FROM fahrzeuge WHERE ProductID = '$edit_id' LIMIT 1";
		foreach ($pdo->query($sql) as $row) {
				$produkt_id = $row['ProductID'];
				$produkt_name = $row['Fahrzeugname'];
				$produkt_gebiet = $row['Einsatzgebiet'];
				$produkt_bild = $row['Bild'];
				$produkt_halter = $row['Name_des_Halters'];
				$produkt_telefon = $row['Telefonnummer'];
				$produkt_email = $row['Email'];
		}
        
    ?>
	<!-- Hier wird das Formular erstellt welches für die Artikelbearbeitung gebraucht wird -->
	<!-- Das Formular wird mit den vorhandenen Daten mittels echo befüllt -->
	
    <form action="edit_db_save.php?eid=<?php echo $produkt_id;?>" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
				<label for="inputEmail4">Fahrzeugname</label>
				<input type="text" class="form-control" name="inputname" placeholder="Fahrzeugname" value="<?php echo $produkt_name;?>">
            </div>
        </div>
		
		<div class="form-row">
            <div class="form-group col-md-6">
				<label for="inputEmail4">Einsatzgebiet</label>
				<input type="text" class="form-control" name="inputgebiet" placeholder="Einsatzgebiet" value="<?php echo $produkt_gebiet;?>">
            </div>
        </div>
		
        <div class="form-row">
            <div class="form-group col-md-6">
				<label for="inputPassword4">Name des Halters</label>
				<input type="text" class="form-control" name="inputhalter" placeholder="Name des Halters" value="<?php echo $produkt_halter;?>">
            </div>
        </div>
		
		        <div class="form-row">
            <div class="form-group col-md-6">
				<label for="inputPassword4">Telefonnummer</label>
				<input type="text" class="form-control" name="inputnummer" placeholder="Telefonnummer" value="<?php echo $produkt_telefon;?>">
            </div>
        </div>
		
				<div class="form-row">
            <div class="form-group col-md-6">
				<label for="inputEmail4">E-Mail</label>
				<input type="text" class="form-control" name="inputmail" placeholder="E-Mail" value="<?php echo $produkt_email;?>">
            </div>
        </div>
		
        <div class="form-row">
            <div class="form-group">
                <label for="file1">Produktbild</label>
                <input type="file" class="form-control-file" name="inputfile1" accept="image/jpeg" />
            </div>
        </br>
        </div>
		
        <button type="submit" class="btn btn-primary">Fertig</button>
    </form>
  </body>
</html>
