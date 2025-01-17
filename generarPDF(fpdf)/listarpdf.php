<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<?php 
require_once 'cCustomer.php';

$obj_cCustomer = new CCustomer; //Instanciamos el objeto del controlador
$datos = $obj_cCustomer->listar(); //Llamamos al método del controlador

//El método listar del controlador devuelve un array si la consulta del modelo ha conseguido enviar algo
//Si no, devuelve una cadena de texto
if(!is_array($datos)){  //Comprobamos que lo que devuelva no sea  un array para controlar el error.
    echo '<div id=container><h1 style="color: red;">No se han podido recopilar datos de la base de datos</h1></div>';
    exit;   //exit -> Interrumpe la lectura del programa
}

echo '<table border = "3" >
            <thead>
                <tr>
                    <th>cust_id</th>
                    <th>fed_id</th>
                    <th>cust_type_cd</th>
                    <th>address</th>
                    <th>city</th>
                    <th>state</th>
                    <th>postal_code</th>
                </tr>
            </thead>
            <tbody>';
            for ($i = 0; $i < count($datos); $i++){ //Recorre la longitud del array
            //Creamos celdas a partir de los valores.
                echo '<tr>
                <td>'.$datos[$i]['cust_id'].'</td>
                <td>'.$datos[$i]['fed_id'].'</td>
                <td>'.$datos[$i]['cust_type_cd'].'</td>
                <td>'.$datos[$i]['address'].'</td>          
                <td>'.$datos[$i]['city'].'</td>
                <td>'.$datos[$i]['state'].'</td>
                <td>'.$datos[$i]['postal_code'].'</td>
                </tr>';
            }
echo    '</tbody>
    </table>';
?>
    <a href = "pdf.php">Generar PDF</a> <!--El botón envía a una página que genera un pdf de la tabla.-->
</body>
</html>
