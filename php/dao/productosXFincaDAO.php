<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class productosXFincaDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newProductosXFinca) {


        $querty = "insert into ProductosXFinca
                    (IDFinca, IDProducto)
                    values(
                    \"" . $newProductosXFinca->getIdFinca() . "\",
                    \"" . $newProductosXFinca->getIdProducto() . "\"
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveProductosXFinca): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from ProductosXFinca WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $ProductosXFinca = new productosXFinca();
        $ProductosXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $ProductosXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $ProductosXFinca->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $ProductosXFinca;
    }

    function gets() {

        $sql = 'SELECT * from ProductosXFinca';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $ProductosXFinca = new productosXFinca();
            $ProductosXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $ProductosXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $ProductosXFinca->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $ProductosXFinca;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from ProductosXFinca WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }
	
	function Confirmas($finca,$operario){
		$sql = 'SELECT * from ProductosXFinca WHERE IDFinca = "' . $finca . '" and  IDProducto = "' . $operario . '"';
		
        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return false;
        }else{
			return true;
		}	
	}
	
	function deletebyfinca($finca){
	 $sql = 'Delete from ProductosXFinca WHERE IDFinca = ' . $finca . ' ';
        $this->daoConnection->consulta($sql);
    }


    function update($newProductosXFinca) {

        $ProductosXFinca = $newProductosXFinca;

        $querty = "UPDATE
                    ProductosXFinca
                    SET

                        IDFinca =
                        \"" . $ProductosXFinca->getIdFinca() . "\",
                        IDProducto =
                        \"" . $ProductosXFinca->getIdProducto() . "\"

                    WHERE ID =
                    " . $ProductosXFinca->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateProductosXFinca): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from ProductosXFinca;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }


      function getsbybuscar($finca,$campo,$tipob,$valor){
	$sql = 'SELECT * from ProductosXFinca ';
	$where = ' where 1=1 and IDFinca = '.$finca;
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
            $ProductosXFinca = new productosXFinca();
            $ProductosXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $ProductosXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $ProductosXFinca->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $ProductosXFinca;
        }
        return $lista;
	}





}

?>