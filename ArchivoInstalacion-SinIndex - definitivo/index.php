<?php
// Llama a la carpeta instalación.
if (is_dir('instalacion')) {
    header('Location: instalacion/procesar.php');
} else {
    header('Location: justiciasocial/iniciosesion.php');
}
exit;
?>