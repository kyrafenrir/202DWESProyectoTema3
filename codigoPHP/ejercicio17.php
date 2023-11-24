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
            <h1>17. Inicializar un array (bidimensional con dos índices numéricos) donde almacenamos el nombre de las personas que tienen reservado el asiento en un teatro de 20 filas y 15 asientos por fila. (Inicializamos el array ocupando únicamente 5 asientos). Recorrer el array con distintas técnicas (foreach(), while(), for()) para mostrar los asientos ocupados en cada fila y las personas que lo ocupan.</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Erika Martínez Pérez
                 * @version 1.0
                 * @since 18/10/2023
                 */
                // Inicializar el array bidimensional para representar el teatro
                $ateatro = array();
                $filas = 20;
                $asientosPorFila = 15;
                // Llenar el array con algunos asientos ocupados
                $teatro[2][4] = "Rebeca";
                $teatro[5][8] = "Alvaro";
                $teatro[10][12] = "Ismael";
                $teatro[15][6] = "Borja";
                $teatro[18][10] = "Carlos";
                // Recorrer el array con foreach() para mostrar los asientos ocupados
                echo "<h3>Asientos ocupados (foreach()):</h3>";
                foreach ($teatro as $fila => $asientos) {
                    foreach ($asientos as $asiento => $persona) {
                        echo "Fila $fila, Asiento $asiento: $persona<br>";
                    }
                }
                
                // Recorrer el array con while() para mostrar los asientos ocupados
//                echo "<h3>Asientos ocupados (while()):</h3>";
//                reset($teatro);
//                while (list($fila, $asientos) = current($ateatro)) {
//                    next($fila);
//                    next($asientos);
//                    while (list($asiento, $persona) = current($asientos)) {
//                        next($asiento);
//                        next($persona);
//                        echo "Fila $fila, Asiento $asiento: $persona<br>";
//                    }
//                }
                
                // Recorrer el array con for() para mostrar los asientos ocupados
                echo "<h3>Asientos ocupados (for()):</h3>";
                for ($fila = 1; $fila <= $filas; $fila++) {
                    for ($asiento = 1; $asiento <= $asientosPorFila; $asiento++) {
                        if (isset($teatro[$fila][$asiento])) {
                            echo "Fila $fila, Asiento $asiento: " . $teatro[$fila][$asiento] . "<br>";
                        }
                    }
                }
            ?>
        </main>
        <footer>
            <p>2023-2024 © Todos los derechos reservados. <a href="../indexProyectoTema3.php">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>


