<?php
// Validazione e modulo condivisi da nuovo.php e modifica.php.

// Controlla i dati di un annuncio e restituisce l'elenco degli errori (vuoto se tutto va bene)
function validaAnnuncio(array $a): array
{
    $errori = [];
    if ($a["titolo"] === "" || mb_strlen($a["titolo"]) > 80) {
        $errori["titolo"] = "Il titolo è obbligatorio (massimo 80 caratteri).";
    }
    if ($a["testo"] === "" || mb_strlen($a["testo"]) > 500) {
        $errori["testo"] = "Il testo è obbligatorio (massimo 500 caratteri).";
    }
    if (!isset(CATEGORIE[$a["categoria"]])) {
        $errori["categoria"] = "Scegli una categoria.";
    }
    return $errori;
}

function modulo(array $a, array $errori, string $azione): void
{
    ?>
    <form method="post" action="<?= htmlspecialchars($azione) ?>" novalidate>
        <label for="titolo">Titolo</label>
        <input type="text" id="titolo" name="titolo" value="<?= htmlspecialchars($a["titolo"]) ?>">
        <?php if (isset($errori["titolo"])): ?><p class="errore"><?= $errori["titolo"] ?></p><?php endif; ?>

        <label for="categoria">Categoria</label>
        <select id="categoria" name="categoria">
            <?php foreach (CATEGORIE as $valore => $etichetta): ?>
                <option value="<?= $valore ?>"<?= $a["categoria"] === $valore ? " selected" : "" ?>><?= $etichetta ?></option>
            <?php endforeach; ?>
        </select>
        <?php if (isset($errori["categoria"])): ?><p class="errore"><?= $errori["categoria"] ?></p><?php endif; ?>

        <label for="testo">Testo</label>
        <textarea id="testo" name="testo" rows="5"><?= htmlspecialchars($a["testo"]) ?></textarea>
        <?php if (isset($errori["testo"])): ?><p class="errore"><?= $errori["testo"] ?></p><?php endif; ?>

        <button type="submit">Salva</button>
        <a href="index.php">Annulla</a>
    </form>
<?php
}
