<?php
//DAO: Data Access Object

require_once 'config/Conexion.php';

class UsuariosDAO {
     private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }
     public function selectAll() {
        // sql de la sentencia
        $sql = "select usu_id, usu_usuario, usu_nombre from usuario where usu_estado=1";
        //preparacion de la sentencia
        $stmt = $this->con->prepare($sql);
        //ejecucion de la sentencia
        $stmt->execute();
        //recuperacion de resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_OBJ);
        //retornara un arreglo de objetos
        // retorna cada fila como un objeto de una clase anonima
        // cuyos nombres de atributos son iguales a los nombres de las columnas retornadas
        // retorna datos para el controlador
        return $resultados;
    }
    
    public function selectAllxParam($parametro) {
         // sql de la sentencia
         $sql = "select usu_id, usu_usuario, usu_nombre from usuario where usu_estado=1 
         and usu_id=:idParam";
         //preparacion de la sentencia
         $stmt = $this->con->prepare($sql);
        $data = array("idParam"=>$parametro);
         //ejecucion de la sentencia
         $stmt->execute($data);
         //recuperacion de resultados
         $resultados = $stmt->fetch(PDO::FETCH_OBJ);
         //retornara un objeto
         // retorna cada fila como un objeto de una clase anonima
         // cuyos nombres de atributos son iguales a los nombres de las columnas retornadas
         // retorna datos para el controlador
         return $resultados;

    }

    public function insert($cat){


    }
    public function update($cat){


    }

    public function delete($cat){


    }


}
