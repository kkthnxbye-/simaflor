<?php

/* @Author Brayan Acebo */

class configuracionxusuario {

    // Atributos
    private $id; // ID
    private $id_usuario; // IDUsuario
    private $id_tipo_conf_usuario; // IDTipoConfiguracionUsuario
    private $valor; // Valor

    // Constructor

    function __construct() {
        $this->id = 0;
        $this->id_usuario = 0;
        $this->id_tipo_conf_usuario = 0;
        $this->valor = 0;
    }

    // Setter & Getters
    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

    function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function getIdUsuario() {
        return $this->id_usuario;
    }

    function setIdTipoConfUsuario($id_tipo_conf_usuario) {
        $this->id_tipo_conf_usuario = $id_tipo_conf_usuario;
    }

    function getIdTipoConfUsuario() {
        return $this->id_tipo_conf_usuario;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function getValor() {
        return $this->valor;
    }

}

?>