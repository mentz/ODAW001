<?php
// POST INSERT
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
mysql_query($query_insert) or die(mysql_error());


// POST DELETE
$query_delete = "DELETE FROM alunos WHERE id = " . $_POST['id'] . ";";


// POST UPDATE
$valores = "";
foreach($_POST as $chave_davez => $valor_davez){
    if($key != "send"){
        $valores = $valores . $chave_davez . "=" . $valor_davez . ",";
    }
}
$valores = substr($valores, 0, -1);

$query_update = "UPDATE alunos SET " . $valores . " WHERE id = " . $_POST['id'] . ";";
?>