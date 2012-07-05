<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class UsuariosXEmpresaDAO{
    
    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newUsuariosXEmpresa) {
        $UsuariosXEmpresa = $newUsuariosXEmpresa;
        $querty = "insert into UsuariosXEmpresa 
                    (IDEmpresa,IDUsuario)
                    values(
                    \"" . ($UsuariosXEmpresa->getIdEmpresa()) . "\",
					\"" . ($UsuariosXEmpresa->getIdUsuario()) . "\"                       
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveUsuariosXEmpresa): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from UsuariosXEmpresa WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $UsuariosXEmpresa = new UsuariosXEmpresa();
        $UsuariosXEmpresa->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $UsuariosXEmpresa->setIdEmpresa($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $UsuariosXEmpresa->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $UsuariosXEmpresa;
    }
    
    
    function getsByUsuario($id) {

        $sql = 'SELECT * from UsuariosXEmpresa where IDUsuario = '.$id;

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $UsuariosXEmpresa = new UsuariosXEmpresa();
        $UsuariosXEmpresa->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $UsuariosXEmpresa->setIdEmpresa($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $UsuariosXEmpresa->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $UsuariosXEmpresa;
        }
        return $lista;
    }

	function Confirmas($usuario,$empresa){
		$sql = 'SELECT * from UsuariosXEmpresa WHERE IDUsuario = "' . $usuario . '" and  IDEmpresa = "' . $empresa . '"';
		
        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return false;
        }else{
			return true;
		}	
	}

    function gets() {

        $sql = 'SELECT * from UsuariosXEmpresa';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $UsuariosXEmpresa = new UsuariosXEmpresa();
        $UsuariosXEmpresa->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $UsuariosXEmpresa->setIdEmpresa($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $UsuariosXEmpresa->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $UsuariosXEmpresa;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from UsuariosXEmpresa WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }

	function deletebyusuario($id) {

        $sql = 'Delete from UsuariosXEmpresa WHERE IDUsuario = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }

    function update($newUsuariosXEmpresa) {
        $UsuariosXEmpresa = new UsuariosXEmpresa();
        $UsuariosXEmpresa = $newUsuariosXEmpresa;

        $querty = "UPDATE
                    UsuariosXEmpresa
                    SET
                        IDEmpresa =
                        \"" . ($UsuariosXEmpresa->getIdEmpresa()) . "\",
                        IDUsuario =
                        \"" . ($UsuariosXEmpresa->getIdUsuario()) . "\"
                    WHERE ID =
                    " . ($UsuariosXEmpresa->getId()) . "
                    ";
        $result = $this->daoConnection->consulta($sql);;
        if (!$result) {
            echo 'Ooops (updateUsuariosXEmpresa): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from UsuariosXEmpresa;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
}
?>