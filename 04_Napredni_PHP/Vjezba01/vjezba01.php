<?php

declare(strict_types=1);

class Korisnik{
    private string $ime;
    private string $prezime;
    private string $email;

    public function __construct(string $ime, string $prezime, string $email){
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->email = $email;
    }

    public function setIme(string $ime): void{
        $this->ime = $ime;
    }

    public function getIme(): string{
        return $this->ime;
    }

    public function setPrezime(string $prezime): void{
        $this->prezime = $prezime;
    }

    public function getPrezime(): string{
        return $this->prezime;
    }

    public function setEmail(string $email): void{
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->email = $email;
        }
        else {
            throw new InvalidArgumentException("Neispravan format email adrese!");
        }
    }

    public function getEmail(): string{
        return $this->email;
    }
}

$korisnik = new Korisnik('Marko', 'Maric', 'mmaric@gmail.com');
var_dump($korisnik->getEmail());

$korisnik1 = new Korisnik('Marko', 'Maric', 'mmaric1@gmail.com');
var_dump($korisnik1->getEmail());
try{
    $korisnik1->setEmail('neki email');
    } catch (InvalidArgumentException $e){
    echo $e->getMessage();
    }
