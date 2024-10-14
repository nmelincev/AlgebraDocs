<?php

$filename = "names.txt";

// Otvori datoteku za čitanje

$handle = fopen($filename, "r") or die("Ne mogu otvoriti datoteku: $filename"); // die ili exit se moze koristiti ako je naziv datoteke kriv ili ne moze naci
echo fread($handle, filesize($filename));
fclose($handle); // datoteka se svaki put more releasati iz memorije

// Otvori datoteku za pisanje

/* $ zakomentirano da se ne dodaje svaki put prilikom "run"
handle = fopen($filename, "a"); // a je mod za pisanje i postavlja ponter na kraj, w je mod za pisanje ali pointer na početak ide
fwrite($handle, PHP_EOL . "John Doe");
fclose($handle);
*/

// Otvori datoteku za čitanje
$handle = fopen($filename, "r") or die("Ne mogu otvoriti datoteku: $filename");
$names = [];
while (!feof($handle)){
    $names[] = fgets($handle);
    $names = array_filter(array_map("trim", file($filename)), "strlen");
    /* if (trim($name)){ --> dr nacin
        $names[] = $name;
    }
    */
}
fclose($handle);
var_dump($names);

?>