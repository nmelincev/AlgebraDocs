<?php

$brojevi = [3, 7, 2, 8, 1, 4, 6, 9, 5, 10];

function paranBroj ($brojevi){
    return ($brojevi % 2 == 0);
}

function neparanBroj ($brojevi){
    return ($brojevi % 2 == 1);
}

$paranNiz = array_filter($brojevi, "paranBroj");
$neparanNiz = array_filter($brojevi, "neparanBroj");

print "Paran niz je : <br /> \n";
print_r($paranNiz);
print "Neparan niz je: <br /> \n";
print_r($neparanNiz);

print "Suma brojeva u nizu je: " . $suma = array_sum($brojevi) . "<br /> \n";
print "Najveći broj u nizu je: " . $najveciBroj = max($brojevi) . "<br /> \n";

$prosjek = $suma / count($brojevi);
print "Prosjek brojeva u nizu je: " . $prosjek . "<br /> \n";

foreach ($brojevi as $broj){
    if ($broj > $prosjek){
        $iznadProsjeka[] = $broj;
    }
}

print "Brojevi veći od prosječne vrijednosti u nizu su: <br /> \n";
print_r($iznadProsjeka);
?>