<?php

$a = 1;
print "varijabla a iznosi: " . $a . "<br >";
$b = 2;
print "varijabla b iznosi: " . $b . "<br />";
$c = "varijabla c";
$d = "varijabla d";

print "a + b = " . $a + $b . "<br />";
print "a - b = " . $a - $b . "<br />";
print "a * b = " . $a * $b . "<br />";
print "a / b = " . $a / $b . "<br />";
print "a % b = " . $a % $b . "<br />";

$f = "varijabla f je skup " . $c . " i " . $d . "<br />";
print $f;

$a += $b;
$b *= $a;
print "varijabla a iznosi sada: " . $a . " --> (a + b) <br />";
print "varijabla b iznosi sada: " . $b . " --> (b * a) <br />";

var_dump($a > $b);
print " --> varijabla a nije veca od varijable b <br />";

print "vrijednost varijable a iznosi: " . $a++ . " te ce se ona uvecati za +1 pa ce iznositi " . $a . "<br />";
print "vrijednost varijable b iznosi: " . $b-- . " te ce se ona umanjiti za -1 pa ce iznositi " . $b . "<br />";
?>