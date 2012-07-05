<?php

class Menu_raiz{
   
   private $id;
   private $nombre;
   private $orden;
   
   function getId(){
      return $this->id;
   }
   
   function setId($id){
      $this -> id = $id;
   }
   
   function getNombre(){
      return $this->nombre;
   }
   
   function setNombre($nombre){
      $this -> nombre = $nombre;
   }
   
   function getOrden(){
      return $this->orden;
   }
   
   function setOrden($orden){
      $this -> orden = $orden;
   }
   
}

?>
