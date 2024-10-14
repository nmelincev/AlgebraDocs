<?php

declare(strict_types = 1 ); // stroga tipizacija

// 1. Zadatak
// Napiši funkciju koja vraća neki tekst
// Pozovite funkciju i vraćenu vrijednost spremite u varijabli.
// Ispišite vrijednost varijable.

function vratiTekst(): string {   // definiran return type sa :string
    return "Ovo je neki tekst";
}

$tekst = vratiTekst();
echo $tekst;

// 2. Zadatak
// Napiši funkciju koja ima 2 parametra (name, surname).
// Funkcija treba konkatenirati name i surname i zapisati u lokalnu varijablu.
// Zatim vrijednost u lokalnoj varijabli treba pretvoriti u veliku slova.
// Funkcija treba vratiti vrijednost lokalne varijable.
// Pozovite funkciju i spremite vraćenu vrijednost u varijablu.
// Ispišite vrijednost varijable.
$age = 30;
function fullName(string $name, string $surname): string { // definirani da parametri name i surname moraju biti tipa string
    $result = $name . " " . $surname . " " . $GLOBALS["age"]; // dodavanje globalne varijable definirane izvan funkcije
    return mb_strtoupper($result); // ispisivanje velikim slovima
}

$fullName = fullName("John" , "Doe"); // pozicijski unos
// echo $result; // primjer da nije moguce pozvati lokalnu varijablu
echo $fullName;

$fullName = fullName(surname:"John" , name:"Doe"); // imenovani unos
echo $fullName;

// 3. Zadatak Callback funkcija

function math(int $a, int $b, callable $callback): int {
    return $callback($a, $b);
}

echo math(5, 10, "add");

function add($a, $b){
    return $a + $b;
}

add(5, 10);

$zbroji = "add";
$zbroji(5, 10);

// Custom array_filter funkcija bez korištenja callback funkcije
function customArrayFilter(array $array): array {
    $result = [];
    foreach ($array as $value){
        if ($value % 2 === 0){
            $result[] = $value;
        }
    }
    return $result;
}

$even = customArrayFilter([1, 2, 3, 4, 5]);

// Custom array_filter funkcija sa korištenjem callback funkcije
function customArrayFilterCallback(array $array, callable $callback): array {
    $result = [];
    foreach ($array as $value){
        if ($callback($value)){
            $result[] = $value;
        }
    }
    return $result;
}

?>