<?php
include("template_header.php");
?>

<h1>Alterar cadastro existente</h1>
<br>
<?php
$db = new mysqli('localhost', 'odawphp', 'z8mT6^FqH3Cu*4baq*kz', 'odawphp');

$id = $_POST["id"];
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

$query = <<<EOT
  UPDATE academicos
    SET
      nome = '$nome',
      email = '$email',
      telefone = '$telefone',
      cpf = '$cpf',
      estadonatal = '$estadonatal',
      datanascimento = '$datanascimento',
      vinculo = '$vinculo',
      sexo = '$sexo',
      transporte = $transporte
    WHERE
      id = '$id';
EOT;

// var_dump($query);
$status = $db->query($query);
if ($status) {
  echo '<h2><b>Cadastro atualizado com sucesso :D</b></h2>';
} else {
  echo '<h2><b>Algo não permitiu a atualização do cadastro :(</b></h2>';
}
?>

<?php
include("template_footer.php");
?>