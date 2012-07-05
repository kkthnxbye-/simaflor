<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class gruposUsuarioDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newgruposUsuario) {


        $querty = "insert into GruposUsuario
                    (Nombre, Descripcion)
                    values(
                    \"" . $newgruposUsuario->getNombre() . "\",
                    \"" . $newgruposUsuario->getDescripcion() . "\"
	)";

         $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (savegruposusuario): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from GruposUsuario WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $gruposUsuario = new gruposUsuario();
        $gruposUsuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposUsuario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposUsuario->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $gruposUsuario;
    }

    function gets() {

        $sql = 'SELECT * from GruposUsuario';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $gruposUsuario = new gruposUsuario();
        $gruposUsuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposUsuario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposUsuario->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $gruposUsuario;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from GruposUsuario WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
        
        
    }


    function update($newgruposUsuario) {

        $gruposUsuario = $newgruposUsuario;

        $querty = "UPDATE
                    GruposUsuario
                    SET

                        Nombre =
                        \"" . $gruposUsuario->getNombre() . "\",
                        Descripcion =
                        \"" . $gruposUsuario->getDescripcion() . "\"

                    WHERE ID =
                    " . $gruposUsuario->getId() . "
                    ";
         $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updategruposUsuario): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from GruposUsuario;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
    function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from GruposUsuario ';
	$where = ' where 1=1 ';
	if ($campo == "todos"){

		if ($tipob == "parte"){
			$where .= ' and (Nombre LIKE "%'.$valor.'%" OR Descripcion LIKE "%'.$valor.'%")';
		}else{
			$where .= ' and (Nombre= "'.$valor.'" OR Descripcion = "'.$valor.'")';
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
        $gruposUsuario = new gruposUsuario();
        $gruposUsuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposUsuario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $gruposUsuario->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $gruposUsuario;
        }
        return $lista;
	}

}

?>