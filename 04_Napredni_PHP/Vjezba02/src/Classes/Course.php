<?php

namespace App\Classes;

use App\Interfaces\signInterface;
use App\Enums\documentSign;

class Course implements signInterface{
    private string $code;
    private string $name;
    private int $ects;
    private documentSign $signed;

    public function __construct(string $code, string $name, int $ects) {
        if ($ects < 20 || $ects > 30) {
            echo "ECTS bodovi moraju biti između 20 i 30.";
        }
        $this->code = $code;
        $this->name = $name;
        $this->ects = $ects;
        $this->signed = documentSign::NO;
    }

    public function sign(){
        $this->signed = documentSign::YES;
    }

    public function getName(): string {
        return $this->name;
    }

    public function isSigned(): bool {
        return $this->signed === documentSign::YES;
    }

    public function __toString() {
        return "Šifra: " . $this->code . " - " . "Naziv: " . $this->name . " - " . "ECTS: " . $this->ects . " - " . "Odobren: " . $this->signed->value;
    }
}