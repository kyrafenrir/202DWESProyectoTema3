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
            <h1>3. Mostrar en tu página index la fecha y hora actual formateada en castellano. (Utilizar cuando sea posible la clase DateTime)</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Erika Martínez Pérez
                 * @version 1.0
                 * @since 11/10/2023
                 */
                // Declaracion e inicializacion de variables
                $fecha = new DateTime('now', new DateTimeZone('Europe/Madrid'));

                // Mostrar la variable por pantalla con la funcion format()
                $fechaActual = $fecha->format('d-m-Y / H:i:s');
                echo ("La fecha actual es: ".$fechaActual)
            ?>
        </main>
        <footer>
            <p>2023-2024 © Todos los derechos reservados. <a href="../indexProyectoTema3.php">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>

