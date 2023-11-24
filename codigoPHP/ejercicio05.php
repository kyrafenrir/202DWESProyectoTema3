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
            <h1>5. Inicializar y mostrar una variable que tiene una marca de tiempo (timestamp)</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Erika Martínez Pérez
                 * @version 1.0
                 * @since 11/10/2023
                 */
                // Declaracion e inicializacion de variables
                $fechaActualProc1 = time();
                $ofechaActualProc2 = new DateTime();
                $ofechaProc2 = new DateTime('2024-3-2');
                $fechaActualProc3 = date_create();

                // Mostrar la variable por pantalla con la funcion echo()
                echo('El timestamp en procedimiento 1: '.$fechaActualProc1.'<br>');
                echo('El timestamp en procedimiento 2: '.$ofechaActualProc2->getTimestamp().'<br>');
                echo('El timestamp en procedimiento 3: '.date_timestamp_get($fechaActualProc3).'<br>');
                echo('El timepstamp de la fecha 2024-3-2: '.$ofechaProc2->getTimestamp().'<br>');
                
                // Formateo de timestamp a formato legible
                echo $ofechaActualProc2->format('U = d-m-Y / H:i:s').'<br>';
                echo $ofechaProc2->format('U = d-m-Y / H:i:s');
                
            ?>
        </main>
        <footer>
            <p>2023-2024 © Todos los derechos reservados. <a href="../indexProyectoTema3.php">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>

