<?php require_once 'model/dto/Producto.php';
require_once 'model/dao/ProductosDAO.php';
require_once 'model/dao/CategoriasDAO.php';
require_once 'utils/functions.php';
class ProductosController
{  
    private $model;
    public function __construct(){
        $this->model = new ProductosDAO();  }
    //index: muestra todos los productos
    public function index(){
    }
    //search: busca productos
    public function search(){
    }

    //search: busca productos utilizando comunicacion asincrona 
    public function searchAsync(){
        
    }


    //delete: elimina un producto
    public function delete(){
    }
   
    // muestra la vista para crear un nuevo producto
    public function view_new(){
       
    
    }
    
   
    // muestra l vista para editar un  producto
    public function view_edit(){
    }

    // guarda producto, ya sea nuevo o en edicion
    public function save(){

    }

   public function populate()
   {
        $prod = new Producto();
        $errores = [];

        // ID (opcional)
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $prod->setId($id ?: null);

        // Nombre (obligatorio)
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!$nombre) {
            $errores[] = "Nombre obligatorio";
        } else {
            $prod->setNombre($nombre);
        }

        // Precio
        $precio = filter_input(INPUT_POST, 'precio', FILTER_VALIDATE_FLOAT);
        if ($precio === false) {
            $errores[] = "Precio inválido";
        } else {
            $prod->setPrecio($precio);
        }

        // Categoría
        $categoria = filter_input(INPUT_POST, 'categoria', FILTER_VALIDATE_INT);
        if ($categoria === false) {
            $errores[] = "Categoría inválida";
        } else {
            $prod->setIdCategoria($categoria);
        }

        // Estado (checkbox)
        $estado = filter_input(INPUT_POST, 'estado', FILTER_VALIDATE_BOOLEAN);
        $prod->setEstado($estado ? 1 : 0);

        $prod->setUsuario("pepe");  //$_SESSION['user']
        $prod->setFechaActualizacion(date('Y-m-d H:i:s'));

        if (!empty($errores)) {
            throw new Exception(implode(' | ', $errores));
        }

        return $prod;
    }


}
?>