CREATE TABLE usuario (
  id SERIAL PRIMARY KEY,
  nome VARCHAR(80) NOT NULL,
  email VARCHAR(80) NOT NULL UNIQUE,
  senha CHAR(60) NOT NULL
);

INSERT INTO usuario (nome, email, senha) VALUES
  ('Lucas Litter Mentz', 'lucas', 'mentz');

CREATE TABLE lista (
  id BIGSERIAL PRIMARY KEY,
  autor BIGSERIAL NOT NULL REFERENCES usuario (id)
);

CREATE TABLE tarefa (
  id BIGSERIAL PRIMARY KEY,
  estado BOOLEAN NOT NULL,
  descricao VARCHAR(50) NOT NULL,
  lista BIGINT NOT NULL REFERENCES lista(id)
);
