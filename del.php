<?php
//Hier wird der Artikel gelöscht
    $del_id = $_POST['produkt_nr']; 
    
//Verbindung mit der DB
    include "datenbank.php";
	
//Mittels SQL wir der Artikel aus der DB gelöscht
    $sql = "DELETE FROM fahrzeuge where ProductID = " . $del_id;
    $pdo->query($sql);
	
//Weiterleitung zur Confirm Nachricht
    header("location: confirm_del.php");    
?>

