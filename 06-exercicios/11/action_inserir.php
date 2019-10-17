<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="my_style.css" />
  <title>Tarefa 11</title>
</head>

<body>
  <?php
  $db = new mysqli('localhost', 'odawphp', 'z8mT6^FqH3Cu*4baq*kz', 'odawphp');

  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $cpf = $_POST["cpf"];
  $telefone = $_POST["telefone"];
  $aluno = $_POST["aluno"];
  $professor = $_POST["professor"];

  $query = <<<EOT
    INSERT INTO alunos (nome, email, cpf, telefone, aluno, professor) VALUES
        ($nome, $email, $cpf, $telefone, $aluno, $professor);
    EOT;
  ?>

</body>

</html>