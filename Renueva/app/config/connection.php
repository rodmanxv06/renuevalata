<?php
/*Se crea una clase para la conexion a la base de datos
class Connection
{
       //Se crean las variables a utilizar
    public $host = 'localhost';
    public $dbname = 'renueva';
    public $username = 'postgres';
    public $password = 'alvaradolira';

    //crear una funcion
    public static function getConnection()
    {
         //se crea el try-catch para verificar si se realizó la conexión a la base.
        try {
            //hacemos una instancia de la clase "conexion"
            $connection = new Connection();
            $pdo = new PDO("pgsql:host=$connection->host; dbname=$connection->dbname", $connection->username, $connection->password);
            echo "connection success"; 
        } catch (PDOException $exp) {
            echo "Error: ", $exp;
        }
    }
}

//influenciar la clase, se manda a llamar a la función creada
Connection::getConnection();*/


class conexion {
    public $host = 'localhost';
    public $conection;
    public $username = 'postgres';
    public $password = 'alvaradolira';

    public function __construct() {
        try {
            $this->conection = new PDO("pgsql:host=$this->host; dbname = renueva", $this->username, $this->password);
            $this->conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<h1>SI FUNCIONA LA CONEXION</h1>";
        } catch (PDOException $exp) {
            echo "Error: ", $exp;
        }
    }


    public function ejecutar($sql) { //insert / delete / update
        $this->conection->exec($sql);
        return $this->conection->lastInsertId();
    }

    public function consultar($sql) {
        $sentencia = $this->conection->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }
}

$miConexion = new conexion();
?>