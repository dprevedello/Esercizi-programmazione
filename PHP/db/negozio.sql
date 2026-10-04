-- Database "negozio": categorie, prodotti, utenti, ordini e righe d'ordine.
-- Importalo con phpMyAdmin (scheda Importa) oppure da terminale:
--   mysql -u root < negozio.sql
-- Attenzione: se il database esiste già viene cancellato e ricreato.
--
-- Utenti di prova (le password sono salvate come hash, mai in chiaro):
--   mario  / segreta123  (cliente)
--   admin  / admin123    (amministratore)

DROP DATABASE IF EXISTS negozio;
CREATE DATABASE negozio CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE negozio;

CREATE TABLE categorie (
    id    INT AUTO_INCREMENT PRIMARY KEY,
    nome  VARCHAR(40) NOT NULL UNIQUE
);

CREATE TABLE prodotti (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    nome          VARCHAR(80) NOT NULL,
    descrizione   VARCHAR(200) NOT NULL DEFAULT '',
    prezzo        DECIMAL(8,2) NOT NULL CHECK (prezzo >= 0),
    giacenza      INT NOT NULL DEFAULT 0 CHECK (giacenza >= 0),
    id_categoria  INT NOT NULL,
    immagine      VARCHAR(100) NULL,
    FOREIGN KEY (id_categoria) REFERENCES categorie(id)
);

CREATE TABLE utenti (
    id             INT AUTO_INCREMENT PRIMARY KEY,
    username       VARCHAR(30) NOT NULL UNIQUE,
    email          VARCHAR(80) NOT NULL UNIQUE,
    password_hash  VARCHAR(255) NOT NULL,
    ruolo          ENUM('cliente','admin') NOT NULL DEFAULT 'cliente',
    creato_il      DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE ordini (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    id_utente    INT NOT NULL,
    data_ordine  DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    totale       DECIMAL(10,2) NOT NULL DEFAULT 0,
    FOREIGN KEY (id_utente) REFERENCES utenti(id)
);

CREATE TABLE righe_ordine (
    id               INT AUTO_INCREMENT PRIMARY KEY,
    id_ordine        INT NOT NULL,
    id_prodotto      INT NOT NULL,
    quantita         INT NOT NULL CHECK (quantita > 0),
    prezzo_unitario  DECIMAL(8,2) NOT NULL,
    FOREIGN KEY (id_ordine)   REFERENCES ordini(id) ON DELETE CASCADE,
    FOREIGN KEY (id_prodotto) REFERENCES prodotti(id)
);

INSERT INTO categorie (nome) VALUES
    ('Componenti PC'),
    ('Periferiche'),
    ('Reti'),
    ('Accessori');

INSERT INTO prodotti (nome, descrizione, prezzo, giacenza, id_categoria) VALUES
    ('Processore 8 core',        'Processore desktop a 8 core, 3,6 GHz',          229.90, 12, 1),
    ('Scheda madre ATX',         'Scheda madre ATX con 4 slot RAM',               139.00,  8, 1),
    ('RAM 16 GB DDR5',           'Kit 2 x 8 GB, 5600 MHz',                         79.50, 25, 1),
    ('SSD NVMe 1 TB',            'Unità a stato solido M.2, lettura 3500 MB/s',    89.99, 30, 1),
    ('Tastiera meccanica',       'Layout italiano, switch rossi',                  59.90, 15, 2),
    ('Mouse ottico wireless',    'Sensore 1600 dpi, batteria stilo',               19.90, 40, 2),
    ('Monitor 24 pollici',       'Full HD, pannello IPS',                         149.00,  7, 2),
    ('Webcam HD',                'Risoluzione 1080p con microfono integrato',      34.90, 18, 2),
    ('Router Wi-Fi 6',           'Dual band, 4 porte Gigabit',                     89.00, 10, 3),
    ('Switch 8 porte',           'Switch Gigabit non gestito',                     29.90, 22, 3),
    ('Cavo di rete Cat6 2 m',    'Cavo patch UTP, connettori RJ45',                 4.90, 120, 3),
    ('Access point PoE',         'Access point da soffitto con alimentazione PoE', 119.00,  5, 3),
    ('Zaino per notebook',       'Imbottito, fino a 15,6 pollici',                 39.90, 20, 4),
    ('Hub USB-C 6 in 1',         'HDMI, USB 3.0, lettore SD',                      44.50, 14, 4),
    ('Tappetino per mouse',      'Formato XL, base antiscivolo',                    9.90, 50, 4),
    ('Cuffie con microfono',     'Chiuse, jack da 3,5 mm',                         24.90, 26, 4);

INSERT INTO utenti (username, email, password_hash, ruolo) VALUES
    ('mario', 'mario.rossi@example.org', '$2y$10$JiX6bmJpH0tBROTNWLTM7ua7r/AU1ej8lk/cQIGG0PTZqNr4ql6A.', 'cliente'),
    ('admin', 'admin@example.org',       '$2y$10$.fM40DZmCojDl.XOL5V7luMj/3kXdF7DREitalkOHDb1z5BwsCdLi', 'admin');

INSERT INTO ordini (id_utente, data_ordine, totale) VALUES
    (1, '2025-09-12 10:15:00', 109.70),
    (1, '2025-09-29 18:40:00', 169.49),
    (1, '2025-10-02 09:05:00',  14.70);

INSERT INTO righe_ordine (id_ordine, id_prodotto, quantita, prezzo_unitario) VALUES
    (1, 5, 1, 59.90),
    (1, 6, 1, 19.90),
    (1, 10, 1, 29.90),
    (2, 4, 1, 89.99),
    (2, 3, 1, 79.50),
    (3, 11, 3, 4.90);
