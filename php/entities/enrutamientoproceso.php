<?php

/* @Author Alexander */

class enrutamientoproceso {

    // Atributos
    private $id; // ID
    private $id_finca;
    private $id_producto; // IDProducto
    private $id_servicio;
    private $id_material_vegetal; // IDMaterialVegetal
    // Valor // IDFincaCliente
    private $id_proceso_origen;
    private $id_proceso_destino; // IDFincaProveedor
    private $id_tipo_movimineto_inventario; // IDFincaProduccion
    private $genera_etiqueta_produccion; // IDFincaProduccion

    // Constructor

    function __construct() {
        $this->id = 0;
        $this->id_finca = 0;
        $this->id_producto = 0;
        $this->id_servicio = 0;
        $this->id_material_vegetal = 0;
        $this->id_proceso_origen = 0;
        $this->id_proceso_destino = 0;
        $this->id_tipo_movimineto_inventario = 0;
        $this->genera_etiqueta_produccion = 0;
    }

    // Setter & Getters
    function setGeneraEtiquetaProduccion($genera_etiqueta_produccion) {
        $this->genera_etiqueta_produccion = $genera_etiqueta_produccion;
    }

    function getGeneraEtiquetaProduccion() {
        return $this->genera_etiqueta_produccion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

    function setIdFinca($id_finca) {
        $this->id_finca = $id_finca;
    }

    function getIdFinca() {
        return $this->id_finca;
    }

    function setIdServicio($id_servicio) {
        $this->id_servicio = $id_servicio;
    }

    function getIdServicio() {
        return $this->id_servicio;
    }

    function setIdProducto($id_producto) {
        $this->id_producto = $id_producto;
    }

    function getIdProducto() {
        return $this->id_producto;
    }

    function setIdProcesoOrigen($id_proceso_origen) {
        $this->id_proceso_origen = $id_proceso_origen;
    }

    function getIdProcesoOrigen() {
        return $this->id_proceso_origen;
    }

    function setIdProcesoDestino($id_proceso_destino) {
        $this->id_proceso_destino = $id_proceso_destino;
    }

    function getIdProcesoDestino() {
        return $this->id_proceso_destino;
    }

    function setIdTipoMovimientoInventario($id_tipo_movimineto_inventario) {
        $this->id_tipo_movimineto_inventario = $id_tipo_movimineto_inventario;
    }

    function getIdTipoMovimientoInventario() {
        return $this->id_tipo_movimineto_inventario;
    }

    function setIdMaterialVegetal($id_material_vegetal) {
        $this->id_material_vegetal = $id_material_vegetal;
    }

    function getIdMaterialVegetal() {
        return $this->id_material_vegetal;
    }

}

?>