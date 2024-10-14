<?php

    // varijable
    $ime; // deklaracija
    var_dump($ime);

    $ime = 'Ivan'; // inicijalizacija
    var_dump($ime);

    // konstante

    define('PI', 3.14);
    var_dump(PI);

    // tipovi podataka:
    // integer
    $int_dek = 123;
    var_dump($int_dek);
    $int_oct = 0123;
    var_dump($int_oct);
    $int_hex = 0x1A;
    var_dump($int_hex);

    // float
    $float_var = 1.23;
    var_dump($float_var);

    // string
    $string_var = "Ovo je string \n Ovo je novi red"; // za browser se trebaju tagovi koristi <br>
    echo $string_var; // naredba echo ispisuje jedan ili vise stringova a vrati void

    $ime = "Ivan";
    $prezime = "Ivić";
    $ime_prezime = $ime . " " . $prezime; // konkatenacija
    $ime_prezime = "$ime $prezime"; // interpolacija
    echo $ime_prezime;

    // boolean
    $bool_true = true;
    $bool_false = false;
    var_dump($bool_true);
    var_dump($bool_false);

    echo $bool_true;
    echo "$bool_false 0"; // 0 kao string ne ispisuje jer je "" jednako prazno odnosno false

    var_dump(0.33 == 0.333333); // false

    // == znak za usporedbu jednakosti
    // === znak za identičnost

?>