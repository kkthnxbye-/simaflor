<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class permisosXOpcionXGrupoUsuarioDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newPermisosXOpcionXGrupoUsuario) {


        $querty = "insert into PermisosXOpcionXGrupoUsuario
                    (IDGrupoUsuario, IDOpcion, PermiteConsultar, PermiteModificar)
                    values(
                    \"" . $newPermisosXOpcionXGrupoUsuario->getIdGrupoUsuario() . "\",
                    \"" . $newPermisosXOpcionXGrupoUsuario->getIdOpcion() . "\",
                    \"" . $newPermisosXOpcionXGrupoUsuario->getPermiteConsultar() . "\",
                    \"" . $newPermisosXOpcionXGrupoUsuario->getPermiteModificar() . "\"
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (savePermisosXOpcionXGrupoUsuario): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from PermisosXOpcionXGrupoUsuario WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $PermisosXOpcionXGrupoUsuario = new permisosXOpcionXGrupoUsuario();
        $PermisosXOpcionXGrupoUsuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $PermisosXOpcionXGrupoUsuario->setIdGrupoUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $PermisosXOpcionXGrupoUsuario->setIdOpcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $PermisosXOpcionXGrupoUsuario->setPermiteConsultar($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $PermisosXOpcionXGrupoUsuario->setPermiteModificar($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $PermisosXOpcionXGrupoUsuario;
    }

	function getsbygrupo($grupo){
		$sql = 'SELECT PermisosXOpcionXGrupoUsuario.* from PermisosXOpcionXGrupoUsuario 
		inner join Opciones on Opciones.ID = PermisosXOpcionXGrupoUsuario.IDOpcion
		where IDGrupoUsuario = '.$grupo.' and (PermiteConsultar=1 OR  PermiteModificar=1) order by Opciones.orden';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }
        //echo $sql;
        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $PermisosXOpcionXGrupoUsuario = new permisosXOpcionXGrupoUsuario();
            $PermisosXOpcionXGrupoUsuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $PermisosXOpcionXGrupoUsuario->setIdGrupoUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $PermisosXOpcionXGrupoUsuario->setIdOpcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $PermisosXOpcionXGrupoUsuario->setPermiteConsultar($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $PermisosXOpcionXGrupoUsuario->setPermiteModificar($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $PermisosXOpcionXGrupoUsuario;
        }
        return $lista;
	}

    function gets() {

        $sql = 'SELECT * from PermisosXOpcionXGrupoUsuario';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $PermisosXOpcionXGrupoUsuario = new permisosXOpcionXGrupoUsuario();
            $PermisosXOpcionXGrupoUsuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $PermisosXOpcionXGrupoUsuario->setIdGrupoUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $PermisosXOpcionXGrupoUsuario->setIdOpcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $PermisosXOpcionXGrupoUsuario->setPermiteConsultar($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $PermisosXOpcionXGrupoUsuario->setPermiteModificar($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $PermisosXOpcionXGrupoUsuario;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from PermisosXOpcionXGrupoUsuario WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }


    function update($newPermisosXOpcionXGrupoUsuario) {

        $PermisosXOpcionXGrupoUsuario = $newPermisosXOpcionXGrupoUsuario;

        $querty = "UPDATE
                    PermisosXOpcionXGrupoUsuario
                    SET

                        IDGrupoUsuario =
                        \"" . $PermisosXOpcionXGrupoUsuario->getIdGrupoUsuario() . "\",
                        IDOpcion =
                        \"" . $PermisosXOpcionXGrupoUsuario->getIdOpcion() . "\",
                        PermiteConsultar =
                        \"" . $PermisosXOpcionXGrupoUsuario->getPermiteConsultar() . "\",
                        PermiteModificar =
                        \"" . $PermisosXOpcionXGrupoUsuario->getPermiteModificar() . "\"

                    WHERE ID =
                    " . $PermisosXOpcionXGrupoUsuario->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updatePermisosXOpcionXGrupoUsuario): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from PermisosXOpcionXGrupoUsuario;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from PermisosXOpcionXGrupoUsuario ';
	$where = ' where 1=1 ';
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
            $PermisosXOpcionXGrupoUsuario = new permisosXOpcionXGrupoUsuario();
            $PermisosXOpcionXGrupoUsuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $PermisosXOpcionXGrupoUsuario->setIdGrupoUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $PermisosXOpcionXGrupoUsuario->setIdOpcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $PermisosXOpcionXGrupoUsuario->setPermiteConsultar($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $PermisosXOpcionXGrupoUsuario->setPermiteModificar($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $PermisosXOpcionXGrupoUsuario;
        }
        return $lista;
	}
        
        function Confirmas($grupo, $p){
		$sql = 'SELECT * from PermisosXOpcionXGrupoUsuario WHERE IDGrupoUsuario = "' . $grupo . '" and  IDOpcion = "' . $p . '"';
		
        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }else{
			$j = 0;
			$i = 0;
            $PermisosXOpcionXGrupoUsuario = new permisosXOpcionXGrupoUsuario();
            $PermisosXOpcionXGrupoUsuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $PermisosXOpcionXGrupoUsuario->setIdGrupoUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $PermisosXOpcionXGrupoUsuario->setIdOpcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $PermisosXOpcionXGrupoUsuario->setPermiteConsultar($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $PermisosXOpcionXGrupoUsuario->setPermiteModificar($this->daoConnection->ObjetoConsulta2[$i][$j++]);
			return $PermisosXOpcionXGrupoUsuario;
		}	
	}
        function deletebygrupousuario($u){
	 $sql = 'Delete from PermisosXOpcionXGrupoUsuario WHERE IDGrupoUsuario = ' . $u . ' ';
        $this->daoConnection->consulta($sql);
    }


}

?>