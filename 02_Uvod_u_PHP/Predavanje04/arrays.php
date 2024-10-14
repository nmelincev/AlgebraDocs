<?php

// Kreiraj niz koji sadrzi imena 5 vocaka
// Dodaj na kraj niza dvije nove vocke koristenjm uglatih zagrada i ugradjene php array funkcije
// izbrsi prvi element u nizu

$fruits = ["jabuke", "banane", "narance", "kiwi", "mango"];

// dodavanje
$fruits[] = "ananas"; // dodavanje novog elementa na kraju liste [5]
array_push($fruits, "grožđe"); // ubacivanje preko funkcije

// brisanje
unset($fruits[0]);
array_shift($fruits);

print_r($fruits);

// Kreiraj 2 niza koji sadrze po tri broja
// spoji ova dva niza u jedan niz

$prvi = [2 , 3, 7];
$drugi = [2, 5, 9];

$spojeniNiz = array_merge($prvi, $drugi);
$spojeniNiz = [...$prvi, ...$drugi];
print_r($spojeniNiz);

// Kreiraj niz koji sadrzi 5 ocjena. Izračunaj prosjecnu ocjenu.

$ocjene = [2, 4, 5, 3, 4];
$rezultat = array_sum($ocjene) / count($ocjene);
print_r($rezultat);

// Kreiraj niz s 10 brojeva i izdvoji sve brojeve vece od 5 u novi niz

$brojevi = [1, 8 ,6 ,4 ,8, 3, 7, 1, 0, 5];
$brojeviVeciOdPet = array_values(array_filter($brojevi, function($broj){
    return $broj > 5;
}));
print_r($brojeviVeciOdPet);


?>