<?php

class remisionesxpedidos{
    
    private $id;
    private $id_pedido;
    private $id_usuario;
    private $fecha;
    private $codigo;
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getId_pedido(){
        return $this->id_pedido;
    }
    
    public function setId_pedido($id_pedido){
        $this->id_pedido = $id_pedido;
    }
    
    /////////////////////////////////////////////////////////////
    public function getId_usuario(){
        return $this->id_usuario;
    }
    
    public function setId_usuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }
    
    /////////////////////////////////////////////////////////////

    public function getFecha(){
        return $this->fecha;
    }
    
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    
    
    public function getCodigo(){
        return $this->codigo;
    }
    
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
}

?>

