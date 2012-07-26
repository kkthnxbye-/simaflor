<?php

class ItemsPMDAO {

   public $daoConnection;

   function __construct() {
      $this->daoConnection = new DAO;
      $this->daoConnection->conectar();
   }

   function save($obj_) {
      $obj = new ItemsPM();
      $obj = $obj_;

      $sql = "INSERT INTO itemsPM 
         (idfinca,idproveedor,idmaterialvegetal,
         idvariedad,idbreeder,idsinventariopm,
         alias,consecutivo,codigoseguimiento,
         fechasiembra,fechaarranque,fecharegistro,
         observaciones,idestadoitempm,idusuario,
         idtemporada,idciclo,idcliente) values (
         ".$obj->getIdFinca().",
         ".$obj->getIdProveedor().",
         ".$obj->getIdVegetal().",
         ".$obj->getIdVariedad().",
         ".$obj->getIdBreeder().",
         ".$obj->getIdsInventarioPM().",
         ".$obj->getAlias().",
         ".$obj->getConsecutivo().",
         ".$obj->getCodigoSeguimiento().",
         ".$obj->getFechaSiembra().",
         ".$obj->getFechaArranque().",
         ".$obj->getFechaRegistro().",
         ".$obj->getObservaciones().",
         ".$obj->getIdEstadoItem().",
         ".$obj->getIdUsuario().",
         ".$obj->getIdTemporada().",
         ".$obj->getIdCiclo().",
         ".$obj->getIdCliente()."
         ) 
         ";
      echo $sql;
      exit;
      return $this->daoConnection->consulta($sql);      
   }
   
   function getLastId(){
      $sql = "SELECT MAX(id) FROM itemsPM";
      $this->daoConnection->consulta($sql);
      $this->daoConnection->leerVarios();
	return $this->daoConnection->ObjetoConsulta2[0][0];
   }
   
   function getByAlias($valor){
      $sql = "SELECT * FROM itemsPM WHERE Alias = $valor ";
      $this->daoConnection->consulta($sql);
      $this->daoConnection->leerVarios();
      $numregistros = $this->daoConnection->numregistros();
	if($numregistros > 0){
         return true;
      }else{
         return false;
      }
   }

}