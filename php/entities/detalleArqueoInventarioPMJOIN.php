<?php
class detalleArquoeInventarioPMJOIN{
   private $id;
   private $idArqueoInventarioPM;
   private $idInventarioPM;
   private $id2;
   private $idFinca;
   private $idUsuario;
   private $fecha;
   private $unidadesEnInventario;
   private $unidadesFueraInventario;
   private $verificado;
   
   
   public function getId2() {
      return $this->id2;
   }
   
   public function getIdFinca() {
      return $this->idFinca;
   }
   
   public function getIdUsuario() {
      return $this->idUsuario;
   }
   
   public function getFecha() {
      return $this->fecha;
   }
   
   public function getUnidadesEnInventario() {
      return $this->unidadesEnInventario;
   }
   
   public function getUnidadesFueraInventario() {
      return $this->unidadesFueraInventario;
   }
   
   public function getVerificado() {
      return $this->verificado;
   }
   
   //////////////////////////////////////////////////////////////////////////////
   //////////////////////////////////////////////////////////////////////////////
   //////////////////////////////////////////////////////////////////////////////
   //////////////////////////////////////////////////////////////////////////////
   
   public function setId2($id2) {
       $this->id2 = $id2;
   }
   
   public function setIdFinca($idFinca) {
       $this->idFinca = $idFinca;
   }
   
   public function setIdUsuario($idUsuario) {
       $this->idUsuario = $idUsuario;
   }
   
   public function setFecha($fecha) {
       $this->fecha = $fecha;
   }
   
   public function setUnidadesEnInventario($unidadesEnInventario) {
       $this->unidadesEnInventario = $unidadesEnInventario;
   }
   
   public function setUnidadesFueraInventario($unidadesFueraInventario) {
       $this->unidadesFueraInventario = $unidadesFueraInventario;
   }
   
   public function setVerificado($verificado) {
       $this->verificado = $verificado;
   }
   
   
   public function getId(){
      return $this->id;
   }
   
   public function getIdArqueoInventarioPM(){
      return $this->idArqueoInventarioPM;
   }
   
   public function getIdInventarioPM(){
      return $this->idInventarioPM;
   }
   
   
   public function setId($id){
      $this->id = $id;
   }
   
   public function setIdArqueoInventarioPM($idArqueoInventarioPM){
      $this->idArqueoInventarioPM = $idArqueoInventarioPM;
   }
   
   public function setIdInventarioPM($idInventarioPM){
      $this->idInventarioPM = $idInventarioPM;
   }
}