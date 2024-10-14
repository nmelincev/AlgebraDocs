<?php

// operator dodjele
$a = 10;
$b = 20;

echo $a % $b; // ostatak je 10
echo $a += $b; // rezultat je 30
echo $a; // 30
var_dump($a.$b); // string(4) "3020"
var_dump($a); // int(30)

// operator inkrimenta
$b++; // $b = $b + 1
var_dump($b); // 21

$c = $b++; // $b = 22, $c = 21
$c = ++$b; // $b = 23, $C = 23

// operatori usporedbe

$x = 10;
$y = "10";

var_dump($x == $y); // true
var_dump($x === $y); // false
var_dump($x != $y); // false
var_dump($x <> $y); // false
var_dump($x !== $y); // true
var_dump($x > $y); // false

// logički operatori

var_dump(!$x); // false
var_dump($x && $y); // true
var_dump($x || $y); // true

// Zadatak 1

$a = 10;
$b = 20;
$c = 30;

// rezultat true/false 
// (ako je b izmedju a i c) = true
// (ako b nije izmedju a i c) = false

var_dump(($b > $a && $b < $c) || ($b < $a && $b > $c)); // true
var_dump(($b < $a && $b > $c) && ($b > $a && $b < $C)); // false

// Referenca

$a = 10;
$b = &$a; // 10
$a = 15;
echo $b; // 15
$b = 20;
echo $b; // 20 - ovo je novo, ne bi se trebala mijenjati i varijabla a koja je sada isto 20!

// stringovi

$ime = "Saša";
echo strtoupper($ime); // SAšA --> funckije str rade samo sa ASCII znakovima, š je ispisalo malo ovdje
echo mb_strtoupper($ime); // --> funkicja mb (multibite) se koristi za pravilan ispis imena - SAŠA

echo htmlspecialchars("<script>alert(\" DSDSDSDS \")</script>"); // javascript, sa naredbom htmlspeialchars se spriječava proguravanje skripte


?>