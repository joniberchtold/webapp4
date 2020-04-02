<?php
	//Hier wird das Add-Formular ausgelesen
    $produkt_name = $_POST["inputname"];
    $produkt_gebiet = $_POST["inputgebiet"];
	$produkt_halter = $_POST["inputhalter"];
	$produkt_telefon = $_POST["inputnummer"];
	$produkt_email = $_POST["inputmail"];
	

    $produkt_bild = $_FILES["inputfile1"]["name"];
    
    $target_dir ="bilder/";
    $target_file = $target_dir . basename($_FILES["inputfile1"]["name"]);
    
    move_uploaded_file($_FILES["inputfile1"]["tmp_name"], $target_file);
    

    //Hier wird eine Verbindung mit der DB hergestellt
    include "datenbank.php";
	
	//Mittels SQL werden die Daten in die DB geschrieben
    $sql = "INSERT INTO fahrzeuge(ProductID, Fahrzeugname, Einsatzgebiet, Bild, Name_des_Halters, Telefonnummer, E-Mail) VALUES ('', '$produkt_name', '$produkt_gebiet', '$produkt_bild', '$produkt_halter', '$produkt_telefon', '$produkt_email')";
    $pdo->query($sql);
    
	//Man wird Weitergeleitet zur Confirm Nachricht
    header("location: add_confirm.php");   
?>
