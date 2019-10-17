<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" type="text/css" href="my_style.css" />
  <title>Tarefa 11</title>
</head>

<body>
  <?php
<<<<<<< HEAD:06-exercicios/11/action_insert.php
  include("template_header.php");
 
  $chaves = "(";
  $valores = "(";
  foreach($_POST as $chave_davez => $valor_davez){
    if($key != "send"){
      $chaves = $chaves . $chave_davez . ",";
      $valores = $valores . $valor_davez . ",";
    }
  }
  $chaves = substr($chaves, 0, -1);
  $chaves = $chaves . ");";

  $valores = substr($valores, 0, -1);
  $valores = $valores . ");";

  $query_insert = "INSERT INTO alunos "  . $chaves . " VALUES " . $valores ;
  $status = mysql_query($query_insert);
  if($status){
    echo '<h1> Inserido com sucesso </h1>'
  } else {
    echo '<h1> Não foi inserido problema no banco de dados </h1>'
  }
?>
=======
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
>>>>>>> 2abcc482ae4e4d0ecc122ab6081c3f66201469cf:06-exercicios/11/action_inserir.php

</body>

</html>