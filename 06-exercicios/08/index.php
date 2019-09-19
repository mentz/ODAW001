<html>

<head>
    <title>O front nunca muda XD</title>
    <style>
        body {
            background-color: #f402d1;
            text-align: center;
        }

        #wrapper_1 h2 {
            display: inline;
        }

        #wrapper_3 p {
            margin: auto;
            width: 250px;
            padding: 0.5rem;
            border: 1px solid #d3d3d3;
            border-radius: 1rem;
            box-shadow: 2px 2px 5px 1px rgba(0, 0, 0, 212);
            background-color: white
        }
    </style>
</head>

<body>
    <div id="wrapper_1">
        <h1>1. Greetings!</h1>
        <?php
        date_default_timezone_set("America/Sao_Paulo");
        printf("Hoje é <h2>%s</h2> e agora são <h2>%s</h2>.\n", date("d/m/Y"), date("H\hi"));
        ?>
    </div>

    <hr>
    <div id="wrapper_2">
        <h1>2. Brincar com function</h1>
        <p>Não dá pra ver o antes, mas abaixo é apresentado o depois da ordenação das letras da frase apresentada no 1. Greetings! (Obs.: acentos eliminados)</p>
        <?php

        function compara(int $a, int $b)
        {
            return $a > $b;
        }

        function ordena(string &$frase)
        {
            for ($k = 1; $k < strlen($frase); $k++) {
                for ($i = 0; $i < strlen($frase) - $k; $i++) {
                    if (compara(ord($frase[$i]), ord($frase[$i + 1]))) {
                        $c = $frase[$i + 1];
                        $frase[$i + 1] = $frase[$i];
                        $frase[$i] = $c;
                    }
                }
            }
        }

        $frase = sprintf("Hoje eh %s e agora saoh %s.\n", date("d/m/Y"), date("H\hi"));
        ordena($frase);
        printf("<h2>%s</h2>\n", $frase);
        ?>

        <p>E digo mais! Vai ter de novo só que ao invés de ordenar vai substituir cada espaço por um '_' e cada 'o' por um 'ö'.</p>
        <?php
        $frase = sprintf("Hoje é %s e agora são %s.\n", date("d/m/Y"), date("H\hi"));
        $frase = str_replace(" ", "_", $frase);
        $frase = str_replace("o", "ö", $frase);
        printf("<h2>%s</h2>\n", $frase);
        ?>
    </div>

    <hr>
    <div id="wrapper_3">
        <h1>3. Contador de visitas</h1>
        <p>PARABÉNS!!!<br />Você é o visitante de número
            <?php
            $file_path = "count";
            $file_handle = fopen($file_path, 'r+');
            fscanf($file_handle, "%d", $count);
            printf(" <b>%d</b> ", $count);
            fseek($file_handle, 0);
            fwrite($file_handle, $count + 1);
            fclose($file_handle);
            ?>
        </p>
    </div>

    <hr>
    <div id="wrapper_4">
        <h1>4. Sessões/Cookies</h1>

        <?php
        session_start();

        $_SESSION["primeiro_nome"] = "Arthur";
        $_SESSION["cor_favorita"]  = "Roxo";
        $_SESSION["animal_estimacao"]  = "Cachorro";

        if (!array_key_exists("contador", $_SESSION)) {
            $_SESSION["contador"] = 1;
        } else {
            $_SESSION["contador"]++;
        }
        ?>

        <?php
        printf(
            "Pessoa: %s<br/>Animal favorito: %s<br/>Cor favorita: %s<br/>Visitas nessa sessão: %d%s<br/>",
            $_SESSION["primeiro_nome"],
            $_SESSION["animal_estimacao"],
            $_SESSION["animal_estimacao"],
            $_SESSION["contador"],
            ($_SESSION["contador"] > 5) ? " - O cara gosta de ver várias vezes a mesma coisa xD" : ""
        );
        // print_r($_SESSION);

        // session_unset();
        // session_destroy();
        ?>
    </div>

    <body>

</html>