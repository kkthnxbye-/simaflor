<?php
class AreasxitemDAO{
   public $daoConnection;

   function __construct() {
      $this->daoConnection = new DAO;
      $this->daoConnection->conectar();
   }
   
   function save($objAreasXItem){
      $obj = new Areasxitem();
      $obj = $objAreasXItem;
      
      $sql = "INSERT INTO areaspmxitempm 
         (IDItemPM,idareapmxbloquepm,idoperario,tipooperario,cantidad) 
         VALUES 
         (".$obj->getItemPM().",".$obj->getIdAreaPMXBloquePM().",
         ".$obj->getIdOperario().",".$obj->getTipoOperario().",".$obj->getCantidad().");";
      return $this->daoConnection->consulta($sql);
      
   }
   
   function getSembrado(){
      
   }
   
}
