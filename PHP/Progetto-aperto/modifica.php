<?php
require __DIR__ . "/comune.php";
require __DIR__ . "/modulo.php";

$u = richiediUtente();
$id = (int) ($_GET["id"] ?? 0);

// "AND id_utente = :utente": un annuncio altrui è come se non esistesse
$stmt = db()->prepare("SELECT titolo, testo, categoria FROM annunci WHERE id = :id AND id_utente = :utente");
$stmt->execute(["id" => $id, "utente" => $u["id"]]);
$annuncio = $stmt->fetch();

if ($annuncio === false) {
    http_response_code(404);
    testa("Annuncio non trovato");
    echo '<p class="messaggio ko">Annuncio non trovato.</p><p><a href="index.php">&larr; Annunci</a></p>';
    coda();
    exit;
}

$errori = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $annuncio = [
        "titolo"    => trim($_POST["titolo"] ?? ""),
        "testo"     => trim($_POST["testo"] ?? ""),
        "categoria" => $_POST["categoria"] ?? "",
    ];
    $errori = validaAnnuncio($annuncio);

    if (count($errori) === 0) {
        db()->prepare("UPDATE annunci SET titolo = :titolo, testo = :testo, categoria = :categoria WHERE id = :id AND id_utente = :utente")
            ->execute($annuncio + ["id" => $id, "utente" => $u["id"]]);
        flash("ok", "Annuncio aggiornato.");
        header("Location: index.php");
        exit;
    }
}

testa("Modifica annuncio");
modulo($annuncio, $errori, "modifica.php?id=" . $id);
coda();
