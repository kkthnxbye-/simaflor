<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class detallepedido{
    
    private $id;
    private $variedad;
    private $cantidad;
    private $cantidadAprobada;
    private $fechaentrega;	
    private $fecharecibomaterial;
    private $aprobado;
    private $pedido;
	    
    function __construct() {
       
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getVariedad() {
        return $this->variedad;
    }

    public function setVariedad($variedad) {
        $this->variedad = $variedad;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
    
    ////////////////////////////////////////////
    public function getCantidadAprobada() {
        return $this->cantidadAprobada;
    }

    public function setCantidadAprobada($cantidadAprobada) {
        $this->cantidadAprobada = $cantidadAprobada;
    }
    
    public function getAprobado() {
        return $this->aprobado;
    }

    public function setAprobado($aprobado) {
        $this->aprobado = $aprobado;
    }
    ////////////////////////////////////////////

	public function getFechaEntrega() {
        return $this->fechaentrega;
    }

    public function setFechaEntrega($fechaentrega) {
        $this->fechaentrega = $fechaentrega;
    }
	
	public function getFecharecibomaterial() {
        return $this->fecharecibomaterial;
    }

    public function setFecharecibomaterial($fecharecibomaterial) {
        $this->fecharecibomaterial = $fecharecibomaterial;
    }

	public function getPedido() {
        return $this->pedido;
    }

    public function setPedido($pedido) {
        $this->pedido = $pedido;
    }

}
?>
