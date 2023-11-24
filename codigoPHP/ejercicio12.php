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
            <h1>12. Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach()).</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Erika Martínez Pérez
                 * @version 1.0
                 * @since 11/10/2023
                 */
                // Print_r globales del servidor
                echo("<h2>Print_r \$_SERVER</h2>");
                echo('<div">');
                print_r($_SERVER);
                echo('</div>');
                
                // Foreach globales del servidor
                echo("<h2>Foreach \$_SERVER</h2>");
                foreach ($_SERVER as $key => $valor) {
                    echo "$key => $valor<br>";
                }
                
                // Print_r variables globales
                echo("<h2>Print_r \$GLOBALS</h2>");
                echo('<div">');
                print_r($GLOBALS);
                echo('</div>');
                
                // Foreach variables globales
                echo("<h2>Foreach \$GLOBALS</h2>");
                foreach ($GLOBALS as $key => $valor) {
                    foreach ($valor as $clave => $valor2) {
                        echo "$clave => $valor2<br>";
                    }
                }
                
                // Print_ r globales get
                echo("<h2>Print_r \$_GET</h2>");
                echo('<div">');
                print_r($_GET);
                echo('</div>');
                
                // Foreach globales get
                echo("<h2>Foreach \$_GET</h2>");
                foreach ($_GET as $key => $valor) {
                    echo "$key => $valor<br>";
                }
                
                // Print_ r globales post
                echo("<h2>Print_r \$_POST</h2>");
                echo('<div">');
                print_r($_POST);
                echo('</div>');
                
                // Foreach globales post
                echo("<h2>Foreach \$_POST</h2>");
                foreach ($_POST as $key => $valor) {
                    echo "$key => $valor<br>";
                }
                
                // Print_ r globales files
                echo("<h2>Print_r \$_FILES</h2>");
                echo('<div">');
                print_r($_FILES);
                echo('</div>');
                
                // Foreach globales files
                echo("<h2>Foreach \$_FILES</h2>");
                foreach ($_FILES as $key => $valor) {
                    echo "$key => $valor<br>";
                }
                
                // Print_ r globales cookies
                echo("<h2>Print_r \$_COOKIE</h2>");
                echo('<div">');
                print_r($_COOKIE);
                echo('</div>');
                
                // Foreach globales cookies
                echo("<h2>Foreach \$_COOKIE</h2>");
                foreach ($_COOKIE as $key => $valor) {
                    echo "$key => $valor<br>";
                }
                
                // Print_ r globales request
                echo("<h2>Print_r \$_REQUEST</h2>");
                echo('<div">');
                print_r($_REQUEST);
                echo('</div>');
                
                // Foreach globales request
                echo("<h2>Foreach \$_REQUEST</h2>");
                foreach ($_REQUEST as $key => $valor) {
                    echo "$key => $valor<br>";
                }
                
                // Print_ r globales env
                echo("<h2>Print_r \$_ENV</h2>");
                echo('<div">');
                print_r($_ENV);
                echo('</div>');
                
                // Foreach globales env
                echo("<h2>Foreach \$_ENV</h2>");
                foreach ($_ENV as $key => $valor) {
                    echo "$key => $valor<br>";
                }
            ?>
        </main>
        <footer>
            <p>2023-2024 © Todos los derechos reservados. <a href="../indexProyectoTema3.php">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>


