<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tarefa 10B</title>
</head>

<body>
  <?php
  $db = new mysqli('localhost', 'odawphp', 'z8mT6^FqH3Cu*4baq*kz', 'odawphp');

  // Remover a tabela para iniciar em um estado limpo
  $query = <<<EOT
    DROP TABLE alunos;
    EOT;
  $result = $db->query($query);
  print('<pre>>' . $query . '</pre><pre>' . $result . '</pre>');

  // --------------------------------------------------------------------------
  print('<hr>');

  // Criar tabela "alunos"
  $query = <<<EOT
    CREATE TABLE alunos (
      id SERIAL PRIMARY KEY,
      nome VARCHAR(50) NOT NULL,
      cpf CHAR(11) NOT NULL UNIQUE,
      email VARCHAR(50)
    );
    EOT;
  // essa bruxaria aqui ^ é uma string multi-line :D

  $result = $db->query($query);
  print('<pre>>' . $query . '</pre><pre>' . $result . '</pre>');

  // --------------------------------------------------------------------------
  print('<hr>');

  $query = <<<EOT
    INSERT INTO alunos (nome, cpf, email) values
      ("Arthur", "11111111111", "arthur@email.com"),
      ("Lucas", "05687081817", "ymtihzva@sharklasers.com"),
      ('Leonardo Valerio', '02168425933', 'leonardo@valzitos.com'),
      ('Bruno Werner', '65401830000', 'bruno_werner@email.com'),
      ('João da Silva', '00000000500', 'joao_da_silva@email.com'),
      ('Fausto Silva', '95163852010', 'fausto_silva@email.com'),
      ('Vilma Morschheiser', '12345678910', 'vilma_morschheiser@email.com'),
      ('APAGAR ESSE REGISTRO', '00000000000', 'invalido@email.com'),
      ('APAGAR ESSE REGISTRO TAMBEM', '00000000001', 'invalido_2@email.com');
    EOT;
  $result = $db->query($query);
  print('<pre>>' . $query . '</pre><pre>' . $result . '</pre>');

  // --------------------------------------------------------------------------
  print('<hr>');

  // Selecionar todos os alunos
  $query = "SELECT nome, cpf, email FROM alunos ORDER BY id;";
  $result = $db->query($query);
  print('<pre>>' . $query . '</pre>');

  // Iterar sobre os resultados:
  print('<pre>');
  printf("%-30s | %-11s | %s\n", 'Nome', 'CPF', 'E-mail');
  if ($result->num_rows > 0) {
    while ($linha = $result->fetch_assoc()) {
      printf("%-30s | %11s | %s\n", $linha['nome'], $linha['cpf'], $linha['email']);
    }
  }
  print('</pre>');

  // --------------------------------------------------------------------------
  print('<hr>');

  // Atualizar alunos
  $query = <<<EOT
  UPDATE alunos
    SET email = 'bruno@valzitos.com'
    WHERE cpf = '65401830000';
  EOT;
  $result = $db->query($query);
  print('<pre>>' . $query . '</pre><pre>' . $result . '</pre>');

  // --------------------------------------------------------------------------
  print('<hr>');

  $query = <<<EOT
  UPDATE alunos
    SET cpf = '10110110110'
    WHERE cpf = '00000000500' AND email = 'joao_da_silva@email.com';
  EOT;
  $result = $db->query($query);
  print('<pre>>' . $query . '</pre><pre>' . $result . '</pre>');

  // --------------------------------------------------------------------------
  print('<hr>');

  $query = <<<EOT
  DELETE FROM alunos 
    WHERE nome = 'APAGAR ESSE REGISTRO';
  EOT;
  $result = $db->query($query);
  print('<pre>>' . $query . '</pre><pre>' . $result . '</pre>');

  // --------------------------------------------------------------------------
  print('<hr>');

  $query = <<<EOT
  DELETE FROM alunos 
    WHERE nome = 'APAGAR ESSE REGISTRO TAMBEM' and email = 'invalido_2@email.com';
  EOT;
  $result = $db->query($query);
  print('<pre>>' . $query . '</pre><pre>' . $result . '</pre>');

  // --------------------------------------------------------------------------
  print('<hr>');

  // Selecionar todos os alunos
  $query = "SELECT nome, cpf, email FROM alunos ORDER BY cpf;";
  $result = $db->query($query);
  print('<pre>>' . $query . '</pre>');

  // Iterar sobre os resultados:
  print('<pre>');
  printf("%-30s | %-11s | %s\n", 'Nome', 'CPF', 'E-mail');
  if ($result->num_rows > 0) {
    while ($linha = $result->fetch_assoc()) {
      printf("%-30s | %11s | %s\n", $linha['nome'], $linha['cpf'], $linha['email']);
    }
  }
  print('</pre>');
  ?>
</body>

</html>

<!-- Criar uma base de dados e uma tabela com 4 campos (no mínimo) – via Mysql (terminal) ou no PHP;
No PHP (sem uso de formulário):
* Inserir alguns registros;
*Visualizar registros;
* Alterar registros;
* Apagar registros; -->