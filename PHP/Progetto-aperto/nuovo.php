<?php
require __DIR__ . "/comune.php";
require __DIR__ . "/modulo.php";

$u = richiediUtente();
$annuncio = ["titolo" => "", "testo" => "", "categoria" => "vendo"];
$errori = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $annuncio = [
        "titolo"    => trim($_POST["titolo"] ?? ""),
        "testo"     => trim($_POST["testo"] ?? ""),
        "categoria" => $_POST["categoria"] ?? "",
    ];
    $errori = validaAnnuncio($annuncio);

    if (count($errori) === 0) {
        // L'autore è l'utente della sessione, mai un valore inviato dal modulo
        db()->prepare("INSERT INTO annunci (id_utente, titolo, testo, categoria) VALUES (:utente, :titolo, :testo, :categoria)")
            ->execute($annuncio + ["utente" => $u["id"]]);
        flash("ok", "Annuncio pubblicato.");
        header("Location: index.php");
        exit;
    }
}

testa("Nuovo annuncio");
modulo($annuncio, $errori, "nuovo.php");
coda();
