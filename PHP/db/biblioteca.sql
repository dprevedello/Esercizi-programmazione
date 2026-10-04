-- Database "biblioteca": autori, libri, soci e prestiti.
-- Importalo con phpMyAdmin (scheda Importa) oppure da terminale:
--   mysql -u root < biblioteca.sql
-- Attenzione: se il database esiste già viene cancellato e ricreato.

DROP DATABASE IF EXISTS biblioteca;
CREATE DATABASE biblioteca CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE biblioteca;

CREATE TABLE autori (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    nome         VARCHAR(40) NOT NULL,
    cognome      VARCHAR(40) NOT NULL,
    nazionalita  VARCHAR(40) NOT NULL
);

CREATE TABLE libri (
    id                  INT AUTO_INCREMENT PRIMARY KEY,
    titolo              VARCHAR(120) NOT NULL,
    id_autore           INT NOT NULL,
    anno                SMALLINT NOT NULL CHECK (anno BETWEEN 1000 AND 2100),
    isbn                CHAR(13) NOT NULL UNIQUE,
    genere              VARCHAR(30) NOT NULL,
    copie_totali        INT NOT NULL DEFAULT 1 CHECK (copie_totali >= 0),
    copie_disponibili   INT NOT NULL DEFAULT 1 CHECK (copie_disponibili >= 0),
    FOREIGN KEY (id_autore) REFERENCES autori(id)
);

CREATE TABLE soci (
    id       INT AUTO_INCREMENT PRIMARY KEY,
    nome     VARCHAR(40) NOT NULL,
    cognome  VARCHAR(40) NOT NULL,
    email    VARCHAR(80) NOT NULL UNIQUE
);

CREATE TABLE prestiti (
    id                  INT AUTO_INCREMENT PRIMARY KEY,
    id_libro            INT NOT NULL,
    id_socio            INT NOT NULL,
    data_prestito       DATE NOT NULL,
    data_restituzione   DATE NULL,
    FOREIGN KEY (id_libro) REFERENCES libri(id),
    FOREIGN KEY (id_socio) REFERENCES soci(id)
);

INSERT INTO autori (nome, cognome, nazionalita) VALUES
    ('Italo',    'Calvino',   'Italiana'),
    ('Umberto',  'Eco',       'Italiana'),
    ('Primo',    'Levi',      'Italiana'),
    ('Alessandro','Manzoni',  'Italiana'),
    ('Luigi',    'Pirandello','Italiana'),
    ('George',   'Orwell',    'Britannica'),
    ('Isaac',    'Asimov',    'Statunitense'),
    ('Douglas',  'Adams',     'Britannica');

-- Gli ISBN sono codici di fantasia, usati solo per gli esercizi.
INSERT INTO libri (titolo, id_autore, anno, isbn, genere, copie_totali, copie_disponibili) VALUES
    ('Il barone rampante',          1, 1957, '9788800000011', 'Romanzo',         3, 3),
    ('Le città invisibili',         1, 1972, '9788800000028', 'Romanzo',         2, 1),
    ('Il nome della rosa',          2, 1980, '9788800000035', 'Giallo storico',  4, 3),
    ('Il pendolo di Foucault',      2, 1988, '9788800000042', 'Romanzo',         2, 2),
    ('Se questo è un uomo',         3, 1947, '9788800000059', 'Memorialistica',  5, 4),
    ('Il sistema periodico',        3, 1975, '9788800000066', 'Racconti',        2, 2),
    ('I promessi sposi',            4, 1827, '9788800000073', 'Romanzo storico', 6, 5),
    ('Il fu Mattia Pascal',         5, 1904, '9788800000080', 'Romanzo',         3, 3),
    ('Uno, nessuno e centomila',    5, 1926, '9788800000097', 'Romanzo',         2, 1),
    ('1984',                        6, 1949, '9788800000103', 'Distopia',        4, 3),
    ('La fattoria degli animali',   6, 1945, '9788800000110', 'Satira',          3, 3),
    ('Io, robot',                   7, 1950, '9788800000127', 'Fantascienza',    3, 2),
    ('Fondazione',                  7, 1951, '9788800000134', 'Fantascienza',    2, 2),
    ('Guida galattica per autostoppisti', 8, 1979, '9788800000141', 'Fantascienza', 3, 3);

INSERT INTO soci (nome, cognome, email) VALUES
    ('Giulia',  'Bianchi',  'giulia.bianchi@example.org'),
    ('Marco',   'Rossi',    'marco.rossi@example.org'),
    ('Sara',    'Conti',    'sara.conti@example.org'),
    ('Luca',    'Ferrari',  'luca.ferrari@example.org'),
    ('Elena',   'Ricci',    'elena.ricci@example.org');

-- Prestiti in corso (data_restituzione NULL) coerenti con copie_disponibili,
-- più qualche prestito già concluso.
INSERT INTO prestiti (id_libro, id_socio, data_prestito, data_restituzione) VALUES
    (2,  1, '2025-09-20', NULL),
    (3,  2, '2025-09-25', NULL),
    (5,  3, '2025-09-28', NULL),
    (7,  4, '2025-09-30', NULL),
    (9,  5, '2025-10-01', NULL),
    (10, 1, '2025-10-02', NULL),
    (12, 2, '2025-10-03', NULL),
    (1,  3, '2025-08-10', '2025-08-31'),
    (4,  4, '2025-08-12', '2025-09-02'),
    (14, 5, '2025-08-20', '2025-09-10');
