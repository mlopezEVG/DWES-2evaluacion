<?php
// Función para eliminar un directorio y todo su contenido
function deleteDirectory($dir) {
    // Verificar si el directorio no existe
    if (!file_exists($dir)) {
        return true;// Si no existe, consideramos que ya está eliminado
    }

    // Verificar si no es un directorio
    if (!is_dir($dir)) {
        return unlink($dir); // Si no es un directorio, intentamos eliminarlo como archivo
    }

    // Escanear el contenido del directorio
    foreach (scandir($dir) as $item) {
        // Omitir los elementos '.' y '..'
        if ($item == '.' || $item == '..') {
            continue;
        }

        // Eliminar recursivamente el contenido del directorio
        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;// Si falla la eliminación de algún elemento, retornar false
        }
    }

    // Eliminar el directorio vacío
    return rmdir($dir);
}
// Definir la ruta del directorio a eliminar
$dir = __DIR__ . '/instalacion';
// echo $dir; // Imprimir la ruta del directorio para depuración

// Intentar eliminar el directorio
if (deleteDirectory($dir)) {
    // Si se elimina correctamente, redirigir a la página de inicio de sesión
    header("Location: justiciasocial/iniciosesion.php");
    exit(); // Asegurarse de que el script se detenga después de la redirección
} else {
     // Si no se puede eliminar el directorio, mostrar un mensaje de error
    echo "No se pudo eliminar la carpeta 'instalacion'.";
}


?>