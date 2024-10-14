<?php

$prodaja = [
    ['ime_proizvoda' => 'Laptop', 'kategorija' => 'Elektronika', 'cijena' => 800, 'količina' => 10],
    ['ime_proizvoda' => 'Hladnjak', 'kategorija' => 'Aparati', 'cijena' => 600, 'količina' => 5],
    ['ime_proizvoda' => 'Smartphone', 'kategorija' => 'Elektronika', 'cijena' => 500, 'količina' => 15],
    ['ime_proizvoda' => 'Mikser', 'kategorija' => 'Aparati', 'cijena' => 100, 'količina' => 8],
    ['ime_proizvoda' => 'Televizor', 'kategorija' => 'Elektronika', 'cijena' => 1000, 'količina' => 7],
    ['ime_proizvoda' => 'Perilica', 'kategorija' => 'Aparati', 'cijena' => 750, 'količina' => 4],
    ['ime_proizvoda' => 'Sušilica', 'kategorija' => 'Aparati', 'cijena' => 800, 'količina' => 3],
    ['ime_proizvoda' => 'Slušalice', 'kategorija' => 'Elektronika', 'cijena' => 150, 'količina' => 20],
    ['ime_proizvoda' => 'Toster', 'kategorija' => 'Aparati', 'cijena' => 50, 'količina' => 10],
    ['ime_proizvoda' => 'Blender', 'kategorija' => 'Aparati', 'cijena' => 120, 'količina' => 6],
    ['ime_proizvoda' => 'Tablet', 'kategorija' => 'Elektronika', 'cijena' => 450, 'količina' => 12],
    ['ime_proizvoda' => 'Usisavač', 'kategorija' => 'Aparati', 'cijena' => 400, 'količina' => 5],
    ['ime_proizvoda' => 'Sokovnik', 'kategorija' => 'Aparati', 'cijena' => 300, 'količina' => 7],
];

function filtrirajPoKategoriji($prodaja, $kategorija){
    $filtriraneProdaje = array_filter($prodaja, function($filter) use ($kategorija){
        return ($filter["kategorija"] == $kategorija);
    });
    return $filtriraneProdaje;
}

function izracunajUkupniPrihod($filtriraneProdaje){
    $cijena = array_sum(array_column($filtriraneProdaje, "cijena"));
    $kolicina = array_sum(array_column($filtriraneProdaje, "količina"));
    $ukupniPrihod = $cijena * $kolicina;
    return $ukupniPrihod;
}


$kategorija = "Aparati";
$odabir = filtrirajPoKategoriji ($prodaja, $kategorija);
print "Prikaz liste: " . $kategorija . " <br> \n";
print_r($odabir);

$prihodPoOdabiru = izracunajUkupniPrihod($odabir);
print "<br> Ukupni prihod po kategoriji: " . $kategorija . " je ". $prihodPoOdabiru . " <br> \n";

$cijena = array_column($odabir, "cijena");
$kolicina = array_column($odabir, "količina");

array_multisort($cijena, SORT_DESC, $kolicina, SORT_DESC, $odabir);
print "Sortirani niz po cijeni silazno: <br> \n";
print_r($odabir);


?>