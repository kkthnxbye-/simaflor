<?php

class sessionsalida{
   private $pieza;
   private $vegetal;
   private $producto;
   private $variedad;
   private $fecha;
   private $cantidad;

   
   public function getPieza(){
      return $this->pieza;
   }
   
   public function getVegetal(){
      return $this->vegetal;
   }
   
   public function getProducto(){
      return $this->producto;
   }
   
   public function getVariedad(){
      return $this->variedad;
   }
   
   public function getFecha(){
      return $this->fecha;
   }
   
   public function getCantidad(){
      return $this->cantidad;
   }
   
   /****************************************************************************/
   /****************************************************************************/
   /****************************************************************************/
   /****************************************************************************/
   /****************************************************************************/
   /****************************************************************************/
   
   public function setPieza($pieza){
       $this->pieza = $pieza;
   }
   
   public function setVegetal($vegetal){
       $this->vegetal = $vegetal;
   }
   
   public function setProducto($p){
       $this->producto = $p;
   }
   
   public function setVariedad($v){
       $this->variedad = $v;
   }
   
   public function setFecha($f){
       $this->fecha = $f;
   }
   
   public function setCantidad($c){
       $this->cantidad = $c;
   }
   
}
