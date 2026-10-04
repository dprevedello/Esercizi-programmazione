<?php
$classi = ["3AINF", "4AINF", "5AINF"];
$laboratori = ["robotica" => "Robotica con Arduino", "web" => "Sviluppo web", "sicurezza" => "Sicurezza informatica", "giochi" => "Videogiochi"];
$pasti = ["normale" => "Normale", "vegetariano" => "Vegetariano", "senzaglutine" => "Senza glutine"];
$fileIscrizioni = __DIR__ . "/dati/iscrizioni.csv";

function vecchio(string $campo): string
{
    return htmlspecialchars($_POST[$campo] ?? "");
}

// Controlla se un'email è già presente nel file CSV delle iscrizioni
function emailGiaIscritta(string $file, string $email): bool
{
    if (!file_exists($file)) {
        return false;
    }
    $f = fopen($file, "r");
    while (($riga = fgetcsv($f, null, ",", "\"", "")) !== false) {
        if (isset($riga[4]) && strtolower($riga[4]) === strtolower($email)) {
            fclose($f);
            return true;
        }
    }
    fclose($f);
    return false;
}

$errori = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome    = trim($_POST["nome"] ?? "");
    $cognome = trim($_POST["cognome"] ?? "");
    $email   = trim($_POST["email"] ?? "");
    $classe  = $_POST["classe"] ?? "";
    $scelti  = $_POST["laboratori"] ?? [];
    $pasto   = $_POST["pasto"] ?? "";

    if (!is_array($scelti)) {
        $scelti = [];
    }
    $scelti = array_values(array_intersect($scelti, array_keys($laboratori)));

    if (strlen($nome) < 2)    { $errori["nome"] = "Inserisci il nome."; }
    if (strlen($cognome) < 2) { $errori["cognome"] = "Inserisci il cognome."; }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errori["email"] = "Email non valida.";
    } elseif (emailGiaIscritta($fileIscrizioni, $email)) {
        $errori["email"] = "Questa email è già iscritta.";
    }
    if (!in_array($classe, $classi, true))      { $errori["classe"] = "Scegli la tua classe."; }
    if (count($scelti) === 0)                   { $errori["laboratori"] = "Scegli almeno un laboratorio."; }
    if (!array_key_exists($pasto, $pasti))      { $errori["pasto"] = "Scegli il tipo di pasto."; }
    if (!isset($_POST["regolamento"]))          { $errori["regolamento"] = "Devi accettare il regolamento."; }

    if (count($errori) === 0) {
        $codice = strtoupper(substr(md5(uniqid("", true)), 0, 6));
        $riga = [$codice, date("d/m/Y H:i"), $nome, $cognome, $email, $classe, implode(", ", $scelti), $pasto];

        if (!is_dir(__DIR__ . "/dati")) {
            mkdir(__DIR__ . "/dati", 0755, true);
        }
        $f = fopen($fileIscrizioni, "a");
        fputcsv($f, $riga, ",", "\"", "");
        fclose($f);

        header("Location: conferma.php?codice=" . $codice);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iscrizione alla Notte del Codice</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Notte del Codice – iscrizione</h1>

    <?php if (count($errori) > 0): ?>
        <p class="messaggio ko">Ci sono <?= count($errori) ?> campi da correggere.</p>
    <?php endif; ?>

    <form method="post" action="index.php" novalidate>
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="<?= vecchio("nome") ?>">
        <?php if (isset($errori["nome"])): ?><p class="errore"><?= $errori["nome"] ?></p><?php endif; ?>

        <label for="cognome">Cognome</label>
        <input type="text" id="cognome" name="cognome" value="<?= vecchio("cognome") ?>">
        <?php if (isset($errori["cognome"])): ?><p class="errore"><?= $errori["cognome"] ?></p><?php endif; ?>

        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="<?= vecchio("email") ?>">
        <?php if (isset($errori["email"])): ?><p class="errore"><?= $errori["email"] ?></p><?php endif; ?>

        <label for="classe">Classe</label>
        <select id="classe" name="classe">
            <option value="">-- scegli --</option>
            <?php foreach ($classi as $c): ?>
                <option value="<?= $c ?>"<?= ($_POST["classe"] ?? "") === $c ? " selected" : "" ?>><?= $c ?></option>
            <?php endforeach; ?>
        </select>
        <?php if (isset($errori["classe"])): ?><p class="errore"><?= $errori["classe"] ?></p><?php endif; ?>

        <label>Laboratori (almeno uno)</label>
        <?php foreach ($laboratori as $chiave => $nomeLab): ?>
            <div class="riga">
                <input type="checkbox" id="lab-<?= $chiave ?>" name="laboratori[]" value="<?= $chiave ?>"<?= in_array($chiave, $_POST["laboratori"] ?? [], true) ? " checked" : "" ?>>
                <label for="lab-<?= $chiave ?>"><?= $nomeLab ?></label>
            </div>
        <?php endforeach; ?>
        <?php if (isset($errori["laboratori"])): ?><p class="errore"><?= $errori["laboratori"] ?></p><?php endif; ?>

        <label>Pasto</label>
        <?php foreach ($pasti as $chiave => $nomePasto): ?>
            <div class="riga">
                <input type="radio" id="pasto-<?= $chiave ?>" name="pasto" value="<?= $chiave ?>"<?= ($_POST["pasto"] ?? "") === $chiave ? " checked" : "" ?>>
                <label for="pasto-<?= $chiave ?>"><?= $nomePasto ?></label>
            </div>
        <?php endforeach; ?>
        <?php if (isset($errori["pasto"])): ?><p class="errore"><?= $errori["pasto"] ?></p><?php endif; ?>

        <div class="riga">
            <input type="checkbox" id="regolamento" name="regolamento" value="si"<?= isset($_POST["regolamento"]) ? " checked" : "" ?>>
            <label for="regolamento">Ho letto e accetto il regolamento</label>
        </div>
        <?php if (isset($errori["regolamento"])): ?><p class="errore"><?= $errori["regolamento"] ?></p><?php endif; ?>

        <button type="submit">Iscriviti</button>
    </form>

    <p><a href="elenco.php">Vedi l'elenco degli iscritti</a></p>
</main>
</body>
</html>
