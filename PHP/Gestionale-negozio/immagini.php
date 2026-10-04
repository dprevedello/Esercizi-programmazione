<?php
// Funzioni per la gestione delle immagini dei prodotti.

const CARTELLA_IMMAGINI = __DIR__ . "/immagini/";
const TIPI_IMMAGINE = ["image/jpeg" => "jpg", "image/png" => "png", "image/gif" => "gif"];

// Controlla il file ricevuto e, se è un'immagine valida, lo salva con un nome casuale.
// Restituisce il nome del file salvato oppure un messaggio di errore (stringa che inizia con "!").
function salvaImmagine(array $f): string
{
    if ($f["error"] !== UPLOAD_ERR_OK) {
        return "!Caricamento dell'immagine non riuscito.";
    }
    if ($f["size"] > 2 * 1024 * 1024) {
        return "!L'immagine supera i 2 MB.";
    }
    $tipo = (new finfo(FILEINFO_MIME_TYPE))->file($f["tmp_name"]);
    if (!isset(TIPI_IMMAGINE[$tipo]) || @getimagesize($f["tmp_name"]) === false) {
        return "!Il file non è un'immagine JPEG, PNG o GIF valida.";
    }
    $nome = bin2hex(random_bytes(8)) . "." . TIPI_IMMAGINE[$tipo];
    if (!move_uploaded_file($f["tmp_name"], CARTELLA_IMMAGINI . $nome)) {
        return "!Impossibile salvare l'immagine.";
    }
    return $nome;
}

// Elimina dal disco un'immagine (se il nome è valido)
function eliminaImmagine(?string $nome): void
{
    if ($nome !== null && $nome !== "") {
        @unlink(CARTELLA_IMMAGINI . basename($nome));
    }
}
