<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" type="text/css" href="my_style.css" /> -->
    <meta charset="utf-8" />
</head>

<body>
    <?php

    function valida_login(string $user, string $pass)
    {
        $file_handle = fopen("autenticacao.txt", "r");
        $found = false;
        while (!feof($file_handle)) {
            fscanf($file_handle, "%s %s", $usr, $pss);
            if (strcmp($user, $usr) == 0) {
                if (strcmp($pass, $pss) == 0) {
                    $found = true;
                    break;
                }
            }
        }
        fclose($file_handle);

        return $found;
    }

    if (valida_login($_POST["username"], $_POST["password"])) {
        print("<h1>Login efetuado com sucesso!</h1><p>string secreta booooo.</p>");
        print("<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />");
        print("<p>Esse login foi inseguro ._.</p>");
    } else {
        print("<h1>ACESSO NEGADO</h1>");
    }

    ?>
</body>

</html>