<?php
class movimientosInventarioJoin {

    private $id;
    private $idInventarioPM;
    private $idTipoMovimientoInventarioPM;
    private $idCliente;
    private $cantidad;
    private $fechaRegistro;
    private $idUsuario;
    private $idDocumentoInventarioPM;
    private $habilitado;
    private $idInventario;
    private $idTipoMovimientoInventario;
    private $suma;
    

    function __construct() {
        $this->id = 0;
        $this->idInventarioPM = 0;
        $this->idTipoMovimientoInventarioPM = 0;
        $this->idCliente = 0;
        $this->cantidad = 0;
        $this->fechaRegistro = 0;
        $this->idUsuario = 0;
        $this->idDocumentoInventarioPM = 0;
        $this->habilitado = 0;
    }
    
    public function getHabilitado() {
        return $this->habilitado;
    }

    public function setHabilitado($habilitado) {
        $this->habilitado = $habilitado;
    }
    
    public function getSuma() {
        return $this->suma;
    }

    public function setSuma($suma) {
        $this->suma = $suma;
    }
    
    public function getIdDocumentoInventarioPM() {
        return $this->idDocumentoInventarioPM;
    }

    public function setIdDocumentoInventarioPM($idDocumentoInventarioPM) {
        $this->idDocumentoInventarioPM = $idDocumentoInventarioPM;
    }
    
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
    
    public function getFechaRegistro() {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro($fechaRegistro) {
        $this->fechaRegistro = $fechaRegistro;
    }
    
    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    
    public function getIdCliente() {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente) {
        $this->idCliente = $idCliente;
    }
    
    public function getIdTipoMovimientoInventarioPM() {
        return $this->idTipoMovimientoInventarioPM;
    }

    public function setIdTipoMovimientoInventarioPM($idTipoMovimientoInventarioPM) {
        $this->idTipoMovimientoInventarioPM = $idTipoMovimientoInventarioPM;
    }
    
    public function getIdTipoMovimientoInventario() {
        return $this->idTipoMovimientoInventario;
    }

    public function setIdTipoMovimientoInventario($idTipoMovimientoInventario) {
        $this->idTipoMovimientoInventario = $idTipoMovimientoInventario;
    }
    
    public function getIdInventarioPM() {
        return $this->idInventarioPM;
    }

    public function setIdInventarioPM($idInventarioPM) {
        $this->idInventarioPM = $idInventarioPM;
    }
    
    public function getIdInventario() {
        return $this->idInventario;
    }

    public function setIdInventario($idInventario) {
        $this->idInventario = $idInventario;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    
}
?>
