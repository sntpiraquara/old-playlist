CREATE DATABASE playlist;

USE playlist;

CREATE TABLE IF NOT EXISTS musicas (
    id INTEGER AUTO_INCREMENT,
    nome VARCHAR(255),
    artista VARCHAR(255),
    tipo VARCHAR(255),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER AUTO_INCREMENT,
    nome VARCHAR(255),
    email VARCHAR(255),
    senha VARCHAR(255),
    PRIMARY KEY(id)
);
