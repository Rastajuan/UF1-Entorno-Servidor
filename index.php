<!DOCTYPE html>
<!-- REQUERIMOS LA CARGA DEL ARCHIVO DONDE TENEMOS CREADA LA CLASE PHP DE CREACION DE OBJETOS 'ACTIVIDAD' -->
<?php require "actividad.php"; ?>

<!-- SI SE HA ENVIADO EL FORMULARIO MEDIANTE EL BOTON "botonEnviar" SE CREARA UN OBJETO DE CLASE ACTIVIDAD ($actividad) MEDIANTE LA FUNCION CONSTRUCTORA CON LOS PARAMETROS ENVIADOS POR EL FORMULARIO
        PUEDE HACERSE DE DOS MANERAS, MEDIANTE EL METODO ISSET COMPROBANDO QUE E HA PULSADO EL BOTON O SI SE HA ENVIADO EL FORMULARIO MEDIANTE LE METODO POST. EN EL EJEMPLO SE USAN LAS DOS MANERAS CON UN OR(||) PERO CON UNA ES SUFICIENTE-->
<?php
if (isset($_POST["botonEnviar"])) {
    $actividad = new Actividad(
        $_POST["titulo"],
        $_POST["tipo"],
        $_POST["fecha"],
        $_POST["ciudad"],
        $_POST["precio"]
    );
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Actividades</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <header>
        <h1>FORMULARIO DE ACTIVIDADES</h1>
    </header>
    <div id="container">

        <div id="formulario">
            <!-- <?php include "formulario.html" ?> -->
            <form role="form" method="post" accept="index.php" class="form">
                <label for="titulo">T&iacute;tulo</label>
                <input type="text" name="titulo" id="tituloForm" placeholder="Título" /><br /><br />

                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fechaForm" /><br /><br />

                <label for="ciudad">Ciudad</label>
                <input type="text" name="ciudad" id="ciudadForm" placeholder="Ciudad" /><br /><br />

                <label for="tipo">Tipo</label>

                <select name="tipo" id="selectForm">
                    <option value="" selected>Seleccione el tipo de actividad</option>
                    <option value="musica">M&uacute;sica</option>
                    <option value="cine">Cine</option>
                    <option value="comida">Comida</option>
                    <option value="copas">Copas</option>
                    <option value="cultura">Cultura</option>
                    <option value="viajes">Viajes</option>
                </select><br /><br />

                <input type="radio" name="precio" value="gratis" id="gratuito" checked />
                <label for="gratuito">Gratis</label>
                <input type="radio" name="precio" value="De pago" id="dePago" />
                <label for="dePago">De pago</label><br /><br />

                <input class="boton" type="submit" value="Crear Actividad" name="botonEnviar" />
            </form>
        </div>
        <div id="containerActividad">
            <!-- MEDIANTE UN IF MOSTRAREMOS O NO EL CONTENEDOR DE LA ACTIVIDAD. SI SE HA CREADO EL OBJETO $actividad, SE MOSTRARÁ, SI NO NO APARECERÁ EN PANTALLA 
                LOS DOS PUNTOS (:) DESPUES DE LA CONDICION DEL IF INDICA QUE EL IF QUEDA ABIERTO Y QUE LO QUE ESTÁ DESPUÉS OCURRIRÁ SOLO SI SE CUMPLE LA CONDICION DEL IF-->
            <?php if (isset($actividad)) : ?>
                <!--HACEMOS DINAMICO EL VALOR DE CADA <li> ASIGNANDOLE EL VALOR DEL OBJETO $actividad CON CADA UNO DE SUS PARAMETROS QUE SON LOS QUE HA ENVIADO EL FORMULARIO-->
                <div id="actividad">
                    <img src="imgs/cine.jpg" style="width:100px;">
                    <ul>
                        <li><?php echo $actividad->titulo ?></li>
                        <li><?php echo $_POST["fecha"] ?></li>
                        <li><?php echo $_POST["ciudad"] ?></li>
                        <li><?php echo $_POST["tipo"] ?></li>
                        <li><?php echo $_POST["precio"] ?></li>

                    </ul>
                </div>
            <?php endif; ?>

        </div>

    </div>

    <footer id="footer">
        <p>Actividad perteneciente a la UF1 de Diseño Web en Entorno Servidor</p>

    </footer>

</body>

</html>