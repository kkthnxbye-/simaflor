<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */
// Clase dao
class configuracionxmoduloDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newconfiguracionxmodulo) {


        $querty = "INSERT INTO ConfiguracionXModulo
                    (IDModulo, IDTipoParametro, Valor) VALUES (
					\"" . $newconfiguracionxmodulo->getIdModulo() . "\",
					\"" . $newconfiguracionxmodulo->getIdTipoParametro() . "\",
					\"" . $newconfiguracionxmodulo->getValor() . "\"								
					)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveModulos): ' . mysql_error() . '<br>' . $querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'SELECT MAX(ID) FROM ConfiguracionXModulo';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getById($id) {

        $sql = 'SELECT ID, IDModulo, IDTipoParametro, Valor FROM ConfiguracionXModulo WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;

        $configuracionxmodulo = new configuracionxmodulo();
        $configuracionxmodulo->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionxmodulo->setIdModulo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionxmodulo->setIdTipoParametro($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionxmodulo->setValor($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $configuracionxmodulo;
    }

    function gets() {

        $sql = 'SELECT ID, IDModulo, IDTipoParametro, Valor from ConfiguracionXModulo';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;

            $configuracionxmodulo = new configuracionxmodulo();
            $configuracionxmodulo->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxmodulo->setIdModulo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxmodulo->setIdTipoParametro($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxmodulo->setValor($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $configuracionxmodulo;
        }
        return $lista;
    }

    function getsbybuscar($bloque, $campo, $tipob, $valor) {
        $sql = "SELECT 
			ConfModulo.ID, 
			Modulo.Nombre, 
			TiposParametro.Nombre, 
			ConfModulo.Valor		
			FROM configuracionxmodulo AS ConfModulo	
			JOIN Modulos AS Modulo ON Modulo.ID = ConfModulo.IDModulo 
			JOIN TiposParametros AS TiposParametro ON TiposParametro.ID = ConfModulo.IDTipoParametro";

        $where = " where 1=1 and ConfModulo.IDModulo = $bloque";
        if ($campo == "todos") {
            if ($tipob == "parte") {
                $where .= " and (ConfModulo.Valor LIKE '%$valor%' OR TiposParametro.Nombre LIKE '%$valor%')";
            } else {
                $where .= " and (ConfModulo.Valor = '$valor' OR TiposParametro.Nombre= '$valor')";
            }
        } else {
            if ($tipob == "parte") {

                // Si es un filtrado por campo con operador 'Por Ocurrencia'
                if ($campo == "IDModulo") {
                    // print '<div id="t-debugger" style="background: #CCC; width: 500px; height: 500px;">Debbugger DIV</div>';
                    $where .= " AND Modulo.Nombre LIKE '%$valor%'";
                } elseif ($campo == "IDTipoParametro") {
                    $where .= " AND TiposParametro.Nombre LIKE '%$valor%'";
                } else {
                    $where .= " AND ConfModulo.$campo LIKE '%$valor%'";
                }
            } else {

                // Si es un filtrado por campo con operador 'Exacto'
                if ($campo == "IDModulo") {
                    $where .= " AND Modulo.Nombre = '$valor'";
                } elseif ($campo == "IDTipoParametro") {
                    $where .= " AND TiposParametro.Nombre = '$valor'";
                } else {
                    $where .= " AND ConfModulo.$campo = '$valor'";
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

            $configuracionxmodulo = new configuracionxmodulo();

            $configuracionxmodulo->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxmodulo->setIdModulo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxmodulo->setIdTipoParametro($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxmodulo->setValor($this->daoConnection->ObjetoConsulta2[$i][$j++]);


            $lista[$i] = $configuracionxmodulo;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from ConfiguracionXModulo WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }

    function update($newconfiguracionxmodulo) {

        $configuracionxmodulo = $newconfiguracionxmodulo;

         $querty = "UPDATE
                    ConfiguracionXModulo
                    SET
						IDModulo =
                        \"" . $configuracionxmodulo->getIdModulo() . "\",
						IDTipoParametro =
                        \"" . $configuracionxmodulo->getIdTipoParametro() . "\",
						Valor =
                        \"" . $configuracionxmodulo->getValor() . "\"                       
                    WHERE ID =
                    " . $configuracionxmodulo->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateModulos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

        $sql = 'select count(*) from ConfiguracionXModulo;';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

}

?>