-- Database "scuola": classi, studenti, materie e voti.
-- Importalo con phpMyAdmin (scheda Importa) oppure da terminale:
--   mysql -u root < scuola.sql
-- Attenzione: se il database esiste già viene cancellato e ricreato.

DROP DATABASE IF EXISTS scuola;
CREATE DATABASE scuola CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE scuola;

CREATE TABLE classi (
    id        INT AUTO_INCREMENT PRIMARY KEY,
    nome      VARCHAR(10) NOT NULL UNIQUE,
    indirizzo VARCHAR(60) NOT NULL
);

CREATE TABLE studenti (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    nome          VARCHAR(40) NOT NULL,
    cognome       VARCHAR(40) NOT NULL,
    data_nascita  DATE NOT NULL,
    email         VARCHAR(80) NOT NULL UNIQUE,
    id_classe     INT NOT NULL,
    FOREIGN KEY (id_classe) REFERENCES classi(id)
);

CREATE TABLE materie (
    id    INT AUTO_INCREMENT PRIMARY KEY,
    nome  VARCHAR(40) NOT NULL UNIQUE
);

CREATE TABLE voti (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    id_studente INT NOT NULL,
    id_materia  INT NOT NULL,
    voto        DECIMAL(3,1) NOT NULL CHECK (voto BETWEEN 1 AND 10),
    data        DATE NOT NULL,
    tipo        ENUM('scritto','orale','pratico') NOT NULL,
    FOREIGN KEY (id_studente) REFERENCES studenti(id) ON DELETE CASCADE,
    FOREIGN KEY (id_materia)  REFERENCES materie(id)
);

INSERT INTO classi (nome, indirizzo) VALUES
    ('3AINF', 'Informatica e Telecomunicazioni'),
    ('4AINF', 'Informatica e Telecomunicazioni'),
    ('5AINF', 'Informatica e Telecomunicazioni');

INSERT INTO materie (nome) VALUES
    ('Informatica'),
    ('Sistemi e reti'),
    ('TPSIT'),
    ('Matematica'),
    ('Italiano'),
    ('Inglese');

INSERT INTO studenti (nome, cognome, data_nascita, email, id_classe) VALUES
    ('Giulia', 'Bianchi', '2010-03-14', 'g.bianchi@studenti.example.org', 1),
    ('Marco', 'Rossi', '2009-11-02', 'm.rossi@studenti.example.org', 1),
    ('Sara', 'Conti', '2010-01-27', 's.conti@studenti.example.org', 1),
    ('Luca', 'Ferrari', '2010-06-09', 'l.ferrari@studenti.example.org', 1),
    ('Elena', 'Ricci', '2009-09-30', 'e.ricci@studenti.example.org', 1),
    ('Davide', 'Marino', '2009-02-18', 'd.marino@studenti.example.org', 2),
    ('Chiara', 'Greco', '2009-05-21', 'c.greco@studenti.example.org', 2),
    ('Matteo', 'Bruno', '2008-12-04', 'm.bruno@studenti.example.org', 2),
    ('Alice', 'Gallo', '2009-07-15', 'a.gallo@studenti.example.org', 2),
    ('Andrea', 'Costa', '2009-10-11', 'a.costa@studenti.example.org', 2),
    ('Martina', 'Fontana', '2008-04-08', 'm.fontana@studenti.example.org', 3),
    ('Simone', 'Esposito', '2008-08-19', 's.esposito@studenti.example.org', 3),
    ('Francesca', 'Moretti', '2008-01-23', 'f.moretti@studenti.example.org', 3),
    ('Tommaso', 'Villa', '2007-12-30', 't.villa@studenti.example.org', 3),
    ('Beatrice', 'Lombardi', '2008-06-12', 'b.lombardi@studenti.example.org', 3);

INSERT INTO voti (id_studente, id_materia, voto, data, tipo) VALUES
    (1, 1, 6.0, '2025-12-11', 'scritto'),
    (1, 2, 7.0, '2025-12-06', 'pratico'),
    (1, 6, 10.0, '2025-10-21', 'orale'),
    (1, 1, 6.0, '2025-10-09', 'scritto'),
    (2, 5, 5.5, '2025-12-09', 'pratico'),
    (2, 6, 9.5, '2025-11-10', 'orale'),
    (2, 5, 7.5, '2025-10-27', 'scritto'),
    (2, 6, 8.5, '2025-11-11', 'scritto'),
    (3, 3, 4.5, '2025-10-15', 'scritto'),
    (3, 3, 6.5, '2025-12-11', 'scritto'),
    (3, 6, 7.5, '2025-12-06', 'orale'),
    (3, 1, 8.0, '2025-11-23', 'pratico'),
    (4, 5, 6.0, '2025-12-05', 'scritto'),
    (4, 6, 6.0, '2025-11-05', 'scritto'),
    (4, 1, 7.5, '2025-11-17', 'pratico'),
    (4, 3, 5.5, '2025-11-14', 'scritto'),
    (5, 3, 6.5, '2025-12-23', 'scritto'),
    (5, 5, 7.5, '2025-10-17', 'orale'),
    (5, 3, 10.0, '2025-10-24', 'orale'),
    (5, 1, 7.5, '2025-10-28', 'orale'),
    (6, 3, 5.5, '2025-10-21', 'pratico'),
    (6, 3, 6.5, '2025-12-18', 'orale'),
    (6, 6, 8.5, '2025-10-11', 'scritto'),
    (6, 2, 9.0, '2025-12-11', 'pratico'),
    (7, 4, 8.5, '2025-11-10', 'scritto'),
    (7, 5, 9.0, '2025-10-27', 'scritto'),
    (7, 1, 6.5, '2025-12-08', 'pratico'),
    (7, 4, 6.0, '2025-11-15', 'pratico'),
    (8, 5, 7.0, '2025-12-03', 'pratico'),
    (8, 6, 5.5, '2025-12-20', 'orale'),
    (8, 6, 7.5, '2025-10-12', 'orale'),
    (8, 2, 8.5, '2025-10-26', 'pratico'),
    (9, 5, 5.5, '2025-12-06', 'pratico'),
    (9, 3, 8.5, '2025-12-09', 'scritto'),
    (9, 3, 5.5, '2025-12-27', 'pratico'),
    (9, 1, 7.0, '2025-11-03', 'scritto'),
    (10, 3, 6.0, '2025-10-10', 'pratico'),
    (10, 1, 5.0, '2025-12-18', 'scritto'),
    (10, 5, 5.5, '2025-10-24', 'orale'),
    (10, 5, 5.5, '2025-11-19', 'pratico'),
    (11, 2, 9.0, '2025-12-25', 'scritto'),
    (11, 6, 7.0, '2025-11-24', 'pratico'),
    (11, 3, 8.5, '2025-12-17', 'scritto'),
    (11, 2, 6.5, '2025-10-13', 'scritto'),
    (12, 5, 7.0, '2025-12-10', 'scritto'),
    (12, 1, 5.5, '2025-10-05', 'scritto'),
    (12, 3, 6.0, '2025-12-10', 'orale'),
    (12, 6, 9.0, '2025-10-20', 'scritto'),
    (13, 5, 9.5, '2025-10-28', 'orale'),
    (13, 4, 7.5, '2025-10-06', 'pratico'),
    (13, 4, 8.5, '2025-11-16', 'orale'),
    (13, 6, 6.0, '2025-12-23', 'pratico'),
    (14, 1, 6.5, '2025-12-13', 'scritto'),
    (14, 2, 5.0, '2025-10-20', 'orale'),
    (14, 2, 6.5, '2025-10-11', 'orale'),
    (14, 2, 4.0, '2025-11-28', 'pratico'),
    (15, 1, 7.5, '2025-10-05', 'scritto'),
    (15, 2, 6.5, '2025-11-18', 'scritto'),
    (15, 4, 3.5, '2025-10-15', 'scritto'),
    (15, 4, 5.5, '2025-11-12', 'orale');
