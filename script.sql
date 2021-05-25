CREATE DATABASE prova;

CREATE TABLE Abelha (
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(100),
    nomeCientifico varchar(100),
    PRIMARY KEY(id)
);

CREATE TABLE Flor (
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(100),
    nomeCientifico varchar(100),
    descricao varchar(255),
    imagem varchar(255),
	PRIMARY KEY(id)
);

CREATE TABLE Poliniza (
    idFlor int,
    idAbelha int,
    PRIMARY KEY(idFlor, idAbelha),
    FOREIGN KEY(idFlor) REFERENCES Flor(id),
	FOREIGN KEY(idAbelha) REFERENCES Abelha(id)    
);

CREATE TABLE Mes (
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(20),
    PRIMARY KEY(id)
);

CREATE TABLE Floresce (
    idMes int,
    idFlor int,
	PRIMARY KEY(idMes, idFlor),
    FOREIGN KEY(idFlor) REFERENCES Flor(id),
    FOREIGN KEY(idMes) REFERENCES Mes(id)
);
    
INSERT INTO mes (nome) VALUES ("Janeiro");
INSERT INTO mes (nome) VALUES ("Fevereiro");
INSERT INTO mes (nome) VALUES ("Março");
INSERT INTO mes (nome) VALUES ("Abril");
INSERT INTO mes (nome) VALUES ("Maio");
INSERT INTO mes (nome) VALUES ("Junho");
INSERT INTO mes (nome) VALUES ("Julho");
INSERT INTO mes (nome) VALUES ("Agosto");
INSERT INTO mes (nome) VALUES ("Setembro");
INSERT INTO mes (nome) VALUES ("Outubro");
INSERT INTO mes (nome) VALUES ("Novembro");
INSERT INTO mes (nome) VALUES ("Dezembro");
    
    