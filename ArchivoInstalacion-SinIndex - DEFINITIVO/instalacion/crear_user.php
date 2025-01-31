<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear user</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script>
    //Cuando se clique en el checkbox, (mostrar contraseña) se ejecutará la función mostrarContrasena
        function mostrarContrasena(){
            //Obtenemos los valores de los campos password y repetir_password
            let valuepassword = document.getElementById('password'); 
            let valuerepetirpw = document.getElementById('repetir_password');

            if (valuepassword.type === "password"){ //1. CONDICIÓN: el valor de 'password' es de tipo 'password'
                //----------Modifica el valor al tipo contrario a ambos campos
                valuepassword.type = "text";
                valuerepetirpw.type = "text";
            }else{                                  //2. CONDICIÓN: el valor de 'password' es de tipo 'text'
                //----------Modifica el valor al tipo contrario a ambos campos
                valuepassword.type = "password";
                valuerepetirpw.type = "password";
            }
        }
    </script>
</head>
<body>
    <form action="procesar.php" method="POST">  <!--Los datos del formulario se envían como array asociativo con "name"-->
        <h2>Proceso de Instalación</h2>
        <h3>Crear Administrador</h3>

        <!-- Etiqueta para el campo de nombre de usuario -->
        <label for="usuario" class="campos">Usuario:</label></br>
        <input type="text" placeholder="User" id="usuario" name="user"></br></br>

        <!-- Etiqueta para el campo de email -->
        <label for="email" class="campos">Email:</label></body><br/>
        <input type="email" placeholder="Email" id="email" name="email"></br></br>

        <!-- Etiqueta para el campo de contraseña -->
        <label for="password" class="campos">Contraseña:</label></br>
        <input type="password" placeholder="Password" id="password" name="password"></br></br>

        <!-- Etiqueta para el campo de repetir contraseña -->
        <label for="repetir_password"class="campos">Repetir contraseña:</label></br>
        <input type="password" placeholder="Password" id="repetir_password" name="repetir_password" ></br></br>

        <!-- Checkbox para mostrar/ocultar la contraseña -->
        <input type="checkbox" id="mostrar_contrasena" onclick="mostrarContrasena()">
        <label for="mostrar_contrasena" id="mostrarcontrasena">Mostrar contraseña</label></br>

        <?php
        if(isset($_GET['mensaje'])){
            $mensaje = $_GET['mensaje'];
            echo '<p id="error-message">'.$mensaje.'</p>';
        }
        ?>

        <input type="submit" value="Crear Usuario">
    </form>
</body>
</html>