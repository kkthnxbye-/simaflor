<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */
class modulosDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newModulos) {


        $querty = "insert into Modulos
                    (Nombre,IDmenuraiz)
                    values(
                    \"" . $newModulos->getNombre() . "\",
                    \"" . $newModulos->getIdMenuRaiz() . "\"
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveModulos): ' . mysql_error() . '<br>' . $querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from Modulos WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $Modulos = new modulos();
        $Modulos->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Modulos->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Modulos->setIdMenuRaiz($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Modulos->setOrden($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $Modulos;
    }

    function gets() {

        $sql = 'SELECT * from Modulos';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $Modulos = new modulos();
            $Modulos->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Modulos->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $Modulos;
        }
        return $lista;
    }

    function getsByRaiz($idRaiz) {

        $sql = 'SELECT * from Modulos WHERE IDmenuraiz = ' . $idRaiz.' ORDER BY orden ASC';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $Modulos = new modulos();
            $Modulos->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Modulos->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $Modulos;
        }
        return $lista;
    }

    function delete($id) {
        $sql = 'Delete from Modulos WHERE ID = ' . $id . ' ';
        return $this->daoConnection->consulta($sql);
    }

    function update($newModulos) {

        $Modulos = $newModulos;

        $querty = "UPDATE
                    Modulos
                    SET

                        Nombre =\"" . $Modulos->getNombre() . "\",
                        IDmenuraiz =\"" . $Modulos->getIdMenuRaiz() . "\"
                       
                    WHERE ID =
                    " . $Modulos->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateModulos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

        $sql = 'select count(*) from Modulos;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getsbybuscar($campo, $tipob, $valor) {
        $sql = 'SELECT * from Modulos ';
        $where = ' where 1=1 ';
        if ($campo == "todos") {

            if ($tipob == "parte") {
                $where .= ' and (Nombre LIKE "%' . $valor . '%")';
            } else {
                $where .= ' and (Nombre= "' . $valor . '%")';
            }
        } else {
            if ($tipob == "parte") {
                $where .= ' and ' . $campo . ' LIKE "%' . $valor . '%"';
            } else {
                $where .= ' and ' . $campo . ' = "' . $valor . '"';
            }
        }
        $sql.=$where." ORDER BY orden ASC";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $Modulos = new modulos();
            $Modulos->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Modulos->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Modulos->setIdMenuRaiz($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Modulos->setOrden($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $Modulos;
        }
        return $lista;
    }
    
    
        function changeOrden($id, $orden) {
        
        
        $querty = "UPDATE Modulos SET
                    orden = $orden
                     WHERE Modulos.ID = $id ";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (changeOrden): ' . mssql_get_last_message();
            return false;
        }

        return true;
    }



}

?>
