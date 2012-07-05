<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */
class UsuariosDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newusuario) {


        $querty = "insert into Usuarios
                    (IDGrupoUsuario,Login,Contrasena, Nombre, Email, Telefono, Habilitado)
                    values(
                    \"" . ($newusuario->getIdGrupoUsuario()) . "\",
                    \"" . ($newusuario->getLogin()) . "\",
                    \"" . ($newusuario->getContrasena()) . "\",
                    \"" . ($newusuario->getNombre()) . "\",    
                    \"" . ($newusuario->getEmail()) . "\",
                    \"" . ($newusuario->getTelefono()) . "\",
                    \"" . ($newusuario->getHabilitado()) . "\"
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (savereserva): ' . mysql_error() . '<br>' . $querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

    function getById($id) {

        $sql = 'SELECT * from Usuarios WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $usuario = new usuarios;
        $usuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $usuario->setIdGrupoUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $usuario->setLogin($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $usuario->setContrasena($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $usuario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $usuario->setEmail($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $usuario->setTelefono($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $usuario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $usuario;
    }

    function getUserByLogin($login) {

        $sql = 'SELECT * from Usuarios WHERE Login = "' . $login . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $usuario = new usuarios;
        $usuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $usuario->setIdGrupoUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $usuario->setLogin($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $usuario->setContrasena($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $usuario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $usuario->setEmail($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $usuario->setTelefono($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $usuario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $usuario;
    }

    function gets($campo, $tipob, $valor) {

        $sql = "SELECT * from Usuarios";
        $where = ' where 1=1 ';

        if ($valor != "") {
            if ($campo == "todos") {

                if ($tipob == "parte") {
                    $where .= ' and (Login LIKE "%' . $valor . '%" OR Nombre LIKE "%' . $valor . '%" OR Email LIKE "%' . $valor . '%")';
                } else {
                    $where .= ' and (Login = "' . $valor . '" OR Nombre= "' . $valor . '" OR Email = "' . $valor . '")';
                }
            } else {
                if ($tipob == "parte") {
                    $where .= ' and ' . $campo . ' LIKE "%' . $valor . '%"';
                } else {
                    $where .= ' and ' . $campo . ' = "' . $valor . '"';
                }
            }
        }
        $sql.=$where;

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return null;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $usuario = new usuarios;
            $usuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $usuario->setIdGrupoUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $usuario->setLogin($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $usuario->setContrasena($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $usuario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $usuario->setEmail($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $usuario->setTelefono($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $usuario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $usuario;
        }
        return $lista;
    }

    function getsbygrupo($grupo) {

        $sql = 'SELECT * from Usuarios where IDGrupoUsuario = ' . $grupo;

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $usuario = new usuarios;
            $usuario->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $usuario->setIdGrupoUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $usuario->setLogin($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $usuario->setContrasena($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $usuario->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $usuario->setEmail($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $usuario->setTelefono($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $usuario->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $usuario;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from Usuarios WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }

    function update($usuario) {

        $querty = "UPDATE
                    Usuarios
                    SET
						IDGrupoUsuario =
                        \"" . ($usuario->getIdGrupoUsuario()) . "\",
                        Login =
                        \"" . ($usuario->getLogin()) . "\",
						Contrasena =
                        \"" . ($usuario->getContrasena()) . "\",
                        Nombre =
                        \"" . ($usuario->getNombre()) . "\",
                        Email =
                        \"" . ($usuario->getEmail()) . "\",
						Telefono =
                        \"" . ($usuario->getTelefono()) . "\",
                        Habilitado =
                        \"" . ($usuario->getHabilitado()) . "\"  
                                                    
                    WHERE ID =
                    " . ($usuario->getId()) . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updatereserva): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total($campo, $tipob, $valor) {



        $sql = "SELECT count(*) from Usuarios";
        $where = ' where 1=1 ';

        if ($campo == "") {
            if ($campo == "todos") {

                if ($tipob == "parte") {
                    $where .= ' and (Login LIKE "%' . $valor . '%" OR Nombre LIKE "%' . $valor . '%" OR Email LIKE "%' . $valor . '%")';
                } else {
                    $where .= ' and (Login = "' . $valor . '" OR Nombre= "' . $valor . '" OR Email = "' . $valor . '")';
                }
            } else {
                if ($tipob == "parte") {
                    $where .= ' and ' . $campo . ' LIKE "%' . $valor . '%"';
                } else {
                    $where .= ' and ' . $campo . ' = "' . $valor . '"';
                }
            }
        }
        $sql.=$where;


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

}

?>