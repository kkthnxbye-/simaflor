<?php
class DocumentoInventarioPM{
   private $id;
   private $idfinca;
   private $idtipomovimientoinventariopm;
   private $consecutivo;
   private $fecha;
   
   function __construct() {
        $this->id = 0;
        $this->idfinca = 0;
        $this->idtipomovimientoinventariopm = 0;
        $this->consecutivo = 0;
        $this->fecha = NULL;
    }
    
    public function getId(){
       return $this->id;
    }
    
    public function getIdFinca(){
       return $this->idfinca;
    }
    
    public function getIdTipoMovimientoInventarioPM(){
       return $this->idtipomovimientoinventariopm;
    }
    
    public function getConsecutivo(){
       return $this->consecutivo;
    }
    
    public function getFecha(){
       return $this->fecha;
    }
    
    //////////////////////////////////////////////////////////////////
    
    public function setId($id){
       $this->id = $id;
    }
    
    public function setIdFinca($idFinca){
       $this->idfinca = $idFinca;
    }
    
    public function setIdTipoMovimientoInventarioPM($idTipoMovimientoInventarioPM){
       $this->idtipomovimientoinventariopm = $idTipoMovimientoInventarioPM;
    }
    
    public function setConsecutivo($consecutivo){
       $this->consecutivo = $consecutivo;
    }
    
    public function setFecha($fecha){
       $this->fecha = $fecha;
    }
   
}