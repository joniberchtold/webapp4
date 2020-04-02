<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
	<title>Hinzufügen</title>
  </head>
  <body>
  
    <?php
		// Hier werden die DB verlinkung und die Navigation eingefügt
			// navigation.php ist für Navigation
			// datenbank.php ist für die Verbindung zu Datenbank
			
		include "datenbank.php";
		include "navigation.php";
	
		// Hier wird geprüft ob der ein User angemeldet ist, falls nicht kriegt er eine Rückmeldung für die Anmeldung
		
		//if(!isset($_SESSION['userid'])) {
		///	die('Bitte zuerst <a href="login.php">einloggen</a>');
		//}
	
    ?>
	
	<!-- Hier wird das Formular erstellt welches für die Artikelerfassung gebraucht wird -->
	<!-- Alles reines HTML -->
		
    <form action="add_db_save.php" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
				<label for="inputEmail4">Fahrzeugname</label>
				<input type="text" class="form-control" name="inputname" placeholder="Fahrzeugname">
            </div>
        </div>
		
		<div class="form-row">
            <div class="form-group col-md-6">
				<label for="inputEmail4">Einsatzgebiet</label>
				<input type="text" class="form-control" name="inputgebiet" placeholder="Einsatzgebiet">
            </div>
        </div>
		
        <div class="form-row"
            <div class="form-group col-md-6">
				<label for="inputPassword4">Name des Halters</label>
				<input type="text" class="form-control" name="inputhalter" placeholder="Name des Halters">
            </div>
        </div>
		
		        <div class="form-row"
            <div class="form-group col-md-6">
				<label for="inputPassword4">Telefonnummer</label>
				<input type="text" class="form-control" name="inputnummer" placeholder="Telefonnummer">
            </div>
        </div>
		
				<div class="form-row">
            <div class="form-group col-md-6">
				<label for="inputEmail4">E-Mail</label>
				<input type="text" class="form-control" name="inputmail" placeholder="E-Mail">
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
