<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class TipoUnidadPMXRevisionPedidoPMDAO{
    
    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newTipoUnidadPMXRevisionPedidoPM) {
        $TipoUnidadPMXRevisionPedidoPM = new TipoUnidadPMXRevisionPedidoPM();
        $TipoUnidadPMXRevisionPedidoPM = $newTipoUnidadPMXRevisionPedidoPM;
        $querty = "insert into TipoUnidadPMXRevisionPedidoPM
                    (IDRevisionPedidoPM,IDTipoUnidadPM,IDGrado)
                    values(
                    \"" . mysql_real_escape_string($TipoUnidadPMXRevisionPedidoPM->getIdRevisionPedidoPM()) . "\",
					\"" . mysql_real_escape_string($TipoUnidadPMXRevisionPedidoPM->getIdTipoUnidadPM()) . "\",
					\"" . mysql_real_escape_string($TipoUnidadPMXRevisionPedidoPM->getIdGrado()) . "\"   
	)";

        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (saveTipoUnidadPMXRevisionPedidoPM): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from TipoUnidadPMXRevisionPedidoPM WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TipoUnidadPMXRevisionPedidoPM = new TipoUnidadPMXRevisionPedidoPM();
        $TipoUnidadPMXRevisionPedidoPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TipoUnidadPMXRevisionPedidoPM->setIdRevisionPedidoPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TipoUnidadPMXRevisionPedidoPM->setIdTipoUnidadPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TipoUnidadPMXRevisionPedidoPM->setIdGrado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TipoUnidadPMXRevisionPedidoPM;
    }

    function gets() {

        $sql = 'SELECT * from TipoUnidadPMXRevisionPedidoPM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $TipoUnidadPMXRevisionPedidoPM = new TipoUnidadPMXRevisionPedidoPM();
        $TipoUnidadPMXRevisionPedidoPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TipoUnidadPMXRevisionPedidoPM->setIdRevisionPedidoPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TipoUnidadPMXRevisionPedidoPM->setIdTipoUnidadPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TipoUnidadPMXRevisionPedidoPM->setIdGrado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $TipoUnidadPMXRevisionPedidoPM;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from TipoUnidadPMXRevisionPedidoPM WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }


    function update($newTipoUnidadPMXRevisionPedidoPM) {
        $TipoUnidadPMXRevisionPedidoPM = new TipoUnidadPMXRevisionPedidoPM();
        $TipoUnidadPMXRevisionPedidoPM = $newTipoUnidadPMXRevisionPedidoPM;

        $querty = "UPDATE
                    TipoUnidadPMXRevisionPedidoPM
                    SET
                        IDRevisionPedidoPM =
                        \"" . mysql_real_escape_string($TipoUnidadPMXRevisionPedidoPM->getIdRevisionPedidoPM()) . "\",
                        IDTipoUnidadPM =
                        \"" . mysql_real_escape_string($TipoUnidadPMXRevisionPedidoPM->getIdTipoUnidadPM()) . "\",
                       IDGrado =
                       \"" . mysql_real_escape_string($TipoUnidadPMXRevisionPedidoPM->getIdGrado()) . "\"
                    WHERE ID =
                    " . mysql_real_escape_string($TipoUnidadPMXRevisionPedidoPM->getId()) . "
                    ";
        $result = $this->daoConnection->consulta($sql);;
        if (!$result) {
            echo 'Ooops (updateTipoUnidadPMXRevisionPedidoPM): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from TipoUnidadPMXRevisionPedidoPM;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
}
?>