<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../webroot/css/style.css">
        <title>DWES</title>
    </head>
    <body>
        <header>
            <h1>2. Inicializar y mostrar una variable heredoc.</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Erika Martínez Pérez
                 * @version 1.0
                 * @since 11/10/2023
                 */
                // Declaracion e inicializacion de variables
                // Utilizado para guardar un linea de ejecución SQL
                $heredoc = <<<EOD
                Variable con
                Heredoc
                EOD;

                // Mostrar la variable de heredoc por pantalla con la funcion echo()
                echo($heredoc);
            ?>
        </main>
        <footer>
            <p>2023-2024 © Todos los derechos reservados. <a href="../../index.html">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>
