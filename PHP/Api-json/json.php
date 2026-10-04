<?php
// Funzioni comuni a tutti gli endpoint: ogni pagina risponde con JSON invece che con HTML.

// Invia i dati come JSON con il codice di stato indicato e termina lo script
function rispondi(mixed $dati, int $codice = 200): never
{
    http_response_code($codice);
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode($dati, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRESERVE_ZERO_FRACTION | JSON_PRETTY_PRINT);
    exit;
}

// Risponde con un errore in formato JSON
function errore(string $messaggio, int $codice): never
{
    rispondi(["errore" => $messaggio], $codice);
}

// L'API è di sola lettura: qualsiasi metodo diverso da GET viene rifiutato
function soloGet(): void
{
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        header("Allow: GET");
        errore("Metodo non consentito: questa API accetta solo GET.", 405);
    }
}

// Riga di prodotto dal database → struttura JSON con i tipi giusti (numeri, non testo)
function formattaProdotto(array $r): array
{
    return [
        "id"        => (int) $r["id"],
        "nome"      => $r["nome"],
        "prezzo"    => (float) $r["prezzo"],
        "giacenza"  => (int) $r["giacenza"],
        "categoria" => $r["categoria"],
    ];
}
