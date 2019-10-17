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

  <form action="/action_insert.php">
    <table>
      <tr>
        <td>Nome:</td>
        <td><input type="text" name="nome" /></td>
      </tr>
      <tr>
        <td>E-mail:</td>
        <td><input type="text" name="email" /></td>
      </tr>
      <tr>
        <td>Telefone:</td>
        <td><input type="tel" name="telefone" /></td>
      </tr>
      <tr>
        <td>CPF:</td>
        <td><input type="tel" name="cpf" /></td>
      </tr>
      <tr>
        <td>Estado natal:</td>
        <td>
          <select name="estadonatal">
            <?php
            $db = new mysqli('localhost', 'odawphp', 'z8mT6^FqH3Cu*4baq*kz', 'odawphp');

            $estados = $db->query("SELECT sigla, nome FROM estados ORDER BY nome;");

            if ($estados->num_rows > 0) {
              while ($estado = $estados->fetch_assoc()) {
                printf("<option value=\"%s\">%s\n", $estado['sigla'], $estado['nome']);
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
              <td>
                <input type="radio" name="vinculo" value="profe" />
              </td>
              <td>Professor</td>
            </tr>
            <tr>
              <td><input type="radio" name="vinculo" value="agrad" /></td>
              <td>Aluno Graduação</td>
            </tr>
            <tr>
              <td><input type="radio" name="vinculo" value="amest" /></td>
              <td>Aluno Mestrado</td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>Sexo:</td>
        <td>
          <input type="radio" name="genero" value="f" /> Feminino
          <input type="radio" name="genero" value="m" /> Masculino
        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" /></td>
      </tr>
    </table>
  </form>
</body>

</html>