<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class productosDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newProductos) {


        $querty = "insert into Productos
                    (IDFamilia, Codigo, Nombre, Descripcion, Habilitado)
                    values(
                    \"" . $newProductos->getIdFamilia() . "\",
                    \"" . $newProductos->getCodigo() . "\",
                    \"" . $newProductos->getNombre() . "\",
                    \"" . $newProductos->getDescripcion() . "\",
                    \"" . $newProductos->getHabilitado() . "\"
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveProductos): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from Productos WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $Productos = new productos();
        $Productos->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Productos->setIdFamilia($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Productos->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Productos->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Productos->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Productos->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $Productos;
    }

    function getById($id) {

        $sql = 'SELECT * from Productos WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $Productos = new productos();
        $Productos->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Productos->setIdFamilia($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Productos->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Productos->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Productos->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Productos->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $Productos;
    }

    function gets() {

        $sql = 'SELECT * from Productos';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $Productos = new productos();
            $Productos->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Productos->setIdFamilia($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Productos->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Productos->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Productos->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Productos->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $Productos;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from Productos WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }


    function update($newProductos) {

        $Productos = $newProductos;

        $querty = "UPDATE
                    Productos
                    SET

                        IDFamilia =
                        \"" . $Productos->getIdFamilia() . "\",
                        Codigo =
                        \"" . $Productos->getCodigo() . "\",
                        Nombre =
                        \"" . $Productos->getNombre() . "\",
                        Descripcion =
                        \"" . $Productos->getDescripcion() . "\",
                        Habilitado =
                        \"" . $Productos->getHabilitado() . "\"

                    WHERE ID =
                    " . $Productos->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateProductos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from Productos;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
    function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from Productos ';
	$where = ' where 1=1 ';
      if($valor != ""){
	if ($campo == "todos"){

		if ($tipob == "parte"){
			$where .= ' and (Codigo LIKE "%'.$valor.'%" OR Nombre LIKE "%'.$valor.'%" OR Descripcion LIKE "%'.$valor.'%")';
		}else{
			$where .= ' and (Codigo = "'.$valor.'" OR Nombre= "'.$valor.'" OR Descripcion = "'.$valor.'")';
		}
	}else{
		if ($tipob == "parte"){
			$where .= ' and '.$campo.' LIKE "%'.$valor.'%"';
		}else{
			$where .= ' and '.$campo.' = "'.$valor.'"';
		}

	}}
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
            $Productos = new productos();
            $Productos->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Productos->setIdFamilia($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Productos->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Productos->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Productos->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $Productos->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $Productos;
        }
        return $lista;
	}


}

?>