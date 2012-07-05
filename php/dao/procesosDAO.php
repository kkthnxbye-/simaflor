<?php



class procesosDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newProcesos) {


        $querty = "insert into Procesos
                    (Codigo, Nombre, Descripcion, Habilitado)
                    values(
                    \"" . $newProcesos->getCodigo() . "\",
                    \"" . $newProcesos->getNombre() . "\",
                    \"" . $newProcesos->getDescripcion() . "\",
                    \"" . $newProcesos->getHabilitado() . "\"
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveProcesos): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from Procesos WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $Procesos = new procesos();
        $Procesos->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Procesos->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Procesos->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Procesos->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Procesos->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $Procesos;
    }

    function getById($id) {

        $sql = 'SELECT * from Procesos WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $Procesos = new procesos();
        $Procesos->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Procesos->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Procesos->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Procesos->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Procesos->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $Procesos;
    }

    function gets() {

        $sql = 'SELECT * from Procesos';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $Procesos = new procesos();
        $Procesos->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Procesos->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Procesos->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Procesos->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Procesos->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $Procesos;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from Procesos WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }


    function update($newProcesos) {

        $Procesos = $newProcesos;

        $querty = "UPDATE
                    Procesos
                    SET

                        Codigo =
                        \"" . $Procesos->getCodigo() . "\",
                        Nombre =
                        \"" . $Procesos->getNombre() . "\",
                        Descripcion =
                        \"" . $Procesos->getDescripcion() . "\",
                        Habilitado =
                        \"" . $Procesos->getHabilitado() . "\"

                    WHERE ID =
                    " . $Procesos->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateProcesos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from Procesos;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from Procesos ';
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
        $Procesos = new procesos();
        $Procesos->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Procesos->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Procesos->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Procesos->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Procesos->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $Procesos;
        }
        return $lista;
	}


}

?>