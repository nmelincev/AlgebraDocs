
<?php

    session_start();

    if(!isset($_SESSION["count"])){
        $_SESSION["count"] = 0;
    }
    $_SESSION["count"] = $_SESSION["count"] + 1;

    include_once "obrazac.php";
    include_once "funkcijaZaUnosPodataka.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $korisnik = htmlentities(strtolower($_POST["user_name"]));
            $omiljenoJelo = htmlentities(strtolower($_POST["fav_meal"]));

            setcookie("OmiljenoJelo", $omiljenoJelo, time()+60*60*24*30, "/");
            unosPodataka($korisnik, $omiljenoJelo);
        } 
    
?>
    

