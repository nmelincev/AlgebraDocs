<?php

const BOOKS_FILE = "books.json"; // konstanta (od verzije php 8 umjesto define)

// Učitavanje knjiga iz json datoteke.

function loadBooks(string $path = BOOKS_FILE): array {
    if (!file_exists($path)) { // za prevenciju u slucaju da datoteka ne postoji
        return [];
    }
    $books = file_get_contents($path); // file_get_contents vrati sadrzaj datoteke kao string (ako dodje false, ne radi)
    return json_decode($books, true); // json_decode za DEserijalizaciju sadrzaja
}

// Spremanje knjiga u json datoteku.

function saveBooks(array $books, string $path = BOOKS_FILE): void {
    $jsonBooks = json_encode($books, JSON_PRETTY_PRINT); // encode je za serijalizaciju, json_pretty_print je jedan od tagova (dobiva array, vraca string)
    file_put_contents($path, $jsonBooks); // pohrana u datoteku
}

// Dodavanje nove knjige.

function addBook(string $title, string $author, int $year): int {
    $books = loadBooks(); // ucitaj sve iz jsona
    $newID = empty($books) ? 1 : max(array_column($books, "id")) + 1; // ako je json prazan vrati 1, ako nije pogledaj u koloni ID (novom nizu) najveću vrijednost sa max i inkrementiraj ga (gotovo riješenje je korištenje funkcije uniqid())
    $books[] = [
        "id" => $newID, 
        "title" => $title,
        "author" => $author,
        "year" => $year
    ]; // na kraj niza dodaj novi podatak o knjizi
    saveBooks($books); // zapisuje se iz json
    return $newID;
}

// Ažuriranje postojeće knjige.

function updateBook(int $id, ?string $title = null, ?string $author = null, ?int $year =  null): bool{ // sa null je opcionalan argument, ? preispituje tip argumenta (isto kao string|null)
    $books = loadBooks();
    foreach ($books as &$book){ // reference kroz foreach petlju, pogodna za ovu situaciju
        if ($book["id"] === $id){
            $book["title"] = $title ?? $book["title"]; // ?? provjerava je li null, ako je, uzmi vrijednost sa desne strane 
            $book["author"] = $title ?? $book["author"];  
            $book["year"] = $title ?? $book["year"];
            saveBooks($books);
            return true; 
        }
    }
 /*    foreach($books as $key => $book){ -----> drugi način
        if($book["id"] === $id){
            $books[$key]["title"] = $title ?? $book["title"];
            $books[$key]["author"] = $title ?? $book["author"];
            $books[$key]["year"] = $title ?? $book["year"];
            saveBooks($books);
            return true;
        }
    }
*/
    return false;
}

// Dohvati knjigu po ID-u.

function getBookById(int $id): ?array {
    $books = loadBooks();
    foreach ($books as $book){ // za id-e je ok ali za autore, knjige i sl ne bi bilo dobro ako bi bilo vise istih unosa a foreach bi izisao nakon prvog pronadjenog elementa
        if ($book["id"] === $id){
            return $book;
        }
    }
/*    array_map(function($book){ // ovo bi bilo za autore, tittle, year i sl ako ih ima vise
        if ($book["id"] === $id){
            return $book;
        }
    }, $books);
*/
    return null;
}

// Brisanje knjige po ID-u.

function deleteBook(int $id): bool{
    $books = loadBooks();
//  $newBooks = array_filter($books, fn($book) => $book["id"] !== $id); // fn je slično normalnoj funkciji ali bez vitičastih zagrada, nema returna i nakon funkcije se stavlja => (kao za mape u nizu)
    $newBooks = array_filter($books, function($book) use ($id){ // use ($id) - za callback/anonimnu funkciju -  koristi se za pristup $id iz gornje (roditeljske) funkcije kao da je njezin argument, u suprotnom javlja grešku (problem scope-a)
        return $book["id"] !== $id;
    });
    if(count($books) === count($newBooks)){ // ako je broj elementa izmedju books i newbooks nepostojeci, nece odraditi radnju brisanja
        return false;
    }
    saveBooks($newBooks);
    return true;
}

// updateBook(id: 1, author: "Ivo Andrić"); // poziv funkcije - imenovani parametri (ako ne želimo upisati redom argumente tj npr title)
// deleteBook(4);
?>