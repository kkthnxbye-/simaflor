<?php


class laboresPMXVariedad{

    private $id;
    private $idVariedad;
    private $idLaborPM;
    private $cantidad;
    private $tiempoCumplimiento;
    private $unidad;
    private $observaciones;


    function __construct(){
        $this->id = 0;
        $this->idVariedad = 'null';
        $this->idLaborPM = 'null';
        $this->cantidad = 'null';
        $this->tiempoCumplimiento = '';
        $this->unidad = '';
        $this->observaciones = '';
    }

    //GET'S & SET'S
    function setId($id){
        $this->id = $id;
    }

        function getId(){
            return $this->id;
        }

    function setIdVariedad($idVariedad){
        $this->idVariedad = $idVariedad;
    }

        function getIdVariedad(){
            return $this->idVariedad;
        }

    function setIdLaborPM($idLaborPM){
        $this->idLaborPM = $idLaborPM;
    }

        function getIdLaborPM(){
            return $this->idLaborPM;
        }

    function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }

        function getCantidad(){
            return $this->cantidad;
        }

    function setTiempoCumplimiento($tiempoCumplimiento){
        $this->tiempoCumplimiento = $tiempoCumplimiento;
    }

        function getTiempoCumplimiento(){
            return $this->tiempoCumplimiento;
        }

    function setUnidad($unidad){
        $this->unidad = $unidad;
    }

        function getUnidad(){
            return $this->unidad;
        }
    function setObservaciones($observaciones){
        $this->observaciones = $observaciones;
    }

        function getObservaciones(){
            return $this->observaciones;
        }
}
?>