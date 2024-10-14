<?php
    function unosPodataka ($korisnik, $omiljenoJelo){
        $datoteka = "podaci.json";
        if (file_exists($datoteka)){
            $podaci = json_decode(file_get_contents($datoteka), TRUE);
            $podaci[] = ["Ime korisnika" => $korisnik, "Omiljeno jelo" => $omiljenoJelo];
            $podaci = array_values(array_unique($podaci, SORT_REGULAR));
            file_put_contents($datoteka, json_encode($podaci, JSON_PRETTY_PRINT));
        }
        else{
            $podaci[] = ["Ime korisnika" => $korisnik, "Omiljeno jelo" => $omiljenoJelo];
            file_put_contents($datoteka, json_encode($podaci, JSON_PRETTY_PRINT));
        }
        
    }
?>