<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class VariedadesDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newVariedades) {
        $Variedades = new Variedades();
        $Variedades = $newVariedades;
        $querty = "insert into Variedades
                    (ID,IDProducto,IDBreeder,IDColor, Codigo, Nombre, Descripcion, Foto,Habilitado)
                    values(
                    \"" . $Variedades->getId() . "\",
                    \"" . $Variedades->getIdProducto() . "\",
                    \"" . $Variedades->getIdBreeder() . "\",
                    \"" . $Variedades->getIdColor() . "\",
                    \"" . $Variedades->getCodigo() . "\",
                    \"" . $Variedades->getNombre() . "\",
                    \"" . $Variedades->getDescripcion() . "\",
                    \"" . $Variedades->getFoto() . "\",
                    \"" . $Variedades->getHabilitado() . "\"    
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveVariedades): ' . mysql_error() . '<br>' . $querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'select MAX(ID) from Variedades;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getByCodigo($id) {

        $sql = 'SELECT * from Variedades WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $Variedades = new Variedades();
        $Variedades->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Variedades->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Variedades->setIdColor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Variedades->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Variedades->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Variedades->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Variedades->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Variedades->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $Variedades;
    }

    function getById($id) {

        $sql = 'SELECT * from Variedades WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $Variedades = new Variedades();
        $Variedades->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Variedades->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Variedades->setIdBreeder($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Variedades->setIdColor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Variedades->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Variedades->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Variedades->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Variedades->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Variedades->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $Variedades;
    }

    function gets($campo, $tipob, $valor) {

        $sql = 'SELECT * from Variedades';

        $where = ' where 1=1 ';
        if ($campo != "") {
            if ($campo == "todos") {

                if ($tipob == "ocurrencias") {
                    $where .= ' and (Codigo LIKE "%' . $valor . '%" OR Nombre LIKE "%' . $valor . '%" OR Descripcion LIKE "%' . $valor . '%")';
                } else {
                    $where .= ' and (Codigo = "' . $valor . '" OR Nombre= "' . $valor . '" OR Descripcion = "' . $valor . '")';
                }
            } else {
                if ($tipob == "ocurrencias") {
                    $where .= ' and ' . $campo . ' LIKE "%' . $valor . '%"';
                } else {
                    $where .= ' and ' . $campo . ' = "' . $valor . '"';
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
            $Variedades = new Variedades();
            $Variedades->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Variedades->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Variedades->setIdBreeder($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Variedades->setIdColor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Variedades->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Variedades->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Variedades->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Variedades->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Variedades->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $Variedades;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from Variedades WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }

    function update($newVariedades) {
        $Variedades = new Variedades();
        $Variedades = $newVariedades;

        $querty = "UPDATE
                    Variedades
                    SET
                        IDProducto =
                        \"" . $Variedades->getIdProducto() . "\",
                        IDColor =
                        \"" . $Variedades->getIdColor() . "\",
                        Codigo =
                        \"" . $Variedades->getCodigo() . "\",
                        Nombre =
                        \"" . $Variedades->getNombre() . "\",
                        Descripcion = 
                        \"" . $Variedades->getDescripcion() . "\",
                        Foto =
                        \"" . $Variedades->getFoto() . "\",
                        Habilitado =
                        \"" . $Variedades->getHabilitado() . "\"    
                    WHERE ID =
                    " . $Variedades->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateVariedades): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

        $sql = 'select count(*) from Variedades';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getVariedadesForFactura($idDoc) {

        $sql = "SELECT Variedades.ID,Variedades.IDProducto,Variedades.Nombre, MovimientosInventarioPM.Cantidad
                FROM MovimientosInventarioPM,InventariosPM,Variedades
                WHERE InventariosPM.ID = MovimientosInventarioPM.IDInventarioPM 
                AND Variedades.ID = InventariosPM.IDVariedad
                AND MovimientosInventarioPM.IDDocumentoInventarioPM = $idDoc";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $Variedades = new Variedades();
            $Variedades->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Variedades->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Variedades->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Variedades->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $Variedades;
        }
        return $lista;
    }

}

?>
