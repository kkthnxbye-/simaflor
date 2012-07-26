<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class empresasDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newEmpresas) {


        $querty = "insert into Empresas
                    (ID,Nombre,Nit,EsProveedor,EsCliente,EsFinca,Habilitado)
                    values(
                    \"" . $newEmpresas->getId() . "\",
					\"" . $newEmpresas->getNombre() . "\",
					\"" . $newEmpresas->getNit() . "\",
					\"" . $newEmpresas->getEsProveedor() . "\",
					\"" . $newEmpresas->getEsCliente() . "\",
					\"" . $newEmpresas->getEsFinca() . "\",
					\"" . $newEmpresas->getHabilitado() . "\"					
	)";
	
	

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveModulos): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
		$sql = 'SELECT MAX(ID) from Empresas ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }
		
        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getById($id) {

        $sql = "SELECT * from Empresas WHERE ID = $id";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $Empresas = new empresas();
        $Empresas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Empresas->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setNit($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setEsProveedor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setEsCliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setEsFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $Empresas;
    }

    function gets() {

        $sql = 'SELECT * from Empresas';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $Empresas = new empresas();
        $Empresas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Empresas->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setNit($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setEsProveedor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setEsCliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setEsFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $Empresas;
        }
        return $lista;
    }

	function getsbybuscar_odst($id_usuario){
		$sql = 'SELECT * from Empresas where EsFinca = 1 and Empresas.ID = ANY(SELECT IDEmpresa from UsuariosXEmpresa where IDUsuario = '.$id_usuario.')';
		$this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $Empresas = new empresas();
        $Empresas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Empresas->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setNit($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setEsProveedor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setEsCliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setEsFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $lista[$i] = $Empresas;
        }
        return $lista;
	}
	
	function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from Empresas '; 
	$where = ' where 1=1 ';
	if ($campo == "todos"){
		
		
		if ($tipob == "parte"){
			$where .= ' and (Nombre LIKE "%'.$valor.'%" OR Nit LIKE "%'.$valor.'%")';
		}else{
			$where .= ' and (Nombre = "'.$valor.'" OR Nit= "'.$valor.'")';
		}
	}else{
		if ($tipob == "parte"){
			$where .= ' and '.$campo.' LIKE "%'.$valor.'%"';
		}else{
			$where .= ' and '.$campo.' = "'.$valor.'"';
		}
			
	}
	$sql.=$where;
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
        $Empresas = new empresas();
        $Empresas->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $Empresas->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setNit($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setEsProveedor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setEsCliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setEsFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$Empresas->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $Empresas;
        }
        return $lista;
	}

    function delete($id) {
//		$sql = 'Delete from OperariosXFinca WHERE IDFinca = ' . $id . ' ';
//            $result=$this->daoConnection->consulta($sql);
//            
//            
//            $sql0 = 'Delete from ProductosXServicioXFinca WHERE IDFinca = ' . $id . ' ';
//            $result0=$this->daoConnection->consulta($sql0);
//		
//            $sql1 = 'Delete from ProductosXFinca WHERE IDFinca = ' . $id . ' ';
//            $result1=$this->daoConnection->consulta($sql1);
//		
//            $sql2 = 'Delete from BloquesPMXFinca WHERE IDFinca = ' . $id . ' ';
//            $result2=$this->daoConnection->consulta($sql2);
//
//		$sql3 = 'Delete from ConfiguracionProveedoresXFincaPM WHERE IDFincaCliente = ' . $id . ' OR IDFincaProveedor = ' . $id . ' OR IDFincaProduccion = ' . $id . '';
//            $result3=$this->daoConnection->consulta($sql3);
//
//            $sql4 = 'Delete from UsuariosXEmpresa WHERE IDEmpresa = ' . $id . ' ';
//            $result4=$this->daoConnection->consulta($sql4);

		$sql5 = 'Delete from Empresas WHERE ID = ' . $id . ' ';
            $result5=$this->daoConnection->consulta($sql5);
            
//            if (!$result) {
//               echo 'Ooops (delete): ' . mssql_get_last_message();
//               return false;
//               }
//            if (!$result0) {
//               echo 'Ooops (delete0): ' . mssql_get_last_message();
//               return false;
//               }
//            if (!$result1) {
//               echo 'Ooops (delete1): ' . mssql_get_last_message();
//               return false;
//               }
//            if (!$result2) {
//               echo 'Ooops (delete2): ' . mssql_get_last_message();
//               return false;
//               }
//            if (!$result3) {
//               echo 'Ooops (delete3): ' . mssql_get_last_message();
//               return false;
//               }
//            if (!$result4) {
//               echo 'Ooops (delete4): ' . mssql_get_last_message();
//               return false;
//               }
            if (!$result5) {
              //echo 'Ooops (delete5): ' . mssql_get_last_message();
               return false;
               }
               
      return true;
    }


    function update($newEmpresas) {

        $Empresas = $newEmpresas;

        $querty = "UPDATE
                    Empresas
                    SET
						Nombre =
                        \"" . $Empresas->getNombre() . "\",
						Nit =
                        \"" . $Empresas->getNit() . "\",
						EsProveedor =
                        \"" . $Empresas->getEsProveedor() . "\",
						EsCliente =
                        \"" . $Empresas->getEsCliente() . "\",
						EsFinca =
                        \"" . $Empresas->getEsFinca() . "\",
						Habilitado =
                        \"" . $Empresas->getHabilitado() . "\"                       
                    WHERE ID =
                    " . $Empresas->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateModulos): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

            $sql = 'select count(*) from Empresas;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }


}

?>