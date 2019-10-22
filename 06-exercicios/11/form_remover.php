<?php
include("template_header.php");
?>

<h1>Alterar cadastro existente</h1>
<form action="action_remover.php" method="POST">
  <?php
  $db = new mysqli('localhost', 'odawphp', 'z8mT6^FqH3Cu*4baq*kz', 'odawphp');

  if (!isset($_GET["id"])) {
    header("Location: form_listar.php");
  } else {
    $query = "SELECT * FROM academicos WHERE id = " . $_GET["id"] . ";";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
    } else {
      header("Location: form_listar.php");
    }
  }
  ?>
  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
  <h3 style="color: orange;">Tem certeza que deseja remover esse cadastro?</h3>
  <p>Nome: <?php echo $row['nome']; ?></p>
  <input type="submit" value="Confirmo, sei o que estou fazendo e as implicações disso.">
</form>

<?php
include("template_footer.php");
?>