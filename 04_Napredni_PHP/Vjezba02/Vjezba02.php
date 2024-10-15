<?php

// enumerator

enum studentType: string {
    case RE = "Redovan";
    case PT = "Izvanredan";
}

enum documentSign: string {
    case YES = "DA";
    case NO = "NE";
}

// sučelje za potpis

interface signInterface {
    public function sign();
    public function getName(): string;
    public function isSigned(): bool;
}

// bazna klasa

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

// klasa student

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

// klasa profesor

class Professor extends Person {
    private string $subject;

    public function __construct(string $firstName, string $lastName, string $subject) {
        parent::__construct($firstName, $lastName);
        $this->subject = $subject;
    }

    public function __toString(): string {
        return "Profesor: " . parent::__toString() . " - " . $this->subject;
    }
}

//klasa asistent 

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

// klasa dekan

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

// klasa kolegij
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

// klasa dokument
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
?>