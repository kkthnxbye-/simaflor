<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TiposMovimientoInventarioXFinca{
    
    private $id;
    private $idFinca;
    private $idTipoMovimiento;
    private $esPorDefecto;
    private $consecutivo;
    
    function __construct() {
        $this->id = 0;
        $this->idFinca = 0;
        $this->idTipoMovimiento = 0;
        $this->esPorDefecto = 0;
        $this->consecutivo = 0;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdFinca() {
        return $this->idFinca;
    }

    public function setIdFinca($idFinca) {
        $this->idFinca = $idFinca;
    }
    
    public function getEsPorDefecto() {
        return $this->esPorDefecto;
    }

    public function setEsPorDefecto($esPorDefecto) {
        $this->esPorDefecto = $esPorDefecto;
    }

    public function getIdTipoMovimiento() {
        return $this->idTipoMovimiento;
    }

    public function setIdTipoMovimiento($idTipoMovimiento) {
        $this->idTipoMovimiento = $idTipoMovimiento;
    }

    public function getConsecutivo() {
        return $this->consecutivo;
    }

    public function setConsecutivo($consecutivo) {
        $this->consecutivo = $consecutivo;
    }


}
?>
