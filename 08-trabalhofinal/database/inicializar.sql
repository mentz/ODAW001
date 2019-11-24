CREATE TABLE usuario (
  id SERIAL PRIMARY KEY,
  nome VARCHAR(80) NOT NULL,
  email VARCHAR(80) NOT NULL UNIQUE,
  senha CHAR(60) NOT NULL
);

INSERT INTO usuario (nome, email, senha) VALUES
  ('Lucas Litter Mentz', 'lucas', 'mentz');