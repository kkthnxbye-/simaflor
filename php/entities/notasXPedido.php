<?php

class NotasXPedido{
    
    private $id;
    private $idPedidoPm;
    private $idVariedad;
    private $idUsuario;
    private $fechaRegistro;
    private $nota;
    
    function __construct() {
        $this->id = 0;
        $this->idPedidoPm = 0;
        $this->idVariedad = 0;
        $this->idUsuario = 0;
        $this->fechaRegistro = 'null';
        $this->nota = 'null';
    }
    
    public function getNota(){
        return $this->nota;
    }
    
    public function setNota($nota){
        $this->nota = $nota;
    }
    
    public function getFechaRegistro(){
        return $this->fechaRegistro;
    }
    
    public function setFechaRegistro($fechaRegistro){
        $this->fechaRegistro = $fechaRegistro;
    }
    
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    
    public function getIdVariedad(){
        return $this->idVariedad;
    }
    
    public function setIdVariedad($idVariedad){
        $this->idVariedad = $idVariedad;
    }
    
    public function getIdPedidoPm(){
        return $this->idPedidoPm;
    }
    
    public function setIdPedidoPm($idPedidoPm){
        $this->idPedidoPm = $idPedidoPm;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    
    
}



