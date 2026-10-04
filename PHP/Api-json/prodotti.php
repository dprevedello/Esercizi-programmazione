<?php
require __DIR__ . "/json.php";
require __DIR__ . "/../includes/connessione.php";

soloGet();

// Filtri facoltativi: ?categoria=ID  ?q=testo  ?max=prezzo
$condizioni = [];
$parametri = [];

if (isset($_GET["categoria"])) {
    $condizioni[] = "p.id_categoria = :categoria";
    $parametri["categoria"] = (int) $_GET["categoria"];
}
if (isset($_GET["q"]) && trim($_GET["q"]) !== "") {
    $condizioni[] = "p.nome LIKE :q";
    $parametri["q"] = "%" . addcslashes(trim($_GET["q"]), "%_\\") . "%";
}
if (isset($_GET["max"])) {
    if (!is_numeric($_GET["max"])) {
        errore("Il parametro «max» deve essere un numero.", 400);
    }
    $condizioni[] = "p.prezzo <= :massimo";
    $parametri["massimo"] = $_GET["max"];
}

$sql = "SELECT p.id, p.nome, p.prezzo, p.giacenza, c.nome AS categoria
        FROM prodotti p JOIN categorie c ON c.id = p.id_categoria";
if ($condizioni) {
    $sql .= " WHERE " . implode(" AND ", $condizioni);
}
$sql .= " ORDER BY p.nome";

$stmt = connetti("negozio")->prepare($sql);
$stmt->execute($parametri);
$prodotti = array_map("formattaProdotto", $stmt->fetchAll());

rispondi(["totale" => count($prodotti), "prodotti" => $prodotti]);
