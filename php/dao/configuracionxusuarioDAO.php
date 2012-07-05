<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */
// Clase dao
class configuracionxusuarioDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newconfiguracionxusuario) {


        $querty = "INSERT INTO ConfiguracionXUsuario
                    (IDUsuario, IDTipoConfiguracionUsuario, Valor) VALUES (
					\"" . $newconfiguracionxusuario->getIdUsuario() . "\",
					\"" . $newconfiguracionxusuario->getIdTipoConfUsuario() . "\",
					\"" . $newconfiguracionxusuario->getValor() . "\"								
					)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveUsuarios): ' . mysql_error() . '<br>' . $querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'SELECT MAX(ID) FROM ConfiguracionXUsuario';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getById($id) {

        $sql = 'SELECT ID, IDUsuario, IDTipoConfiguracionUsuario, Valor FROM ConfiguracionXUsuario WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;

        $configuracionxusuario = new configuracionxusuario();
        $configuracionxusuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionxusuario->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionxusuario->setIdTipoConfUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionxusuario->setValor($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $configuracionxusuario;
    }

    function gets() {

        $sql = 'SELECT ID, IDUsuario, IDTipoConfiguracionUsuario, Valor from ConfiguracionXUsuario';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;

            $configuracionxusuario = new configuracionxusuario();
            $configuracionxusuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxusuario->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxusuario->setIdTipoConfUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxusuario->setValor($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $configuracionxusuario;
        }
        return $lista;
    }

    function getsbybuscar($bloque, $campo, $tipob, $valor) {
        $sql = 'SELECT 
			ConfUsuario.ID, 
			Usuario.Nombre, 
			TiposParametro.Nombre, 
			ConfUsuario.Valor		
			FROM configuracionxusuario AS ConfUsuario	
			JOIN Usuarios AS Usuario ON Usuario.ID = ConfUsuario.IDUsuario 
			JOIN TiposConfiguracionUsuario AS TiposParametro ON TiposParametro.ID = ConfUsuario.IDTipoConfiguracionUsuario';

        $where = ' where 1=1 and ConfUsuario.IDUsuario = ' . $bloque . ' ';
        if ($campo == "todos") {
            if ($tipob == "parte") {
                $where .= ' and (ConfUsuario.Valor LIKE "%' . $valor . '%" OR TiposParametro.Nombre LIKE "%' . $valor . '%")';
            } else {
                $where .= ' and (ConfUsuario.Valor = "' . $valor . '" OR TiposParametro.Nombre= "' . $valor . '")';
            }
        } else {
            if ($tipob == "parte") {

                // Si es un filtrado por campo con operador 'Por Ocurrencia'
                if ($campo == "IDUsuario") {
                    // print '<div id="t-debugger" style="background: #CCC; width: 500px; height: 500px;">Debbugger DIV</div>';
                    $where .= ' AND Usuario.Nombre LIKE "%' . $valor . '%"';
                } elseif ($campo == "IDTipoConfiguracionUsuario") {
                    $where .= ' AND TiposParametro.Nombre LIKE "%' . $valor . '%"';
                } else {
                    $where .= ' AND ConfUsuario.' . $campo . ' LIKE "%' . $valor . '%"';
                }
            } else {

                // Si es un filtrado por campo con operador 'Exacto'
                if ($campo == "IDUsuario") {
                    $where .= ' AND Usuario.Nombre = "' . $valor . '"';
                } elseif ($campo == "IDTipoConfiguracionUsuario") {
                    $where .= ' AND TiposParametro.Nombre = "' . $valor . '"';
                } else {
                    $where .= ' AND ConfUsuario.' . $campo . ' = "' . $valor . '"';
                }
            }
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

            $configuracionxusuario = new configuracionxusuario();

            $configuracionxusuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxusuario->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxusuario->setIdTipoConfUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxusuario->setValor($this->daoConnection->ObjetoConsulta2[$i][$j++]);


            $lista[$i] = $configuracionxusuario;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from ConfiguracionXUsuario WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }

    function update($newconfiguracionxusuario) {

        $configuracionxusuario = $newconfiguracionxusuario;

        $querty = "UPDATE
                    ConfiguracionXUsuario
                    SET
						IDUsuario =
                        \"" . $configuracionxusuario->getIdUsuario() . "\",
						IDTipoConfiguracionUsuario =
                        \"" . $configuracionxusuario->getIdTipoConfUsuario() . "\",
						Valor =
                        \"" . $configuracionxusuario->getValor() . "\"                       
                    WHERE ID =
                    " . $configuracionxusuario->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateUsuarios): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

        $sql = 'select count(*) from ConfiguracionXUsuario;';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

}

?>