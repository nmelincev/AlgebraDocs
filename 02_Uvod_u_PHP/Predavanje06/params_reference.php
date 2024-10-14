<?php
declare(strict_types=1);

$age = 30;

function promijeniGodine(int $godine): void {
    $GLOBALS["age"] = $godine;
}

promijeniGodine(40);
echo $age; // 40

function promijeniGodineReference(int &$godine, int $value): void {
    $godine = $value;
}

promijeniGodineReference($age, 50);
echo $age;

$noveGodine = 10;
promijeniGodineReference($noveGodine, 30);
echo $noveGodine;

?>