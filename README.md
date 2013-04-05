# Gastenboek Lab
Dit is een lab om tot een werken gastenboek in **PHP** met een **MySQL database** te maken. Er wordt vooral aandacht besteed aan de verschillende aspecten die hiervoor nodig zijn zoals de HTML, het gebruik van de database en het versturen van formulieren. Het gastenboek zelf is functioneel vrij eenvoudig. 

Dit lab bevat een aantal opdrachten om dingen op te zoeken en een aantal opdrachten waarbij je de code aan moet passen.

Het lab is opgebouwd uit een aantal stappen. Volg deze stappen en sla geen opdrachten over. Op die manier leer je het meeste. 

**Schrijf de antwoorden op de vragen in een tekstbestand en lever deze samen met de aangepaste .php bestanden en een link naar je werkende gastenboek in aan het einde van het lab!**

## Stap 0: Online plaatsen
* Download dit lab van GitHub en plaats de bestanden op een webserver. Op deze manier kun je het gastenboek testen!
* (Is niet nodig voor ROC account) Maak eventueel met behulp van mysql-workbench of phpMyAdmin een nieuwe database aan op de databaseserver. (http://www.mysql.com/downloads/workbench/)

## Stap 1: De HTML en CSS (nog geen PHP)
Open `gastenboek-stap1.php` en `style.css`.

In `gastenboek-stap1.php` staat alleen maar HTML code. We gaan tijdens het lab stap voor stap de inhoud vervangen door gegevens die uit een database komen. 

Samen met de CSS vormt de HTML de basis voor het gastenboek. De pagina bevat een opsomming van berichten die in een gastenboek zouden kunnen staan. Onderaan de pagina staat een formulier. Dit formulier gebruiken we later om een nieuw bericht toe te voegen aan het gastenboek.

### Uitzoekvragen
1. Zoek op internet naar de verschillende invoervelden die je kunt gebruiken in een formulier. Noem er vijf, en noem een voorbeeld waar je voor zou kunnen gebruiken.
2. Waar is het `placeholder` attribuut voor?
3. Waar is het `required` attribuut voor?
4. Hoe kun je de verschillende invoerveldtypen stylen? Zoek naar aanwijzingen in de CSS.

### Opdrachten
1. Voeg aan het formulier een veld to waarin de bezoeker een e-mailadres achter kan laten. Gebruik hiervoor een speciaal invoerveld voor e-mailadressen.

## Stap 2: Database!
De berichten die door de bezoekers van het gastenboek aangemaakt worden moeten ergens worden opgeslagen. We gebruiken hiervoor een database. Een database kun je gebruiken om gegevens in op te slaan en uit op te vragen. Databases worden heel veel gebruikt en er zijn verschillende soorten. 

Wij gebruiken in deze opdracht MySQL. MySQL is een relationele database. Dat betekent dat de gegevens in tabellen opgeslagen worden. Deze tabellen kunnen relaties hebben met andere tabellen. 

Iedere tabel bevat 'kolommen' met velden en 'rijen' met gegevens. De kolommen kunnen verschillende types hebben. Zo kun je kolommen maken waarin je tekst op kan slaan, maar ook voor datums, getallen en binaire data zijn er mogelijkheden. De tabel voor het gastenboek ziet er zo uit:

| id  | datum               | naam        | email            | bericht  |
|----:|--------------------:|-------------|------------------|----------|
| 1   | 10-03-2013 20:12:34 | Jan         | jan@eendomein.nl | Lorem... |
| 2   | 11-03-2013 21:12:34 | Piet        | jan@eendomein.nl | Lorem... |
| 3   | 12-03-2013 7:12:34  | Kees        | jan@eendomein.nl | Lorem... |
| 4   | 13-03-2013 20:12:34 | Laura       | jan@eendomein.nl | Lorem... |
| 5   | 14-03-2013 20:12:34 | Dennis      | jan@eendomein.nl | Lorem... |

De eerste kolom bevat een uniek nummer dat automatisch door de database wordt gegenereerd. Het is altijd handig om een unieke id kolom te hebben zodat je makkelijk bepaalde rijen uit de datase kunt ophalen.

Tip: kijk in'het boek 'The Manga Guide To Databases' voor meer informatie.

Alle handelingen die met de database te maken hebben heb ik in het bestand `database.php` geplaatst.

Om gebruik te kunnen maken van een MySQL databas moet je eerst verbinding maken met de databaseserver. Hiervoor heb je een gebruikersnaam en een wachtwoord nodig. Je kunt hiervoor de variabelen in het bestand `database.php` aanpassen.

Als je de webhosting van school gebruikt kun je dezelfde inloggegevens gebruiken als voor het plaatsen van de website.

Pas deze variabelen aan:
```php
$gebruikersnaam = "sXXXXXX"; 			// je studentnummer
$wachtwoord = "geheim"; 					// je wachtwoord
$databaseserver = "localhost"; 	  // localhost of student.rocvantwente.nl
$databasenaam = "sXXXXXX";  		  // databasenaam (je studentnummer)

// maak verbinding met de database
mysql_connect($databaseserver, $gebruikersnaam, $wachtwoord);
```

Als er verbinding is gemaakt met de databaseserver moet je een database selecteren (je kunt meerdere databases op een databaseserver gebruiken). Dit gebeurt met het commando `mysql_select_db`:
```php
// selecteer een database
mysql_select_db($databasenaam);
```

Daarna kunnen we SQL queries uitvoeren en eventueel de resultaten hiervan verwerken. Bijvoorbeeld:
```php
$sql = "SELECT * FROM gastenboek ORDER BY datum DESC";

$resultaat = mysql_query($sql);

while($bericht = mysql_fetch_assoc($resultaat)) {
	$berichten[] = $bericht;
}
```

Je hoeft op de variabelen bovenaan in het bestand na niets aan te passen aan het bestand `database.php`.

### Uitzoekvragen
1. Wat betekent de afkorting SQL?
2. Geef een voorbeeld van een SQL query die gegevens uit een database ophaalt.
3. Geef een voorbeeld van een SQL query die gegevens uit een database verwijdert.
4. Kun je SQL alleen voor MySQL gebruiken of ook voor andere databasesystemen?

### Opdrachten
1. Pas in het bestand `gastenboek-stap2.php` de code zo aan dat er testdata in de database wordt geplaatst.
2. Pas in het bestand `gastenboek-stap2.php` de code zo aan dat de (test)data uit de database wordt opgehaald.

## Stap 3: De opgehaalde data verwerken in het gastenboek.
We kunnen nu data ophalen uit de database, maar ik op de webpagina is daar nog niets van te zien. De opgehaalde gegevens moeten nog worden verwerkt in de HTML van het gastenboek.

We lopen met een `foreach` loop door de opgehaalde berichten en maken voor ieder bericht een blok HTML code aan. In het bestand `gastenboek-stap3.php` zie je dat er nog maar een `<li>` element is blijven staan, maar dat dit element binnen een foreach blok is geplaatst. Hierdoor wordt dit blok zo vaak herhaalt als er berichten zijn in de database.

```php
<?php 
foreach ($berichten as $bericht) {
?>
	<li class="bericht">
		<h2 class="titel"><?php echo $bericht['titel']; ?></h2>
		<span class="afzender">Iemand</span>
		<span class="datum">Ooit</span>
		<div class="tekst">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis vel quasi velit veniam autem quia a eveniet officia blanditiis expedita voluptate fuga voluptatum ullam in cumque. Dolores rem assumenda nihil!</p>
			...
		</div>
	</li>
<?php
}
?>
```			

### Opdrachten
1. Pas de code zo aan dat niet alleen de titel netjes wordt ingevuld met de waarde uit de database, maar ook alle andere velden.

## Stap 4: Nieuwe berichten toevoegen
Het toevoegen van nieuwe berichten is de laatste stap die nodig is om je gastenboek af te maken. De door de bezoeker ingevulde gegevens (in het HTML formulier) moet je met behulp van PHP in de database zien te krijgen.

Uiteindelijk zorgt de functie `voegBerichtToe` in de `database.php` er voor dat dit gebeurt.
```php
function voegBerichtToe($titel, $naam, $email, $tekst) {
	$insertQuery = "INSERT INTO `gastenboek` (titel, naam, email, tekst) VALUES ('%s', '%s', '%s', '%s');";
	$sql = sprintf($insertQuery, $titel, $naam, $email, $tekst);
	mysql_query($sql);
}
```
Deze functie krijgt de ingevulde velden mee als argumenten en maakt hier een SQL query van. Dit gebeurt door middel van de `sprintf` functie om SQL injectie te voorkomen.

De functie `mysql_query` voert de SQL query uit. Hierdoor wordt het bericht opgeslagen in de database.

### Uitzoekvragen
1. Wat zijn de verschillende http methodes om een HTML formulier te versturen vanuit een browser?
2. Hoe kan je in PHP een waarde die een bezoeker in het formulier heeft ingevuld opvragen?
3. Welke code in `gastenboek-stap4.php` zorgt er voor dat er alleen als er een formulier is ingevuld een nieuw bericht wordt aangemaakt?
4. Wat is SQL injectie?

Open het bestand `gastenboek-stap4.php` om de opdrachten uit te voeren.

### Opdrachten
1. Pas de form tag zo aan dat het formulier met de POST methode wordt verstuurd naar `gastenboek-stap4.php`.
2. Zorg ervoor dat de door de bezoeker ingevulde waardes gebruikt worden om een nieuw bericht toe te voegen.
3. Plaats het gastenboek in de website van je project (plaats je projectwebsite op de server).

**Test je gastenboek!**

## Inleveren
* De antwoorden op de uitzoekvragen
* Alle PHP bestanden
* Een link naar je werkende gastenboek

## Extra stappen (vrijblijvend, voor extra bonuspunten)
Het gastenboek is af. Als het goed is heb je nu een werkend gastenboek. Het is echter een vrij eenvoudig gastenboek. Misschien is het een goed idee om het nog beter te maken.

Een paar mogelijkheden hiervoor zijn:
* Foutafhandeling: wat te doen als het verbinden met de database niet lukt?
* Het verwijderen van berichten vanaf een aparte beheerpagina.
* Een captcha toevoegen om spam te voorkomen.
* JavaScript gebruiken om het formulier te valideren.
