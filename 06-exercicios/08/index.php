<html>
    <head>
        <title>O front nunca muda XD</title>
        <style>
            body {
                background-color: #f402d1;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php
            printf("Hoje é <h1>%s</h1> e agora são <h1>%s!\n", date("d/m/Y"), date("H:i"));
        ?>
        <hr>
        <?php
            // readfile("count");

            $file_handle = fopen($file_path, 'r+');
            fscanf($file_handle, "%d", $count);
            printf("<h1>%d</h1>", $count);
            fwrite($file_handle, $count + 1);
            fclose($file_handle);
        ?>
    <body>
</html>