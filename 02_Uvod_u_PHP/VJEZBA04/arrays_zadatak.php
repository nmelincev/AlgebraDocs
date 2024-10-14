<?php

/*

Kreiraj niz koji sadrzi podatke o studentima.

1. Filtriraj studente koji imaju prosjecnu ocjenu iznad 3.5
2. Izracunaj prosjecnu ocijenu svih studenata koji su prosli filtraciju
3. Odredi broj studenata u svakoj godini studija

*/

$studenti = [
    ["ime" => "Ana", "prezime" => "Anic", "godina" => 1, "prosjek" => 4.2],
    ["ime" => "Ivan", "prezime" => "Ivanic", "godina" => 2, "prosjek" => 3.1],
    ["ime" => "Marko", "prezime" => "Markovski", "godina" => 3, "prosjek" => 3.7],
    ["ime" => "Lucija", "prezime" => "Lucic", "godina" => 1, "prosjek" => 4.8],
    ["ime" => "Hrvoje", "prezime" => "Hrvatko", "godina" => 2, "prosjek" => 4.0],
];

// 1. zadatak

$izvrsniStudenti = array_values (array_filter($studenti, function($student){
    return $student["prosjek"] > 3.5;


}));

print_r($studenti);
print_r($izvrsniStudenti);

// 2. zadatak

$array_prosjeka = array_column($izvrsniStudenti, "prosjek");
print_r($array_prosjeka);

$prosjekIzvrsnihStudenata = array_sum($array_prosjeka) /count($izvrsniStudenti);
print_r($prosjekIzvrsnihStudenata);

// 3. zadatak

$array_br_studenata = array_column($studenti, "godina");
print_r(array_count_values($array_br_studenata));
?>