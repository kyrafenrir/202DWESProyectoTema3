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
            <h1>15. Crear e inicializar un array con el sueldo percibido de lunes a domingo. Recorrer el array para calcular el sueldo percibido durante la semana. (Array asociativo con los nombres de los días de la semana).</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Erika Martínez Pérez
                 * @version 1.0
                 * @since 18/10/2023
                 */
                 // Crear un array asociativo con los sueldos por día de la semana
                $sueldosPorDia = array(
                    'lunes' => 120,
                    'martes' => 140,
                    'miércoles' => 160,
                    'jueves' => 180,
                    'viernes' => 200,
                    'sábado' => 220,
                    'domingo' => 240
                );
                // Inicializar una variable para almacenar el sueldo total de la semana
                $sueldoSemana = 0; 
                // Recorrer el array para calcular el sueldo percibido durante la semana
                foreach ($sueldosPorDia as $dia => $sueldo) {
                    // Excluir sábado y domingo del cálculo    
                    if ($dia != "sábado" && $dia != "domingo") {
                        $sueldoSemana += $sueldo;
                    }
                }
                // Imprimir el sueldo total de la semana
                echo "El sueldo percibido durante la semana es: $" . $sueldoSemana
            ?>
        </main>
        <footer>
            <p>2023-2024 © Todos los derechos reservados. <a href="../indexProyectoTema3.php">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>


