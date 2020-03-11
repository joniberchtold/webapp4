<?php session_start(); ?>
 <!-- Oben wird die Session gestartet, dies wird auf jedem Dokument implementiert -->

 <!-- Klasische Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
    <ul class="navbar-nav mr-auto">
	
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Startseite <span class="sr-only">(current)</span></a>
        </li>
		
		<?php if(!isset($_SESSION['userid'])) {?>
		 
        <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
        </li>
			
        <li class="nav-item">
            <a class="nav-link" href="registrieren.php">Registieren</a>
        </li>
			
        <?php } ?>
        
		<li class="nav-item">
			<a class="nav-link" href="shop.php">Shop</a>
        </li>	  
	  
	    <li class="nav-item">
			<a class="nav-link" href="add.php">Hinzufügen</a>
        </li>	
		
        <?php if(isset($_SESSION['userid'])) {?>
		
        <li class="nav-item">
			<a class="nav-link" href="logout.php">Logout</a>
        </li>
			
        <?php } ?>
		
    </ul>
    
	 <!-- Suchfunktion, diese wird auf jeder Seite implementiert -->
    <form class="form-inline my-2 my-lg-0" action="resultate.php" method="POST">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchtext">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
 </div>
</nav>

	<?php
		// Cookiebanner, wird auf jeder Seite angezeigt, sobald man dies aktzeptiert wird in einem Cookie gespeichert, dass man dies aktzeptiert hat
		
		if(isset($_POST['btnCookieOk'])){
			// Hier kann man die Zeit einstellen, wie lange der Cookie gespeichert werden soll
			setcookie('eu-cookie', '1', time()+1209600);
		}else{
		if(!isset($_COOKIE['eu-cookie'])) {
			echo '<div id="eu-cookie-message">';
			echo		'<form action="#" method="post">';
			echo	'	Durch Verwendung dieser Webseite stimmst du der Cookie-Nutzung zu. <input type="submit" value="akzeptieren" name="btnCookieOk" />';
			echo	'</form>';
			echo	'</div>';
				}				
			}

	?>
