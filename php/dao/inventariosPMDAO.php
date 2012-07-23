<?php
class InventariosPMDAO{
   public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }
    
    function save($data){
       $data_ = new inventariosPM();
       $data_ = $data;
       
       $sql = "INSERT INTO inventariosPM 
          (NoSeguimiento,
          IDFincaProduccion,
          IDFincaProveedor,
          IDMaterialVegetal,
          IDVariedad,
          IDTipoUnidadPM,
          IDCiclo,
          AliasItem,
          FechaIngreso,
          FechaVencimiento,
          IDGrado,
          Saldo,
          IDCliente) 
          VALUES 
          (  ".$data_->getNoSegimiento().",
             ".$data_->getIdFincaProduccion().",
             ".$data_->getIdFincaProveedor().",
             ".$data_->getIdMaterialVegetal().",
             ".$data_->getIdVariedad().",
             ".$data_->getIdTipoUnidadPM().",
             ".$data_->getIdCiclo().",
             ".$data_->getAliasItem().",
             '".$data_->getFechaIngreso()."',
             '".$data_->getFechaVencimiento()."',
             ".$data_->getIdGrado().",
             ".$data_->getSaldo().",
             ".$data_->getIdCliente()." );";
//       echo $sql;
//       exit;
      return $this->daoConnection->consulta($sql);
    }
    
    function getLastId() {
        $sql = 'SELECT MAX(ID) from inventariosPM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
    
    function getById($id){
       $sql = "SELECT * FROM inventariosPM WHERE id = ".$id;
       $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }
        $i = 0;
        $j = 0;
        $obj = new inventariosPM();
        $obj->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setNoSegimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdFincaProduccion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdFincaProveedor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdTipoUnidadPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdCiclo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setAliasItem($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setFechaIngreso($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setFechaVencimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdGrado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setSaldo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdCliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $obj;
    }
    
    
    function get(){
       $sql = "SELECT * FROM inventariosPM";
        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();
        $lista = array(); 
        if ($numregistros == 0) {
            return $lista;
        }
        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $obj = new inventariosPM();
        $obj->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setNoSegimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdFincaProduccion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdFincaProveedor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdTipoUnidadPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdCiclo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setAliasItem($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setFechaIngreso($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setFechaVencimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdGrado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setSaldo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdCliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $lista[$i] = $obj;
        }
        return $lista;
    }
    
    function getFinca($id){
       $sql = "SELECT * FROM inventariosPM WHERE IDFincaProduccion = ".$id;
        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();
        $lista = array(); 
        if ($numregistros == 0) {
            return $lista;
        }
        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $obj = new inventariosPM();
        $obj->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setNoSegimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdFincaProduccion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdFincaProveedor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdMaterialVegetal($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdTipoUnidadPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdCiclo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setAliasItem($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setFechaIngreso($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setFechaVencimiento($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdGrado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setSaldo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setIdCliente($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $lista[$i] = $obj;
        }
        return $lista;
    }
    
    function updateSaldo($id,$saldo){
       $sql = "UPDATE inventariosPM SET saldo = ".$saldo." WHERE id = ".$id;
       return $this->daoConnection->consulta($sql);
    }
}