<?php
class ItemsPM{
   private $id;
   private $idFinca;
   private $idProveedor;
   private $idVegetal;
   private $idVariedad;
   private $idBreeder;
   private $idsInventarioPM;
   private $Alias;
   private $consecutivo;
   private $codigoSeguimiento;
   private $fechaSiembra;
   private $fechaArranque;
   private $fechaRegistro;
   private $Observaciones;
   private $idEstadoItem;
   private $idUsuario;
   private $idTemporada;
   private $idCiclo;
   private $idCliente;
   
   public function getId(){
      return $this->id;
   }
   
   public function getIdFinca(){
      return $this->idFinca;
   }
   
   public function getIdProveedor(){
      return $this->idProveedor;
   }
   
   public function getIdVegetal(){
      return $this->idVegetal;
   }
   
   public function getIdVariedad(){
      return $this->idVariedad;
   }
   
   public function getIdBreeder(){
      return $this->idBreeder;
   }
   
   public function getIdsInventarioPM(){
      return $this->idsInventarioPM;
   }
   
   public function getAlias(){
      return $this->Alias;
   }
   
   public function getConsecutivo(){
      return $this->consecutivo;
   }
   
   public function getCodigoSeguimiento(){
      return $this->codigoSeguimiento;
   }
   
   public function getFechaSiembra(){
      return $this->fechaSiembra;
   }
   
   public function getFechaArranque(){
      return $this->fechaArranque;
   }
   
   public function getFechaRegistro(){
      return $this->fechaRegistro;
   }
   
   public function getObservaciones(){
      return $this->Observaciones;
   }
   
   public function getIdEstadoItem(){
      return $this->idEstadoItem;
   }
   
   public function getIdUsuario(){
      return $this->idUsuario;
   }
   
   public function getIdTemporada(){
      return $this->idTemporada;
   }
   
   public function getIdCiclo(){
      return $this->idCiclo;
   }
   
   public function getIdCliente(){
      return $this->idCliente;
   }
   
   public function setId($var){
       $this->id = $var;
   }
   
   public function setIdFinca($var){
       $this->idFinca = $var;
   }
   
   public function setIdProveedor($var){
       $this->idProveedor = $var;
   }
   
   public function setIdVegetal($var){
       $this->idVegetal = $var;
   }
   
   public function setIdVariedad($var){
       $this->idVariedad = $var;
   }
   
   public function setIdBreeder($var){
       $this->idBreeder = $var;
   }
   
   public function setIdsInventarioPM($var){
       $this->idsInventarioPM = $var;
   }
   
   public function setAlias($var){
       $this->Alias = $var;
   }
   
   public function setConsecutivo($var){
       $this->consecutivo = $var;
   }
   
   public function setCodigoSeguimiento($var){
       $this->codigoSeguimiento = $var;
   }
   
   public function setFechaSiembra($var){
       $this->fechaSiembra = $var;
   }
   
   public function setFechaArranque($var){
       $this->fechaArranque = $var;
   }
   
   public function setFechaRegistro($var){
       $this->fechaRegistro = $var;
   }
   
   public function setObservaciones($var){
       $this->Observaciones = $var;
   }
   
   public function setIdEstadoItem($var){
       $this->idEstadoItem = $var;
   }
   
   public function setIdUsuario($var){
       $this->idUsuario = $var;
   }
   
   public function setIdTemporada($var){
       $this->idTemporada = $var;
   }
   
   public function setIdCiclo($var){
       $this->idCiclo = $var;
   }
   
   public function setIdCliente($var){
       $this->idCliente = $var;
   }
}