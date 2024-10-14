<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forma za unos</title>
</head>
<body>
<form action="skripta.php" autocomplete="on" method="POST"> 
  <label for="user_name">Ime korisnika:</label><br>
  <input type="text" name="user_name" onkeypress="return event.charCode != 32" required><br>
  <label for="fav_meal">Omiljeno jelo:</label><br>
  <input type="text" name="fav_meal" onkeypress="return event.charCode != 32" value="<?php echo isset($_COOKIE['OmiljenoJelo']) ? $_COOKIE['OmiljenoJelo'] : ''; ?>" required><br><br>
  <input type="submit" value="Pošalji">
</form>

<p>Stranica posjećena: <b>
  
<?php
echo $_SESSION["count"];
?>

</b> puta.</p>
</body>
</html>