<?php

class RegistrationException extends Exception {}

function verifyUsername($username) {
    if (!ctype_alnum($username)) {
        throw new RegistrationException("Korisničko ime smije sadržavati samo alfanumeričke znakove. \n");
    }
}

function verifyEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new RegistrationException("E-mail adresa nije valjana. \n");
    }
}

function passwordGenerator($chars){
    $data = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz";
    return substr(str_shuffle($data), 0, $chars);
}

function registerUser($username, $email, $password) {
    try {
        verifyUsername($username);
        verifyEmail($email);       
        echo "Uspješna registracija korisnika! \n";
    } catch (RegistrationException $e) {
        echo "Greška: " . $e->getMessage();
    }
}

$username = "mmarulic";
$email = "markomarulic@gmail.com";
$password = passwordGenerator(6);

registerUser($username, $email, $password);
var_dump($username, $email, $password);

?>
