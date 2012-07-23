<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */
// Clase dao
class enrutamientoprocesoDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newenrutamientoproceso) {

        $objEP = new enrutamientoproceso();
        $objEP = $newenrutamientoproceso;

        $querty = "INSERT INTO EnrutamientoProcesoPM (IDFinca, IDProducto, IDServicioPM, IDMaterialVegetal, IDProcesoOrigen,IDProcesoDestino,IDTipoMovimientoInventario,GeneraEtiquetaProduccion) 
            VALUES ( 
            " . $objEP->getIdFinca() . ",
            " . $objEP->getIdProducto() . ",
            " . $objEP->getIdServicio() . ",
            " . $objEP->getIdMaterialVegetal() . ",
            " . $objEP->getIdProcesoOrigen() . ",
            " . $objEP->getIdProcesoDestino() . ",
            " . $objEP->getIdTipoMovimientoInventario() . ",
            " . $objEP->getGeneraEtiquetaProduccion() . ")";

        $result = $this->daoConnection->consulta($querty);

        if (!$result) {
            echo 'Ooops (saveVariedads): ' . mysql_error() . '<br>' . $querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'SELECT MAX(ID) FROM EnrutamientoProcesoPM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getById($id) {

        $sql = 'SELECT * FROM EnrutamientoProcesoPM WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;

        $enrutamientoproceso = new enrutamientoproceso();
        $enrutamientoproceso->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $enrutamientoproceso->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $enrutamientoproceso->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $enrutamientoproceso->setIdServicio($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $enrutamientoproceso->setIdMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $enrutamientoproceso->setIdProcesoOrigen($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $enrutamientoproceso->setIdProcesoDestino($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $enrutamientoproceso->setIdTipoMovimientoInventario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $enrutamientoproceso;
    }

    function gets($campo, $valor) {

        $sql = 'SELECT * from EnrutamientoProcesoPM';

        if ($campo != '' && $valor != '') {
           $sql .= " WHERE $campo = $valor ";
        }
        

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $enrutamientoproceso = new enrutamientoproceso();
            $enrutamientoproceso->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $enrutamientoproceso->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $enrutamientoproceso->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $enrutamientoproceso->setIdServicio($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $enrutamientoproceso->setIdMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $enrutamientoproceso->setIdProcesoOrigen($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $enrutamientoproceso->setIdProcesoDestino($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $enrutamientoproceso->setIdTipoMovimientoInventario($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $enrutamientoproceso;
        }
        return $lista;
    }

    function getsbyFinca($finca) {
        $sql = 'SELECT * from EnrutamientoProcesoPM where IDFinca = ' . $finca;
        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $enrutamientoproceso = new enrutamientoproceso();
            $enrutamientoproceso->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $enrutamientoproceso->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $enrutamientoproceso->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $enrutamientoproceso->setIdServicio($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $enrutamientoproceso->setIdMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $enrutamientoproceso->setIdProcesoOrigen($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $enrutamientoproceso->setIdProcesoDestino($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $enrutamientoproceso->setIdTipoMovimientoInventario($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $enrutamientoproceso;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from EnrutamientoProcesoPM WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }

    function update($enrutamientoproceso) {

        $enrutamientoproceso = $enrutamientoproceso;

        $querty = "UPDATE
                    EnrutamientoProcesoPM
                    SET
						 IDProducto =
                        \"" . $enrutamientoproceso->getIdProducto() . "\",
						 IDServicio =
                        \"" . $enrutamientoproceso->getIdServicio() . "\",	
						 IDMaterialVegetal =
                        \"" . $enrutamientoproceso->getIdMaterialVegetal() . "\",
						 IDProcesoOrigen =
                        \"" . $enrutamientoproceso->getIdProcesoOrigen() . "\", 
						 IDProcesoDestino =
                        \"" . $enrutamientoproceso->getIdProcesoDestino() . "\",
						 IDTipoMovimientoInventario =
                        \"" . $enrutamientoproceso->getIdTipoMovimientoInventario() . "\"
                    WHERE ID =
                    " . $enrutamientoproceso->getId() . "
                    ";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (EnrutamientoProcesoPM): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

        $sql = 'select count(*) from EnrutamientoProcesoPM;';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
    
    
    /*
     * Get Materiales Vegetales
     */
    function getsbyAll($IDFinca,$IDProducto,$IDServicioPM) {
        $sql = "SELECT DISTINCT IDMaterialVegetal 
           FROM EnrutamientoProcesoPM 
           WHERE IDFinca = $IDFinca 
            AND IDProducto = $IDProducto";
            if($IDServicioPM != ""){
             $sql.="AND IDServicioPM = $IDServicioPM ";  
            }
            
        
        //echo $sql;
        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();
        
        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $enrutamientoproceso = new enrutamientoproceso();
//            $enrutamientoproceso->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
//            $enrutamientoproceso->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
//            $enrutamientoproceso->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
//            $enrutamientoproceso->setIdServicio($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $enrutamientoproceso->setIdMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
//            $enrutamientoproceso->setIdProcesoOrigen($this->daoConnection->ObjetoConsulta2[$i][$j++]);
//            $enrutamientoproceso->setIdProcesoDestino($this->daoConnection->ObjetoConsulta2[$i][$j++]);
//            $enrutamientoproceso->setIdTipoMovimientoInventario($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $enrutamientoproceso;
        }
        return $lista;
    }

    
    function getIdTipoMovimientoInventarioPM($objEnrutamiento) {
        
        $newEnrutamientoProceso = new enrutamientoproceso();
        $newEnrutamientoProceso = $objEnrutamiento;

        $sql = "SELECT TOP 1 IDTipoMovimientoInventario 
                FROM dbo.EnrutamientoProcesoPM 
                WHERE IDFinca = " . $newEnrutamientoProceso->getIdFinca() . " 
                AND IDProducto = " . $newEnrutamientoProceso->getIdProducto() . " 
                AND IDServicioPM = " . $newEnrutamientoProceso->getIdServicio() . "  
                AND IDMaterialVegetal = " . $newEnrutamientoProceso->getIdMaterialVegetal() . " 
                AND IDProcesoOrigen = " . $newEnrutamientoProceso->getIdProcesoOrigen() . " 
                AND IDProcesoDestino = " . $newEnrutamientoProceso->getIdProcesoDestino() . " 
                ORDER BY ID ASC";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;

        return $this->daoConnection->ObjetoConsulta2[$i][$j++];
        
    }
}

?>