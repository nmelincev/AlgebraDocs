<?php

function generator(): Generator {
    yield "Ovo je prvi tekst"; // pauzira pa vrati vrijednost
    yield "Ovo je drugi tekst";
    yield "Ovo je treći tekst";
}

$gen = generator();
foreach ($gen as $value){
    echo $value . "<br />";
}

?>