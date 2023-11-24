<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../webroot/css/style.css">
        <title>DWES</title>
        <style>
            input:nth-child(2n){
                background: yellow;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>25. Trabajar en PlantillaFormulario.php mi plantilla para hacer formularios como churros.</h1>
        </header>
        <main>
            <?php
                    /**
                    * 
                    * @author ORIGINAL - Carlos García Cachón
                    * @author Erika Martínez Pérez
                    * @since 07/11/2023
                    */
                    //Incluyo las librerias de validación para comprobar los campos
                    require_once '../core/231018libreriaValidacion.php';
                    
                    //Declaración de constantes por OBLIGATORIEDAD
                    define('OPCIONAL',0);
                    define('OBLIGATORIO',1);
                    
                    //Declaración de los limites para el metodo comprobar ALFABETICO
                    define('TAM_MAX_ALFABETICO',1000);
                    define('TAM_MIN_ALFABETICO',1);
                    
                    //Declaración de los limites para el metodo comprobar ALFANUMERICO
                    define('TAM_MAX_ALFANUMERICO',1000);
                    define('TAM_MIN_ALFANUMERICO',1);
                    
                    //Declaración de los limites para el metodo comprobar ENTERO
                    define('TAM_MAX_ENTERO',PHP_INT_MAX);
                    define('TAM_MIN_ENTERO',PHP_INT_MIN);
                    
                    //Declaración de los limites para el metodo comprobar FLOAT
                    define('TAM_MAX_FLOAT',PHP_FLOAT_MAX);
                    define('TAM_MIN_FLOAT',PHP_FLOAT_MIN);
                    
                    //Declaración de los limites para el metodo comprobar FECHA
                    define('FECHA_MAX',date('d-m-Y'));
                    define('FECHA_MIN',"01/01/1950");
                    
                    //Declaración de los limites para el metodo comprobar PASSWORD
                    define('LONG_MAX',16);
                    define('LONG_MIN',2);
                    //Hace referencia a los tipos de complejidad de la contraseña
                    define('LOW',1); 
                    define('MEDIUM',2);
                    define('HARD',3);
                    
                    //Declaración del limite de caracteres para metodos que comprueben un MAXIMO y MINIMO (MINTAMANIO/MAXTAMANIO/NOMBREARCHIVO)
                    define('TAM_MAX_CARACTERES',16);
                    define('TAM_MIN_CARACTERES',1);
                    
                    //Declaración del limite de alfanumericos dentro del campo TEXTAREA
                    define("TAM_MAX_TEXTO", 255);
                    define("TAM_MIN_TEXTO", 1);
                    
                    //Declaración de un array para que almacene las EXTENSIONES por defecto de la función validarNombreArchivo
                    $aExtensiones = ['txt','json'];
                    
                    //Declaración de un array LISTA
                    $aLista = ['listItem1','listItem2'];
                    
                    //Declaración de variables de estructura para validar la ENTRADA de RESPUESTAS o ERRORES
                    //Valores por defecto
                    $entradaOK = true;
                    
                    $aRespuestas = [
                        'alfabeticoObligatorio' => "",
                        'alfabeticoOpcional' => "",
            
                        'alfanumericoObligatorio' => "",
                        'alfanumericoOpcional' => "",
            
                        'enteroObligatorio' => "",
                        'enteroOpcional' => "",
            
                        'floatObligatorio' => "",
                        'floatOpcional' => "",
                        
                        'correoObligatorio' => "",
                        'correoOpcional' => "",
                        
                        'urlObligatorio' => "",
                        'urlOpcional' => "",
            
                        'fechaObligatorio' => "",
                        'fechaOpcional' => "",
                        
                        'dniObligatorio' => "",
                        'dniOpcional' => "",
                        
                        'cpObligatorio' => "",
                        'cpOpcional' => "",
            
                        'passwordObligatorio' => "",
                        'passwordOpcional' => "",
                        
                        'telefonoObligatorio' => "",
                        'telefonoOpcional' => "",
                        
                        'fileObligatorio' => "",
                        'fileOpcional' => "",

                        'colorOpcional' => "",

                        'rangeOpcional' => "",
                        
                        'listaObligatorio' => "",
                        
                        'radioButtonObligatorio' => "",
            
                        'checkBoxObligatorio' => "",
                        
                        'textAreaObligatorio' => "",
                        'textAreaOpcional' => ""
                    ];
                    
                    $aErrores = [
                        'alfabeticoObligatorio' => "",
                        'alfabeticoOpcional' => "",
            
                        'alfanumericoObligatorio' => "",
                        'alfanumericoOpcional' => "",
            
                        'enteroObligatorio' => "",
                        'enteroOpcional' => "",
            
                        'floatObligatorio' => "",
                        'floatOpcional' => "",
                        
                        'correoObligatorio' => "",
                        'correoOpcional' => "",
                        
                        'urlObligatorio' => "",
                        'urlOpcional' => "",
            
                        'fechaObligatorio' => "",
                        'fechaOpcional' => "",
                        
                        'dniObligatorio' => "",
                        'dniOpcional' => "",
                        
                        'cpObligatorio' => "",
                        'cpOpcional' => "",
            
                        'passwordObligatorio' => "",
                        'passwordOpcional' => "",
                                                
                        'telefonoObligatorio' => "",
                        'telefonoOpcional' => "",
            
                        'fileObligatorio' => "",
                        'fileOpcional' => "",

                        'colorOpcional' => "",

                        'rangeOpcional' => "",
                        
                        'listaObligatorio' => "",
                        
                        'radioButtonObligatorio' => "",
            
                        'checkBoxObligatorio' => "",
                        
                        'textAreaObligatorio' => "",
                        'textAreaOpcional' => ""
                    ];
                    //En el siguiente if pregunto si el '$_REQUEST' recupero el valor 'enviar' que enviamos al pulsar el boton de enviar del formulario.
                    if (isset($_REQUEST['enviar'])) {
                        /*
                         * Ahora inicializo cada 'key' del ARRAY utilizando las funciónes de la clase de 'validacionFormularios' , la cuál 
                         * comprueba el valor recibido (en este caso el que recibe la variable '$_REQUEST') y devuelve 'null' si el valor es correcto,
                         * o un mensaje de error personalizado por cada función dependiendo de lo que validemos.
                         */ 
                        $aErrores = [
                            'alfabeticoObligatorio' => validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObligatorio'], TAM_MAX_ALFABETICO, TAM_MIN_ALFABETICO, OBLIGATORIO),
                            'alfabeticoOpcional' => validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObligatorio'], TAM_MAX_ALFABETICO, TAM_MIN_ALFABETICO, OPCIONAL),

                            'alfanumericoObligatorio' => validacionFormularios::comprobarAlfanumerico($_REQUEST['alfanumericoObligatorio'], TAM_MAX_ALFANUMERICO, TAM_MIN_ALFANUMERICO, OBLIGATORIO),
                            'alfanumericoOpcional' => validacionFormularios::comprobarAlfanumerico($_REQUEST['alfanumericoOpcional'], TAM_MAX_ALFANUMERICO, TAM_MIN_ALFANUMERICO, OPCIONAL),

                            'enteroObligatorio' => validacionFormularios::comprobarEntero($_REQUEST['enteroObligatorio'], TAM_MAX_ENTERO, TAM_MIN_ENTERO, OBLIGATORIO),
                            'enteroOpcional' => validacionFormularios::comprobarEntero($_REQUEST['enteroOpcional'], TAM_MAX_ENTERO, PHP_INT_MIN, OPCIONAL),

                            'floatObligatorio' => validacionFormularios::comprobarFloat($_REQUEST['floatObligatorio'], TAM_MAX_FLOAT, TAM_MIN_FLOAT, OBLIGATORIO),
                            'floatOpcional' => validacionFormularios::comprobarFloat($_REQUEST['floatOpcional'], TAM_MAX_FLOAT, TAM_MIN_FLOAT, OPCIONAL),

                            'correoObligatorio' => validacionFormularios::validarEmail($_REQUEST['correoObligatorio'], OBLIGATORIO),
                            'correoOpcional' => validacionFormularios::validarEmail($_REQUEST['correoOpcional'], OPCIONAL),

                            'urlObligatorio' => validacionFormularios::validarURL($_REQUEST['urlObligatorio'], OBLIGATORIO),
                            'urlOpcional' => validacionFormularios::validarURL($_REQUEST['urlObligatorio'], OPCIONAL),

                            'fechaObligatorio' => validacionFormularios::validarFecha($_REQUEST['fechaObligatorio'],FECHA_MAX, FECHA_MIN, OBLIGATORIO),
                            'fechaOpcional' => validacionFormularios::validarFecha($_REQUEST['fechaOpcional'],FECHA_MAX, FECHA_MIN, OPCIONAL),

                            'dniObligatorio' => validacionFormularios::validarDni($_REQUEST['dniObligatorio'], OBLIGATORIO),
                            'dniOpcional' => validacionFormularios::validarDni($_REQUEST['dniOpcional'], OPCIONAL),

                            'cpObligatorio' => validacionFormularios::validarCp($_REQUEST['cpObligatorio'], OBLIGATORIO),
                            'cpOpcional' => validacionFormularios::validarCp($_REQUEST['cpOpcional'], OPCIONAL),

                            'passwordObligatorio' => validacionFormularios::validarPassword($_REQUEST['passwordObligatorio'],LONG_MAX,LONG_MIN, LOW, OBLIGATORIO),
                            'passwordOpcional' => validacionFormularios::validarPassword($_REQUEST['passwordOpcional'],LONG_MAX,LONG_MIN, LOW, OPCIONAL),

                            'telefonoObligatorio' => validacionFormularios::validarTelefono($_REQUEST['telefonoObligatorio'], OBLIGATORIO),
                            'telefonoOpcional' => validacionFormularios::validarTelefono($_REQUEST['telefonoOpcional'], OPCIONAL),

                            'fileObligatorio' => validacionFormularios::validarNombreArchivo($_REQUEST['fileObligatorio'], $aExtensiones, TAM_MAX_CARACTERES, TAM_MIN_CARACTERES, OBLIGATORIO),
                            'fileOpcional' => validacionFormularios::validarNombreArchivo($_REQUEST['fileOpcional'], $aExtensiones, TAM_MAX_CARACTERES, TAM_MIN_CARACTERES, OPCIONAL),

                            'rangeOpcional' => validacionFormularios::comprobarEntero($_REQUEST['rangeOpcional'], TAM_MAX_ENTERO, TAM_MIN_ENTERO, OPCIONAL),
                            
                            'radioButtonObligatorio' => NULL,
                            
                            'listaObligatorio' => validacionFormularios::validarElementoEnLista($_REQUEST['listaObligatorio'], $aLista),
                        
                            'textAreaObligatorio' => validacionFormularios::comprobarAlfanumerico($_REQUEST['textAreaObligatorio'], TAM_MAX_TEXTO, TAM_MIN_TEXTO, OBLIGATORIO),
                            'textAreaOpcional' => validacionFormularios::comprobarAlfanumerico($_REQUEST['textAreaOpcional'], TAM_MAX_TEXTO, TAM_MIN_TEXTO, OPCIONAL)
                        ];
                        
                        /* 
                         * En los siguientes 'if' comprobamos que existe valor dentro de las siguientes variables y en caso negativo mostramos un mensaje error.
                         * Ya que dentro de la función validarElementoLista' no tenemos manera de hacerlo obligatorio, lo hacemos por el siguiente 'if'.
                         */
                        if (!isset($_REQUEST['radioButtonObligatorio'])) {$aErrores['radioButtonObligatorio'] = "Debes elegir al menos 1 opción.";}
                        if (!isset($_REQUEST['checkBoxObligatorio'])) {$aErrores['checkBoxObligatorio'] = "Debes elegir al menos 1 opción.";}
                        
                        /*
                         * En este foreach recorremos el array buscando que exista NULL (Los metodos anteriores si son correctos devuelven NULL)
                         * y en caso negativo cambiara el valor de '$entradaOK' a false y borrara el contenido del campo.
                         */
                        foreach ($aErrores as $campo => $error) {
                            if ($error != null) {
                                $_REQUEST[$campo] = "";
                                $entradaOK = false;
                            }
                        }
                    } else {
                        $entradaOK = false;
                    }
                    //En caso de que '$entradaOK' sea true, cargamos las respuestas en el array '$aRespuestas'
                    if ($entradaOK) {
                        $aRespuestas = [
                            'alfabeticoObligatorio' => $_REQUEST['alfabeticoObligatorio'],
                            'alfabeticoOpcional' => $_REQUEST['alfabeticoOpcional'],

                            'alfanumericoObligatorio' => $_REQUEST['alfanumericoObligatorio'],
                            'alfanumericoOpcional' => $_REQUEST['alfanumericoOpcional'],

                            'enteroObligatorio' => $_REQUEST['enteroObligatorio'],
                            'enteroOpcional' => $_REQUEST['enteroOpcional'],

                            'floatObligatorio' => $_REQUEST['floatObligatorio'],
                            'floatOpcional' => $_REQUEST['floatOpcional'],

                            'correoObligatorio' => $_REQUEST['correoObligatorio'],
                            'correoOpcional' => $_REQUEST['correoOpcional'],

                            'urlObligatorio' => $_REQUEST['urlObligatorio'],
                            'urlOpcional' => $_REQUEST['urlOpcional'],

                            'fechaObligatorio' => $_REQUEST['fechaObligatorio'],
                            'fechaOpcional' => $_REQUEST['fechaOpcional'],

                            'dniObligatorio' => $_REQUEST['dniObligatorio'],
                            'dniOpcional' => $_REQUEST['dniOpcional'],

                            'cpObligatorio' => $_REQUEST['cpObligatorio'],
                            'cpOpcional' => $_REQUEST['cpOpcional'],

                            'passwordObligatorio' => $_REQUEST['passwordObligatorio'],
                            'passwordOpcional' => $_REQUEST['passwordOpcional'],

                            'telefonoObligatorio' => $_REQUEST['telefonoObligatorio'],
                            'telefonoOpcional' => $_REQUEST['telefonoOpcional'],

                            'fileObligatorio' => $_REQUEST['fileObligatorio'],
                            'fileOpcional' => $_REQUEST['fileOpcional'],

                            'colorOpcional' => $_REQUEST['colorOpcional'],

                            'rangeOpcional' => $_REQUEST['rangeOpcional'],

                            'listaObligatorio' => $_REQUEST['listaObligatorio'],

                            'radioButtonObligatorio' => $_REQUEST['radioButtonObligatorio'],

                            'checkBoxObligatorio' => $_REQUEST['checkBoxObligatorio'],
                        
                            'textAreaObligatorio' => $_REQUEST['textAreaObligatorio'],
                            'textAreaOpcional' => $_REQUEST['textAreaOpcional']
                        ];
                        //Aqui recorremos el array mostrando los valores alamacenados en el array anterior
                        echo("<div>");
                        echo "<h2>Respuestas:</h2>";
                        foreach ($aRespuestas as $campo => $respuesta) {
                            if ($campo == 'checkBoxObligatorio') {
                                echo "<p class='d-flex justify-content-start'>".strtoupper($campo)." : [</p>";
                                foreach ($_REQUEST['checkBoxObligatorio'] as $campo => $respuesta) { 
                                    echo "<p>".$campo." => ".$respuesta."</p>";
                                }
                                echo "]";
                            } else {
                                echo "<p class='d-flex justify-content-start'>".strtoupper($campo)." : ". $respuesta."</p>";
                            }
                        }
                        echo("</div>");
                    } else {
                    ?>
                    <!-- Codigo del formulario -->
                    <form name="plantilla" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <fieldset>
                            <table>
                                <thead>
                                    <tr>
                                        <th class="rounded-top" colspan="3"><legend>Plantilla</legend></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <!-- Alfabético Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="alfabeticoObligatorio">Alfabético Obligatorio:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="obligatorio d-flex justify-content-start" type="text" name="alfabeticoObligatorio" placeholder="cadena_de_letras" value="<?php echo (isset($_REQUEST['alfabeticoObligatorio']) ? $_REQUEST['alfabeticoObligatorio'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['alfabeticoObligatorio'])){ echo $aErrores['alfabeticoObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Alfabético Opcional -->
                                        <td class="d-flex justify-content-start">
                                            <label for="alfabeticoOpcional">Alfabético Opcional:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="d-flex justify-content-start" type="text" name="alfabeticoOpcional" placeholder="cadena_de_letras" value="<?php echo (isset($_REQUEST['alfabeticoOpcional']) ? $_REQUEST['alfabeticoOpcional'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['alfabeticoOpcional'])){ echo $aErrores['alfabeticoOpcional'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Alfanumerico Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="alfanumericoObligatorio">Alfanumérico Obligatorio:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="obligatorio d-flex justify-content-start" type="text" placeholder="cadena_de_letras_y_numeros" name="alfanumericoObligatorio" value="<?php echo (isset($_REQUEST['alfanumericoObligatorio']) ? $_REQUEST['alfanumericoObligatorio'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['alfanumericoObligatorio'])){ echo $aErrores['alfanumericoObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Alfanumerico Opcional -->
                                        <td class="d-flex justify-content-start">
                                            <label for="alfanumericoOpcional">Alfanumérico Opcional:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="d-flex justify-content-start" type="text" name="alfanumericoOpcional" placeholder="cadena_de_letras_y_numeros" value="<?php echo (isset($_REQUEST['alfanumericoOpcional']) ? $_REQUEST['alfanumericoOpcional'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['alfanumericoOpcional'])){ echo $aErrores['alfanumericoOpcional'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Entero Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="enteroObligatorio">Entero Obligatorio:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="obligatorio d-flex justify-content-start" type="text" name="enteroObligatorio" placeholder="numeros_enteros" value="<?php echo (isset($_REQUEST['enteroObligatorio']) ? $_REQUEST['enteroObligatorio'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['enteroObligatorio'])){ echo $aErrores['enteroObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Entero Opcional -->
                                        <td class="d-flex justify-content-start">
                                            <label for="enteroOpcional">Entero Opcional:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="d-flex justify-content-start" type="text" name="enteroOpcional" placeholder="numeros_enteros" value="<?php echo (isset($_REQUEST['enteroOpcional']) ? $_REQUEST['enteroOpcional'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['enteroOpcional'])){ echo $aErrores['enteroOpcional'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Float Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="floatObligatorio">Float Obligatorio:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="obligatorio d-flex justify-content-start" type="text" name="floatObligatorio" placeholder="numeros_reales" value="<?php echo (isset($_REQUEST['floatObligatorio']) ? $_REQUEST['floatObligatorio'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['floatObligatorio'])){ echo $aErrores['floatObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Float Opcional -->
                                        <td class="d-flex justify-content-start">
                                            <label for="floatOpcional">Float Opcional:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="d-flex justify-content-start" type="text" name="floatOpcional" placeholder="numeros_reales" value="<?php echo (isset($_REQUEST['floatOpcional']) ? $_REQUEST['floatOpcional'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['floatOpcional'])){ echo $aErrores['floatOpcional'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Correo Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="correoObligatorio">Correo Obligatorio:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="obligatorio d-flex justify-content-start" type="text" name="correoObligatorio" placeholder="tunombre@gmail.com" value="<?php echo (isset($_REQUEST['correoObligatorio']) ? $_REQUEST['correoObligatorio'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['correoObligatorio'])){ echo $aErrores['correoObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Correo Opcional -->
                                        <td class="d-flex justify-content-start">
                                            <label for="correoOpcional">Correo Opcional:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="d-flex justify-content-start" type="text" name="correoOpcional" placeholder="tunombre@gmail.com" value="<?php echo (isset($_REQUEST['correoOpcional']) ? $_REQUEST['correoOpcional'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['correoOpcional'])){ echo $aErrores['correoOpcional'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- URL Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="urlObligatorio">URL Obligatorio:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="obligatorio d-flex justify-content-start" type="text" name="urlObligatorio" placeholder="https://www.ejemplo.com" value="<?php echo (isset($_REQUEST['urlObligatorio']) ? $_REQUEST['urlObligatorio'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['urlObligatorio'])){ echo $aErrores['urlObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- URL Opcional -->
                                        <td class="d-flex justify-content-start">
                                            <label for="urlOpcional">URL Opcional:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="d-flex justify-content-start" type="text" name="urlOpcional" placeholder="https://www.ejemplo.com" value="<?php echo (isset($_REQUEST['urlOpcional']) ? $_REQUEST['urlOpcional'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['urlOpcional'])){ echo $aErrores['urlOpcional'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Fecha Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="fechaObligatorio">Fecha Obligatorio:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="obligatorio d-flex justify-content-start" type="text" name="fechaObligatorio" placeholder="Año-Mes-dia/2000-01-01" value="<?php echo (isset($_REQUEST['fechaObligatorio']) ? $_REQUEST['fechaObligatorio'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['fechaObligatorio'])){ echo $aErrores['fechaObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Fecha Opcional -->
                                        <td class="d-flex justify-content-start">
                                            <label for="fechaOpcional">Fecha Opcional:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="d-flex justify-content-start" type="text" name="fechaOpcional" placeholder="Año-Mes-dia/2000-01-01" value="<?php echo (isset($_REQUEST['fechaOpcional']) ? $_REQUEST['fechaOpcional'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['fechaOpcional'])){ echo $aErrores['fechaOpcional'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- DNI Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="dniObligatorio">DNI Obligatorio:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="obligatorio d-flex justify-content-start" type="text" name="dniObligatorio" placeholder="80957774M" value="<?php echo (isset($_REQUEST['dniObligatorio']) ? $_REQUEST['dniObligatorio'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['dniObligatorio'])){ echo $aErrores['dniObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- DNI Opcional -->
                                        <td class="d-flex justify-content-start">
                                            <label for="dniOpcional">DNI Opcional:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="d-flex justify-content-start" type="text" name="dniOpcional" placeholder="80957774M" value="<?php echo (isset($_REQUEST['dniOpcional']) ? $_REQUEST['dniOpcional'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['dniOpcional'])){ echo $aErrores['dniOpcional'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- CP Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="cpObligatorio">CP Obligatorio:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="obligatorio d-flex justify-content-start" type="text" name="cpObligatorio" placeholder="49600" value="<?php echo (isset($_REQUEST['cpObligatorio']) ? $_REQUEST['cpObligatorio'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['cpObligatorio'])){ echo $aErrores['cpObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- CP Opcional -->
                                        <td class="d-flex justify-content-start">
                                            <label for="cpOpcional">CP Opcional:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="d-flex justify-content-start" type="text" name="cpOpcional" placeholder="49600" value="<?php echo (isset($_REQUEST['cpOpcional']) ? $_REQUEST['cpOpcional'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['cpOpcional'])){ echo $aErrores['cpOpcional'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Password Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="passwordObligatorio">Password Obligatorio:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="obligatorio d-flex justify-content-start" type="password" placeholder="paso" name="passwordObligatorio" value="<?php echo (isset($_REQUEST['passwordObligatorio']) ? $_REQUEST['passwordObligatorio'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['passwordObligatorio'])){ echo $aErrores['passwordObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Password Opcional -->
                                        <td class="d-flex justify-content-start">
                                            <label for="passwordOpcional">Password Opcional:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="d-flex justify-content-start" type="password" name="passwordOpcional" placeholder="paso" value="<?php echo (isset($_REQUEST['passwordOpcional']) ? $_REQUEST['passwordOpcional'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['passwordOpcional'])){ echo $aErrores['passwordOpcional'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Telefono Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="telefonoObligatorio">Telefono Obligatorio:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="obligatorio d-flex justify-content-start" type="tel" name="telefonoObligatorio" placeholder="666555444" value="<?php echo (isset($_REQUEST['telefonoObligatorio']) ? $_REQUEST['telefonoObligatorio'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['telefonoObligatorio'])){ echo $aErrores['telefonoObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Telefono Opcional -->
                                        <td class="d-flex justify-content-start">
                                            <label for="telefonoOpcional">Telefono Opcional:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="d-flex justify-content-start" type="tel" name="telefonoOpcional" placeholder="666555444" value="<?php echo (isset($_REQUEST['telefonoOpcional']) ? $_REQUEST['telefonoOpcional'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['telefonoOpcional'])){ echo $aErrores['telefonoOpcional'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Archivo Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="fileObligatorio">Archivo Obligatorio:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="obligatorio d-flex justify-content-start" type="file" name="fileObligatorio" value="<?php echo (isset($_REQUEST['fileObligatorio']) ? $_REQUEST['fileObligatorio'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['fileObligatorio'])){ echo $aErrores['fileObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Archivo Opcional -->
                                        <td class="d-flex justify-content-start">
                                            <label for="fileOpcional">Archivo Opcional:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="d-flex justify-content-start" type="file" name="fileOpcional" value="<?php echo (isset($_REQUEST['fileOpcional']) ? $_REQUEST['fileOpcional'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['fileOpcional'])){ echo $aErrores['fileOpcional'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Rango Opcional -->
                                        <td class="d-flex justify-content-start">
                                            <label for="rangeOpcional">Rango Opcional:</label>
                                        </td>
                                        <td>                                                                                                <!-- El value contiene una operador ternario en el que por medio de un metodo 'isset()'
                                                                                                                                            comprobamos que exista la variable y no sea 'null'. En el caso verdadero devovleremos el contenido del campo
                                                                                                                                            que contiene '$_REQUEST' , en caso falso sobrescribira el campo a '' .-->
                                            <input class="d-flex justify-content-start" type="range" min="1" max="100" name="rangeOpcional" value="<?php echo (isset($_REQUEST['rangeOpcional']) ? $_REQUEST['rangeOpcional'] : '');  ?>">
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['rangeOpcional'])){ echo $aErrores['rangeOpcional'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Lista Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="listaObligatorio">Lista Obligatorio:</label>
                                        </td>
                                        <td>                                                                                                
                                            <select class="obligatorio" name="listaObligatorio">
                                                <option value="listItem1" <?php if(isset($_REQUEST['listaObligatorio'])){ echo 'selected'; }?>>listItem1</option> <!-- Si el campo es correcto se queda seleccionado. -->
                                                <option value="listItem2" <?php if(isset($_REQUEST['listaObligatorio'])){ echo 'selected'; }?>>listItem2</option> <!-- Si el campo es correcto se queda seleccionado. -->
                                                <option value="listItem3" <?php if(isset($_REQUEST['listaObligatorio'])){ echo 'selected'; }?>>listItem3</option> <!-- Si el campo es correcto se queda seleccionado. -->
                                          </select> 
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['listaObligatorio'])){ echo $aErrores['listaObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- Radio Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="radioButtonObligatorio">RadioButton Obligatorio:</label>
                                        </td>
                                        <td class="obligatorio">                                                                                                
                                            <input type="radio" id="radioButtonItem1" name="radioButtonObligatorio" value="radioButtonItem1" <?php if(is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio']=='radioButtonItem1'){ echo 'checked';}?>> <!-- Si el campo es correcto se queda seleccionado. -->
                                            <label for="radioButtonObligatorio">radioButtonItem1</label>
                                            <input type="radio" id="radioButtonItem2" name="radioButtonObligatorio" value="radioButtonItem2" <?php if(is_null($aErrores['radioButtonObligatorio']) && isset($_REQUEST['radioButtonObligatorio']) && $_REQUEST['radioButtonObligatorio']=='radioButtonItem2'){ echo 'checked';}?>> <!-- Si el campo es correcto se queda seleccionado. -->
                                            <label for="radioButtonObligatorio">radioButtonItem2</label>
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['radioButtonObligatorio'])){ echo $aErrores['radioButtonObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- CheckBox Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="checkBoxObligatorio">CheckBox Obligatorio:</label>
                                        </td>
                                        <td class="obligatorio">                                                                                                
                                                <input type="checkbox" id="cbItem1" name="checkBoxObligatorio[cbItem1]" value="cbItem1" <?php if(isset($_REQUEST['checkBoxObligatorio']['cbItem1'])){echo 'checked';}?>> <!-- Si el campo es correcto se queda seleccionado. -->
                                                <label for="cbItem1">cbItem1</label>
                                                <input type="checkbox" id="cbItem2" name="checkBoxObligatorio[cbItem2]" value="cbItem2" <?php if(isset($_REQUEST['checkBoxObligatorio']['cbItem2'])){echo 'checked';}?>> <!-- Si el campo es correcto se queda seleccionado. -->
                                                <label for="cbItem2">cbItem2</label>
                                                <input type="checkbox" id="cbItem3" name="checkBoxObligatorio[cbItem3]" value="cbItem3" <?php if(isset($_REQUEST['checkBoxObligatorio']['cbItem3'])){echo 'checked';}?>> <!-- Si el campo es correcto se queda seleccionado. -->
                                                <label for="cbItem3">cbItem3</label> 
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['checkBoxObligatorio'])){ echo $aErrores['checkBoxObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- TextArea Obligatorio -->
                                        <td class="d-flex justify-content-start">
                                            <label for="textAreaObligatorio">TextArea Obligatorio:</label>
                                        </td>
                                        <td>                                                                                                    <!-- En el siguiente 'if' comprobamos que en el array '$aErrores' , guarde valor 'NULL' y que la variable ese declarada y sin 
                                                                                                                                                     ausencia de valor, si es así, devuelvo el contenido almacenado en '$_REQUEST['textAreaObligatorio']' -->                                                                            
                                            <textarea class="obligatorio d-flex justify-content-start" rows="4" cols="50" name="textAreaObligatorio" placeholder="cadena_de_letras_y_numeros"><?php if ($aErrores['textAreaObligatorio'] == null && isset($_REQUEST['textAreaObligatorio'])) {echo ($_REQUEST['textAreaObligatorio']);}?></textarea>
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['textAreaObligatorio'])){ echo $aErrores['textAreaObligatorio'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- TextArea Opcional -->
                                        <td class="d-flex justify-content-start">
                                            <label for="textAreaOpcional">TextArea Opcional:</label>
                                        </td>
                                        <td>                                                                                                    <!-- En el siguiente 'if' comprobamos que en el array '$aErrores' , guarde valor 'NULL' y que la variable ese declarada y sin 
                                                                                                                                                     ausencia de valor, si es así, devuelvo el contenido almacenado en '$_REQUEST['textAreaOpcional']' -->
                                            <textarea class="d-flex justify-content-start" rows="4" cols="50" name="textAreaOpcional" placeholder="cadena_de_letras_y_numeros"><?php if ($aErrores['textAreaOpcional'] == null && isset($_REQUEST['textAreaOpcional'])) {echo ($_REQUEST['textAreaOpcional']);} ?></textarea>
                                        </td>
                                        <td class="error">
                                            <?php if (!empty($aErrores['textAreaOpcional'])){ echo $aErrores['textAreaOpcional'];} ?> <!-- Aquí comprobamos que el campo del array '$aErrores' no esta vacío, si es así, mostramos el error. -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="reset" name="borrar">Borrar</button>
                            <button type="submit" name="enviar">Enviar</button>
                        </fieldset>
                    </form>
                    <?php 
                    }
                    ?>
        </main>
    </body>
</html>