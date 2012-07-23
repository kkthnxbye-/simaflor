<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */
class configuracionxvariedadDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newconfiguracionxvariedad) {


        $querty = "INSERT INTO ConfiguracionXVariedad
                    (IDVariedad, IDTipoConfiguracionVariedad, Valor) VALUES (
					\"" . $newconfiguracionxvariedad->getIdVariedad() . "\",
					\"" . $newconfiguracionxvariedad->getIdTipoConfVariedad() . "\",
					\"" . $newconfiguracionxvariedad->getValor() . "\"								
					)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveVariedads): ' . mysql_error() . '<br>' . $querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'SELECT MAX(ID) FROM ConfiguracionXVariedad';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
    
    
    

    function getById($id) {

        $sql = 'SELECT ID, IDVariedad, IDTipoConfiguracionVariedad, Valor FROM ConfiguracionXVariedad WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;

        $configuracionxvariedad = new configuracionxvariedad();
        $configuracionxvariedad->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionxvariedad->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionxvariedad->setIdTipoConfVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionxvariedad->setValor($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $configuracionxvariedad;
    }

    function gets() {

        $sql = 'SELECT ID, IDVariedad, IDTipoConfiguracionVariedad, Valor from ConfiguracionXVariedad';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;

            $configuracionxvariedad = new configuracionxvariedad();
            $configuracionxvariedad->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxvariedad->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxvariedad->setIdTipoConfVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxvariedad->setValor($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $configuracionxvariedad;
        }
        return $lista;
    }
    
    function getValorConf($IDVariedad) {
        
        $sql = "SELECT Valor FROM dbo.ConfiguracionXVariedad WHERE IDVariedad = $IDVariedad AND IDTipoConfiguracionVariedad = 1";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];;
    }
    
    
    

    function getsbybuscar($bloque, $campo, $tipob, $valor) {
        $sql = 'SELECT 
			ConfVariedad.ID, 
			Variedad.Nombre, 
			TiposVariedad.Nombre, 
			ConfVariedad.Valor		
			FROM ConfiguracionXVariedad AS ConfVariedad	
			JOIN Variedades AS Variedad ON Variedad.ID = ConfVariedad.IDVariedad 
			JOIN TiposConfiguracionVariedad AS TiposVariedad ON TiposVariedad.ID = ConfVariedad.IDTipoConfiguracionVariedad';

        $where = ' where 1=1  and ConfVariedad.IDVariedad = ' . $bloque . ' ';
        if ($campo == "todos") {
            if ($tipob == "parte") {
                $where .= ' and (ConfVariedad.Valor LIKE "%' . $valor . '%" OR TiposVariedad.Nombre LIKE "%' . $valor . '%")';
            } else {
                $where .= ' and (ConfVariedad.Valor = "' . $valor . '" OR TiposVariedad.Nombre= "' . $valor . '")';
            }
        } else {
            if ($tipob == "parte") {

                // Si es un filtrado por campo con operador 'Por Ocurrencia'
                if ($campo == "IDVariedad") {
                    // print '<div id="t-debugger" style="background: #CCC; width: 500px; height: 500px;">Debbugger DIV</div>';
                    $where .= ' AND Variedad.Nombre LIKE "%' . $valor . '%"';
                } elseif ($campo == "IDTipoConfiguracionVariedad") {
                    $where .= ' AND TiposVariedad.Nombre LIKE "%' . $valor . '%"';
                } else {
                    $where .= ' AND ConfVariedad.' . $campo . ' LIKE "%' . $valor . '%"';
                }
            } else {

                // Si es un filtrado por campo con operador 'Exacto'
                if ($campo == "IDVariedad") {
                    $where .= ' AND Variedad.Nombre = "' . $valor . '"';
                } elseif ($campo == "IDTipoConfiguracionVariedad") {
                    $where .= ' AND TiposVariedad.Nombre = "' . $valor . '"';
                } else {
                    $where .= ' AND ConfVariedad.' . $campo . ' = "' . $valor . '"';
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

            $configuracionxvariedad = new configuracionxvariedad();

            $configuracionxvariedad->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxvariedad->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxvariedad->setIdTipoConfVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxvariedad->setValor($this->daoConnection->ObjetoConsulta2[$i][$j++]);


            $lista[$i] = $configuracionxvariedad;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from ConfiguracionXVariedad WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }

    function update($newconfiguracionxvariedad) {

        $configuracionxvariedad = $newconfiguracionxvariedad;

        $querty = "UPDATE
                    ConfiguracionXVariedad
                    SET
						IDVariedad =
                        \"" . $configuracionxvariedad->getIdVariedad() . "\",
						IDTipoConfiguracionVariedad =
                        \"" . $configuracionxvariedad->getIdTipoConfVariedad() . "\",
						Valor =
                        \"" . $configuracionxvariedad->getValor() . "\"                       
                    WHERE ID =
                    " . $configuracionxvariedad->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateVariedads): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

        $sql = 'select count(*) from ConfiguracionXVariedad;';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getsDia() {
        $sql = 'SELECT ID, IDVariedad, IDTipoConfiguracionVariedad, Valor 
           from ConfiguracionXVariedad 
           WHERE IDTipoConfiguracionVariedad = 1';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;

            $configuracionxvariedad = new configuracionxvariedad();
            $configuracionxvariedad->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxvariedad->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxvariedad->setIdTipoConfVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionxvariedad->setValor($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $configuracionxvariedad;
        }
        return $lista;
    }

    function getsDiaValor($id) {

        $sql = 'SELECT * from ConfiguracionXVariedad WHERE IDTipoConfiguracionVariedad = 1 and IDVariedad =' . $id;

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        //$lista = array();
        $configuracionxvariedad = new configuracionxvariedad();
        if ($numregistros == 0) {
            return $configuracionxvariedad;
        }

        $i = 0;
        $j = 0;


        $configuracionxvariedad->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionxvariedad->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionxvariedad->setIdTipoConfVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionxvariedad->setValor($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $configuracionxvariedad;
    }

}

?>