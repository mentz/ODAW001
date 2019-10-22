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
  include("template_header.php");
  ?>

  <?php
  $db = new mysqli('localhost', 'odawphp', 'z8mT6^FqH3Cu*4baq*kz', 'odawphp');

  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $telefone = $_POST["telefone"];
  $cpf = $_POST["cpf"];
  $datanascimento = $_POST["datanascimento"];
  $estadonatal = $_POST["estadonatal"];
  $vinculo = $_POST["vinculo"];
  $sexo = $_POST["sexo"];
  $tt1 = isset($_POST["transporte1"]);
  $tt2 = isset($_POST["transporte2"]);
  $tt3 = isset($_POST["transporte3"]);
  $tt4 = isset($_POST["transporte4"]);

  $transporte = sprintf("0b%d%d%d%d", $tt1, $tt2, $tt3, $tt4);

  $chaves = "nome, cpf, email, telefone, estadonatal, datanascimento, vinculo, sexo, transporte";
  $valores = "'$nome', '$email', '$telefone', '$cpf', '$estadonatal', '$datanascimento', '$vinculo', '$sexo', $transporte";

  $query_insert = "INSERT INTO academicos ($chaves) VALUES ($valores);";
  // var_dump($query_insert);
  $status = $db->query($query_insert);
  if ($status) {
    echo '<h1> Inserido com sucesso </h1>';
  } else {
    echo '<h1> Não foi inserido, problema no banco de dados </h1>';
  }
  ?>

</body>

</html>