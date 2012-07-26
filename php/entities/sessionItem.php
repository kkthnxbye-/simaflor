<?php
class SessionItem{
   private $idareaxbloque;
   private $cantidad;
   private $id_operario;
   private $tipo;
   
   public function getIdareaxbloque(){
      return $this->idareaxbloque;
   }
   
   public function getCantidad(){
      return $this->cantidad;
   }
   
   public function getid_operario(){
      return $this->id_operario;
   }
   
   public function getTipo(){
      return $this->tipo;
   }
   
   
   public function setIdareaxbloque($idareaxbloque){
      $this->idareaxbloque = $idareaxbloque;
   }
   
   public function setCantidad($cantidad){
      $this->cantidad = $cantidad;
   }
   
   public function setid_operario($id_operario){
      $this->id_operario = $id_operario;
   }
   
   public function setTipo($tipo){
      $this->tipo = $tipo;
   }
   
   
}