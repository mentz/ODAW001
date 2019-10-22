<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" type="text/css" href="my_style.css" />
    <title>Tarefa 11</title>
    <script>
        function validar_numero(evento) {
            var theEvent = evento || window.event;
            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]/;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>
</head>

<body>
    <h1>Exercício 11</h1>
    <hr />
    <h2>Cadastro de Acadêmicos</h2>

    <a href="form_inserir.php">Inserir acadêmico</a>
    <a href="form_listar.php">Listar acadêmicos</a>