<?php
//DAO: Data Access Object
require_once 'config/Conexion.php';
class ProductosDAO {
     private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }
 
    public function selectAll($parametro){
     
    }

    public function selectOne($id){
        try{
           $sql="select * from productos where prod_id=:id";
          $stmt = $this->con->prepare($sql);
          $stmt->bindParam(":id",$id, PDO::PARAM_INT);
         $stmt->execute();
       $res= $stmt->fetch(PDO::FETCH_ASSOC);
         return $res;
        }catch(PDOEXception $er){
            error_log("Error en selectOne de ProductosDAO ". $er->getMessage());
            return null;
        }
    }

    public function insert($producto){
        try{
           $sql="insert into productos (prod_nombre, prod_precio, prod_idCategoria, prod_estado,
           prod_usuarioActualizacion, prod_fechaActualizacion ) values (:nombre, :precio,:idCat, :estado,:usu,:fecha)";
          $stmt = $this->con->prepare($sql);
          $stmt->bindParam(":nombre",$producto->getNombre(), PDO::PARAM_STR);
          $stmt->bindParam(":precio",$producto->getPrecio(), PDO::PARAM_STR);
          $stmt->bindParam(":idCat",$producto->getIdCategoria(), PDO::PARAM_INT);
          $stmt->bindParam(":estado",$producto->getEstado(), PDO::PARAM_INT);
          $stmt->bindParam(":usu",$producto->getUsuario(), PDO::PARAM_STR);
          $stmt->bindParam(":fecha",$producto->getFechaActualizacion(), PDO::PARAM_STR);

         $res= $stmt->execute(); // execute retorna true si tuvo exito la ejecucion, false en caso contrario
         return $res;
        }catch(PDOEXception $er){
            error_log("Error en insert de ProductosDAO ". $er->getMessage());
            return false;
        }
    }

    public function update($producto){
        
    }

    public function delete($id){
        try{
           $sql="delete from productos where prod_id=:id";
          $stmt = $this->con->prepare($sql);
          $stmt->bindParam(":id",$id, PDO::PARAM_INT);

         $res= $stmt->execute(); // execute retorna true si tuvo exito la ejecucion, false en caso contrario
         return $res;
        }catch(PDOEXception $er){
            error_log("Error en delete de ProductosDAO ". $er->getMessage());
            return false;
        }
    }

    public function logicalDelete($id){
        try{
           $sql="update productos set prod_estado=0 where prod_id=:id";
          $stmt = $this->con->prepare($sql);
           $stmt->bindParam(":id",$id, PDO::PARAM_INT);

         $res= $stmt->execute(); // execute retorna true si tuvo exito la ejecucion, false en caso contrario
         return $res;
        }catch(PDOEXception $er){
            error_log("Error en logicalDelete de ProductosDAO ". $er->getMessage());
            return false;
        }
    }

  public function verProductosGeneral($producId) {
    try {
        // 1. Preparamos la consulta SQL
        // Usamos un marcador de posición (?) para mayor seguridad
        $sql = "SELECT * FROM productos WHERE id = ?";
        
        $stmt = $this->db->prepare($sql);
        
        // 2. Ejecutamos pasando el ID como un array
        $stmt->execute([$producId]);
        
        // 3. Retornamos el resultado (fetch devuelve una sola fila)
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        // Manejo de errores
        error_log("Error en verProductosGeneral: " . $e->getMessage());
        return null;
    }
}

}

?>
