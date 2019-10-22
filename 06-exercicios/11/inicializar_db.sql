-- Criar base de dados odawphp se não já existir
CREATE DATABASE IF NOT EXISTS odawphp;

-- Usar base de dados odawphp
USE odawphp;

-- Remover tabelas antigas caso existam
DROP TABLE IF EXISTS academicos;
DROP TABLE IF EXISTS estados;

-- Criar tabela para guardar acadêmicos
CREATE TABLE academicos (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(60) NOT NULL UNIQUE,
    cpf CHAR(11) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    telefone CHAR(11) NOT NULL,
    estadonatal CHAR(2) NOT NULL,
    datanascimento DATE NOT NULL,
    vinculo CHAR(5) NOT NULL,
    sexo CHAR(1) NOT NULL,
    transporte BIT(4) NOT NULL
);

-- Inserir um elemento de exemplo
INSERT INTO academicos (nome, cpf, email, telefone, estadonatal, datanascimento, vinculo, sexo, transporte)
    VALUES ("Lucas Lotter Montz", "01234567890", "lucas@montz.com", "47901234567", "RS", "1997-08-22", "agrad", "M", 0b0001);

-- Criar tabela com estados
CREATE TABLE estados (
    id SERIAL PRIMARY KEY,
    sigla CHAR(2) NOT NULL UNIQUE,
    nome VARCHAR(40) NOT NULL UNIQUE
);

-- Popular tabela estados com os estados do Brasil
INSERT INTO estados (nome, sigla) VALUES
    ("Acre", "AC"),
    ("Alagoas", "AL"),
    ("Amapá", "AP"),
    ("Amazonas", "AM"),
    ("Bahia", "BA"),
    ("Ceará", "CE"),
    ("Distrito Federal", "DF"),
    ("Espírito Santo", "ES"),
    ("Goiás", "GO"),
    ("Maranhão", "MA"),
    ("Mato Grosso", "MT"),
    ("Mato Grosso do Sul", "MS"),
    ("Minas Gerais", "MG"),
    ("Pará", "PA"),
    ("Paraíba", "PB"),
    ("Paraná", "PR"),
    ("Pernambuco", "PE"),
    ("Piauí", "PI"),
    ("Rio de Janeiro", "RJ"),
    ("Rio Grande do Norte", "RN"),
    ("Rio Grande do Sul", "RS"),
    ("Rondônia", "RO"),
    ("Roraima", "RR"),
    ("Santa Catarina", "SC"),
    ("São Paulo", "SP"),
    ("Sergipe", "SE"),
    ("Tocantins", "TO");