<?php

require_once "vendor/autoload.php";

use App\Classes\Student;
use App\Classes\Assistant;
use App\Classes\Professor;
use App\Classes\Dean;
use App\Classes\Course;
use App\Classes\Document;
use App\Enums\studentType;
use App\Enums\documentSign;
use App\Interfaces\signInterface;

// kreiranje instance studenata i ispis studenata
$students = [
    new Student('Marko', 'Marulić', studentType::RE),
    new Student('Ana', 'Anić', studentType::PT),
    new Student('Pero', 'Perić', studentType::RE)
];

echo "Studenti: \n";
foreach ($students as $student){
    echo $student . "\n";
}

// sortiranje studenata po ID-u
usort($students, fn($a, $b) => $a->getId() <=> $b->getId());
echo "\nStudenti sortirani po ID-u: \n";
foreach ($students as $student){
    echo $student . "\n";
}

// sortiranje studenata po prezimenu
usort($students, fn($a, $b) => strcmp($a->getLastName(), $b->getLastName()));
echo "\nStudenti sortirani po prezimenu: \n";
foreach ($students as $student){
    echo $student . "\n";
}

// kreiranje nepotvrđenog kolegija
$course = new Course("001", "Objektno orijentirano programiranje", 20);
echo "\nKolegij: \n";
echo $course . "\n";

// kreiranje profesora i asistenta za gore navedeni kolegij
$assistant = new Assistant('Filip', 'Filipović', $course->getName());
$professor = new Professor('Šime', 'Šimić', $course->getName());
echo "\n" . $assistant . "\n";
echo $professor . "\n";

// kreiranje dekana
$dean = new Dean('Mirko', 'Mirić', 'Dr.sc.');
echo "\n" . $dean . "\n";

// kreirati jedinstvenu listu i izbrojiti koliko objekata istog tipa ima u memoriji
$people = array_merge($students, [$assistant, $professor, $dean]);
$typeCounts = [];

foreach ($people as $person) {
    $className = get_class($person);
    if (!isset($typeCounts[$className])){
        $typeCounts[$className] = 0;
    }
    $typeCounts[$className]++;
}

echo "\nUkupan broj objekata:\n";
foreach ($typeCounts as $type => $count) {
    echo $type . ": " . $count . "\n";
}

// kreirati nepotpisani dokument
$document = new Document('Novi dokument', 'Opis');
echo "\n" . $document . "\n";

// ispis statusa dokumenata/kolegija prije potpisivanja
echo "\nStatus dokumenata i kolegija prije potpisa:\n";
echo "Dokument: " . $document->getName() . " je poptpisan: " . ($document->isSigned() ? documentSign::YES->value : documentSign::NO->value) . "\n";
echo "Kolegij: " . $course->getName() . " je odobren: " . ($course->isSigned() ? documentSign::YES->value : documentSign::NO->value) . "\n";

// Lista za potpis i poziv dekana na potpis
$itemsForSigning = [$course, $document];

foreach ($itemsForSigning as $item) {
    if ($item instanceof signInterface && !$item->isSigned()) {
        $dean->signCourse($item);
    } elseif ($item instanceof signInterface && !$item->isSigned()) {
        $dean->signDocument($item);
    }
}

// ispis statusa dokumenata/kolegija nakon dekanovih postupaka

echo "\nStatus dokumenata i kolegija nakon dekanovog potpisa:\n";
echo "Dokument: " . $document->getName() . " je potpisan: " . ($document->isSigned() ? documentSign::YES->value : documentSign::NO->value) . "\n";
echo "Kolegij: " . $course->getName() . " je odobren: " . ($course->isSigned() ? documentSign::YES->value : documentSign::NO->value) . "\n";
