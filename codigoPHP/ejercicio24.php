<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../webroot/css/style.css">
        <title>DWES</title>
        <style>
            input[type="text"]:nth-of-type(1){
                background: yellow;
            }
            
            input[type="text"]:nth-of-type(2){
                background: yellow;
            }
            
            input[type="text"]:nth-of-type(4){
                background: grey;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>24. Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.</h1>
        </header>
        <main>
            <?php
                /**
                 * @author Erika Martínez Pérez
                 * @version 1.0
                 * @since 23/10/2023
                 */
            
                // Utilizacion de la libreria de validacion donde se incluyen los metodos de validacion de las entradas del formulario
                require_once '../core/231018libreriaValidacion.php';
                // Inicializacion de variables
                $entradaOK = true; // Inizacion de la variable que indica que todo en el formulario esta correctamente
                $aErrores = [
                    'nombre' => '',
                    'edad' => '',
                    'email' => '',
                ]; // Inicializacion del array donde recogemos los errores 
                $aRespuestas = [
                    'nombre' => '',
                    'edad' => '',
                    'email' => '',
                ]; // Inicializacion del array donde recogemos las respuestas
                
                // Fecha actual para valor predeterminado
                $oFecha = new DateTime();
                
                // Cargar valores por defecto en los campos del formulario
                if(isset($_REQUEST['submit'])){
                    // Validacion de la entrada y actuar en consecuencia
                    $aErrores['nombre'] = validacionFormularios::comprobarAlfabetico($_REQUEST['nombre'],100,1,1);
                    $aErrores['edad'] = validacionFormularios::comprobarEntero($_REQUEST['edad'],100,1,1);
                    $aErrores['email'] = validacionFormularios::validarEmail($_REQUEST['email'],0);
                    
                    // Foreach para recorrer el array de errores
                    foreach($aErrores as $campo => $error){
                        // Si existe algun error la entrada pasa a ser false
                        if($error != null){
                            
                            $_REQUEST[$campo] = '';
                            $entradaOK = false;
                        }
                    }
                } else {
                    // El formulario no se ha rellenado nunca
                    $entradaOK = false;
                }
                
                // Código que se ejecuta cuando se envía el formulario y muestra de los valores
                if ($entradaOK){
                    // Tratamiento de datos
                    echo "Nombre: ".$_REQUEST['nombre']."<br>";
                    echo "Edad: ".$_REQUEST['edad']."<br>";
                    echo "Email: ".$_REQUEST['email']."<br>";
                    echo "Fecha: ".$oFecha->format('d-m-Y / h:m:s')."<br>";
                // Código que se ejecuta antes de rellenar el formulario y muestra el formulario
                } else {
                    // Mostrar el formuilario hasta que rellenemos correctamente
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" name="ejercicio24">
                        <div>
                            <label> Nombre: </label>
                            <input type="text" name="nombre" value="<?php echo (isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : ''); ?>" placeholder="Escribe tu nombre."><?php echo(' <span>'.$aErrores['nombre'].'</span>');?>
                            <br>
                            <label> Edad: </label>
                            <input type="text" name="edad" value="<?php echo (isset($_REQUEST['edad']) ? $_REQUEST['edad'] : ''); ?>" placeholder="Escribe tu edad."><?php echo(' <span>'.$aErrores['edad'].'</span>');?>
                            <br>
                            <label> Email: </label>
                            <input type="text" name="email" value="<?php echo (isset($_REQUEST['email']) ? $_REQUEST['email'] : ''); ?>" placeholder="Escribe tu email."><?php echo(' <span>'.$aErrores['email'].'</span>');?>
                            <br>
                            <label> Fecha: </label>
                            <input type="text" name="fecha" value="<?php echo ($oFecha->format('d-m-Y / h:m:s'));?>"><?php echo(' <span>'.$aErrores['email'].'</span>');?>
                            <br><br>
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