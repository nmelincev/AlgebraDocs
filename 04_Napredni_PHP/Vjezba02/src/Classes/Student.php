<?php

namespace App\Classes;

use App\Enums\studentType;

class Student extends Person {
    private static $idCounter = 1;
    private int $id;
    private studentType $type;

    public function __construct(string $firstName, string $lastName, studentType $type) {
        parent::__construct($firstName, $lastName);
        $this->id = self::$idCounter++;
        $this->type = $type;
    }

    public function getId(): int{
        return $this->id;
    }

    public function __toString(): string {
        return "ID: " . $this->id . " - " . parent::__toString() . " - " . $this->type->value;
    }
}