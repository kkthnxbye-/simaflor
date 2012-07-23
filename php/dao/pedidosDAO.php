<?php

/**
 * Description of reserva
 *
 * @author Brayan Acebo
 */
class pedidosDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newPedidos) {


        $querty = "insert into PedidosPM
                    (IDFincaCliente,
                    IDServicioPM,
                    IDMaterialVegetal,
                    IDProducto,
                    IDUsuario,
                    IDFincaProduccion,
                    IDCiclo,
                    EntregaMaterial,
                    FechaRegistro,
                    FechaUltimoEstado,
                    IDEstadoPedidoPM,
                    IDFincaProveedor)
                    values(
                    \"" . $newPedidos->getFincacliente() . "\",
                    " . $newPedidos->getServicio() . ",
                    \"" . $newPedidos->getMaterialvegetal() . "\",
                    \"" . $newPedidos->getProducto() . "\",
                    \"" . $newPedidos->getUsuario() . "\",
                    \"" . $newPedidos->getFincaProduccion() . "\",
                    " . $newPedidos->getCiclo() . ",
                    \"" . $newPedidos->getEntregamaterial() . "\",
                    \"" . $newPedidos->getFecha() . "\",
                    \"" . $newPedidos->getFechaUltimoEstado() . "\",
                    \"" . $newPedidos->getEstadopedido() . "\",
                    \"" . $newPedidos->getFincaproveedor() . "\"
	)";
//        echo $querty."<br>";
//        exit;
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveOpciones): ' . mysql_error() . '<br>' . $querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'select MAX(ID) from PedidosPM;';


        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getById($id) {

        $sql = 'SELECT * from PedidosPM WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $pedido = new pedidos();
        $pedido->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $pedido->setFincacliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $pedido->setServicio($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $pedido->setMaterialvegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $pedido->setProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $pedido->setUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $pedido->setFincaProduccion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $pedido->setCiclo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $pedido->setEntregamaterial($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $pedido->setFecha($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $pedido->setFechaUltimoEstado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $pedido->setEstadopedido($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $pedido->setFincaproveedor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $pedido;
    }

    function gets() {

        $sql = 'SELECT * from PedidosPM ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $pedido = new pedidos();
            $pedido->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFincacliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setServicio($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setMaterialvegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFincaProduccion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setCiclo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setEntregamaterial($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFecha($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setEstadopedido($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFincaproveedor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $pedido;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from PedidosPM WHERE ID = ' . $id . ' ';

        $this->daoConnection->consulta($sql);
    }

    function update($newpedido) {

        $pedido = $newpedido;


        $querty = "UPDATE
                    PedidosPM
                    SET
                        IDFincaCliente =
                        " . $pedido->getFincacliente() . ",
                        IDServicioPM =
                        " . $pedido->getServicio() . ",
                        IDMaterialVegetal =
                        " . $pedido->getMaterialvegetal() . ",
                        IDProducto =
                        " . $pedido->getProducto() . ",
                        IDFincaProduccion =
                        " . $pedido->getFincaProduccion() . ",
                        IDCiclo  =
                        " . $pedido->getCiclo() . ",
						EntregaMaterial =
                        " . $pedido->getEntregamaterial() . ",						
						IDEstadoPedidoPM  =
                        " . $pedido->getEstadopedido() . ",
						IDFincaProveedor  =
                        " . $pedido->getFincaproveedor() . "

                    WHERE ID =
                    " . $pedido->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateOpciones): ' . mysql_error();
            return false;
        }

        return true;
    }

    function updateCliente($newpedido) {

        $pedido = $newpedido;


        $querty = "UPDATE
                    PedidosPM
                    SET
                        IDFincaCliente =
                        " . $pedido->getFincacliente() . ",";
        
        if ($pedido->getServicio() != "" && $pedido->getServicio() != 0) {
        $querty .= "IDServicioPM =
                        " . $pedido->getServicio() . ",";
        }
                                
        if ($pedido->getMaterialvegetal() != "" && $pedido->getMaterialvegetal() != 0) {
            $querty .= "IDMaterialVegetal =
                        " . $pedido->getMaterialvegetal() . ",";
        }
        
        if ($pedido->getFincaProduccion() != "" && $pedido->getFincaProduccion() != 0) {
        $querty .= "    IDFincaProduccion =
                        " . $pedido->getFincaProduccion() . ",";
        }
        
        $querty .= "    IDCiclo  =
                        " . $pedido->getCiclo() . ",
			IDFincaProveedor  =
                        " . $pedido->getFincaproveedor() . "

                    WHERE ID =
                    " . $pedido->getId() . "
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

    function getsbybuscar($campo, $tipob, $valor, $idUsuario) {
        $sql = 'SELECT * from PedidosPM ';
        $where = "WHERE 1=1 ";

        if ($idUsuario != -10 && $idUsuario != '') {
            $where.=" AND IDUsuario = $idUsuario";
        }
        if ($valor != "") {
           if ($campo == "IDFincaProduccion") {
                $where.=" AND IDFincaProduccion =  $valor";
            } else {

                if ($campo == "todos") {

                    if ($tipob == "parte") {
                        $where .= ' and (Nombre LIKE "%' . $valor . '%" OR UrlMenu LIKE "%' . $valor . '%")';
                    } else {
                        $where .= ' and (Nombre= "' . $valor . '" OR UrlMenu = "' . $valor . '")';
                    }
                } else {
                    if ($tipob == "parte") {
                        $where .= ' and ' . $campo . ' LIKE "%' . $valor . '%"';
                    } else {
                        $where .= ' and ' . $campo . ' = "' . $valor . '"';
                    }
                }
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
            $pedido = new pedidos();
            $pedido->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFincacliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setServicio($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setMaterialvegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFincaProduccion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setCiclo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setEntregamaterial($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFecha($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFechaUltimoEstado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setEstadopedido($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFincaproveedor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $pedido;
        }
        return $lista;
    }

    function updateEstado($estado, $id) {
        $sql = "UPDATE pedidosPM SET IDEstadoPedidoPM = $estado WHERE id = $id";
        $result = $this->daoConnection->consulta($sql);
        //echo $sql;
        if (!$result) {
            echo 'Ooops (updateEstado): ' . mysql_error();
            return false;
        }

        return true;
    }

    function getsbybuscar2($campo, $tipob, $valor) {
        $sql = 'SELECT * from PedidosPM ';
        $where = ' where idestadopedidopm = 4 OR idestadopedidopm = 5';
        /*
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
         */
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
            $pedido = new pedidos();
            $pedido->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFincacliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setServicio($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setMaterialvegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFincaProduccion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setCiclo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setEntregamaterial($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFecha($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setEstadopedido($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFincaproveedor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $pedido;
        }
        return $lista;
    }
    
    
    
    function getsbybuscar_r($campo, $tipob, $valor, $idUsuario) {
        $sql = 'SELECT * from PedidosPM ';
        $where = "WHERE 1=1 AND (IDEstadoPedidoPM = 4 OR IDEstadoPedidoPM = 5) ";

        if ($idUsuario != -10 && $idUsuario != '') {
            $where.=" AND IDUsuario = $idUsuario";
        }
        if ($valor != "") {
           if ($campo == "IDFincaProduccion") {
                $where.=" AND IDFincaProduccion =  $valor";
            } else {

                if ($campo == "todos") {

                    if ($tipob == "parte") {
                        $where .= ' and (Nombre LIKE "%' . $valor . '%" OR UrlMenu LIKE "%' . $valor . '%")';
                    } else {
                        $where .= ' and (Nombre= "' . $valor . '" OR UrlMenu = "' . $valor . '")';
                    }
                } else {
                    if ($tipob == "parte") {
                        $where .= ' and ' . $campo . ' LIKE "%' . $valor . '%"';
                    } else {
                        $where .= ' and ' . $campo . ' = "' . $valor . '"';
                    }
                }
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
            $pedido = new pedidos();
            $pedido->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFincacliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setServicio($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setMaterialvegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFincaProduccion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setCiclo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setEntregamaterial($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFecha($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFechaUltimoEstado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setEstadopedido($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $pedido->setFincaproveedor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $pedido;
        }
        return $lista;
    }

}

?>