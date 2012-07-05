<?php

/**
 * Description of reserva
 *
 * @author ogonzalezm
 */
// Clase dao
class configuracionproveedoresxfincapmDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($newconfiguracionproveedoresxfincapm) {


        $querty = "INSERT INTO ConfiguracionProveedoresXFincaPM
                    (IDProducto,  IDMaterialVegetal,   IDFincaCliente,  IDFincaProveedor, IDFincaProduccion) VALUES (
					\"" . $newconfiguracionproveedoresxfincapm->getIdProducto() . "\",
					\"" . $newconfiguracionproveedoresxfincapm->getIdMaterialVegetal() . "\",
					\"" . $newconfiguracionproveedoresxfincapm->getFincaCliente() . "\",
					\"" . $newconfiguracionproveedoresxfincapm->getFincaProveedor() . "\",
					\"" . $newconfiguracionproveedoresxfincapm->getFincaProduccion() . "\"					
					)";

        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (saveVariedads): ' . mysql_error() . '<br>' . $querty;
            return false;
        }

        return true;
    }

    function getLastId() {
        $sql = 'SELECT MAX(ID) FROM ConfiguracionProveedoresXFincaPM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    function getById($id) {

        $sql = 'SELECT ID,  IDProducto,  IDMaterialVegetal,   IDFincaCliente,  IDFincaProveedor, IDFincaProduccion FROM ConfiguracionProveedoresXFincaPM WHERE ID = "' . $id . '" ';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;

        $configuracionproveedoresxfincapm = new configuracionproveedoresxfincapm();
        $configuracionproveedoresxfincapm->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionproveedoresxfincapm->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionproveedoresxfincapm->setIdMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionproveedoresxfincapm->setFincaCliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionproveedoresxfincapm->setFincaProveedor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $configuracionproveedoresxfincapm->setFincaProduccion($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $configuracionproveedoresxfincapm;
    }

    function gets() {

        $sql = 'SELECT ID,  IDProducto,  IDMaterialVegetal,   IDFincaCliente,  IDFincaProveedor, IDFincaProduccion from ConfiguracionProveedoresXFincaPM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;

            $configuracionproveedoresxfincapm = new configuracionproveedoresxfincapm();
            $configuracionproveedoresxfincapm->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionproveedoresxfincapm->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionproveedoresxfincapm->setIdMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionproveedoresxfincapm->setFincaCliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionproveedoresxfincapm->setFincaProveedor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionproveedoresxfincapm->setFincaProduccion($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $configuracionproveedoresxfincapm;
        }
        return $lista;
    }

    function getsbybuscar($finca, $campo, $tipob, $id_finca_cliente) {
        $sql = 'SELECT 
			ConfPXFPM.ID AS ID,	
			Producto.Nombre AS PRODUCTO,
			MaterialesVegetal.Nombre AS MATERIAL,
			EmpresaFC.Nombre AS FC,
			EmpresaFP.Nombre AS FP,
			EmpresaFPR.Nombre AS FPR
			FROM ConfiguracionProveedoresXFincaPM AS ConfPXFPM			
			JOIN Productos AS Producto ON Producto.ID = ConfPXFPM.IDProducto
			JOIN MaterialesVegetales AS MaterialesVegetal ON MaterialesVegetal.ID = ConfPXFPM.IDMaterialVegetal
			JOIN Empresas AS EmpresaFC ON EmpresaFC.ID = ConfPXFPM.IDFincaCliente
			JOIN Empresas AS EmpresaFP ON EmpresaFP.ID = ConfPXFPM.IDFincaProveedor
			JOIN Empresas AS EmpresaFPR ON EmpresaFPR.ID = ConfPXFPM.IDFincaProduccion';

        $where = ' where 1=1 and EmpresaFPR.ID = ' . $finca . ' ';
        if ($campo == "todos") {
            if ($tipob == "parte") {
                $where .= ' and (Producto.Nombre LIKE "%' . $id_finca_cliente . '%" OR MaterialesVegetal.Nombre LIKE "%' . $id_finca_cliente . '%" OR EmpresaFC.Nombre LIKE "%' . $id_finca_cliente . '%" OR EmpresaFP.Nombre LIKE "%' . $id_finca_cliente . '%")';
            } else {
                $where .= ' and (Producto.Nombre = "' . $id_finca_cliente . '" OR MaterialesVegetal.Nombre = "' . $id_finca_cliente . '" OR EmpresaFC.Nombre = "' . $id_finca_cliente . '" OR EmpresaFP.Nombre LIKE "%' . $id_finca_cliente . '%" )';
            }
        } else {
            if ($tipob == "parte") {

                // Si es un filtrado por campo con operador 'Por Ocurrencia'
                if ($campo == "IDProducto") {
                    // print '<div id="t-debugger" style="background: #CCC; width: 500px; height: 500px;">Debbugger DIV</div>';
                    $where .= ' AND Producto.Nombre LIKE "%' . $id_finca_cliente . '%"';
                } elseif ($campo == "IDMaterialVegetal") {
                    $where .= ' AND MaterialesVegetal.Nombre LIKE "%' . $id_finca_cliente . '%"';
                } elseif ($campo == "IDFincaCliente") {
                    $where .= ' AND EmpresaFC.Nombre LIKE "%' . $id_finca_cliente . '%"';
                } elseif ($campo == "IDFincaProveedor") {
                    $where .= ' AND EmpresaFC.Nombre LIKE "%' . $id_finca_cliente . '%"';
                } elseif ($campo == "IDFincaProduccion") {
                    $where .= ' AND EmpresaFC.Nombre LIKE "%' . $id_finca_cliente . '%"';
                } else {
                    $where .= ' AND ConfPXFPM.' . $campo . ' LIKE "%' . $id_finca_cliente . '%"';
                }
            } else {

                // Si es un filtrado por campo con operador 'Exacto'
                if ($campo == "IDProducto") {
                    $where .= ' AND Producto.Nombre = "' . $id_finca_cliente . '"';
                } elseif ($campo == "IDMaterialVegetal") {
                    $where .= ' AND MaterialesVegetal.Nombre = "' . $id_finca_cliente . '"';
                } elseif ($campo == "IDFincaCliente") {
                    $where .= ' AND EmpresaFC.Nombre = "' . $id_finca_cliente . '"';
                } elseif ($campo == "IDFincaProveedor") {
                    $where .= ' AND EmpresaFC.Nombre = "' . $id_finca_cliente . '"';
                } elseif ($campo == "IDFincaProduccion") {
                    $where .= ' AND EmpresaFC.Nombre = "' . $id_finca_cliente . '"';
                } else {
                    $where .= ' AND ConfPXFPM.' . $campo . ' = "' . $id_finca_cliente . '"';
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

            $configuracionproveedoresxfincapm = new configuracionproveedoresxfincapm();

            $configuracionproveedoresxfincapm->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionproveedoresxfincapm->setIdProducto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionproveedoresxfincapm->setIdMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionproveedoresxfincapm->setFincaCliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionproveedoresxfincapm->setFincaProveedor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $configuracionproveedoresxfincapm->setFincaProduccion($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $configuracionproveedoresxfincapm;
        }
        return $lista;
    }

    function delete($id) {

        $sql = 'Delete from ConfiguracionProveedoresXFincaPM WHERE ID = ' . $id . ' ';

        return $this->daoConnection->consulta($sql);
    }

    function update($newconfiguracionproveedoresxfincapm) {

        $configuracionproveedoresxfincapm = $newconfiguracionproveedoresxfincapm;

        $querty = "UPDATE
                    ConfiguracionProveedoresXFincaPM
                    SET
						 IDProducto =
                        \"" . $configuracionproveedoresxfincapm->getIdProducto() . "\",
						 IDMaterialVegetal =
                        \"" . $configuracionproveedoresxfincapm->getIdMaterialVegetal() . "\",
						IDFincaCliente =
                        \"" . $configuracionproveedoresxfincapm->getFincaCliente() . "\", 
						IDFincaProveedor =
                        \"" . $configuracionproveedoresxfincapm->getFincaProveedor() . "\",
						IDFincaProduccion =
                        \"" . $configuracionproveedoresxfincapm->getFincaProduccion() . "\"
                    WHERE ID =
                    " . $configuracionproveedoresxfincapm->getId() . "
                    ";
        $result = $this->daoConnection->consulta($querty);
        if (!$result) {
            echo 'Ooops (updateVariedads): ' . mysql_error();
            return false;
        }

        return true;
    }

    function total() {

        $sql = 'select count(*) from ConfiguracionProveedoresXFincaPM;';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();

        return $this->daoConnection->ObjetoConsulta2[0][0];
    }

    /*
     * Get Produccion
     */

    function getsbyAll($IDProducto,$IDMaterialVegetal,$IDFincaCliente,$IDFincaProveedor) {
        $sql = "SELECT DISTINCT IDFincaProduccion 
                FROM ConfiguracionProveedoresXFincaPM 
                WHERE IDProducto = $IDProducto 
                AND IDMaterialVegetal = $IDMaterialVegetal 
                AND IDFincaCliente = $IDFincaCliente
                AND IDFincaProveedor = $IDFincaProveedor";

        
        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return null;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $ConfiguracionProveedoresXFincaPM = new configuracionproveedoresxfincapm();
            $ConfiguracionProveedoresXFincaPM->setFincaProduccion($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $ConfiguracionProveedoresXFincaPM;
        }
        return $lista;
    }

}

?>