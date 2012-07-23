<?php
class ArqueoInventarioPMDAO{
    
    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }
    
    function save($data){
       $data_ = new ArqueoInventarioPM();
       $data_ = $data;
       $sql = "INSERT INTO arqueoInventarioPM 
          (IDFinca,IDUsuario,Fecha,UnidadesEnInventario,UnidadesFueraInventario,Verificado) 
          VALUES (
          ".$data_->getIdFinca().",
          ".$data_->getIdUsuario().",
          '".$data_->getFecha()."',
          ".$data_->getUnidadesEnInventario().",
          ".$data_->getUnidadesFueraInventario().",
          ".$data_->getVerificado()."
          )";
       return $this->daoConnection->consulta($sql);
    }
    
    function getLastId(){
        $sql = 'SELECT MAX(ID) from arqueoInventarioPM';
        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        return $this->daoConnection->ObjetoConsulta2[0][0];
    }
    
    function getAll(){
       $sql = "SELECT * FROM arqueoInventarioPM";
       
       
       $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $obj = new ArqueoInventarioPM();
            $obj->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setFecha($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setUnidadesEnInventario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setUnidadesFueraInventario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setVerificado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $obj;
        }
        return $lista;
    }
    
    function get($campo,$valor,$campo2,$valor2){
       $sql = "SELECT * FROM arqueoInventarioPM WHERE 1=1 AND $campo = ".$valor."";
       
        if($campo2 <> ''){
           $sql.=" AND $campo2 ";
        }
        
        if($valor2 <> ''){
           $sql.="= $valor2";
        }
        
        //echo $sql;
        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();
        
        if($numregistros <= 1){
           $lista = array();
           $obj = new ArqueoInventarioPM();
           if ($numregistros == 0) {
            return $lista;
           }
           
            $j = 0;
            $i = 0;
            $obj->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setFecha($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setUnidadesEnInventario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setUnidadesFueraInventario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setVerificado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $obj;
            
        return $lista;
           
        }else if($numregistros > 1){
           $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $obj = new ArqueoInventarioPM();
            $obj->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setIdFinca($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setFecha($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setUnidadesEnInventario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setUnidadesFueraInventario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setVerificado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $obj;
        }
        return $lista;
        }
    }
    
    function update($campo,$valor,$campo2,$valor2){
       $sql = "UPDATE arqueoInventarioPM SET $campo = $valor WHERE $campo2 = $valor2";
       //echo $sql;
       return $this->daoConnection->consulta($sql);
    }
    
}
