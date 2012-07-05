<?php

/* @Author Alexander */

class configuracionxmodulo {

    // Atributos
    private $id; // ID
    private $id_modulo; // IDModulo
    private $id_tipo_parametro; // IDTipoParametro
    private $valor; // Valor

    // Constructor

    function __construct() {
        $this->id = 0;
        $this->id_modulo = 0;
        $this->id_tipo_parametro = 0;
        $this->valor = 0;
    }

    // Setter & Getters
    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

    function setIdModulo($id_modulo) {
        $this->id_modulo = $id_modulo;
    }

    function getIdModulo() {
        return $this->id_modulo;
    }

    function setIdTipoParametro($id_tipo_parametro) {
        $this->id_tipo_parametro = $id_tipo_parametro;
    }

    function getIdTipoParametro() {
        return $this->id_tipo_parametro;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function getValor() {
        return $this->valor;
    }

}

?>