<?php
require __DIR__ . "/json.php";
require __DIR__ . "/../includes/connessione.php";

soloGet();

$riga = connetti("negozio")->query(
    "SELECT COUNT(*) AS prodotti,
            MIN(prezzo) AS prezzo_minimo,
            MAX(prezzo) AS prezzo_massimo,
            AVG(prezzo) AS prezzo_medio,
            SUM(giacenza) AS pezzi_in_magazzino
     FROM prodotti"
)->fetch();

rispondi([
    "prodotti"           => (int) $riga["prodotti"],
    "prezzo_minimo"      => (float) $riga["prezzo_minimo"],
    "prezzo_massimo"     => (float) $riga["prezzo_massimo"],
    "prezzo_medio"       => round((float) $riga["prezzo_medio"], 2),
    "pezzi_in_magazzino" => (int) $riga["pezzi_in_magazzino"],
]);
