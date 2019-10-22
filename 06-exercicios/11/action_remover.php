<?php
include("template_header.php");
?>

<?php
$db = new mysqli('localhost', 'odawphp', 'z8mT6^FqH3Cu*4baq*kz', 'odawphp');

$id = $_POST["id"];

$query = "DELETE FROM academicos WHERE id = $id;";

// var_dump($query);
$status = $db->query($query);
if ($status) {
  echo '<h1>Acadêmico removido</h1>';
} else {
  echo '<h1 style="color: red">Algo impediu a remoção deste registro</h1>';
}
?>

<?php
include("template_footer.php");
?>