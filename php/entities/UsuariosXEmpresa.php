<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuariosXEmpresa{
    
    private $id;
    private $idEmpresa;
    private $idUsuario;
    
    function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdEmpresa() {
        return $this->idEmpresa;
    }

    public function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }


}
?>
