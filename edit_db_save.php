<?php
	//Hier wird das Edit-Formular ausgelesen
    $edit_id = $_GET['eid']; 
    
    $produkt_name = $_POST["inputname"];
    $produkt_gebiet = $_POST["inputgebiet"];
	$produkt_halter = $_POST["inputhalter"];
	$produkt_telefon = $_POST["inputnummer"];
	$produkt_email = $_POST["inputmail"];

    $produktbild = $_FILES["inputfile1"]["name"];
    
    if(strlen($produktbild) > 5) {
    
        $target_dir ="bilder/";
        $target_file = $target_dir . basename($_FILES["inputfile1"]["name"]);
    
        move_uploaded_file($_FILES["inputfile1"]["tmp_name"], $target_file);
    }
    

	//Hier wird eine Verbindung mit der DB hergestellt
    include "datenbank.php";
    
	//Mittels SQL werden die Daten in der DB aktualisiert
    if(strlen($produktbild) > 5) {
            $sql = "UPDATE fahrzeuge SET Bild = '$produkt_bild' where ProductID = '$edit_id'";
            $pdo->query($sql);
    
    }
    
    $sql = "UPDATE fahrzeuge SET Fahrzeugname = '$produkt_name' where ProductID = '$edit_id'";
    $pdo->query($sql);
	
	$sql = "UPDATE fahrzeuge SET Einsatzgebiet = '$produkt_gebiet' where ProductID = '$edit_id'";
    $pdo->query($sql);
    
    $sql = "UPDATE fahrzeuge SET Name_des_Halters = '$produkt_halter' where ProductID = '$edit_id'";
    $pdo->query($sql);
	
	$sql = "UPDATE fahrzeuge SET Telefonnummer = '$produkt_telefon' where ProductID = '$edit_id'";
    $pdo->query($sql);
	
	$sql = "UPDATE fahrzeuge SET Email = '$produkt_email' where ProductID = '$edit_id'";
    $pdo->query($sql);
    
	//Weiterleitung zur Confirm Nachricht
    header("location: confirm_edit.php");   
?>
