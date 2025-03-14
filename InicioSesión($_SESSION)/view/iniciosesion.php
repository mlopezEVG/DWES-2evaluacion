<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>
<body>
    <!-- <header>
        <nav>
            <ul>
                <li><a href="cambiar_pw.php">Cambiar Contraseña</a></li>
                <li><a href="mod_datos.php">Modificar Datos</a></li>
                <li><a href="cerrar_sesion">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header> -->
    <main id="main100">
        <form action="mostrar_sesioniniciada.php" method="post" accept-charset="utf-8">
            <img src="./assets/img/profile-blue.png">
            <h1>Inicio de Sesión</h1>
            <h3>Introduce tus datos:</h3>

            <label for="nombre">Nombre de Usuario:</label>
            <input type="email" name="nombre" placeholder="Nombre de Usuario">

            <label for="password">Introduce la Contraseña:</label>
            <input type="password" name="password" id="password" placeholder="Contraseña">

            <?php
            if(isset($_GET['mensaje'])){
                echo '<p style="color: red;">'.$_GET['mensaje'].'</p>';
            }
            ?>
            <input type="submit" value="Iniciar Sesión">
        </form>
    </main>
</body>
</html>