<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesión</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>
<body>

    <main>
        <form action="procesar.php" method="POST" accept-charset="utf-8">
            <img src="../assets/img/profile-blue.png">
            <h1>Iniciar Sesión</h1>    
            <h3>bind_result</h3>   

            <label for="usuario">Introduce el nombre de usuario:</label>
            <input type="text" placeholder="Usuario" name="usuario">

            <label for="password">Introduce la contraseña:</label>
            <input type="password" placeholder="Contraseña" id="password" name="password">

            <?php
                if(isset($_GET['mensaje'])){
                    echo "<p id='mensaje'>".$_GET['mensaje']."</p>";
                }
            ?>
            <input type="submit" name="formulario" value="Iniciar Sesión">
        </form>
    </main>
</body>
</html>