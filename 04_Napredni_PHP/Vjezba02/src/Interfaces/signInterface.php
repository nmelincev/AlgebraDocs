<?php

namespace App\Interfaces;

interface signInterface {
    public function sign();
    public function getName(): string;
    public function isSigned(): bool;
}