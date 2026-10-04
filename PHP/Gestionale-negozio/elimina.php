<?php
require __DIR__ . "/../includes/auth_db.php";
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";
require __DIR__ . "/immagini.php";

richiediRuolo("admin");

// Un'eliminazione modifica i dati: si accetta solo POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    header("Allow: POST");
    exit("Metodo non consentito.");
}

$pdo = connetti("negozio");
$id = (int) ($_POST["id"] ?? 0);

$stmt = $pdo->prepare("SELECT nome, immagine FROM prodotti WHERE id = :id");
$stmt->execute(["id" => $id]);
$prodotto = $stmt->fetch();

if ($prodotto === false) {
    flash("ko", "Prodotto non trovato.");
} else {
    try {
        $pdo->prepare("DELETE FROM prodotti WHERE id = :id")->execute(["id" => $id]);
        eliminaImmagine($prodotto["immagine"]);
        flash("ok", "Prodotto «" . $prodotto["nome"] . "» eliminato.");
    } catch (PDOException $e) {
        if (($e->errorInfo[1] ?? 0) === 1451) {
            // Il prodotto compare in ordini già effettuati: lo storico non si cancella
            flash("ko", "«" . $prodotto["nome"] . "» compare in ordini esistenti e non può essere eliminato. Azzera la giacenza per toglierlo dalla vendita.");
        } else {
            throw $e;
        }
    }
}
header("Location: index.php");
exit;
