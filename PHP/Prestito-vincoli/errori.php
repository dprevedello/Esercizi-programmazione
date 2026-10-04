<?php
// Traduce un errore del database in un messaggio comprensibile per l'utente.
// Il codice numerico è quello specifico di MySQL/MariaDB ($e->errorInfo[1]).
function messaggioErrore(PDOException $e): string
{
    $codice = (int) ($e->errorInfo[1] ?? 0);

    // Il messaggio tecnico completo va nel registro del server, non sulla pagina
    error_log("Errore database ($codice): " . $e->getMessage());

    return match (true) {
        $codice === 1062                       => "Esiste già un record con questo valore (un campo deve essere univoco).",
        $codice === 1451                       => "Impossibile eliminare: ci sono dati collegati in altre tabelle.",
        $codice === 1452                       => "Il record collegato non esiste.",
        in_array($codice, [3819, 4025], true)  => "Operazione non consentita: un valore non rispetta un vincolo (per esempio non ci sono copie disponibili).",
        default                                => "Errore del database: riprova più tardi.",
    };
}
