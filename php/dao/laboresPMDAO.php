<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class laboresPMDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newlaboresPMs) {


        $querty = "insert into LaboresPM
                    (Codigo, Nombre, Descripcion, Foto, Habilitado)
                    values(
                    \"" . $newlaboresPMs->getCodigo() . "\",
                    \"" . $newlaboresPMs->getNombre() . "\",
                    \"" . $newlaboresPMs->getDescripcion() . "\",
                    \"" . $newlaboresPMs->getFoto() . "\",
                    \"" . $newlaboresPMs->getHabilitado() . "\"
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (savelaboresPMs): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from LaboresPM WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $laboresPM = new laboresPM();
        $laboresPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPM->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPM->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $laboresPM->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $laboresPM;
    }

    function gets() {

        $sql = 'SELECT * from LaboresPM ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $laboresPM = new laboresPM();
            $laboresPM->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $laboresPM->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $laboresPM->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $laboresPM->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $laboresPM->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $laboresPM->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $laboresPM;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from LaboresPM WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }


    function update($newlaboresPM) {

        $laboresPM = $newlaboresPM;

        $querty = "UPDATE
                    LaboresPM
                    SET

                        Codigo =
                        \"" . $laboresPM->getCodigo() . "\",
                        Nombre =
                        \"" . $laboresPM->getNombre() . "\",
                        Descripcion =
                        \"" . $laboresPM->getDescripcion() . "\",
                        Foto =
                        \"" . $laboresPM->getFoto() . "\",
                        Habilitado =
                        \"" . $laboresPM->getHabilitado() . "\"

                    WHERE ID =
                    " . $laboresPM->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updatelaboresPMs): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from LaboresPM;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }


}

?>