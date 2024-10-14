<?php

$ulazniNiz = [2, 5, 10, 15, 20, 25, 30, 3, 7, 8, 12, 17];

print "Ulazni niz: <br />";
print_r($ulazniNiz);

$filtrirani_niz = array_values(array_filter($ulazniNiz, function($filter){
    return $filter >= 10;

}));
$multipl = 2;

$izlazniNiz = array_map(function($vrijednost) use ($multipl){
    return $vrijednost * $multipl;

},$filtrirani_niz);
print "<br />Niz sa brojevima vecim (ili jednakim) 10: <br />";
print_r($filtrirani_niz);
print "<br />Prethodni niz sa udvostručenim vrijednostima: <br />";
print_r($izlazniNiz);
sort($izlazniNiz);
print "<br />Izlazni (sortirani) niz je sada: <br />";
print_r($izlazniNiz);


?>