<?php
class MInstalacion{
    private $conexion;  //Atributo privado (almacena conexion de bbdd)

//------El constructor del  modelo genera la conexión a la bbdd
    public function __construct(){  
        require_once 'configdb/configdb.php'; //Requerimos de configdb.php las constantes de conexión.
        $this->conexion = new mysqli(HOST, USER, PW,BBDD);
        if ($this->conexion->connect_error){ //Si se produce un error de conexión (Será NULL si no hubo error  )...
            $desc_error = $this->conexion->connect_error;   //...almacenamos la descripción del error.
    //----> Lanzamos una excepción entre() con el MESSAGE de error que se produzca.
            throw new Exception('Ha ocurrido un error de conexión:'. $desc_error); 
        }
    }

//------Función que genera las tablas de la bbdd.
    public function generartablas(){
    //----En la tabla usuario, añadimos UNIQUE en email para evitar dos filas con mismo valor.
        $consulta = 'CREATE TABLE IF NOT EXISTS usuario (
            id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            email VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(50) NOT NULL 
        );

    CREATE TABLE NPC (
        idNPC TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
        nombreNPC VARCHAR(20) NOT NULL UNIQUE,
        sprite BLOB NOT NULL,
        PRIMARY KEY (idNPC)
        );

    CREATE TABLE Escenario (
        idEscenario TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
        nombreEscenario VARCHAR(30) NOT NULL,
        nombreImagen VARCHAR(20) NOT NULL,
        mensajeNarrativo VARCHAR(150) NOT NULL,
        PRIMARY KEY (idEscenario)
    );

    CREATE TABLE Respuestas (
        idRespuesta TINYINT UNSIGNED NOT NULL AUTO_INCREMENT,
        mensaje VARCHAR(30) NOT NULL,
        dinero VARCHAR(20) NOT NULL,
        tiempo VARCHAR(150) NOT NULL,
        idDialogo SMALLINT UNSIGNED NULL,
        idEscenario TINYINT UNSIGNED NULL,
        PRIMARY KEY (idRespuesta)
    );

    CREATE TABLE Dialogos (
        idDialogo SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
        nombreDiálogo VARCHAR(20) NOT NULL,
        mensaje VARCHAR(150) NOT NULL,
        casilla CHAR(2) NOT NULL,
        idNPC TINYINT UNSIGNED NOT NULL,
        idRespuesta1 TINYINT UNSIGNED NULL,
        idRespuesta2 TINYINT UNSIGNED NULL,
        idEscenario TINYINT UNSIGNED NOT NULL,
        PRIMARY KEY (idDialogo)
    );

    ALTER TABLE Respuestas 
    ADD CONSTRAINT fk_idDialogo FOREIGN KEY (idDialogo) REFERENCES Dialogos(idDialogo),
    ADD CONSTRAINT fk_idEscenarioRespuestas FOREIGN KEY (idEscenario) REFERENCES Escenario(idEscenario);

    ALTER TABLE Dialogos 
    ADD CONSTRAINT fk_idNPC FOREIGN KEY (idNPC) REFERENCES NPC(idNPC),
    ADD CONSTRAINT fk_idRespuesta1 FOREIGN KEY (idRespuesta1) REFERENCES Respuestas(idRespuesta),
    ADD CONSTRAINT fk_idRespuesta2 FOREIGN KEY (idRespuesta2) REFERENCES Respuestas(idRespuesta),
    ADD CONSTRAINT fk_idEscenarioDialogos FOREIGN KEY (idEscenario) REFERENCES Escenario(idEscenario);
    ';

/*-----Ejecutamos MULTI_QUERY- a diferencia de query(), multi_query() devuelve true si TODAS las consultas se ejecutan BIEN.
                NO se pueden verificar DIRECTAMENTE con "affected_rows"     */
        if (!$this->conexion->multi_query($consulta)) { //Si hay un error al ejecutar las inserciones (multi_query() devuelve false).
        //error es como connect_error, pero para errores en consultas,(DEVUELVE descripción del error de la última consulta que FALLÓ).
            $desc_error = $this->conexion->error; 
            //Se lanza una excepción que se recogerá en la página de error.
            throw new Exception('No se ha podido ejecutar la consulta: '.$desc_error);
        }

    }

    public function insertarAdmin($user, $email ,$password){
         // Construir la consulta SQL para insertar un nuevo usuario en la tabla 'usuario'
        $consulta = "INSERT INTO usuario (username, email, password) 
                    VALUES ('$user', '$email', '$password');";
       // Ejecutar la consulta SQL
       $this->conexion->query($consulta);

        // Verificar si la inserción fue exitosa
        if ($this->conexion->affected_rows == 0){
            // Si no se afectaron filas, obtener el mensaje de error           
            $desc_error = $this->conexion->error;
            // Lanzar una excepción con el mensaje de error
            throw new Exception('No se han podido guardar sus datos '.$desc_error);
        }
    }   
}


?>