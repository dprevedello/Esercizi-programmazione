<?php
require __DIR__ . "/json.php";
require __DIR__ . "/../includes/connessione.php";

soloGet();

$righe = connetti("negozio")->query(
    "SELECT c.id, c.nome, COUNT(p.id) AS prodotti
     FROM categorie c LEFT JOIN prodotti p ON p.id_categoria = c.id
     GROUP BY c.id, c.nome
     ORDER BY c.nome"
)->fetchAll();

// Si costruisce a mano la struttura da restituire (qui con i tipi numerici corretti)
$categorie = [];
foreach ($righe as $r) {
    $categorie[] = ["id" => (int) $r["id"], "nome" => $r["nome"], "prodotti" => (int) $r["prodotti"]];
}
rispondi($categorie);
