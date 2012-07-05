<?php



class materialesVegetalesDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newMaterialesVegetales) {


        $querty = "insert into MaterialesVegetales
                    (IDTipoMaterialVegetal, Codigo, Nombre, Descripcion, Habilitado)
                    values(
                    \"" . $newMaterialesVegetales->getIdTipoMaterialVegetal() . "\",
                    \"" . $newMaterialesVegetales->getCodigo() . "\",
                    \"" . $newMaterialesVegetales->getNombre() . "\",
                    \"" . $newMaterialesVegetales->getDescripcion() . "\",
                    \"" . $newMaterialesVegetales->getHabilitado() . "\"
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveMaterialesVegetales): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from MaterialesVegetales WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $MaterialesVegetales = new materialesVegetales();
        $MaterialesVegetales->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setIdTipoMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $MaterialesVegetales;
    }

    function getById($id) {

        $sql = 'SELECT * from MaterialesVegetales WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $MaterialesVegetales = new materialesVegetales();
        $MaterialesVegetales->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setIdTipoMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $MaterialesVegetales;
    }

    function gets() {

        $sql = 'SELECT * from MaterialesVegetales';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $MaterialesVegetales = new materialesVegetales();
        $MaterialesVegetales->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setIdTipoMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $MaterialesVegetales;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from MaterialesVegetales WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }


    function update($newMaterialesVegetales) {

        $MaterialesVegetales = $newMaterialesVegetales;

        $querty = "UPDATE
                    MaterialesVegetales
                    SET
						IDTipoMaterialVegetal = 
						\"" . $MaterialesVegetales->getIdTipoMaterialVegetal() . "\",
                        Codigo =
                        \"" . $MaterialesVegetales->getCodigo() . "\",
                        Nombre =
                        \"" . $MaterialesVegetales->getNombre() . "\",
                        Descripcion =
                        \"" . $MaterialesVegetales->getDescripcion() . "\",
                        Habilitado =
                        \"" . $MaterialesVegetales->getHabilitado() . "\"

                    WHERE ID =
                    " . $MaterialesVegetales->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateMaterialesVegetales): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from MaterialesVegetales;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

        function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from MaterialesVegetales ';
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
        $MaterialesVegetales = new materialesVegetales();
        $MaterialesVegetales->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setIdTipoMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $MaterialesVegetales->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $MaterialesVegetales;
        }
        return $lista;
	}


}

?>