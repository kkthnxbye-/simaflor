<?php
class Areasxitem{
   private $id;
   private $idItemPM;
   private $idAreaPMXBloquePM;
   private $idOperario;
   private $TipoOperario;
   private $Cantidad;
   
   public function getId(){
      return $this->id;
   }
   
   public function getItemPM(){
      return $this->idItemPM;
   }
   
   public function getIdAreaPMXBloquePM(){
      return $this->idAreaPMXBloquePM;
   }
   
   public function getIdOperario(){
      return $this->idOperario;
   }
   
   public function getTipoOperario(){
      return $this->TipoOperario;
   }
   
   public function getCantidad(){
      return $this->Cantidad;
   }
   
   
   public function setId($var){
       $this->id = $var;
   }
   
   public function setItemPM($var){
       $this->idItemPM = $var;
   }
   
   public function setIdAreaPMXBloquePM($var){
       $this->idAreaPMXBloquePM = $var;
   }
   
   public function setIdOperario($var){
       $this->idOperario = $var;
   }
   
   public function setTipoOperario($var){
       $this->TipoOperario = $var;
   }
   
   public function setCantidad($var){
       $this->Cantidad = $var;
   }
   
   
   
}
