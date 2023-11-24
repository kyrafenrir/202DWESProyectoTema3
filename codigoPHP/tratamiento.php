<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="webroot/css/style.css">
        <title>DWES</title>
    </head>
    <body>
        <header>
            <h1>21. Construir un formulario para recoger un cuestionario realizado a una persona y enviarlo a una página Tratamiento.php para que muestre las preguntas y las respuestas recogidas. Tratamiento:</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Erika Martínez Pérez
                 * @version 1.0
                 * @since 23/10/2023
                 */
                echo "Nombre: ".$_REQUEST['nombre']."<br>";
                echo "Edad: ".$_REQUEST['edad']."<br>";
                echo "Email: ".$_REQUEST['email']."<br>";
            ?>
        </main>
        <footer>
            <p>2023-2024 © Todos los derechos reservados. <a href="../../index.html">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>


