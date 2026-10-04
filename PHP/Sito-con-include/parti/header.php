<?php
// Questa parte si aspetta due variabili definite dalla pagina che la include:
//   $titolo  = titolo della pagina
//   $attiva  = nome del file della pagina corrente (per evidenziare la voce di menu)
$menu = [
    "index.php"      => "Home",
    "chi-siamo.php"  => "Chi siamo",
    "contatti.php"   => "Contatti",
];
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $titolo ?> – Coding Club</title>
    <link rel="stylesheet" href="../includes/stile.css">
</head>
<body>
<nav class="menu">
    <?php foreach ($menu as $file => $voce): ?>
        <a href="<?= $file ?>"<?= $file === $attiva ? ' class="attiva"' : '' ?>><?= $voce ?></a>
    <?php endforeach; ?>
</nav>
<main>
