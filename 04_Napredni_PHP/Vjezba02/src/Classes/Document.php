<?php

namespace App\Classes;

use App\Interfaces\signInterface;
use App\Enums\documentSign;

class Document implements signInterface {
    private string $title;
    private string $content;
    private documentSign $signed;

    public function __construct(string $title, string $content) {
        $this->title = $title;
        $this->content = $content;
        $this->signed = documentSign::NO;
    }

    public function sign(){
        $this->signed = documentSign::YES;
    }

    public function getName(): string {
        return $this->title;
    }

    public function isSigned(): bool {
        return $this->signed === documentSign::YES;
    }

    public function __toString() {
        return "Dokument: " . $this->title . " - " . "Poptpisan: " . $this->signed->value;
    }

}