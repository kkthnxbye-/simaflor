<?php
class inventariosPM{
   private $ID;	
   private $NoSeguimiento;	
   private $IDFincaProduccion;	
   private $IDFincaProveedor;	
   private $IDMaterialVegetal;	
   private $IDVariedad;	
   private $IDTipoUnidadPM;	
   private $IDCiclo;	
   private $AliasItem;	
   private $FechaIngreso;	
   private $FechaVencimiento;	
   private $IDGrado;	
   private $Saldo;
   private $IDCliente;

   public function getId(){
      return $this->ID;
   }
   
   public function getNoSegimiento(){
      return $this->NoSeguimiento;
   }
   
   public function getIdFincaProduccion(){
      return $this->IDFincaProduccion;
   }
   
   public function getIdFincaProveedor(){
      return $this->IDFincaProveedor;
   }
   
   public function getIdMaterialVegetal(){
      return $this->IDMaterialVegetal;
   }
   
   public function getIdVariedad(){
      return $this->IDVariedad;
   }
   
   public function getIdTipoUnidadPM(){
      return $this->IDTipoUnidadPM;
   }
   
   public function getIdCiclo(){
      return $this->IDCiclo;
   }
   
   public function getAliasItem(){
      return $this->AliasItem;
   }
   
   public function getFechaIngreso(){
      return $this->FechaIngreso;
   }
   
   public function getFechaVencimiento(){
      return $this->FechaVencimiento;
   }
   
   public function getIdGrado(){
      return $this->IDGrado;
   }
   
   public function getSaldo(){
      return $this->Saldo;
   }
   
   public function getIdCliente(){
      return $this->IDCliente;
   }
   
   /*
    ****************************************************************************************************************
    ****************************************************************************************************************
    ****************************************************************************************************************
    ****************************************************************************************************************
    ****************************************************************************************************************
    ****************************************************************************************************************     
    */
   
   public function setId($ID){
       $this->ID = $ID;
   }
   
   public function setNoSegimiento($NoSeguimiento){
       $this->NoSeguimiento = $NoSeguimiento;
   }
   
   public function setIdFincaProduccion($idFincaProduccion){
       $this->IDFincaProduccion = $idFincaProduccion;
   }
   
   public function setIdFincaProveedor($idFincaProveedor){
       $this->IDFincaProveedor = $idFincaProveedor;
   }
   
   public function setIdMaterialVegetal($idMaterial){
       $this->IDMaterialVegetal = $idMaterial;
   }
   
   public function setIdVariedad($IDVariedad){
       $this->IDVariedad = $IDVariedad;
   }
   
   public function setIdTipoUnidadPM($idTipoUnidadPM){
       $this->IDTipoUnidadPM = $idTipoUnidadPM;
   }
   
   public function setIdCiclo($idCiclo){
       $this->IDCiclo = $idCiclo;
   }
   
   public function setAliasItem($aliasItem){
       $this->AliasItem = $aliasItem;
   }
   
   public function setFechaIngreso($fechaIngreso){
       $this->FechaIngreso = $fechaIngreso;
   }
   
   public function setFechaVencimiento($fechaVencimiento){
       $this->FechaVencimiento = $fechaVencimiento;
   }
   
   public function setIdGrado($idGrado){
       $this->IDGrado = $idGrado;
   }
   
   public function setSaldo($saldo){
       $this->Saldo = $saldo;
   }
   
   public function setIdCliente($IDCliente){
      $this->IDCliente = $IDCliente;
   }
   
}