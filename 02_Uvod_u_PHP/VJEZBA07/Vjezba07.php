<?php

const PODACI = "podaci.txt";

// Provjera postoji li i može li se čitati datoteka podaci.txt, ako ne postoji ispište grešku

if (!is_readable(PODACI)){
    print "Datoteka ne postoji";
}

// Čitanje, prilagodba zapisa (uklanjanje viška praznog prostora) i parsiranje podataka koristeći znak ;

$datoteka = fopen(PODACI, "r") or die("Ne mogu otvoriti datoteku: " . PODACI); 


$podaci = [];
while(!feof($datoteka)){
    $podaci[] = fgets($datoteka);
    $podaci = array_filter(array_map("trim", file(PODACI)), "strlen");
    $podaci = preg_replace("/\s+/", "", $podaci);
    $ime = [];
    $prezime = [];
    $godine = [];
    foreach ($podaci as $key => $value){
        list ($a, $b, $c) = explode (";", $value);
        $ime[]["ime"] = $a;
        $prezime[]["prezime"] = $b;
        $godine[]["godine"] = $c;
    }

}

// Pohrana u jedan višedimenzionalni niz

$podaciNiz = [];
foreach($ime as $key => $value){
    $value2 = $prezime[$key];
    $value3 = $godine[$key];
    $podaciNiz[$key] = $value + $value2 + $value3;
}

// Ispis niza

fclose($datoteka);
print_r($podaciNiz);

// Zapis u novu datoteku

file_put_contents("datoteka2.json", json_encode($podaciNiz));

?>