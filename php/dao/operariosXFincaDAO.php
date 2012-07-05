<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class operariosXFincaDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newOperariosXFinca) {


        $querty = "insert into OperariosXFinca
                    (IDFinca, IDOperario)
                    values(
                    \"" . $newOperariosXFinca->getIdFinca() . "\",
                    \"" . $newOperariosXFinca->getIdOperario() . "\"
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveOperariosXFinca): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }
	
	function Confirmas($finca,$operario){
		$sql = 'SELECT * from OperariosXFinca WHERE IDFinca = "' . $finca . '" and  IDOperario = "' . $operario . '"';
		
        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return false;
        }else{
			return true;
		}	
	}

    function getById($id) {

        $sql = 'SELECT * from OperariosXFinca WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $OperariosXFinca = new operariosXFinca();
        $OperariosXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $OperariosXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $OperariosXFinca->setIdOperario($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $OperariosXFinca;
    }

    function gets() {

        $sql = 'SELECT * from OperariosXFinca';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $OperariosXFinca = new operariosXFinca();
            $OperariosXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $OperariosXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $OperariosXFinca->setIdOperario($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $OperariosXFinca;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from OperariosXFinca WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }
	
	function deletebyfinca($finca){
	 $sql = 'Delete from OperariosXFinca WHERE IDFinca = ' . $finca . ' ';
        $this->daoConnection->consulta($sql);
    }


    function update($newOperariosXFinca) {

        $OperariosXFinca = $newOperariosXFinca;

        $querty = "UPDATE
                    OperariosXFinca
                    SET

                        IDFinca =
                        \"" . $OperariosXFinca->getIdFinca() . "\",
                        IDOperario =
                        \"" . $OperariosXFinca->getIdOperario() . "\"

                    WHERE ID =
                    " . $OperariosXFinca->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateOperariosXFinca): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from OperariosXFinca;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

      function getsbybuscar($finca,$campo,$tipob,$valor){
	$sql = 'SELECT * from OperariosXFinca ';
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
            $OperariosXFinca = new operariosXFinca();
            $OperariosXFinca->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $OperariosXFinca->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $OperariosXFinca->setIdOperario($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $OperariosXFinca;
        }
        return $lista;
	}



}

?>