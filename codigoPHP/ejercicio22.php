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
            <h1>22. Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas.</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Erika Martínez Pérez
                 * @version 1.0
                 * @since 23/10/2023
                 */
                // Código que se ejecuta cuando se envía el formulario y muestra de los valores
                if (isset($_REQUEST['submit'])){
                    echo "Nombre: ".$_REQUEST['nombre']."<br>";
                    echo "Edad: ".$_REQUEST['edad']."<br>";
                    echo "Email: ".$_REQUEST['email']."<br>";
                // Código que se ejecuta antes de rellenar el formulario y muestra el formulario
                } else {
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" name="ejercicio22">
                        <div>
                            <label> Nombre: </label>
                            <input type="text" name="nombre" placeholder="Escribe tu nombre.">
                            <br>
                            <label> Edad: </label>
                            <input type="text" name="edad" placeholder="Escribe tu edad.">
                            <br>
                            <label> Email: </label>
                            <input type="text" name="email" placeholder="Escribe tu email.">
                            <br>
                            <input type="submit" name="submit" value="Enviar datos">
                        </div>
                    </form>
                    <?php
                }
            ?>
        </main>
        <footer>
            <p>2023-2024 © Todos los derechos reservados. <a href="../indexProyectoTema3.php">Erika Martínez Pérez</a></p>
        </footer>
    </body>
</html>