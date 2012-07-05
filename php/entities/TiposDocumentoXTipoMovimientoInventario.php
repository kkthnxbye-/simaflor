<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class TiposDocumentoXTipoMovimientoInventario{
    
    private $id;
    private $tipoMovimientoInventario;
    private $tipoDocumento;
    
    function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTipoMovimientoInventario() {
        return $this->tipoMovimientoInventario;
    }

    public function setTipoMovimientoInventario($tipoMovimientoInventario) {
        $this->tipoMovimientoInventario = $tipoMovimientoInventario;
    }

    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
    }


}
?>
