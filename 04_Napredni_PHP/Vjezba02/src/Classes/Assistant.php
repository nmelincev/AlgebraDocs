<?php

namespace App\Classes;

class Assistant extends Person {
    private string $subject;

    public function __construct(string $firstName, string $lastName, string $subject) {
        parent::__construct($firstName, $lastName);
        $this->subject = $subject;
    }

    public function __toString(): string {
        return "Asistent: " . parent::__toString() . " - " . $this->subject;
    }
}