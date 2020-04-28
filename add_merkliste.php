<?php
	session_start();
	//Hier wird das Add-Formular ausgelesen
    $produkt_id = $_GET["pid"];
	$user_id = $_SESSION["userid"];

    //Hier wird eine Verbindung mit der DB hergestellt
    include "datenbank.php";
	
	//Überprüfe ob Produkt bereits in der Merkliste ist
	$sql = "SELECT * FROM liste where UserID=$user_id AND ProductID = $produkt_id";
	$rows = $pdo->query($sql)->fetchALL();
	
	//Fals Abfrage Anzahl Zeilen kleiner 1, dann ist es noch nicht vorhanden und kann hinzugefügt werden
	if (count($rows) < 1)
	{
		//Mittels SQL werden die Daten in die DB geschrieben
		$sql = "INSERT INTO liste (UserID, ProductID) VALUES ('$user_id', '$produkt_id')";
		echo $sql;
		$pdo->query($sql);
	}
	
	//Man wird Weitergeleitet zur Confirm Nachricht
    header("location: merkliste.php");   
?>
