<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class productosXServicioXFincaDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newProductosXServicioXFinca) {


        $querty = "insert into ProductosXServicioPMXFinca
                    (IDFinca, IDServicioPM, IDMaterialVegetal, IDProducto)
                    values(
                    \"" . $newProductosXServicioXFinca->getIdFinca() . "\",
                    \"" . $newProductosXServicioXFinca->getIdServicio() . "\",
                    \"" . $newProductosXServicioXFinca->getIdMaterialVegetal() . "\",
                    \"" . $newProductosXServicioXFinca->getIdProducto() . "\"
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveProductosXServicioXFinca): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from ProductosXServicioPMXFinca WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $ProductosXServicioXFinca = new productosXServicioXFinca();
        $ProductosXServicioXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $ProductosXServicioXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $ProductosXServicioXFinca->setIdServicio($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $ProductosXServicioXFinca->setIdMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $ProductosXServicioXFinca->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $ProductosXServicioXFinca;
    }

    function gets() {

        $sql = 'SELECT * from ProductosXServicioPMXFinca';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $ProductosXServicioXFinca = new productosXServicioXFinca();
            $ProductosXServicioXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $ProductosXServicioXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $ProductosXServicioXFinca->setIdServicio($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $ProductosXServicioXFinca->setIdMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $ProductosXServicioXFinca->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $ProductosXServicioXFinca;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from ProductosXServicioPMXFinca WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }


    function update($newProductosXServicioXFinca) {

        $ProductosXServicioXFinca = $newProductosXServicioXFinca;

        $querty = "UPDATE
                    ProductosXServicioPMXFinca
                    SET

                        IDFinca =
                        \"" . $ProductosXServicioXFinca->getIdFinca() . "\",
                        IDServicioPM =
                        \"" . $ProductosXServicioXFinca->getIdServicio() . "\",
                        IDMaterialVegetal =
                        \"" . $ProductosXServicioXFinca->getIdMaterialVegetal() . "\",
                        IDProducto =
                        \"" . $ProductosXServicioXFinca->getIdProducto() . "\"

                    WHERE ID =
                    " . $ProductosXServicioXFinca->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateProductosXServicioXFinca): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from ProductosXServicioPMXFinca;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

       function getsbybuscar($finca,$campo,$tipob,$valor){
	$sql = 'SELECT * from ProductosXServicioPMXFinca ';
	$where = ' where 1=1 and IDFinca = '.$finca;
	$sql.=$where;
      if($valor != ""){
         $where.= " AND 1=1 ";
      }
      
      //echo $sql;
	$this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $ProductosXServicioXFinca = new productosXServicioXFinca();
            $ProductosXServicioXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $ProductosXServicioXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $ProductosXServicioXFinca->setIdServicio($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $ProductosXServicioXFinca->setIdMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $ProductosXServicioXFinca->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $ProductosXServicioXFinca;
        }
        return $lista;
	}



}

?>