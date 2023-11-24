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
            <h1>6. Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días.</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Erika Martínez Pérez
                 * @version 1.0
                 * @since 13/10/2023
                 */
                // Obtener la fecha actual
                $fechaActual = date("d-m-Y");
                // Sumar 60 días a la fecha actual
                $fechaFutura = date("d-m-Y", strtotime($fechaActual . " +60 days"));
                
                echo "Fecha actual: $fechaActual<br>";
                echo "Fecha dentro de 60 días: $fechaFutura<br>";
            ?>
        </main>
        <footer>
            <p>2023-2024 © Todos los derechos reservados. <a href="../indexProyectoTema3.php">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>

