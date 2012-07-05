<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */

class opcionesDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newOpciones) {


        $querty = "insert into Opciones
                    (IDModulo, Nombre, UrlMenu, RutaArchivoAyuda, ValidarFinca, ValidarRolFinca)
                    values(
                    \"" . $newOpciones->getIdModulo() . "\",
                    \"" . $newOpciones->getNombre() . "\",
                    \"" . $newOpciones->getUrlMenu() . "\",
                    \"" . $newOpciones->getRutaArchivoAyuda() . "\",
                    \"" . $newOpciones->getValidarFinca() . "\",
                    \"" . $newOpciones->getValidarRolFinca() . "\"
	)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveOpciones): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'SELECT max(id) from Opciones';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();
        
        if($numregistros == 0){
           return 0;
        }else{
           return $this->daoConnection->ObjetoConsulta2[0][0];
        }
        
    }

	function getByUrl($url){
		$sql = 'SELECT * from Opciones WHERE UrlMenu like "%' . $url . '%" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $opcion = new opciones();
        $opcion->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setIdModulo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setUrlMenu($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setRutaArchivoAyuda($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setValidarFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setValidarRolFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $opcion;
	}

    function getById($id) {

        $sql = 'SELECT * from Opciones WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $opcion = new opciones();
        $opcion->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setIdModulo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setUrlMenu($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setRutaArchivoAyuda($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setValidarFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setValidarRolFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $opcion;
    }

    function gets() {

        $sql = 'SELECT * from Opciones order by IDModulo';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $opcion = new opciones();
        $opcion->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setIdModulo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setUrlMenu($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setRutaArchivoAyuda($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setValidarFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setValidarRolFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $opcion;
        }
        return $lista;
    }
    
    function getByModulo($id) {

        $sql = 'SELECT * from Opciones WHERE IDmodulo ='.$id.' ORDER BY orden ASC';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $opcion = new opciones();
        $opcion->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setIdModulo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setUrlMenu($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setRutaArchivoAyuda($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setValidarFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setValidarRolFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $opcion;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from Opciones WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }


    function update($newopcion) {

        $opcion = $newopcion;

        $querty = "UPDATE
                    Opciones
                    SET
                        IDModulo =
                        \"" . $opcion->getIdModulo() . "\",
                        Nombre =
                        \"" . $opcion->getNombre() . "\",
                        UrlMenu =
                        \"" . $opcion->getUrlMenu() . "\",
                        RutaArchivoAyuda =
                        \"" . $opcion->getRutaArchivoAyuda() . "\",
                        ValidarFinca =
                        \"" . $opcion->getValidarFinca() . "\",
                        ValidarRolFinca =
                        \"" . $opcion->getValidarRolFinca() . "\"

                    WHERE ID =
                    " . $opcion->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateOpciones): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from Opciones;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

     function getsbybuscar($modulo,$campo,$tipob,$valor){
	$sql = 'SELECT * from Opciones ';
	$where = ' where 1=1 and IDModulo = '.$modulo.' ';
	if ($campo == "todos"){

		if ($tipob == "parte"){
			$where .= ' and (Nombre LIKE "%'.$valor.'%" OR UrlMenu LIKE "%'.$valor.'%")';
		}else{
			$where .= ' and (Nombre= "'.$valor.'" OR UrlMenu = "'.$valor.'")';
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
        $opcion = new opciones();
        $opcion->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setIdModulo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setUrlMenu($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setRutaArchivoAyuda($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setValidarFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $opcion->setValidarRolFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $opcion;
        }
        return $lista;
	}


}

?>