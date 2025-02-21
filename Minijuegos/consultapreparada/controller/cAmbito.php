<?php

class CAmbito{

    private $objetoAmbito;  //Objeto privado del modelo

    public function __construct(){
        require_once 'model/mAmbito.php'; //Ruta modelo
        $this->objetoAmbito = new MAmbito(); //Instancia del modelo
    }

    public function insertarambitos(){
    //--Si existe $_POST es decir, se envía el formulario por primera vez.
        if($_POST){
            $nombresambitos = $_POST['nombre']; 
        }
    //--Si existe $_GET es decir, se envía después de mostrar un error
        if($_GET){
            //Recogemos el número de formularios que haya que generar para que al redirigir no de un error de variable indefinida
            $numero = $_GET['numero'];   
        }

    //---1º VALIDACIÓN --> Comprobar que se ha dejado algún campo VACÍO
        for($i=0; $i < count($nombresambitos);$i++){    //Recorremos el array buscando un elemento vacío
            if (empty($nombresambitos[$i])){    //En cuanto encuentre uno vacío redirige al formulario mostrando un mensaje y enviando el número para que se generen los inputs.
                header('Location:insertarambitos.php?numero='.$numero.'&mensaje=Debes rellenar todos los campos');
                exit();
            }
        }

    //----------Llamamos al método del modelo que inserta los ámbitos.---------
        $resultado = $this->objetoAmbito->insertarambitos($nombresambitos);

        //Pueden darse 2 casos que $resultado sea un array con los datos duplicados (Ha ocurrido error) o que sea un '1' (Datos insertados correctamente)
        if (is_array($resultado)){

            //----Eliminar el último elemento del array para concatenar los demás con comas ',' y el último elemento una 'y'.
                if(count($resultado) > 1){
                    $ultimoelemento = array_pop($resultado);
                    $datosduplicados = implode(", ", $resultado).' y '.$ultimoelemento;
                    $mensaje = $datosduplicados.' ya existen';
                    header('Location:insertarambitos.php?numero='.$numero.'&mensaje='.$mensaje);

            //Si solo hay un elemento repetido mensaje en singular y sin concatenación
                }else{
                    $datosduplicados = implode(", ", $resultado);
                    $mensaje = $datosduplicados.' ya existe';
                    header('Location:insertarambitos.php?numero='.$numero.'&mensaje='.$mensaje);
                }
        //Si se ha devuelto un 1 mostramos mensaje de éxito 
        }else{
            header('Location:insertarambitos.php?numero='.$numero.'&mensaje=Datos insertados correctamente');
        }
    }
}

?>