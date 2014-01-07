<?php 

$gebruikersnaam = "root";
$wachtwoord = "root";
$databaseserver = "localhost";
$databasenaam = "gastenboek";


// maak verbinding met de database
$mysqli = new mysqli($databaseserver, $gebruikersnaam, $wachtwoord, $databasenaam);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


function maakTabelAan() {
	global $mysqli;
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
	$mysqli->query($maakTabelAan);
}

function voegTestDataToe() {
	voegBerichtToe("Mooie website", "Pietje Puk", "pietje@pettenflat.nl", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis vel quasi velit veniam autem quia a eveniet officia blanditiis expedita voluptate fuga voluptatum ullam in cumque. Dolores rem assumenda nihil!");	
}

function haalBerichtenOp() {
	global $mysqli;
	$berichten = array();
	$sql = "SELECT * FROM gastenboek ORDER BY datum DESC";
	$resultaat = $mysqli->query($sql);
	$resultaat->data_seek(0);
	while($bericht = $resultaat->fetch_assoc()) {
		$berichten[] = $bericht;
	}
	return $berichten;
}

function voegBerichtToe($titel, $naam, $email, $tekst) {
	global $mysqli;
	$insertQuery = "INSERT INTO `gastenboek` (titel, naam, email, tekst) VALUES ('%s', '%s', '%s', '%s');";
	$sql = sprintf($insertQuery, $titel, $naam, $email, $tekst);
	$mysqli->query($sql);
}

?>
