<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <title>Praxe Netup</title>
</head>
<body>
   <h1>Obrazky o jidlu</h1>
   <form method="post" enctype="multipart/form-data" action="script.php">
   

	<input type="text" name="cislo" >
    <input type="file" name="soubor[]" id="soubor" multiple="multiple">
    <input type="submit" value="Nahrát">

	</form>
	<a href="./zobrazeni.php">Obrazky</a>
	<a href="./zobrazenirecenze.php?cislo=1">Obrazkyrecenze1</a>
	<a href="./zobrazenirecenze.php?cislo=2">Obrazkyrecenze2</a>
	<a href="./zobrazenirecenze.php?cislo=3">Obrazkyrecenze3</a>
	</body>
</html>
