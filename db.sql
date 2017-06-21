CREATE DATABASE playlist;

USE playlist;

CREATE TABLE musicas (
    id INTEGER AUTO_INCREMENT,
    nome VARCHAR(255),
    artista VARCHAR(255),
    tipo VARCHAR(255),
    PRIMARY KEY(id)
);
