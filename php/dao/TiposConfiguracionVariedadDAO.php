<?php
class TiposConfiguracionVariedadDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newTiposConfiguracionVariedad) {
        $TiposConfiguracionVariedad = new TiposConfiguracionVariedad();
        $TiposConfiguracionVariedad = $newTiposConfiguracionVariedad;
        $sql = "insert into TiposConfiguracionVariedad
                    (Codigo,Nombre,Descripcion,Habilitado)
                    values(
                    '" . $TiposConfiguracionVariedad->getCodigo() . "',
					'" . $TiposConfiguracionVariedad->getNombre() . "',
					'" . $TiposConfiguracionVariedad->getDescripcion() . "',
                     " . $TiposConfiguracionVariedad->getHabilitado() . "                       
	)";

        $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (saveTiposConfiguracionVariedad): <br>' . $sql;
            return false;
        }

        return true;
    }
    

    

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

	function getByCodigo($id) {

        $sql = 'SELECT * from TiposConfiguracionVariedad WHERE Codigo = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposConfiguracionVariedad = new TiposConfiguracionVariedad();
        $TiposConfiguracionVariedad->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionVariedad->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionVariedad->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionVariedad->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionVariedad->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposConfiguracionVariedad;
    }

    function getById($id) {

        $sql = 'SELECT * from TiposConfiguracionVariedad WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $TiposConfiguracionVariedad = new TiposConfiguracionVariedad();
        $TiposConfiguracionVariedad->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionVariedad->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionVariedad->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionVariedad->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionVariedad->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $TiposConfiguracionVariedad;
    }

    function gets($campo, $tipoBusqueda, $valor) {

        $sql = 'SELECT * from TiposConfiguracionVariedad ';

        if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where Codigo like '%" . $valor . "%' or Nombre like '%" . $valor . "%' or Descripcion like '%" . $valor . "%'";
            }
            if ($campo == 'todos' && $tipoBusqueda == 'exactas') {
                $sql .= " where Codigo = '" . $valor . "' or Nombre = '" . $valor . "' or Descripcion = '" . $valor . "'";
            }
            if ($campo != 'todos') {
                if ($tipoBusqueda == 'ocurrencias') {
                    $sql .= " where " . $campo . " like '%" . $valor . "%'";
                } else {
                    $sql .= " where " . $campo . " = '" . $valor . "'";
                }
            }
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
            $TiposConfiguracionVariedad = new TiposConfiguracionVariedad();
            $TiposConfiguracionVariedad->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposConfiguracionVariedad->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposConfiguracionVariedad->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposConfiguracionVariedad->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $TiposConfiguracionVariedad->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $TiposConfiguracionVariedad;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from TiposConfiguracionVariedad WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }

    function update($newTiposConfiguracionVariedad) {
        $TiposConfiguracionVariedad = new TiposConfiguracionVariedad();
        $TiposConfiguracionVariedad = $newTiposConfiguracionVariedad;

        $sql = "UPDATE
                    TiposConfiguracionVariedad
                    SET
                        Codigo =
                        \"" . $TiposConfiguracionVariedad->getCodigo() . "\",
                        Nombre =
                        \"" . $TiposConfiguracionVariedad->getNombre() . "\",
                       Descripcion =
                       \"" . $TiposConfiguracionVariedad->getDescripcion() . "\",
                       Habilitado =
                        \"" . $TiposConfiguracionVariedad->getHabilitado() . "\"
                    WHERE ID =
                    " . $TiposConfiguracionVariedad->getId() . "
                    ";
        $result = $this->daoConnection->consulta($sql);
        ;
        if (!$result) {
            echo 'Ooops (updateTiposConfiguracionVariedad): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total($campo, $tipoBusqueda, $valor) {

        $sql = 'select count(*) from TiposConfiguracionVariedad ';
        if ($campo != '' && $tipoBusqueda != '' && $valor != '') {
            if ($campo == 'todos' && $tipoBusqueda == 'ocurrencias') {
                $sql .= " where Codigo like '%" . $valor . "%' or Nombre like '%" . $valor . "%' or Descripcion like '%" . $valor . "%'";
            }
            if ($campo == 'todos' && $tipoBusqueda == 'exactas') {
                $sql .= " where Codigo = '" . $valor . "' or Nombre = '" . $valor . "' or Descripcion = '" . $valor . "'";
            }
            if ($campo != 'todos') {
                if ($tipoBusqueda == 'ocurrencias') {
                    $sql .= "where " . $campo . " like '%" . $valor . "%'";
                } else {
                    $sql .= "where " . $campo . " = '" . $valor . "'";
                }
            }
        }

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
    
    
        
    	function getListNoRepeat($idVariedad) {

        $sql = "SELECT * FROM TiposConfiguracionVariedad 
                WHERE TiposConfiguracionVariedad.ID 
                NOT IN(
                SELECT IDTipoConfiguracionVariedad FROM ConfiguracionXVariedad 
                WHERE IDVariedad = $idVariedad)";
        
        
        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return null;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            
        $TiposConfiguracionVariedad = new TiposConfiguracionVariedad();
        $TiposConfiguracionVariedad->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionVariedad->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionVariedad->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionVariedad->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $TiposConfiguracionVariedad->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $lista[$i] = $TiposConfiguracionVariedad;
        }
        return $lista;
    }

}
?>
