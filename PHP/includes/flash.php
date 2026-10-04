<?php
// File condiviso dagli esercizi con il database (è la libreria scritta nell'esercizio sui messaggi flash).
// Un "messaggio flash" è un messaggio che vive in sessione il tempo di una sola visualizzazione:
// lo si prepara prima di un redirect e compare una volta sola nella pagina successiva.

// Aggiunge un messaggio. $tipo è una classe CSS: "ok", "ko" oppure "info".
function flash(string $tipo, string $testo): void
{
    $_SESSION["flash"][] = ["tipo" => $tipo, "testo" => $testo];
}

// Stampa tutti i messaggi in attesa e li elimina dalla sessione.
function mostraFlash(): void
{
    foreach ($_SESSION["flash"] ?? [] as $m) {
        echo '<p class="messaggio ' . htmlspecialchars($m["tipo"]) . '">' . htmlspecialchars($m["testo"]) . "</p>\n";
    }
    unset($_SESSION["flash"]);
}
