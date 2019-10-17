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

</body>

</html>
