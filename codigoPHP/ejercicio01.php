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
            <h1>1.  Inicializar variables de los distintos tipos de datos básicos(string, int, float, bool) y mostrar los datos por pantalla (echo, print, printf, print_r,
var_dump)..</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Erika Martínez Pérez
                 * @version 1.0
                 * @since 11/10/2023
                 */
                // Declaracion e inicializacion de variables
                $cadena = "Hola";
                $entero = 1;
                $real = 3.15;
                $booleano = true;

                // Mostrar datos por pantalla con la funcion echo()
                echo('<h3>Echo()</h3>');
                echo('La variable $cadena es del tipo '.gettype($cadena).' y tiene como valor '.$cadena.'<br>');
                echo('La variable $entero es del tipo '.gettype($entero).' y tiene como valor '.$entero.'<br>');
                echo('La variable $real es del tipo '.gettype($real).' y tiene como valor '.$real.'<br>');
                echo('La variable $booleano es del tipo '.gettype($booleano).' y tiene como valor '.$booleano.'<br>');

                // Mostrar datos por pantalla con la funcion print()
                print('<h3>Print()</h3>');
                print('La variable $cadena es del tipo '.gettype($cadena).' y tiene como valor '.$cadena.'<br>');
                print('La variable $entero es del tipo '.gettype($entero).' y tiene como valor '.$entero.'<br>');
                print('La variable $real es del tipo '.gettype($real).' y tiene como valor '.$real.'<br>');
                print('La variable $booleano es del tipo '.gettype($booleano).' y tiene como valor '.$booleano.'<br>');

                // Mostrar datos por pantalla con la funcion printf()
                printf('<h3>Printf()</h3>');
                printf('La variable $cadena es del tipo %s y tiene como valor %s <br>', gettype($cadena), $cadena);
                printf('La variable $entero es del tipo %s y tiene como valor %d <br>', gettype($entero), $entero);
                printf('La variable $real es del tipo %s y tiene como valor %f <br>', gettype($real), $real);
                printf('La variable $booleano es del tipo %s y tiene como valor %b <br>', gettype($booleano), $booleano);

                // Mostrar datos por pantalla con la funcion print_r()
                echo('<h3>Print_r()</h3>');
                $array1 = array("a" => 'La variable $cadena es del tipo ', "b" => gettype($cadena), "c" => " y tiene como valor ", "d" => $cadena);
                print_r($array1);
                echo("<br>");
                $array2 = array("a" => 'La variable $entero es del tipo ', "b" => gettype($entero), "c" => " y tiene como valor ", "d" => $entero);
                print_r($array2);
                echo("<br>");
                $array3 = array("a" => 'La variable $real es del tipo ', "b" => gettype($real), "c" => " y tiene como valor ", "d" => $real);
                print_r($array3);
                echo("<br>");
                $array4 = array("a" => 'La variable $booleano es del tipo ', "b" => gettype($booleano), "c" => " y tiene como valor ", "d" => $booleano);
                print_r($array4);
                echo("<br>");

                // Mostrar datos por pantalla con la funcion var_dump()
                echo('<h3>Var_dump</h3>');
                $array5 = array("a" => 'La variable $cadena es del tipo ', "b" => gettype($cadena), "c" => " y tiene como valor ", "d" => $cadena);
                var_dump($array1);
                echo("<br>");
                $array6 = array("a" => 'La variable $entero es del tipo ', "b" => gettype($entero), "c" => " y tiene como valor ", "d" => $entero);
                var_dump($array2);
                echo("<br>");
                $array7 = array("a" => 'La variable $real es del tipo ', "b" => gettype($real), "c" => " y tiene como valor ", "d" => $real);
                var_dump($array3);
                echo("<br>");
                $array8 = array("a" => 'La variable $booleano es del tipo ', "b" => gettype($booleano), "c" => " y tiene como valor ", "d" => $booleano);
                var_dump($array4);
                echo("<br>");
            ?>
        </main>
        <footer>
            <p>2023-2024 © Todos los derechos reservados. <a href="../indexProyectoTema3.php">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>

