<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */

class detallepedidoDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newdetallepedido) {


        $querty = "insert into DetallePedidoPM
                    (IDVariedad,
                    CantidadPedido,
                    CantidadAprobada,
                    FechaEntrega,
                    FechaReciboMaterial,
                    Aprobado,
                    IDpedido)
                    values(
                    \"" . $newdetallepedido->getVariedad() . "\",
                    \"" . $newdetallepedido->getCantidad() . "\",
                    \"" . $newdetallepedido->getCantidadAprobada() . "\",
                    \"" . $newdetallepedido->getFechaEntrega() . "\",
                    \"" . $newdetallepedido->getFecharecibomaterial() . "\",
                    \"0\",
                    \"" . $newdetallepedido->getPedido() . "\"
	)";
        //echo $querty."<br>";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveOpciones): ' . mysql_error().'<br>'.$querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        return mysql_insert_id($this->daoConnection->Conexion_ID);
    }

	function getById($id) {

        $sql = 'SELECT * from DetallePedidoPM WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $detallepedido = new detallepedido();
        $detallepedido->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setFechaEntrega($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setFecharecibomaterial($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setPedido($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $detallepedido;
    }

    function gets() {

        $sql = 'SELECT * from DetallePedidoPM ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $detallepedido = new detallepedido();
        $detallepedido->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setCantidadAprobada($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setFechaEntrega($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setFecharecibomaterial($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setPedido($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $detallepedido;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from DetallePedidoPM WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }


    function update($newopcion) {
		/*
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
		*/
        return true;
    }
    
    function update2($cantidadAprobada,$aprobado,$id){
       $sql = "UPDATE DetallePedidoPM SET cantidadAprobada = $cantidadAprobada, aprobado = $aprobado 
              WHERE id = $id ";
       //echo $sql;
       $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (updateOpciones): ' . mssql_get_last_message();
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

     function getsbybuscar($campo,$tipob,$valor){
	$sql = 'SELECT * from DetallePedidoPM ';
	$where = ' where 1=1 ';
	
	if ($campo == "todos"){

		if ($tipob == "parte"){
			$where .= " and (Nombre LIKE '%$valor%' OR UrlMenu LIKE '%$valor%')";
		}else{
			$where .= " and (Nombre= '$valor' OR UrlMenu = '$valor')";
		}
	}else{
		if ($tipob == "parte"){
			$where .= " and $campo LIKE '%$valor%'";
		}else{
			$where .= " and $campo = $valor";
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
        $detallepedido = new detallepedido();
        $detallepedido->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setCantidadAprobada($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setFechaEntrega($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setFecharecibomaterial($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $detallepedido->setPedido($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $detallepedido;
        }
        return $lista;
	}


}

?>