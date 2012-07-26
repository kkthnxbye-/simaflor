<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */
class DetalleFacturaPMDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newDetalleFactura) {
        $objFactura = new DetalleFacturaPM();
        $objFactura = $newDetalleFactura;

        $querty = "INSERT INTO DetalleFacturaPM
                    (IDFactura,IDVariedad,CantidadSalida,CantidadFacturada,IDTemporada,NoCamas,PrecioUnidadUSD)
                    VALUES(
                    " . $objFactura->getIdFactura() . ",
                    " . $objFactura->getIdVariedad() . ",
                    " . $objFactura->getCantidadSalida() . ",
                    " . $objFactura->getCantidadFacturada() . ",
                    " . $objFactura->getidTemporada() . ",
                    " . $objFactura->getNoCamas() . ",
                    " . $objFactura->getPrecioUnidadUSD() . "
                   )";



        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveFacturas): ' . mysql_error() . '<br>' . $querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'SELECT MAX(ID) from DetalleFacturaPM ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getById($id) {

        $sql = "SELECT * from DetalleFacturaPM WHERE ID = $id";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $facturas = new DetalleFacturaPM();
        $facturas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setIdFactura($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setCantidadSalida($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setCantidadFacturada($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setIdTemporada($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setNoCamas($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setPrecioUnidadUSD($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $facturas;
    }

    function getAll() {

        $sql = 'SELECT * from DetalleFacturaPM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $facturas = new DetalleFacturaPM();
            $facturas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setIdFactura($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setCantidadSalida($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setCantidadFacturada($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setIdTemporada($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setNoCamas($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setPrecioUnidadUSD($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $facturas;
        }
        return $lista;
    }


    function delete($id) {

        $sql5 = "Delete from DetalleFacturaPM WHERE ID = $id";
        return $this->daoConnection->consulta($sql5);
    }


    function total() {

        $sql = 'select count(*) from DetalleFacturaPM';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
    
    
    function getByIdFactura($idFactura) {

        $sql = "SELECT * from DetalleFacturaPM WHERE IDFactura = $idFactura";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $facturas = new DetalleFacturaPM();
        $facturas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setIdFactura($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setCantidadSalida($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setCantidadFacturada($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setIdTemporada($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setNoCamas($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setPrecioUnidadUSD($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $facturas;
    }
    
    
    function getByIdFacturaAll($idFactura) {

        $sql = "SELECT * from DetalleFacturaPM WHERE IDFactura = $idFactura";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $facturas = new DetalleFacturaPM();
            $facturas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setIdFactura($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setCantidadSalida($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setCantidadFacturada($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setIdTemporada($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setNoCamas($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setPrecioUnidadUSD($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $facturas;
        }
        return $lista;
    }
    
    function update($id,$cantidadFactura,$idTemporada,$noCamas,$precioUnidad){
       $sql = "UPDATE DetalleFacturaPM SET CantidadFacturada = $cantidadFactura,IDTemporada = $idTemporada,NoCamas = $noCamas,PrecioUnidadUSD = $precioUnidad WHERE ID = $id";
       
       $this->daoConnection->consulta($sql);
    }

}

?>