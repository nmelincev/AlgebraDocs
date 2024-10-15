<?php

$pdo = new PDO("mysql:host=localhost;dbname=adventureworkshop;charset=utf8", "root", "", [PDO::ATTR_DEFAULT_FETCH_MODE]); 
// za pristup bazi, prvi parameter je naziv baze tj dsn, drugi username i treci password, cetvrti je opcionalan da ne moramo u fetchall indicirati

$id = "1 OR 1=1";
$stm = $pdo->prepare("SELECT * FROM proizvod where IDProizvod = ?"); //za sprecavanje sql injectiona, ? je placeholder
$stm->execute([$id]); // sanitizacija da sprijeci sql injection
$res = $stm->fetchAll(); // dohvacanje podataka (asocijativni array koji je ujedno i defaultni)

var_dump($res);