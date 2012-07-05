<?php

class documentosxpedidos{
    
    private $id_documentoxpedido;
    private $id_documento;
    private $id_pedido;
    private $id_usuario;
    private $documento;
    private $fecha;
    
    public function getId_documentoxpedido(){
        return $this->id_documentoxpedido;
    }
    
    public function setId_documentoxpedido($id_documentoxpedido){
        $this->id_documentoxpedido = $id_documentoxpedido;
    }
    
    /////////////////////////////////////////////////////////////
    public function getId_documento(){
        return $this->id_documento;
    }
    
    public function setId_documento($id_documento){
        $this->id_documento = $id_documento;
    }
    
    public function getFecha(){
        return $this->fecha;
    }
    
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    
    /////////////////////////////////////////////////////////////
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
    public function getDocumento(){
        return $this->documento;
    }
    
    public function setDocumento($documento){
        $this->documento = $documento;
    }
    
}

?>
