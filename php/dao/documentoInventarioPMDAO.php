<?php
class documentoInventarioPMDAO{
    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }
    
    function save($data){
       $data_ = new DocumentoInventarioPM();
       $data_ = $data;
       
       $sql = "INSERT INTO DocumentosInventarioPM 
          (IDFinca,IDTipoMovimientoInventarioPM,consecutivo,fecha) 
          VALUES 
          (
          ".$data_->getIdFinca().",
          ".$data_->getIdTipoMovimientoInventarioPM().",
          ".$data_->getConsecutivo().",
          '".$data_->getFecha()."'
            )";
       
       return $this->daoConnection->consulta($sql);
    }
    
    function getLastId() {
        $sql = 'SELECT max(id) from documentosInventarioPM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();
        
        if($numregistros == 0){
           return 0;
        }else{
           return $this->daoConnection->ObjetoConsulta2[0][0];
        }
        
    }
    
    function get($campo,$valor,$fn,$campofn){
        
       if($fn == 'MAX' && $campofn != ""){
          $type_ = "MAX($campofn)";
       }else{
          $type_ = " * ";
       }
       
       $sql = "SELECT ";
       $sql.= $type_;
       $sql.= " FROM documentosInventarioPM WHERE 1 = 1 ";
         if($campo != '' && $valor != ''){
            $sql.=" AND $campo = $valor";
         }
         
        
        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();
        
        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }
        
        if($fn == 'MAX' && $campofn != ""){
           return $this->daoConnection->ObjetoConsulta2[0][0];
        }
        
        for($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $obj = new DocumentoInventarioPM();
            $obj->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setIdTipoMovimientoInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setConsecutivo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setFecha($this->daoConnection->ObjetoConsulta2[$i][$j++]);

                  $lista[$i] = $obj;
        }
        return $lista;  
       
       }
       
       function getOne($id){
          $sql = "SELECT * FROM documentosInventarioPM WHERE ID = ".$id;
          $this->daoConnection->consulta($sql);
          $this->daoConnection->leerVarios();
          $numregistros = $this->daoConnection->numregistros();

          if($numregistros > 0){
            $i = 0;
            $j = 0;
            $obj = new DocumentoInventarioPM();
            $obj->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setIdTipoMovimientoInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setConsecutivo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setFecha($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            
            return $obj;
          }else{
             return null;
          }
       }
       
       
}