<?php
require __DIR__ . "/../includes/auth_db.php";
require __DIR__ . "/../includes/connessione.php";
require __DIR__ . "/../includes/flash.php";
require __DIR__ . "/immagini.php";

richiediRuolo("admin");
$pdo = connetti("negozio");

// Senza id si crea un prodotto nuovo, con id si modifica quello esistente
$id = (int) ($_GET["id"] ?? 0);
$prodotto = ["nome" => "", "descrizione" => "", "prezzo" => "", "giacenza" => "0", "id_categoria" => "", "immagine" => null];

if ($id > 0) {
    $stmt = $pdo->prepare("SELECT nome, descrizione, prezzo, giacenza, id_categoria, immagine FROM prodotti WHERE id = :id");
    $stmt->execute(["id" => $id]);
    $trovato = $stmt->fetch();
    if ($trovato === false) {
        http_response_code(404);
        $titolo = "Prodotto non trovato";
        $pagina = "elenco";
        require __DIR__ . "/parti/testa.php";
        echo '<p class="messaggio ko">Il prodotto richiesto non esiste.</p><p><a href="index.php">&larr; Elenco</a></p>';
        require __DIR__ . "/parti/coda.php";
        exit;
    }
    $prodotto = $trovato;
}

$categorie = $pdo->query("SELECT id, nome FROM categorie ORDER BY nome")->fetchAll();
$idCategorieValide = array_map("intval", array_column($categorie, "id"));
$errori = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $prodotto["nome"]         = trim($_POST["nome"] ?? "");
    $prodotto["descrizione"]  = trim($_POST["descrizione"] ?? "");
    $prodotto["prezzo"]       = str_replace(",", ".", trim($_POST["prezzo"] ?? ""));
    $prodotto["giacenza"]     = trim($_POST["giacenza"] ?? "");
    $prodotto["id_categoria"] = (int) ($_POST["id_categoria"] ?? 0);

    if ($prodotto["nome"] === "" || mb_strlen($prodotto["nome"]) > 80) {
        $errori["nome"] = "Il nome è obbligatorio (massimo 80 caratteri).";
    }
    if (mb_strlen($prodotto["descrizione"]) > 200) {
        $errori["descrizione"] = "La descrizione può avere al massimo 200 caratteri.";
    }
    if (!is_numeric($prodotto["prezzo"]) || (float) $prodotto["prezzo"] <= 0) {
        $errori["prezzo"] = "Inserisci un prezzo maggiore di zero.";
    }
    if (filter_var($prodotto["giacenza"], FILTER_VALIDATE_INT, ["options" => ["min_range" => 0]]) === false) {
        $errori["giacenza"] = "La giacenza deve essere un numero intero non negativo.";
    }
    if (!in_array($prodotto["id_categoria"], $idCategorieValide, true)) {
        $errori["id_categoria"] = "Scegli una categoria.";
    }

    // Immagine: nuova (facoltativa) oppure da rimuovere
    $immagineVecchia = $prodotto["immagine"];
    $immagineNuova = null;
    $file = $_FILES["immagine"] ?? null;
    if ($file !== null && $file["error"] !== UPLOAD_ERR_NO_FILE && count($errori) === 0) {
        $esito = salvaImmagine($file);
        if ($esito[0] === "!") {
            $errori["immagine"] = substr($esito, 1);
        } else {
            $immagineNuova = $esito;
        }
    }

    if (count($errori) === 0) {
        $immagineFinale = $immagineVecchia;
        if ($immagineNuova !== null) {
            $immagineFinale = $immagineNuova;
        } elseif (isset($_POST["rimuovi_immagine"])) {
            $immagineFinale = null;
        }

        $dati = [
            "nome" => $prodotto["nome"], "descrizione" => $prodotto["descrizione"],
            "prezzo" => $prodotto["prezzo"], "giacenza" => (int) $prodotto["giacenza"],
            "categoria" => $prodotto["id_categoria"], "immagine" => $immagineFinale,
        ];
        try {
            if ($id > 0) {
                $dati["id"] = $id;
                $pdo->prepare("UPDATE prodotti SET nome = :nome, descrizione = :descrizione, prezzo = :prezzo,
                               giacenza = :giacenza, id_categoria = :categoria, immagine = :immagine WHERE id = :id")
                    ->execute($dati);
                flash("ok", "Prodotto «" . $prodotto["nome"] . "» aggiornato.");
            } else {
                $pdo->prepare("INSERT INTO prodotti (nome, descrizione, prezzo, giacenza, id_categoria, immagine)
                               VALUES (:nome, :descrizione, :prezzo, :giacenza, :categoria, :immagine)")
                    ->execute($dati);
                flash("ok", "Prodotto «" . $prodotto["nome"] . "» creato.");
            }
            // Solo ora che il database è aggiornato si può buttare la vecchia immagine
            if ($immagineFinale !== $immagineVecchia) {
                eliminaImmagine($immagineVecchia);
            }
            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            // Se il salvataggio fallisce non deve restare un file orfano sul disco
            eliminaImmagine($immagineNuova);
            throw $e;
        }
    } elseif ($immagineNuova !== null) {
        eliminaImmagine($immagineNuova);
    }
}

$titolo = $id > 0 ? "Modifica prodotto" : "Nuovo prodotto";
$pagina = $id > 0 ? "elenco" : "nuovo";
require __DIR__ . "/parti/testa.php";
?>
    <form method="post" action="prodotto.php<?= $id > 0 ? "?id=" . $id : "" ?>" enctype="multipart/form-data" novalidate>
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($prodotto["nome"]) ?>">
        <?php if (isset($errori["nome"])): ?><p class="errore"><?= $errori["nome"] ?></p><?php endif; ?>

        <label for="descrizione">Descrizione</label>
        <input type="text" id="descrizione" name="descrizione" value="<?= htmlspecialchars($prodotto["descrizione"]) ?>">
        <?php if (isset($errori["descrizione"])): ?><p class="errore"><?= $errori["descrizione"] ?></p><?php endif; ?>

        <label for="prezzo">Prezzo (€)</label>
        <input type="text" id="prezzo" name="prezzo" value="<?= htmlspecialchars((string) $prodotto["prezzo"]) ?>">
        <?php if (isset($errori["prezzo"])): ?><p class="errore"><?= $errori["prezzo"] ?></p><?php endif; ?>

        <label for="giacenza">Giacenza</label>
        <input type="text" id="giacenza" name="giacenza" value="<?= htmlspecialchars((string) $prodotto["giacenza"]) ?>">
        <?php if (isset($errori["giacenza"])): ?><p class="errore"><?= $errori["giacenza"] ?></p><?php endif; ?>

        <label for="id_categoria">Categoria</label>
        <select id="id_categoria" name="id_categoria">
            <option value="0">— scegli —</option>
            <?php foreach ($categorie as $c): ?>
                <option value="<?= $c["id"] ?>"<?= (int) $prodotto["id_categoria"] === (int) $c["id"] ? " selected" : "" ?>><?= htmlspecialchars($c["nome"]) ?></option>
            <?php endforeach; ?>
        </select>
        <?php if (isset($errori["id_categoria"])): ?><p class="errore"><?= $errori["id_categoria"] ?></p><?php endif; ?>

        <label for="immagine">Immagine (facoltativa)</label>
        <?php if ($prodotto["immagine"] !== null): ?>
            <img src="immagini/<?= htmlspecialchars($prodotto["immagine"]) ?>" alt="" style="height:80px;border-radius:6px;display:block;margin-bottom:.4rem">
            <div class="riga"><input type="checkbox" id="rimuovi" name="rimuovi_immagine" value="1"> <label for="rimuovi">Rimuovi l'immagine attuale</label></div>
        <?php endif; ?>
        <input type="file" id="immagine" name="immagine" accept="image/jpeg,image/png,image/gif">
        <?php if (isset($errori["immagine"])): ?><p class="errore"><?= $errori["immagine"] ?></p><?php endif; ?>

        <button type="submit">Salva</button>
        <a href="index.php">Annulla</a>
    </form>
<?php require __DIR__ . "/parti/coda.php"; ?>
