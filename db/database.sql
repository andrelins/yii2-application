--
-- File generated with SQLiteStudio v3.1.1 on qui abr 13 01:48:47 2017
--
-- Text encoding used: UTF-8
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: calls
DROP TABLE IF EXISTS calls;

CREATE TABLE calls (
    id      INTEGER PRIMARY KEY AUTOINCREMENT
                    NOT NULL,
    origin  INTEGER REFERENCES ddd (id) 
                    NOT NULL,
    destiny INTEGER REFERENCES ddd (id),
    price   DOUBLE  NOT NULL
);

INSERT INTO calls (id, origin, destiny, price) VALUES (1, 1, 2, 1.9);
INSERT INTO calls (id, origin, destiny, price) VALUES (2, 2, 1, 2.9);
INSERT INTO calls (id, origin, destiny, price) VALUES (3, 1, 3, 1.7);
INSERT INTO calls (id, origin, destiny, price) VALUES (4, 3, 1, 2.7);
INSERT INTO calls (id, origin, destiny, price) VALUES (5, 1, 4, 0.9);
INSERT INTO calls (id, origin, destiny, price) VALUES (6, 4, 1, 1.9);

-- Table: ddd
DROP TABLE IF EXISTS ddd;

CREATE TABLE ddd (
    id   INTEGER       PRIMARY KEY AUTOINCREMENT
                       NOT NULL,
    ddd  INTEGER       NOT NULL,
    name VARCHAR (100) NOT NULL
);

INSERT INTO ddd (id, ddd, name) VALUES (1, 11, 'Nome do DDD');
INSERT INTO ddd (id, ddd, name) VALUES (2, 16, 'Nome do DDD');
INSERT INTO ddd (id, ddd, name) VALUES (3, 17, 'Nome do DDD');
INSERT INTO ddd (id, ddd, name) VALUES (4, 18, 'Nome do DDD');

-- Table: plans
DROP TABLE IF EXISTS plans;

CREATE TABLE plans (
    id      INTEGER      PRIMARY KEY AUTOINCREMENT,
    name    VARCHAR (50) NOT NULL,
    minutes INTEGER      NOT NULL,
    price   DOUBLE
);

INSERT INTO plans (id, name, minutes, price) VALUES (1, 'FaleMais 30', 30, NULL);
INSERT INTO plans (id, name, minutes, price) VALUES (2, 'FaleMais 60', 60, NULL);
INSERT INTO plans (id, name, minutes, price) VALUES (3, 'FaleMais 120', 120, NULL);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
