<?php
// Llama a la carpeta instalación SI existe.
if (is_dir('instalacion')) {
    header('Location: instalacion/procesar.php');
} else { //sino, envía al inicio de sesión.
    header('Location: justiciasocial/iniciosesion.php');
}
exit;
?>