<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="view/cambiar_pw.php">Cambiar Contraseña</a></li>
                <li><a href="mostrar_formmod.php">Modificar Datos</a></li>
                <li><a href="cerrarsesion.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="modificardatos.php" method="post" accept-charset="utf-8">
            <img src="assets/img/contrasenia.png">
            <h1>Modificar Datos</h1>
            <h3>Introduce tus nuevos datos:</h3>

            <label for="nombre">Nombre de Usuario:</label>            
            <input type="text" name="nombre" placeholder="Nombre de Usuario" value="<?php echo $datos['nombre']; ?>">

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" placeholder="Telefono" value="<?php echo $datos['telefono']; ?>" >

            <?php
            if(isset($_GET['mensaje'])){
                echo '<p style="color: red;">'.($_GET['mensaje']).'</p>';
            }
            ?>
            <input type="submit" value="Modificar Datos">
        </form>
    </main>
</body>
</html>