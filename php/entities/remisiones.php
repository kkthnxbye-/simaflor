<?php
class remisiones{
   
   private $id;
   private $IDPedidoPM;
   private $IDUsuario;
   private $NoRemision;
   private $FechaRegistro;
   private $fechaRemision;
   
   public function getId(){
      return $this->id;
   }
   
   public function setId($id){
      $this->id = $id;
   }
   
   public function getIDPedidoPM(){
      return $this->IDPedidoPM;
   }
   
   public function setIDPedidoPM($IDPedidoPM){
      $this->IDPedidoPM = $IDPedidoPM;
   }
   
   public function getIDUsuario(){
      return $this->IDUsuario;
   }
   
   public function setIDUsuario($IDUsuario){
      $this->IDUsuario = $IDUsuario;
   }
   
   public function getNoRemision(){
      return $this->NoRemision;
   }
   
   public function setNoRemision($NoRemision){
      $this->NoRemision = $NoRemision;
   }
   
   public function getFechaRegistro(){
      return $this->FechaRegistro;
   }
   
   public function setFechaRegistro($FechaRegistro){
      $this->FechaRegistro = $FechaRegistro;
   }
   
   public function getFechaRemision(){
      return $this->fechaRemision;
   }
   
   public function setFechaRemision($FechaRemision){
      $this->fechaRemision = $FechaRemision;
   }
   
}
