<?php
include("template_header.php");
?>

<h1>Incluir cadastro de acadêmico</h1>
<form action="action_inserir.php" method="POST">
  <table>
    <tr>
      <td>Nome:</td>
      <td><input type="text" placeholder="Mário Charles da Silva" name="nome" /></td>
    </tr>
    <tr>
      <td>E-mail:</td>
      <td><input type="email" placeholder="banana@frutas.com" name="email" /></td>
    </tr>
    <tr>
      <td>Telefone:</td>
      <td><input type="tel" placeholder="47xxxxxxxxx" name="telefone" onkeypress="validar_numero(event)" /></td>
    </tr>
    <tr>
      <td>CPF:</td>
      <td><input type="tel" placeholder="01234567890" name="cpf" onkeypress="validar_numero(event)" /></td>
    </tr>
    <tr>
      <td>Data de Nascimento:</td>
      <td><input type="date" name="datanascimento" min="1903-01-01" /></td>
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
        <input type="radio" name="sexo" value="F" /> Feminino
        <input type="radio" name="sexo" value="M" /> Masculino
      </td>
    </tr>
    <tr>
      <td>Meios de Transporte<br />para Universidade:</td>
      <td>
        <table>
          <tr>
            <td><input type="checkbox" name="transporte1" value="publico" /></td>
            <td>Transporte público</td>
          </tr>
          <tr>
            <td><input type="checkbox" name="transporte2" value="ape" /></td>
            <td>A pé</td>
          </tr>
          <tr>
            <td><input type="checkbox" name="transporte3" value="bicicleta" /></td>
            <td>Bicicleta</td>
          </tr>
          <tr>
            <td><input type="checkbox" name="transporte4" value="motocarro" /></td>
            <td>Moto/Carro</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="Enviar" /></td>
    </tr>
  </table>
</form>

<?php
include("template_footer.php");
?>