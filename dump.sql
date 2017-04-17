CREATE DATABASE prova;
use prova;

CREATE TABLE pessoas(
	id   INT         NOT NULL AUTO_INCREMENT,
	nome VARCHAR(80) NOT NULL,
	PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO pessoas VALUES(NULL, "Daniel Cross");
INSERT INTO pessoas VALUES(NULL, "Lucy Stillman");
INSERT INTO pessoas VALUES(NULL, "Rebecca Crane");
INSERT INTO pessoas VALUES(NULL, "Shaun Hastings");
INSERT INTO pessoas VALUES(NULL, "Dr. Warren Vidic");
INSERT INTO pessoas VALUES(NULL, "William");
INSERT INTO pessoas VALUES(NULL, "César Bórgia");
INSERT INTO pessoas VALUES(NULL, "Cristina Vespucci");
INSERT INTO pessoas VALUES(NULL, "Ezio Auditore da Firenze");
INSERT INTO pessoas VALUES(NULL, "Giovanni Auditore");
INSERT INTO pessoas VALUES(NULL, "Leonardo da Vinci");
INSERT INTO pessoas VALUES(NULL, "Lucrécia Bórgia");
INSERT INTO pessoas VALUES(NULL, "Manuel Palaiologos");
INSERT INTO pessoas VALUES(NULL, "Mario Auditore");
INSERT INTO pessoas VALUES(NULL, "Rodrigo Bórgia");
INSERT INTO pessoas VALUES(NULL, "Nicolau Maquiavel");
INSERT INTO pessoas VALUES(NULL, "Yusuf Tazim");
INSERT INTO pessoas VALUES(NULL, "Sofia Sartor");
INSERT INTO pessoas VALUES(NULL, "Connor Kenway");
INSERT INTO pessoas VALUES(NULL, "Aveline de Grandpré");
INSERT INTO pessoas VALUES(NULL, "Haytham Kenway");
INSERT INTO pessoas VALUES(NULL, "Aquiles Denvenport");
