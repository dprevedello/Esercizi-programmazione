<?php
// Parametri di connessione al server MySQL/MariaDB.
// Adattali al tuo ambiente (XAMPP, WAMP, server della scuola...).
const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASS = "";

// Restituisce la connessione al database indicato (es. connetti("scuola")).
// Gli errori vengono segnalati come eccezioni e le righe lette
// sono sempre array associativi (nome colonna => valore).
function connetti(string $database): PDO
{
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . $database . ";charset=utf8mb4";
    return new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
}
