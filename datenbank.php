<?php
// Hier wird mittels PDO eine Datenbankverbindung hergestellt
	//Alles in einem einzelen Sheet damit man nur mittels Include die verbindung herstellen muss
$pdo = new PDO('mysql:host=localhost;dbname=online_shop', 'dbadmin', 'db123');
?>
