<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesión</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script>
    //Cuando se clique en el checkbox, (mostrar contraseña) se ejecutará la función mostrarContrasena
        function mostrarContrasena(){
            //Obtenemos los valores de los campos password y repetir_password
            let valuepassword = document.getElementById('password'); 

            if (valuepassword.type === "password"){ //1. CONDICIÓN: el valor de 'password' es de tipo 'password'
                //----------Modifica el valor al tipo contrario a ambos campos
                valuepassword.type = "text"; 
            }else{                                  //2. CONDICIÓN: el valor de 'password' es de tipo 'text'
                //----------Modifica el valor al tipo contrario a ambos campos
                valuepassword.type = "password";
            }
        }
    </script>
</head>
<body>
    <form action="procesar.php" method="POST">  <!--Los datos del formulario se envían como array asociativo con "name"-->
        <h2>Inicio de Sesión</h2>

        <!-- Campo para el nombre de usuario -->
        <label for="usuario" class="campos">Usuario:</label></br>
        <input type="text" placeholder="User" id="usuario" name="user"></br></br>

        <!-- Campo para el email -->
        <label for="email" class="campos">Email:</label></body><br/>
        <input type="email" placeholder="Email" id="email" name="email"></br></br>

        <!-- Campo para la contraseña -->
        <label for="password" class="campos">Contraseña:</label></br>
        <input type="password" placeholder="Password" id="password" name="password"></br></br>
   
        <!-- Checkbox para mostrar/ocultar la contraseña -->
        <input type="checkbox" id="mostrar_contrasena" onclick="mostrarContrasena()">
        <label for="mostrar_contrasena" id="mostrarcontrasena">Mostrar contraseña</label></br>
        
            <!-- Mostrar mensaje de error si existe -->
        <?php
        if(isset($_GET['mensaje'])){
            $mensaje = $_GET['mensaje'];
            echo '<p id="error-message">'.$mensaje.'</p>';
        }
        ?>

        <!-- Botón de envío del formulario -->
        <input type="submit" value="Ir a la App">


    </form>
</body>
</html>