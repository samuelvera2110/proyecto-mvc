<?php
//DTO de usuario
class Usuario{
    private $id, $usuario, $clave, $nombre, $estado;
    
    function __construct(){
        //constructor en php
    }
    function getId(){
        return $this->id;
    }
    function getUsuario(){
        return $this->usuario;
    }
    function getClave(){
        return $this->clave;
    }
    function getNombre(){
        return $this->nombre;
    }
    function getEstado(){
        return $this->estado;
    }
    function setId($id){
        $this->id=$id;
    }
    function setUsuario($usu){
        $this->usuario=$usu;
    } 
    function setClave($cla){
        $this->clave=$cla;
    }
    function setNombre($nom){
        $this->nombre=$nom;
    }
    function setEstado($est){
        $this->estado=$est;
    }

 // Methods get y set parametrizados
 public function __set($nombre, $valor) {
    // Verifica que la propiedad exista
    if (property_exists('Usuario', $nombre)) {
        $this->$nombre = $valor;
    } else {
        echo $nombre . " No existe.";
    }
}

public function __get($nombre) {
    // Verifica que exista la propiedad
    if (property_exists('Usuario', $nombre)) {
        return $this->$nombre;
    }
// Retorna null si no existe
    return NULL;
}


}
