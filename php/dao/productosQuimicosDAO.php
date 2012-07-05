<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class productosQuimicosDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newProductosQuimicos) {


        $querty = "insert into ProductosQuimicos
                    (Codigo, Nombre, Descripcion, Foto, IDMetrica, Habilitado)
                    values(
                    \"" . $newProductosQuimicos->getCodigo() . "\",
                    \"" . $newProductosQuimicos->getNombre() . "\",
                    \"" . $newProductosQuimicos->getDescripcion() . "\",
                    \"" . $newProductosQuimicos->getFoto() . "\",
                    \"" . $newProductosQuimicos->getUnidad() . "\",
                    \"" . $newProductosQuimicos->getHabilitado() . "\"
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveProductosQuimicos): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from ProductosQuimicos WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $productoQuimico = new productosQuimicos();
        $productoQuimico->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $productoQuimico->setUnidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $productoQuimico->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $productoQuimico->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $productoQuimico->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $productoQuimico->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $productoQuimico->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $productoQuimico;
    }
    
    
    function getByCode($code) {

        $sql = 'SELECT * from ProductosQuimicos WHERE codigo = "' . $code . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $productoQuimico = new productosQuimicos();
        $productoQuimico->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $productoQuimico->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $productoQuimico->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $productoQuimico->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $productoQuimico->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $productoQuimico->setUnidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $productoQuimico->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $productoQuimico;
    }

    function gets() {

        $sql = 'SELECT * from ProductosQuimicos ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $productoQuimico = new productosQuimicos();
            $productoQuimico->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $productoQuimico->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $productoQuimico->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $productoQuimico->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $productoQuimico->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $productoQuimico->setUnidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $productoQuimico->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $productoQuimico;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from ProductosQuimicos WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }


    function update($newproductoQuimico) {

        $productoQuimico = $newproductoQuimico;

        $querty = "UPDATE
                    ProductosQuimicos
                    SET

                        Codigo =
                        \"" . $productoQuimico->getCodigo() . "\",
                        Nombre =
                        \"" . $productoQuimico->getNombre() . "\",
                        Descripcion =
                        \"" . $productoQuimico->getDescripcion() . "\",
                        Foto =
                        \"" . $productoQuimico->getFoto() . "\",
                        IDMetrica =
                        \"" . $productoQuimico->getUnidad() . "\",
                        Habilitado =
                        \"" . $productoQuimico->getHabilitado() . "\"

                    WHERE ID =
                    " . $productoQuimico->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateProductosQuimicos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from ProductosQuimicos;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

        function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from ProductosQuimicos ';
	$where = ' where 1=1 ';
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
            $productoQuimico = new productosQuimicos();
            $productoQuimico->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $productoQuimico->setUnidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $productoQuimico->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $productoQuimico->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $productoQuimico->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $productoQuimico->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            
            $productoQuimico->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $productoQuimico;
        }
        return $lista;
	}



}

?>