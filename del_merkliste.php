<?php
	session_start();
	//Hier wird das Add-Formular ausgelesen
    $produkt_id = $_GET["pid"];
	$user_id = $_SESSION["userid"];

    //Hier wird eine Verbindung mit der DB hergestellt
    include "datenbank.php";
	
	//Mittels SQL werden die Daten in die DB geschrieben
    $sql = "DELETE FROM liste WHERE UserID = $user_id AND ProductID = $produkt_id";
	echo $sql;
    $pdo->query($sql);
    
	//Man wird Weitergeleitet zur Confirm Nachricht
    header("location: merkliste.php");   
?>
