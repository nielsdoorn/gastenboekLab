<?php 

require('database.php');

maakTabelAan();

// roep de functie aan die test data in de database plaatst

// roep de functie aan die berichten uit de database haalt

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
			<li class="bericht">
				<h2 class="titel">Bericht</h2>
				<span class="afzender">Iemand</span>
				<span class="datum">Ooit</span>
				<div class="tekst">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis vel quasi velit veniam autem quia a eveniet officia blanditiis expedita voluptate fuga voluptatum ullam in cumque. Dolores rem assumenda nihil!</p>
					<p>Amet enim nulla cumque praesentium ipsum tempore aliquam adipisci debitis iste eos totam earum voluptas. Alias harum sit ratione veritatis consequuntur provident totam adipisci quae atque iusto sed aspernatur molestiae.</p>
					<p>Accusantium voluptates autem quia velit eveniet deserunt odio accusamus quam consectetur tempore earum ad quis labore deleniti quisquam tempora dicta optio perferendis voluptate nulla beatae. Aperiam placeat dolore sit officiis.</p>
					<p>Assumenda unde omnis et similique distinctio adipisci atque neque nostrum rerum recusandae? Ratione sequi dicta dolore deserunt enim modi nemo! Reprehenderit quas architecto molestias sit suscipit optio quos. Iure quos!</p>
				</div>
			</li>
			<li class="bericht">
				<h2 class="titel">Bericht</h2>
				<span class="afzender">Iemand</span>
				<span class="datum">Ooit</span>
				<div class="tekst">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis vel quasi velit veniam autem quia a eveniet officia blanditiis expedita voluptate fuga voluptatum ullam in cumque. Dolores rem assumenda nihil!</p>
					<p>Amet enim nulla cumque praesentium ipsum tempore aliquam adipisci debitis iste eos totam earum voluptas. Alias harum sit ratione veritatis consequuntur provident totam adipisci quae atque iusto sed aspernatur molestiae.</p>
					<p>Accusantium voluptates autem quia velit eveniet deserunt odio accusamus quam consectetur tempore earum ad quis labore deleniti quisquam tempora dicta optio perferendis voluptate nulla beatae. Aperiam placeat dolore sit officiis.</p>
					<p>Assumenda unde omnis et similique distinctio adipisci atque neque nostrum rerum recusandae? Ratione sequi dicta dolore deserunt enim modi nemo! Reprehenderit quas architecto molestias sit suscipit optio quos. Iure quos!</p>
				</div>
			</li>
			<li class="bericht">
				<h2 class="titel">Bericht</h2>
				<span class="afzender">Iemand</span>
				<span class="datum">Ooit</span>
				<div class="tekst">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis vel quasi velit veniam autem quia a eveniet officia blanditiis expedita voluptate fuga voluptatum ullam in cumque. Dolores rem assumenda nihil!</p>
					<p>Amet enim nulla cumque praesentium ipsum tempore aliquam adipisci debitis iste eos totam earum voluptas. Alias harum sit ratione veritatis consequuntur provident totam adipisci quae atque iusto sed aspernatur molestiae.</p>
					<p>Accusantium voluptates autem quia velit eveniet deserunt odio accusamus quam consectetur tempore earum ad quis labore deleniti quisquam tempora dicta optio perferendis voluptate nulla beatae. Aperiam placeat dolore sit officiis.</p>
					<p>Assumenda unde omnis et similique distinctio adipisci atque neque nostrum rerum recusandae? Ratione sequi dicta dolore deserunt enim modi nemo! Reprehenderit quas architecto molestias sit suscipit optio quos. Iure quos!</p>
				</div>
			</li>
			<li class="bericht">
				<h2 class="titel">Bericht</h2>
				<span class="afzender">Iemand</span>
				<span class="datum">Ooit</span>
				<div class="tekst">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis vel quasi velit veniam autem quia a eveniet officia blanditiis expedita voluptate fuga voluptatum ullam in cumque. Dolores rem assumenda nihil!</p>
					<p>Amet enim nulla cumque praesentium ipsum tempore aliquam adipisci debitis iste eos totam earum voluptas. Alias harum sit ratione veritatis consequuntur provident totam adipisci quae atque iusto sed aspernatur molestiae.</p>
					<p>Accusantium voluptates autem quia velit eveniet deserunt odio accusamus quam consectetur tempore earum ad quis labore deleniti quisquam tempora dicta optio perferendis voluptate nulla beatae. Aperiam placeat dolore sit officiis.</p>
					<p>Assumenda unde omnis et similique distinctio adipisci atque neque nostrum rerum recusandae? Ratione sequi dicta dolore deserunt enim modi nemo! Reprehenderit quas architecto molestias sit suscipit optio quos. Iure quos!</p>
				</div>
			</li>
		</ul>
		
		<form>
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