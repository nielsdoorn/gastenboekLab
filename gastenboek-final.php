<?php 

require('database.php');

maakTabelAan();

if (isset($_POST['aktie']) && $_POST['aktie'] == 'nieuwbericht') {
	voegBerichtToe($_POST['titel'], $_POST['naam'], $_POST['email'], $_POST['tekst']);
}

$berichten = haalBerichtenOp();

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Gastenboek lab</title>
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div id="container">
	<div id="header">
		<h1>Gastenboek</h1>
	</div>
	<div id="main">

		<ul>
			<?php 
			foreach ($berichten as $bericht) {
			?>
				<li class="bericht">
					<h2 class="titel"><?php echo $bericht['titel']; ?></h2>
					<span class="afzender"><?php echo $bericht['naam']; ?></span>
					<span class="datum"><?php echo $bericht['datum']; ?></span>
					<div class="tekst">
						<?php echo $bericht['tekst']; ?>
					</div>
				</li>
			<?php
			}
			?>
		</ul>

		<form action="gastenboek-final.php" method="post">
			<h2>Nieuw bericht</h2>
			<input type="hidden" name="aktie" value="nieuwbericht">
			<label for="titel">Titel:</label><input type="text" name="titel" placeholder="De titel van het bericht" required="yes">
			<label for="naam">Uw naam:</label><input type="text" name="naam" placeholder="Uw naam" required="yes">
			<label for="email">Uw e-mailadres:</label><input type="email" name="email" placeholder="Uw e-mailadres" required="yes">
			<label for="tekst">Bericht:</label>
			<textarea name="tekst" placeholder="Uw bericht" required="yes"></textarea>
			<input type="submit" value="verstuur">
		</form>
	</div>
</div>
</body>
</html>