<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */
class estadospedidoDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newEstadoPedido) {


        $querty = "insert into EstadosPedidoPM
                    (Nombre)
                    values(
					\"" . $newEstadoPedido->getNombre() . "\"
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

        $sql = 'SELECT * from EstadosPedidoPM WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $newEstadoPedido = new estadospedido();
        $newEstadoPedido->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newEstadoPedido->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $newEstadoPedido;
    }

    function getsbybuscar($campo, $tipob, $valor) {
        $sql = 'SELECT * from EstadosPedidoPM ';
        $where = ' where 1=1 ';

        if ($tipob == "parte") {
            $where .= ' and ' . $campo . ' LIKE "%' . $valor . '%"';
        } else {
            $where .= ' and ' . $campo . ' = "' . $valor . '"';
        }


        $sql.=$where;

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $newEstadoPedido = new estadospedido();
            $newEstadoPedido->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newEstadoPedido->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $newEstadoPedido;
        }
        return $lista;
    }

    function gets() {

        $sql = 'SELECT * from EstadosPedidoPM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $newEstadoPedido = new estadospedido();
            $newEstadoPedido->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $newEstadoPedido->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $newEstadoPedido;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from EstadosPedidoPM WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }

    function update($newEstadoPedido) {

        $EstadoPedido = $newEstadoPedido;

        $querty = "UPDATE
                    EstadosPedidoPM
                    SET
						Nombre =
                        \"" . $EstadoPedido->getNombre() . "\"						
                       
                    WHERE ID =
                    " . $EstadoPedido->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateModulos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

        $sql = 'select count(*) from EstadosPedidoPM;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

}

?>