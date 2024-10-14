<?php

$studenti = [
    "Ana" => 95,
    "Ivan" => 85,
    "Petar" => 75,
    "Maja" => 65,
    "Jasna" => 55,
    "Marko" => 45,
    "Iva" => 35,
    "Luka" => 25,
    "Klara" => 15,
    "Filip" => 5
];

foreach($studenti as $ime => $bodovi){
    echo "Student/ica $ime je dobio/la ocjenu ";
    if ($bodovi > 92){
        echo "Odličan";
    } else if ($bodovi > 75){
        echo "Vrlo dobar!";
    } else if ($bodovi > 62){
        echo "Dobar!";
    } else if ($bodovi > 51){
        echo "Dovoljan!";
    } else {
        echo "Nedovoljan!";
    }
    echo "<br />";
}

// Napišite PHP skriptu koja provjerava koji je dan u tjednu i ispisuje odgovarajuću poruku.

$danUTjednu = date("N");

switch($danUTjednu){
    case 1:
        echo "Danas je ponedjeljak";
        break;
    case 2:
        echo "Danas je utorak";
        break;
    case 3:
        echo "Danas je srijeda";
        break;
    case 4:
        echo "Danas je četvrtak";
        break;
    case 5:
        echo "Danas je petak";
        break;
    case 6:
        echo "Danas je subota";
        break;
    case 7:
        echo "Danas je nedjelja";
        break;
    default: // ako nijedan slučaj nije zadovoljen (u ovom slučaju nama nije potrebno ovo)
    echo "Nepoznat dan";
    break;
}

for($i = 1; $i <=10; $i++){
    if($i === 3){
        continue; // prekida trenutnu iteraciju ali ne prekida petlju
    }
    echo $i . "<br />";
    // break; // prekid petlje nakon 1. iteracije
    // return; // prekid petlje (koristi se u funkcijama)

}

?>