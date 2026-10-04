-- Database "bacheca": utenti e annunci (usato dal progetto finale aperto).
-- Importalo con phpMyAdmin (scheda Importa) oppure da terminale:
--   mysql -u root < bacheca.sql
-- Attenzione: se il database esiste già viene cancellato e ricreato.

DROP DATABASE IF EXISTS bacheca;
CREATE DATABASE bacheca CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE bacheca;

CREATE TABLE utenti (
    id             INT AUTO_INCREMENT PRIMARY KEY,
    username       VARCHAR(30) NOT NULL UNIQUE,
    password_hash  VARCHAR(255) NOT NULL
);

CREATE TABLE annunci (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    id_utente   INT NOT NULL,
    titolo      VARCHAR(80) NOT NULL,
    testo       VARCHAR(500) NOT NULL,
    categoria   ENUM('vendo','cerco','scambio','altro') NOT NULL DEFAULT 'altro',
    pubblicato  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_utente) REFERENCES utenti(id) ON DELETE CASCADE
);

-- Utenti di prova: anna / password1  e  luca / password2
INSERT INTO utenti (username, password_hash) VALUES
    ('anna', '$2y$10$rWu4Z3z3jm3rH4Y2FlQJ6..FsuLFVJz5kfLszzYgwX5CCGdOhzZfi'),
    ('luca', '$2y$10$2zT.ETalhgnRE2xV0ldC7OEBTPcE2I1APuM1Q6ruK2VPqrXC6IMBG');

INSERT INTO annunci (id_utente, titolo, testo, categoria, pubblicato) VALUES
    (1, 'Vendo libro di matematica',      'Matematica.verde vol. 3, in ottimo stato. Prezzo 15 euro.',                  'vendo',   '2025-10-02 15:20:00'),
    (1, 'Cerco ripetizioni di inglese',   'Cerco qualcuno che mi aiuti a preparare la verifica di inglese, due ore.',   'cerco',   '2025-10-05 09:05:00'),
    (2, 'Scambio videogiochi',            'Scambio giochi per console: elenco su richiesta.',                           'scambio', '2025-10-06 18:40:00'),
    (2, 'Vendo calcolatrice scientifica', 'Calcolatrice scientifica con display a due righe, usata un anno.',            'vendo',   '2025-10-08 12:10:00'),
    (1, 'Trovato astuccio in aula 12',    'Astuccio azzurro trovato dopo la lezione di informatica. Chiedere a Anna.',  'altro',   '2025-10-09 08:30:00'),
    (2, 'Cerco compagni per il progetto', 'Cerco due compagni per il progetto di sistemi e reti, gruppo da tre.',       'cerco',   '2025-10-10 14:00:00');
