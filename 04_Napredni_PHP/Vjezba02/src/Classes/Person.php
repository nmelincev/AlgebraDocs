<?php

namespace App\Classes;

abstract class Person {
    protected string $firstName;
    protected string $lastName;

    public function __construct(string $firstName, string $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function __toString(): string  {
        return $this->firstName . " " . $this->lastName;
    }

    public function getLastName(): string {
        return $this->lastName;
    }
}