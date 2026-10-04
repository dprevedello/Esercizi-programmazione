<?php
require __DIR__ . "/../includes/connessione.php";

$pdo = connetti("scuola");

// 1) Media dei voti per classe (JOIN tra tre tabelle + GROUP BY)
$perClasse = $pdo->query(
    "SELECT c.nome AS classe, COUNT(v.id) AS numero_voti, AVG(v.voto) AS media
     FROM classi c
     JOIN studenti s ON s.id_classe = c.id
     JOIN voti v ON v.id_studente = s.id
     GROUP BY c.id, c.nome
     ORDER BY c.nome"
)->fetchAll();

// 2) Media per materia, dalla più alta alla più bassa
$perMateria = $pdo->query(
    "SELECT m.nome AS materia, AVG(v.voto) AS media
     FROM materie m
     JOIN voti v ON v.id_materia = m.id
     GROUP BY m.id, m.nome
     ORDER BY media DESC"
)->fetchAll();

// 3) I cinque studenti con la media più alta (almeno 3 voti: HAVING filtra i gruppi)
$migliori = $pdo->query(
    "SELECT s.nome, s.cognome, c.nome AS classe, AVG(v.voto) AS media, COUNT(v.id) AS numero_voti
     FROM studenti s
     JOIN classi c ON c.id = s.id_classe
     JOIN voti v ON v.id_studente = s.id
     GROUP BY s.id, s.nome, s.cognome, c.nome
     HAVING COUNT(v.id) >= 3
     ORDER BY media DESC
     LIMIT 5"
)->fetchAll();

// 4) Insufficienze, eventualmente di una sola classe (?classe=ID)
$classi = $pdo->query("SELECT id, nome FROM classi ORDER BY nome")->fetchAll();
$idClasse = (int) ($_GET["classe"] ?? 0);

$sql = "SELECT s.cognome, s.nome, c.nome AS classe, m.nome AS materia, v.voto, v.data, v.tipo
        FROM voti v
        JOIN studenti s ON s.id = v.id_studente
        JOIN classi c ON c.id = s.id_classe
        JOIN materie m ON m.id = v.id_materia
        WHERE v.voto < 6";
$parametri = [];
if ($idClasse > 0) {
    $sql .= " AND c.id = :classe";
    $parametri["classe"] = $idClasse;
}
$sql .= " ORDER BY v.voto, s.cognome";
$stmt = $pdo->prepare($sql);
$stmt->execute($parametri);
$insufficienze = $stmt->fetchAll();

// Piccola funzione di aiuto: barra proporzionale al voto (da 0 a 10)
function barra(float $voto): string
{
    return '<div style="background:var(--primario);height:.6rem;border-radius:3px;width:' . round($voto * 10) . '%"></div>';
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report dei voti</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<main>
    <h1>Report dei voti</h1>

    <h2>Media per classe</h2>
    <table>
        <tr><th>Classe</th><th class="destra">Voti</th><th class="destra">Media</th><th style="width:40%"></th></tr>
        <?php foreach ($perClasse as $r): ?>
            <tr>
                <td><?= htmlspecialchars($r["classe"]) ?></td>
                <td class="destra"><?= $r["numero_voti"] ?></td>
                <td class="destra"><?= number_format((float) $r["media"], 2, ",", ".") ?></td>
                <td><?= barra((float) $r["media"]) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Media per materia</h2>
    <table>
        <?php foreach ($perMateria as $r): ?>
            <tr>
                <td><?= htmlspecialchars($r["materia"]) ?></td>
                <td class="destra"><?= number_format((float) $r["media"], 2, ",", ".") ?></td>
                <td style="width:40%"><?= barra((float) $r["media"]) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>I cinque studenti con la media più alta</h2>
    <ol>
        <?php foreach ($migliori as $r): ?>
            <li>
                <?= htmlspecialchars($r["cognome"] . " " . $r["nome"]) ?> (<?= htmlspecialchars($r["classe"]) ?>) –
                media <strong><?= number_format((float) $r["media"], 2, ",", ".") ?></strong>
                su <?= $r["numero_voti"] ?> voti
            </li>
        <?php endforeach; ?>
    </ol>

    <h2>Insufficienze (<?= count($insufficienze) ?>)</h2>
    <form method="get" action="index.php">
        <label for="classe">Classe</label>
        <select id="classe" name="classe" onchange="this.form.submit()">
            <option value="0">Tutte</option>
            <?php foreach ($classi as $c): ?>
                <option value="<?= $c["id"] ?>"<?= $idClasse === (int) $c["id"] ? " selected" : "" ?>><?= htmlspecialchars($c["nome"]) ?></option>
            <?php endforeach; ?>
        </select>
        <noscript><button type="submit">Filtra</button></noscript>
    </form>
    <?php if (count($insufficienze) === 0): ?>
        <p class="tenue">Nessuna insufficienza.</p>
    <?php else: ?>
        <table>
            <tr><th>Studente</th><th>Classe</th><th>Materia</th><th>Tipo</th><th class="destra">Voto</th></tr>
            <?php foreach ($insufficienze as $r): ?>
                <tr>
                    <td><?= htmlspecialchars($r["cognome"] . " " . $r["nome"]) ?></td>
                    <td><?= htmlspecialchars($r["classe"]) ?></td>
                    <td><?= htmlspecialchars($r["materia"]) ?></td>
                    <td><?= $r["tipo"] ?></td>
                    <td class="destra"><?= number_format((float) $r["voto"], 1, ",", ".") ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</main>
</body>
</html>
