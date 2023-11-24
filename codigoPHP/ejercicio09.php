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
            <h1>9. Mostrar el path donde se encuentra el fichero que se está ejecutando.</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Erika Martínez Pérez
                 * @version 1.0
                 * @since 11/10/2023
                 */
                echo "La ruta completa del archivo en ejecución es: ".__FILE__."<br>";
                echo "La ruta completa del archivo en ejecución es: ".$_SERVER['SCRIPT_FILENAME']."<br>";
            ?>
        </main>
        <footer>
            <p>2023-2024 © Todos los derechos reservados. <a href="../indexProyectoTema3.php">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>


