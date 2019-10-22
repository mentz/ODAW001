<?php
include("template_header.php");
?>
<h1>Alterar cadastro existente</h1>
<form action="action_alterar.php" method="POST">
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
  <table>
    <tr>
      <td>Nome:</td>
      <td><input type="text" placeholder="Mário Charles da Silva" name="nome" value="<?php echo $row["nome"]; ?>" /></td>
    </tr>
    <tr>
      <td>E-mail:</td>
      <td><input type="email" placeholder="banana@frutas.com" name="email" value="<?php echo $row["email"]; ?>" /></td>
    </tr>
    <tr>
      <td>Telefone:</td>
      <td><input type="tel" placeholder="47xxxxxxxxx" name="telefone" onkeypress="validar_numero(event)" value="<?php echo $row["telefone"]; ?>" /></td>
    </tr>
    <tr>
      <td>CPF:</td>
      <td><input type="tel" placeholder="01234567890" name="cpf" onkeypress="validar_numero(event)" value="<?php echo $row["cpf"]; ?>" /></td>
    </tr>
    <tr>
      <td>Data de Nascimento:</td>
      <td><input type="date" name="datanascimento" min="1903-01-01" value="<?php echo $row["datanascimento"]; ?>" /></td>
    </tr>
    <tr>
      <td>Estado natal:</td>
      <td>
        <select name="estadonatal">
          <?php
          $estados = $db->query("SELECT sigla, nome FROM estados ORDER BY nome;");
          if ($estados->num_rows > 0) {
            while ($estado = $estados->fetch_assoc()) {
              if (strcmp($estado['sigla'], $row['estadonatal']) == 0) {
                printf("<option value=\"%s\" selected>%s\n", $estado['sigla'], $estado['nome']);
              } else {
                printf("<option value=\"%s\">%s\n", $estado['sigla'], $estado['nome']);
              }
            }
          }
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Vínculo acadêmico:</td>
      <td>
        <table>
          <tr>
            <td><input type="radio" name="vinculo" value="profe" <?php if (strcmp($row["vinculo"], "profe") == 0) {
                                                                    echo "checked";
                                                                  }; ?> /></td>
            <td>Professor</td>
          </tr>
          <tr>
            <td><input type="radio" name="vinculo" value="agrad" <?php if (strcmp($row["vinculo"], "agrad") == 0) {
                                                                    echo "checked";
                                                                  }; ?> /></td>
            <td>Aluno Graduação</td>
          </tr>
          <tr>
            <td><input type="radio" name="vinculo" value="amest" <?php if (strcmp($row["vinculo"], "amest") == 0) {
                                                                    echo "checked";
                                                                  }; ?> /></td>
            <td>Aluno Mestrado</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td>Sexo:</td>
      <td>
        <input type="radio" name="sexo" value="F" <?php if (strcmp($row["sexo"], "F") == 0) {
                                                    echo "checked";
                                                  }; ?> /> Feminino
        <input type="radio" name="sexo" value="M" <?php if (strcmp($row["sexo"], "M") == 0) {
                                                    echo "checked";
                                                  }; ?> /> Masculino
      </td>
    </tr>
    <tr>
      <td>Meios de Transporte<br />para Universidade:</td>
      <td>
        <table>
          <tr>
            <td><input type="checkbox" name="transporte1" value="publico" <?php if ($row["transporte"] & 8) {
                                                                            echo "checked";
                                                                          }; ?> /></td>
            <td>Transporte público</td>
          </tr>
          <tr>
            <td><input type="checkbox" name="transporte2" value="ape" <?php if ($row["transporte"] & 4) {
                                                                        echo "checked";
                                                                      }; ?> /></td>
            <td>A pé</td>
          </tr>
          <tr>
            <td><input type="checkbox" name="transporte3" value="bicicleta" <?php if ($row["transporte"] & 2) {
                                                                              echo "checked";
                                                                            }; ?> /></td>
            <td>Bicicleta</td>
          </tr>
          <tr>
            <td><input type="checkbox" name="transporte4" value="motocarro" <?php if ($row["transporte"] & 1) {
                                                                              echo "checked";
                                                                            }; ?> /></td>
            <td>Moto/Carro</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <input type="reset" value="Cancelar" onclick="location.reload()" />
        <input type="submit" value="Salvar alterações" />
      </td>
    </tr>
  </table>
</form>

<?php
include("template_footer.php");
?>