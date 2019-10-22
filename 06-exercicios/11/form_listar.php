<?php
include("template_header.php");
?>

<h1>Listagem de acadêmicos cadastrados</h1>
<table>
  <?php
  $db = new mysqli('localhost', 'odawphp', 'z8mT6^FqH3Cu*4baq*kz', 'odawphp');
  $query = "SELECT * FROM academicos;";
  $result = $db->query($query);

  if ($result->num_rows > 0) {
    echo "<tr>";
    foreach ($result->fetch_fields() as $key) {
      echo "<th>" . $key->name . "</th>";
    }
    echo "<th>Editar</th>";
    echo "<th>Excluir</th>";
    echo "</tr>";
    while ($row = $result->fetch_row()) {
      echo "<tr>";
      foreach ($row as $col) {
        echo "<td>" . $col . "</td>";
      }
      // editar
      echo "<td><a href=\"form_alterar.php?id=" . $row[0] . "\">Editar</a></td>";
      // excluir
      echo "<td><a href=\"form_remover.php?id=" . $row[0] . "\">Remover</a></td>";

      echo "</tr>";
    }
  }
  ?>
</table>

<?php
include("template_footer.php");
?>