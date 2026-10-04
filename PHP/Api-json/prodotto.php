<?php
require __DIR__ . "/json.php";
require __DIR__ . "/../includes/connessione.php";

soloGet();

$id = filter_var($_GET["id"] ?? null, FILTER_VALIDATE_INT);
if ($id === false || $id === null) {
    errore("Serve il parametro «id» (numero intero).", 400);
}

$stmt = connetti("negozio")->prepare(
    "SELECT p.id, p.nome, p.prezzo, p.giacenza, c.nome AS categoria
     FROM prodotti p JOIN categorie c ON c.id = p.id_categoria
     WHERE p.id = :id"
);
$stmt->execute(["id" => $id]);
$riga = $stmt->fetch();

if ($riga === false) {
    errore("Prodotto non trovato.", 404);
}
rispondi(formattaProdotto($riga));
