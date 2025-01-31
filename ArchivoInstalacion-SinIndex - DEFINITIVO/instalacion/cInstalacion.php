<?php
class CInstalacion {
    private $obj_modelo;

    public $mensajeError; //Atributo que almacena algún error que pueda darse.

    public function __construct(){
        require_once 'mInstalacion.php'; //Requerimos del modelo para instanciarlo
        try{ //Probamamos a instanciar el modelo en bloque try/catch por si da error de conexión
            $this->obj_modelo = new MInstalacion();
        } catch (Exception $errorExcepcion){ //Si da un error de conexión la excepción se captura en bloque catch
            $this->mensajeError = $errorExcepcion->getMessage(); //Almacenamos en el atributo el mensaje de la excepción
        }
    }

    public function generartablas(){
    
        try{ //Probamos a llamar el método que genera las tablas en try, por si ocurre algún error.
            $this->obj_modelo->generartablas();
            // Si no hay errores, redirigimos al formulario de creación de usuario
            header("Location:crear_user.php");

        }catch(Exception $errorconsulta){ //Si da fallo la excepción la captura catch y se almacena para mostrarse.
            $this->mensajeError = $errorconsulta->getMessage(); //Almacenamos en el atributo el mensaje de la excepción
        }
    }

    public function insertarAdmin(){
    //-------------------VALIDACIONES-------------------

        //Si se deja algún campo vacío...
        if(empty($_POST['user']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['repetir_password'])){
            header("Location:crear_user.php?mensaje=Complete todos los campos"); //Redirige al formulario enviando mensaje de error personalizado

        //Si las contraseñas no coinciden...
        }elseif ($_POST['password'] != $_POST['repetir_password']){
            header("Location:crear_user.php?mensaje=Las contraseñas no coinciden"); //Redirige al formulario enviando mensaje de error personalizado

        //Comprobamos también que la contraseña tenga más de 10 caracteres...
        }elseif (strlen($_POST['password']) < 10 ){     
            header("Location:crear_user.php?mensaje=La contraseña debe tener más de 10 caracteres");

        }else{
            $user= $_POST['user'];
            $email= $_POST['email'];
            $password= $_POST['password'];

        //Llamamos al método insertaradmin, para pasar datos del formulario.
        try{
            $this->obj_modelo->insertarAdmin($user, $email, $password);
            header("Location:instalacioncompletada.html");

        }catch(Exception $errorconsulta){
            $this->mensajeError = $errorconsulta->getMessage();
            $mensaje= $this->mensajeError;
            header("Location:crear_user.php?mensaje=$mensaje");
        }
        }

    }
}

?>