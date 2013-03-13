<?php 

$gebruikersnaam = "root"; 			// je studentnummer
$wachtwoord = "root"; 					// je wachtwoord
$databaseserver = "localhost"; 	// student.rocvantwente.nl
$databasenaam = "gastenboek";		// databasenaam


// maak verbinding met de database
mysql_connect($databaseserver, $gebruikersnaam, $wachtwoord);

// selecteer een database
mysql_select_db($databasenaam);

function maakTabelAan() {
	$maakTabelAan = "
		CREATE TABLE IF NOT EXISTS `gastenboek` (
			`id` INT NOT NULL AUTO_INCREMENT, 
			`datum` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
			`titel` VARCHAR(80) NOT NULL, 
			`naam` VARCHAR(80) NOT NULL, 
			`email` VARCHAR(80) NOT NULL, 
			`tekst` TEXT NOT NULL, 
			PRIMARY KEY (`id`)
		) ENGINE = MyISAM";
	mysql_query($maakTabelAan);
}

function voegTestDataToe() {
	voegBerichtToe("Mooie website", "Pietje Puk", "pietje@pettenflat.nl", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis vel quasi velit veniam autem quia a eveniet officia blanditiis expedita voluptate fuga voluptatum ullam in cumque. Dolores rem assumenda nihil!");	
}

function haalBerichtenOp() {
	$berichten = array();
	$sql = "SELECT * FROM gastenboek ORDER BY datum DESC";
	$resultaat = mysql_query($sql);
	while($bericht = mysql_fetch_assoc($resultaat)) {
		$berichten[] = $bericht;
	}
	return $berichten;
}

function voegBerichtToe($titel, $naam, $email, $tekst) {
	$insertQuery = "INSERT INTO `gastenboek` (titel, naam, email, tekst) VALUES ('%s', '%s', '%s', '%s');";
	$sql = sprintf($insertQuery, $titel, $naam, $email, $tekst);
	mysql_query($sql);
}

?>