<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class pedidos{
    
    private $id;
    private $fincacliente;
    private $servicio;
	private $materialvegetal;
	private $producto;
	private $usuario;
	private $fincaproduccion;
	private $ciclo;
	private $entregamaterial;
	private $fecha;
      private $fechaUltimoEstado;
	private $estadopedido;
	private $fincaproveedor;
    
    function __construct() {
       
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFincacliente() {
        return $this->fincacliente;
    }

    public function setFincacliente($fincacliente) {
        $this->fincacliente = $fincacliente;
    }

    public function getServicio() {
        return $this->servicio;
    }

    public function setServicio($servicio) {
        $this->servicio = $servicio;
    }

public function getMaterialvegetal() {
        return $this->materialvegetal;
    }

    public function setMaterialvegetal($materialvegetal) {
        $this->materialvegetal = $materialvegetal;
    }
public function getProducto() {
        return $this->producto;
    }

    public function setProducto($producto) {
        $this->producto = $producto;
    }

public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

public function getFincaProduccion() {
        return $this->fincaproduccion;
    }

    public function setFincaProduccion($fincaproduccion) {
        $this->fincaproduccion = $fincaproduccion;
    }

public function getCiclo() {
        return $this->ciclo;
    }

    public function setCiclo($ciclo) {
        $this->ciclo = $ciclo;
    }

public function getEntregamaterial() {
        return $this->entregamaterial;
    }

    public function setEntregamaterial($entregamaterial) {
        $this->entregamaterial = $entregamaterial;
    }

public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

public function getEstadopedido() {
        return $this->estadopedido;
    }

    public function setEstadopedido($estadopedido) {
        $this->estadopedido = $estadopedido;
    }

public function getFincaproveedor() {
        return $this->fincaproveedor;
    }

    public function setFincaproveedor($fincaproveedor) {
        $this->fincaproveedor = $fincaproveedor;
    }
    
    
    public function getFechaUltimoEstado() {
        return $this->fechaUltimoEstado;
    }

    public function setFechaUltimoEstado($fechaUltimoEstado) {
        $this->fechaUltimoEstado = $fechaUltimoEstado;
    }

}
?>
