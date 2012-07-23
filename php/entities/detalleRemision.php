<?php
class detalleRemision{
   
   private $id;
   private $IDRemisionPM;
   private $IDVariedad;
   private $cantidad;
   
   public function getId(){
      return $this->id;
   }
   
   public function setId($id){
      $this->id = $id;
   }
   
   public function getIDRemisionPM(){
      return $this->IDRemisionPM;
   }
   
   public function setIDRemisionPM($IDRemisionPM){
      $this->IDRemisionPM = $IDRemisionPM;
   }
   
   public function getIDVariedad(){
      return $this->IDVariedad;
   }
   
   public function setIDVariedad($IDVariedad){
      $this->IDVariedad = $IDVariedad;
   }
   
   public function getCantidad(){
      return $this->cantidad;
   }
   
   public function setCantidad($cantidad){
      $this->cantidad = $cantidad;
   }

}
