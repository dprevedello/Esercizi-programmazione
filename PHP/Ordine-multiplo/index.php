<?php
session_start();
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";

// Finché non c'è il login (esercizi successivi) l'ordine viene intestato sempre allo stesso cliente
const ID_CLIENTE = 1;

$pdo = connetti("negozio");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // quantita[ID] = numero: si tengono solo le quantità intere positive
    $richieste = [];
    foreach (($_POST["quantita"] ?? []) as $idProdotto => $q) {
        $q = filter_var($q, FILTER_VALIDATE_INT, ["options" => ["min_range" => 0, "max_range" => 20]]);
        if ($q !== false && $q > 0) {
            $richieste[(int) $idProdotto] = $q;
        }
    }

    if (count($richieste) === 0) {
        flash("ko", "Seleziona almeno un prodotto (quantità da 1 a 20).");
        header("Location: index.php");
        exit;
    }

    // TRANSAZIONE: o riescono tutte le operazioni (ordine, righe, scarico del magazzino)
    // oppure non ne viene salvata nessuna.
    $pdo->beginTransaction();
    try {
        $pdo->prepare("INSERT INTO ordini (id_utente, totale) VALUES (:utente, 0)")
            ->execute(["utente" => ID_CLIENTE]);
        $idOrdine = (int) $pdo->lastInsertId();

        // FOR UPDATE blocca la riga del prodotto finché la transazione non termina:
        // due clienti che ordinano insieme l'ultimo pezzo non possono riuscirci entrambi
        $leggi   = $pdo->prepare("SELECT nome, prezzo, giacenza FROM prodotti WHERE id = :id FOR UPDATE");
        $riga    = $pdo->prepare("INSERT INTO righe_ordine (id_ordine, id_prodotto, quantita, prezzo_unitario)
                                  VALUES (:ordine, :prodotto, :quantita, :prezzo)");
        $scarica = $pdo->prepare("UPDATE prodotti SET giacenza = giacenza - :quantita WHERE id = :id");

        $totale = 0;
        foreach ($richieste as $idProdotto => $quantita) {
            $leggi->execute(["id" => $idProdotto]);
            $p = $leggi->fetch();

            if ($p === false) {
                throw new RuntimeException("Il prodotto $idProdotto non esiste.");
            }
            if ((int) $p["giacenza"] < $quantita) {
                throw new RuntimeException("«" . $p["nome"] . "»: richiesti $quantita pezzi ma ne restano " . $p["giacenza"] . ".");
            }

            $riga->execute(["ordine" => $idOrdine, "prodotto" => $idProdotto, "quantita" => $quantita, "prezzo" => $p["prezzo"]]);
            $scarica->execute(["quantita" => $quantita, "id" => $idProdotto]);
            $totale += $p["prezzo"] * $quantita;
        }

        $pdo->prepare("UPDATE ordini SET totale = :totale WHERE id = :id")
            ->execute(["totale" => $totale, "id" => $idOrdine]);

        $pdo->commit();   // conferma: tutte le modifiche diventano definitive
        header("Location: ordine.php?id=" . $idOrdine);
        exit;
    } catch (RuntimeException $e) {
        $pdo->rollBack(); // annulla: nessuna modifica resta nel database
        flash("ko", "Ordine annullato. " . $e->getMessage());
        header("Location: index.php");
        exit;
    } catch (Throwable $e) {
        $pdo->rollBack();
        throw $e;
    }
}

$prodotti = $pdo->query("SELECT id, nome, prezzo, giacenza FROM prodotti ORDER BY nome")->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuovo ordine</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Nuovo ordine</h1>
    <?php mostraFlash(); ?>

    <form method="post" action="index.php">
        <table>
            <tr><th>Prodotto</th><th class="destra">Prezzo</th><th class="destra">Disponibili</th><th>Quantità</th></tr>
            <?php foreach ($prodotti as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p["nome"]) ?></td>
                    <td class="destra">€ <?= number_format((float) $p["prezzo"], 2, ",", ".") ?></td>
                    <td class="destra"><?= $p["giacenza"] ?></td>
                    <td><input type="number" name="quantita[<?= $p["id"] ?>]" value="0" min="0" max="20" style="width:5rem"></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <button type="submit">Conferma l'ordine</button>
    </form>
</main>
</body>
</html>
