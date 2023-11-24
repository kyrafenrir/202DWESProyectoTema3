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
            <h1>8. Mostrar la dirección IP del equipo desde el que estás accediendo.</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Erika Martínez Pérez
                 * @version 1.0
                 * @since 13/10/2023
                 */
                // Declaracion e inicializacion de variables
                $ip = $_SERVER["REMOTE_ADDR"];

                // Mostrar la variable por pantalla con la funcion echo()
                echo("La IP es: ".$ip);
            ?>
        </main>
        <footer>
            <p>2023-2024 © Todos los derechos reservados. <a href="../indexProyectoTema3.php">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>

