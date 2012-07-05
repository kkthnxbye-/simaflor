<?php

class Labores{
   
   private $id;
   private $codigo;
   private $nombre;
   private $descripcion;
   private $foto;
   private $habilitado;
   
   function getId(){
      return $this->id;
   }
   
   function setId($id){
      $this->id = $id;
   }
   
   //////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
   function getCodigo(){
      return $this->codigo;
   }
   
   function setCodigo($codigo){
      $this->codigo = $codigo;
   }
   
   //////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
   function getNombre(){
      return $this->nombre;
   }
   
   function setNombre($nombre){
      $this->nombre = $nombre;
   }
   
   //////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
   function getDescripcion(){
      return $this->descripcion;
   }
   
   function setDescripcion($descripcion){
      $this->descripcion = $descripcion;
   }
   
   //////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
   function getFoto(){
      return $this->foto;
   }
   
   function setFoto($foto){
      $this->foto = $foto;
   }
   
   //////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
   function getHabilitado(){
      return $this->habilitado;
   }
   
   function setHabilitado($habilitado){
      $this->habilitado = $habilitado;
   }
   
   //////////////////////////////////////////////////////////////////////////////////////////////////////////////
   
}

?>
