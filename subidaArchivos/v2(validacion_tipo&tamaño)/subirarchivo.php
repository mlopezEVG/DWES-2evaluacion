<?php
// Mostrar información sobre $_FILES
echo '<h2>Información de $_FILES</h2>';
print_r($_FILES);

// Comprobar el tamaño del archivo -> Accediendo a la posición 'size' del array que guarda la información sobre el archivo
$tamanio_archivo = $_FILES['archivo']['size'];
if ($tamanio_archivo > 0) {
    echo '<h2>Tamaño del archivo</h2>';
    echo 'El tamaño del archivo subido es: ' . $tamanio_archivo;
}

echo '<h2>Tipo de Archivo</h2>';

// Obtener el tipo de archivo subido
$tipo_archivosubido = $_FILES['archivo']['type'];

// Definir los tipos de archivos válidos
$tipos = ['image/jpg', 'image/jpeg', 'image/png', 'image/webp'];

echo 'Tipos de archivos válidos: ';
print_r($tipos);
echo '<br/>';

// Comprobar si el tipo de archivo subido es válido
for ($i = 0; $i < count($tipos); $i++) {
    if ($tipo_archivosubido == $tipos[$i]) {
        $types = $tipos[$i];
        echo 'El tipo de archivo es válido ya que es: ' . $types;
    }
}
?>