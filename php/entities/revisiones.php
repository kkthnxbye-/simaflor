<?php

class Revisiones{
    
    private $id;
    private $id_pedido_pm;
    private $id_tipo_unidad;
    private $cantidad;
    private $esta_bueno;
    private $desechado;
    private $id_causa_nacional;
    private $id_operario;
    private $id_usuario;
    private $habilitado;
    
    function __construct() {
        $this->id = 0;
        $this->id_pedido_pm = 0;
        $this->id_tipo_unidad = 0;
        $this->cantidad = 0;
        $this->esta_bueno = 0;
        $this->desechado = 0;
        $this->id_causa_nacional = 0;
        $this->id_operario = 0;
        $this->id_usuario = 0;
        $this->habilitado = 0;
    }
    
    
    public function getHabilitado(){
        return $this->habilitado;
    }
    
    public function setHabilitado($habilitado){
        $this->habilitado = $habilitado;
    }
    
    public function getIdUsuario(){
        return $this->id_usuario;
    }
    
    public function setIdUsuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }
    
    public function getIdOperario(){
        return $this->id_operario;
    }
    
    public function setIdOperario($id_operario){
        $this->id_operario = $id_operario;
    }
    
    public function getIdCausaNacional(){
        return $this->id_causa_nacional;
    }
    
    public function setIdCausaNacional($id_causa_nacional){
        $this->id_causa_nacional = $id_causa_nacional;
    }
    
    public function getDesechado(){
        return $this->desechado;
    }
    
    public function setDesechado($desechado){
        $this->desechado = $desechado;
    }
    
    public function getEstaBueno(){
        return $this->esta_bueno;
    }
    
    public function setEstaBueno($esta_bueno){
        $this->esta_bueno = $esta_bueno;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function getIdPedidoPm(){
        return $this->id_pedido_pm;
    }
    
    public function setIdPedidoPm($id_pedido_pm){
        $this->id_pedido_pm = $id_pedido_pm;
    }
    
    public function getIdTipoUnidad(){
        return $this->id_tipo_unidad;
    }
    
    public function setIdTipoUnidad($id_tipo_unidad){
        $this->id_tipo_unidad = $id_tipo_unidad;
    }

    public function getCantidad(){
        return $this->cantidad;
    }
    
    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }
    
    
    
}



