<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Shop</title>
  </head>
  <body>
  
<audio autoplay>
  <source src="audio/musik.mp3" type="audio/mpeg">
 
</audio>
  
  
  
   <?php
        // Hier werden die DB verlinkung und die Navigation eingefügt
		// navigation.php ist für Navigation
		// datenbank.php ist für die Verbindung zu Datenbank 
        include "navigation.php";
		include "datenbank.php";
       

?>

<?php
			//Ausgabe Datenbank traktoren
	
        $sql = "SELECT ProductID, Fahrzeugname, Einsatzgebiet, Bild, Name_des_Halters, Telefonnummer, Email FROM fahrzeuge ORDER BY rand() LIMIT 2";
			foreach ($pdo->query($sql) as $row) {
					$produkt_id = $row['ProductID'];
					$produkt_name = $row['Fahrzeugname'];
					$produkt_gebiet = $row['Einsatzgebiet'];
					$produkt_bild = $row['Bild'];
					$produkt_halter = $row['Name_des_Halters'];
					$produkt_telefon = $row['Telefonnummer'];
					$produkt_email = $row['Email'];
					

?>
            <!-- Anzeige Produkt -->
			<div id="produkt">
            <div id="produkt_titel"><h1><?php echo $produkt_name; ?></h1></div>
            <div id="produkt_bild"><img src="bild/<?php echo $produkt_bild; ?>" width="300px;"/></div>
			<div id="produkt_gebiet"><?php echo $produkt_gebiet; ?></div>
            <div id="produkt_halter"><?php echo $produkt_halter; ?></div>
			<div id="produkt_telefon"><?php echo $produkt_telefon; ?></div>
			<div id="produkt_email"><?php echo $produkt_email; ?></div>
			<?php if(isset($_SESSION['userid'])) {?>
				<div id="produkt_merkliste"><a href="add_merkliste.php?pid=<?php echo $produkt_id; ?>">Zur Merkliste hinzufügen...</a></div>
			    <div id="produkt_bearbeitung"><form method="post" action='edit.php'> <input name="produkt_nr" type="hidden" value="<?php echo $produkt_id; ?>"></input><button type="submit">Bearbeiten</button></form><form method="post" action='del.php'><input name="produkt_nr" type="hidden" value="<?php echo $produkt_id; ?>"></input><button type="submit">Löschen</button></form></div>
			<?php }?>
            </div>
<?php
        }
?>







</body>
</html>
