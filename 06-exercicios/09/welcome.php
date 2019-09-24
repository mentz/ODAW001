<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="my_style.css" />
    <meta charset="utf-8" />
</head>

<body>
    <h1>Exercícios 19/09</h1>
    <hr width="50%" />
    <?php

    function valida_email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function valida_senha($senha)
    {
        $regras = ["/[a-z]/", "/[A-Z]/", "/[0-9]/", "/[!-\/:-@\[-`\{-~]/", "/.{6,}/"];
        $certo = true;
        foreach ($regras as $regra) {
            $certo &= preg_match($regra, $senha);
            if (preg_match($regra, $senha) == false) {
                printf("Falhou a senha na regra %s<br/>", $regra);
            }
        }
        return $certo;
    }

    function validate_post($args)
    {
        if (
            array_key_exists("name", $args) &&
            array_key_exists("email", $args) &&
            array_key_exists("senha", $args) &&
            array_key_exists("gender", $args) &&
            array_key_exists("bio", $args) &&
            array_key_exists("termos", $args) &&
            valida_email($args["email"]) &&
            valida_senha($args["senha"])
        ) {
            return true;
        }
        return false;
    }

    function register_user($args)
    {
        $user = $args["email"];
        $senha = password_hash($args["senha"], PASSWORD_BCRYPT);

        $file_path = "secure_autenticacao.txt";
        $file_handle = fopen($file_path, 'a');
        fprintf($file_handle, "%s %s\n", $user, $senha);
        fclose($file_handle);
    }

    function verify_new_user($new_user)
    {
        $file_path = "secure_autenticacao.txt";
        $file_handle = fopen($file_path, 'a');

        $user = "";
        $password = "";

        $flag = true;
        while (feof($file_handle)) {
            fscanf($file_handle, "%s", $user);
            fscanf($file_handle, "%s", $password);
            echo $user;
            if ($new_user == $user) {
                $flag = false;
            }
        }

        fwrite($file_handle, $user);
        fwrite($file_handle, $password);

        fclose($file_handle);

        return $flag;
    }

    if (validate_post($_POST)) {
        print('<div id="success"><h2>Parabéns!</h2><h1>Está cadastrado!</h1>Seus dados são: <br />');
        print('<table><tr><th>Campo</th><th>valor</th></tr>');
        $campos = ["name", "email", "gender", "bio"];
        $opcionais = ["aluno", "professor"];

        foreach ($campos as $campo) {
            printf("<tr><td>%s</td><td>%s</td></tr>", $campo, filter_var($_POST[$campo], FILTER_SANITIZE_STRING));
        }
        foreach ($opcionais as $campo) {
            if (array_key_exists($campo, $_POST)) {
                printf("<tr><td>%s</td><td>True</td></tr>", $campo);
            }
        }
        verify_new_user($_POST["email"]);
        register_user($_POST);
    } else {
        print('<div id="failure"><h2>Falhou!</h2><h3><a href="cadastro.html">Tente novamente, dessa vez preenchendo todos os campos.</a></h3>');
        if (array_key_exists("email", $_POST) && !valida_email($_POST["email"])) {
            print('<p>O e-mail não é válido.</p>');
        }
        if (array_key_exists("senha", $_POST) && !valida_senha($_POST["senha"])) {
            print('<p>A senha é muito fraca.</p>');
        }
    }
    print('</div>');
    ?>
</body>

</html>