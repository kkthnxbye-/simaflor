<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */
class FacturasPMDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newFactura) {
        $objFactura = new FacturasPM();
        $objFactura = $newFactura;

        $querty = "INSERT INTO FacturasPM
                    (IDDocumentosInventarioPM,FormaPago,Observaciones,Facturado,IDusuario,FechaRegistro)
                    values(
                    " . $objFactura->getIdDocumentosInventarioPM() . ",
                    '" . $objFactura->getFormaPago() . "',
                    '" . $objFactura->getObservaciones() . "',
                    " . $objFactura->getFacturado() . ",
                    " . $objFactura->getIdUsuario() . ",
                    '" . $objFactura->getFechaRegistro() . "'
                   )";



        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveFacturas): ' . mysql_error() . '<br>' . $querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'SELECT MAX(ID) from FacturasPM ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getById($id) {

        $sql = "SELECT * from FacturasPM WHERE ID = $id";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $facturas = new FacturasPM();
        $facturas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setIdDocumentosInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setFormaPago($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setObservaciones($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setFacturado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setFechaRegistro($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $facturas;
    }
    
    
    function getByIdDocumento($id) {

        $sql = "SELECT * from FacturasPM WHERE IDDocumentosInventarioPM = $id";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $facturas = new FacturasPM();
        $facturas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setIdDocumentosInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setFormaPago($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setObservaciones($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setFacturado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $facturas->setFechaRegistro($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        
        return $facturas;
        
    }

    function getAll() {

        $sql = 'SELECT * from FacturasPM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $facturas = new FacturasPM();
            $facturas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setIdDocumentosInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setFormaPago($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setObservaciones($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setFacturado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $facturas->setFechaRegistro($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $facturas;
        }
        return $lista;
    }

    
    function delete($id) {

        $sql5 = "Delete from FacturasPM WHERE ID = $id";
        return $this->daoConnection->consulta($sql5);

    }
    
    function updateEstadoFactura($id){
       $sql = "UPDATE FacturasPM SET Facturado = 0 WHERE IDDocumentosInventarioPM = $id";
       $this->daoConnection->consulta($sql);
    }
    
    function update($id,$formatoPago,$observaciones,$idUsuario){
       $sql = "UPDATE FacturasPM SET FormaPago = '$formatoPago',Observaciones = '$observaciones',IDusuario = $idUsuario WHERE ID = $id";
       
       $this->daoConnection->consulta($sql);
    }

    function total() {

        $sql = 'select count(*) from FacturasPM';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

}

?>