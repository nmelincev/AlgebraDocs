<?php

namespace App\Classes;

use App\Interfaces\signInterface;

class Dean extends Person {
    private string $title;


    public function __construct(string $firstName, string $lastName, string $title) {
        parent::__construct($firstName, $lastName);
        $this->title = $title;
    }

    public function signCourse(signInterface $course){
        $course->sign();
    }

    public function signDocument(signInterface $document){
        $document->sign();
    }

    public function __toString(): string {
       return "Dekan: " . parent::__toString() . " - " . $this->title;
    }
}