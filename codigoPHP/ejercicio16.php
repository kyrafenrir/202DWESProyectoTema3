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
            <h1>16. Recorrer el array anterior utilizando funciones para obtener el mismo resultado.</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Erika Martínez Pérez
                 * @version 1.0
                 * @since 18/10/2023
                 */
                // DECLARACION E INICIALIZACION DE VARIABLES
                // El array asociativo $aSueldos almacena los sueldos de cada dia de la semana
                $aSueldos =[
                    'lunes' => 120,
                    'martes' => 140,
                    'miercoles' => 160,
                    'jueves' => 180,
                    'viernes' => 200,
                    'sabado' => 220,
                    'domingo' => 240
                ];
                // Las variables heredoc se usaran para imprimir la esctrutura de una tabla en html
                $htmlInicioTabla = <<<HIT
                <table class="ej16">
                    <tbody>
                        <tr>
                            <th>Dia de la semana</th>
                            <th>Sueldo</th>
                        </tr>
                HIT;
                $htmlFinTabla = <<<HFT
                    </tbody>
                </table>
                HFT;

                // Se crea una funcion que imprime por pantalla el array
                function recorrerArray($array){
                    foreach($array as $clave => $valor) {
                        print "$clave = $valor €<br>";
                    }
                }

                // Se crea una funcion que genera las lineas de una tabla con las claves y valores del array
                function recorrerArrayTabla($array){
                    foreach($array as $clave => $valor) {
                        print "<tr>";
                        print "<td>".$clave."</td>";
                        print "<td>".$valor."€</td>";
                        print "</tr>";
                    }
                }

                // Se crea una funcion que calcula el sueldo total semanal sin contar el fin de semana
                function calcularSueldoSemanalSin($array){
                    $sueldoSemanal = 0;
                    foreach ($array as $dia => $sueldo) {  
                        if ($dia != "sabado" && $dia != "domingo") {     
                            $sueldoSemanal += $sueldo;     
                        }
                    } 
                    return $sueldoSemanal;
                }

                // Se crea una funcion que calcula el sueldo total semanal incluido el fin de semana
                function calcularSueldoSemanalCon($array){
                    $sueldoSemanal = 0;
                    foreach ($array as $dia => $sueldo) {         
                        $sueldoSemanal += $sueldo;    
                    }  
                    return $sueldoSemanal;
                }

                // Se muestra el array llamando a la funcion recorrerArray
                echo('<div class="ejercicio">');
                echo('<h3>Funcion <u>recorrerArray($array)</u>:</h3>');
                echo(recorrerArray($aSueldos));
                echo('</div>');

                // Se muestra el sueldo total semanal llamando a la funcion calcularSueldoSemanalSin
                echo('<div class="ejercicio">');
                echo('<h3>Funcion <u>calcularSueldoSemanalSin($array)</u>:</h3>');
                echo(calcularSueldoSemanalSin($aSueldos).'€');
                echo('</div>');

                // Se muestra el sueldo total semanal llamando a la funcion calcularSueldoSemanalCon
                echo('<div class="ejercicio">');
                echo('<h3>Funcion <u>calcularSueldoSemanalCon($array)</u>:</h3>');
                echo(calcularSueldoSemanalCon($aSueldos).'€');
                echo('</div>');

                // Se muestra el array llamando a la funcion recorrerArrayTabla
                echo('<div class="ejercicio">');
                echo('<h3>Funcion <u>recorrerArrayTabla($array)</u>:</h3>');
                echo($htmlInicioTabla);
                echo(recorrerArrayTabla($aSueldos));
                echo($htmlFinTabla);
                echo('</div>');
            ?>
        </main>
        <footer>
            <p>2023-2024 © Todos los derechos reservados. <a href="../indexProyectoTema3.php">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>


