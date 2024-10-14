<?php

$cijeli_broj = 10;
$realni_broj = 10.1;
$tekstualni_podatak = "Vjezba02";
$logicka_vrijednost = true;

print "<br />broj: $cijeli_broj " . "je tip podatka " . gettype($cijeli_broj);
print "<br />broj: $realni_broj " . "je tip podatka " . gettype($realni_broj);
print "<br />tekst $tekstualni_podatak " . "je tip podatka " . gettype($tekstualni_podatak);
print "<br />oznaka: $logicka_vrijednost " . "je tip podatka " . gettype($logicka_vrijednost);

define("PI", 3.14);
print "<br />";
print PI . " je konstanta PI";

$a = 1;
$b = &$a;
print "<br />varijabla b iznosi: " . $b;
$a = 2;
print "<br />varijabla b sada iznosi: " . $b;

?>