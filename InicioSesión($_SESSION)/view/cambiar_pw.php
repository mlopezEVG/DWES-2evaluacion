<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="cambiar_pw.php">Cambiar Contraseña</a></li>
                <li><a href="../mostrar_formmod.php">Modificar Datos</a></li>
                <li><a href="../cerrarsesion.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="../cambiar_contrasena.php" method="post" accept-charset="utf-8">
            <img src="../assets/img/contrasenia.png">
            <h1>Cambiar Contraseña</h1>

            <label for="contraseña_antigua">Introduce la contraseña anterior:</label>
            <input type="password" name="contrasena_antigua" placeholder="Antigua contraseña">

            <label for="password">Introduce la nueva contraseña:</label>
            <input type="password" name="password" id="password" placeholder="Nueva contraseña">

            <label for="repetir_password">Introduce de nuevo la contraseña:</label>
            <input type="password" name="repetir_password" id="password" placeholder="Repetir nueva contraseña">

            <input type="submit" name="cambiar_contraseña" value="Cambiar Contraseña">
        </form>
    </main>
</body>
</html>