<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TipoUnidadPMXRevisionPedidoPM{
    
    private $id;
    private $idRevisionPedidoPM;
    private $idTipoUnidadPM;
    private $idGrado;
    
    function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdRevisionPedidoPM() {
        return $this->idRevisionPedidoPM;
    }

    public function setIdRevisionPedidoPM($idRevisionPedidoPM) {
        $this->idRevisionPedidoPM = $idRevisionPedidoPM;
    }

    public function getIdTipoUnidadPM() {
        return $this->idTipoUnidadPM;
    }

    public function setIdTipoUnidadPM($idTipoUnidadPM) {
        $this->idTipoUnidadPM = $idTipoUnidadPM;
    }

    public function getIdGrado() {
        return $this->idGrado;
    }

    public function setIdGrado($idGrado) {
        $this->idGrado = $idGrado;
    }


}
?>
