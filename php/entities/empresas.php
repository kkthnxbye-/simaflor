<?php


class empresas{

    private $id;
    private $nombre;
	private $nit;
	private $esproveedor;
	private $escliente;
	private $esfinca;
	private $habilitado;
	


    function __construct(){
        $this->id = 0;
        $this->nombre = 'null';
    }

    //GET'S & SET'S
    function setId($id){
        $this->id = $id;
    }

        function getId(){
            return $this->id;
        }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

        function getNombre(){
            return $this->nombre;
        }
	
	function setNit($nit){
        $this->nit = $nit;
    }

        function getNit(){
            return $this->nit;
        }
		
		function setEsProveedor($esproveedor){
        $this->esproveedor = $esproveedor;
    }

        function getEsProveedor(){
            return $this->esproveedor;
        }
		
		function setEsCliente($escliente){
        	$this->escliente = $escliente;
    	}

        function getEsCliente(){
            return $this->escliente;
        }
		
		function setEsFinca($esfinca){
        	$this->esfinca = $esfinca;
    	}

        function getEsFinca(){
            return $this->esfinca;
        }
		
		function setHabilitado($habilitado){
        	$this->habilitado = $habilitado;
    	}

        function getHabilitado(){
            return $this->habilitado;
        }

}
?>