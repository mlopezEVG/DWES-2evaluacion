<?php
class CJusticiasocial{
    private $obj_modelo;

    public $mensajeError;

    public function __construct(){
        require_once 'mJusticiasocial.php'; //Requerimos del modelo para instanciarlo
        try{ //Probamamos a instanciar el modelo en bloque try/catch por si da error de conexión
            $this->obj_modelo = new MJusticiasocial();
        } catch (Exception $errorExcepcion){ //Si da un error de conexión la excepción se captura en bloque catch
            $this->mensajeError = $errorExcepcion->getMessage(); //Almacenamos en el atributo el mensaje de la excepción
        }
    }

    public function ciniciosesion(){
        print_r($_POST);

        // Si se deja algún campo vacío...
        if (empty($_POST['user']) || empty($_POST['email']) || empty($_POST['password'])) {
            header("Location: iniciosesion.php?mensaje=Complete todos los campos"); // Redirige al formulario enviando mensaje de error personalizado
            exit();
        } else {
            try {
                $email = $_POST['email'];//almacenamos el email  
                //lo pasamos por parametro para poder comparar los datos almacenados en la bbdd y los introducidos en el formulario
                $resultado = $this->obj_modelo->miniciosesion($email);
                print_r($resultado);
    
                if (is_array($resultado)) {
                    // -------------------VALIDACIONES-------------------
                    // Si las contraseñas no coinciden...
                    if  ($_POST['user'] != $resultado['username']){
                        header("Location: iniciosesion.php?mensaje=El usuario no es correcto");
                        exit(); //Buena práctica: cortar flujo del programa.

                    // Luego verificar si la contraseña es correcta
                    } elseif  ($_POST['password'] != $resultado['password']){
                        header("Location: iniciosesion.php?mensaje=La contraseña no es correcta"); // Redirige al formulario enviando mensaje de error personalizado
                        exit(); //Buena práctica: cortar flujo del programa.

                    // Si el usuario y la contraseña son correctos
                    } else {
                        header("Location: iniciosesion.php?mensaje=INICIO de SESIÓN EXITOSO"); // Redirige al formulario enviando mensaje de error personalizado
                        exit(); //Buena práctica: cortar flujo del programa.
                    }
                }
            } catch (Exception $errorconsulta) { //Instanciamos la excepcion
                $this->mensajeError = $errorconsulta->getMessage(); //cogemos el mensaje y lo almacenamos
                $mensaje = $this->mensajeError;
                header("Location: iniciosesion.php?mensaje=$mensaje"); //pasamos por url el mensaje para mostrarlo en el formulario
                exit();
            }
        }
    }
}

?>