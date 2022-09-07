<?php

define("USER",'root');
define("PASSWORD",'root');
define("DB",'kalstein');
define("HOST","localhost");
define("PORT",3306);

class Db
{
    protected $user;
    protected $password;
    protected $db;
    protected $host;
    protected $port;
    protected $stringConexion;
    protected $conexion;

    public function __construct()
    {
        $this->user = USER;
        $this->password = PASSWORD;
        $this->db = DB;
        $this->host = HOST;
        $this->port = PORT;
        $this->stringConexion = "mysql:host=$this->host;dbname=$this->db";

        
        $this->conexion = $this->conectar();
    }

    public function conectar(){

        try {
            $conexion = new PDO($this->stringConexion,$this->user,$this->password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");
            return $conexion;
        } catch (PDOException $e) {
            echo "La conexión ha fallado: " . $e->getMessage();
        }
    }

    public function desconectar(){
        $this->conexion = null;
    }
}

class Model extends Db{
    private $table;

    public function __construct($table){
        $this->table = $table;
        parent::__construct();
    }

    public function getAll(){
        $elements = [];
        $sentencia = "SELECT * FROM " . $this->table;
        try {
            $respuesta = $this->conexion->prepare($sentencia);
            $respuesta->execute();
            $resultset = $respuesta->fetchALL(PDO::FETCH_ASSOC);

            $this->desconectar();
            return $resultset;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getWhere($column,$data){
        $elements = [];
        $sentencia = "SELECT * FROM $this->table WHERE $column = :d";
        try {
            $respuesta = $this->conexion->prepare($sentencia);
            $respuesta->bindParam(':d',$data);
            $respuesta->execute();

            foreach ($respuesta as $res) {
                $elements[] = $res;
            }
            $this->desconectar();
            return $elements;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert($data){
        extract($data);
        $sentencia = "INSERT INTO $this->table (model,imagen,descripcion,cantidad,unidad,valor_unitario) VALUES (?,?,?,?,?,?)";
        try {
            $respuesta = $this->conexion->prepare($sentencia);
            $i = 0;
            while($i < count($data)){
                $respuesta->bindParam($i+1,$data);
            }
            $respuesta->execute();

            $this->desconectar();
            $message = ['message' => "El registro se ha guardado exitosamente en la base de datos"];
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
}