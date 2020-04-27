<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
	<title>Traktoren</title>
  </head>
  <body>
  
   <?php
        // Hier werden die DB verlinkung und die Navigation eingefügt
		// navigation.php ist für Navigation
		// datenbank.php ist für die Verbindung zu Datenbank
     
		include "datenbank.php";


?>
	<?php

class cart{
    
    /**
     * 
     * Initialisiert die Klasse, muss in jeder Seite ausgeführt werden.
     */
    public function initial_cart()
    {
        
        $cart = array();
        if(!isset($_SESSION['cart']))
        {
            $_SESSION['cart']=$cart;
        } 

    }
    
    /**
     * 
     * Fügt einen Artikel in das Array ein
     * @param unknown_type $Fahrzeugname
     * @param unknown_type $Einsatzgebiet
     * @param unknown_type $Bild
     * @param unknown_type $Name_des_Halters
     * @param unknown_type $Telefonnummer
     * @param unknown_type $Email
     * @param unknown_type $ZwischenSumme
     * @param unknown_type $Anzahl
     * @param unknown_type $gesammt
     */
    public function insertArtikel($Fahrzeugname, $Einsatzgebiet, $Bild, $Name_des_Halters, $Telefonnummer, $Email, $ZwischenSumme, $Anzahl, $gesammt)
    {
        
        $Artikel = array($Fahrzeugname, $Einsatzgebiet, $Bild, $Name_des_Halters, $Telefonnummer, $Email, $ZwischenSumme, $Anzahl, $gesammt);
        $cart = $_SESSION['cart'];
        array_push($cart, $Artikel);
        $_SESSION['cart'] = $cart;
        
    }
    
    /**
     * 
     * Gibt Alle Artikel des Array in einer Tabelle aus.
     */
    public function getcart()
    {
        $Array = $_SESSION['cart'];
        echo "<table width='100%'>";
        echo "<tr><th>Fahrzeugname</th><th>Einsatzgebiet</th><th>Bild</th><th>Telefonnummer</th><th>Email</th></tr>";
        for($i = 0 ; $i < count($Array); $i++)
        {
            $innerArray = $Array[$i];
            
            echo "<tr>
            <td>$innerArray[0]</td>
            <td>$innerArray[1]</td>
            <td>$innerArray[2]</td>
            <td>$innerArray[3]</td>
            <td>$innerArray[4]</td>
            <td>$innerArray[5]</td>
            </tr>";
        }
        
        echo "</table>";
    }
    
    
    /**
     * 
     * Löscht den Waren Korb
     */
    public function undo_cart()
    {
        $_SESSION['cart'] = array();
    }
    
    
    /**
     * 
     * Gibt einen Datensatz Zurück
     * @param int $point
     */
    public function get_cartValue_at_Point($n)
    {
        
        $Array = $_SESSION['cart'];            
        return $Array[$n];
        
    }
    
    /**
     * 
     * Entfernt ein Artikel am Point n
     * @param int $point
     */
    public function delete_cartValue_at_Point($point)
    {
        $Array = $_SESSION['cart'];
        unset($Array[$point]);
    }
    
    /**
     * 
     * Gibt die Anzahl der Artikel zurück
     */
    public function get_cart_count()
    {
        return count($_SESSION['cart']);
    }
}

?>
  
  </body>
</html>
