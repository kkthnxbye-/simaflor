<?php

class applicationDAO{

public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function save($app){
       $app_ = new Application();
       $app_ = $app;
       
       $sql = "INSERT INTO application 
               (app_variable,app_valor) 
               VALUES 
               ('".$app_->getVariable()."',
                '".$app_->getValor()."')";
       return $this->daoConnection->consulta($sql);
    }
    
    function get(){
       $sql = "SELECT * FROM application;";
        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
        $j = 0;
        $obj = new Application();
        $obj->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setVariable($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setValor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $lista[$i] = $obj;
        }
        return $lista;
    }
    
    function getOne($id){
       $sql = "SELECT * FROM application WHERE app_id = ".$id.";";
       $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $obj = new Application();
        $obj->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setVariable($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $obj->setValor($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        
        return $obj;
    }
    
    function update($app){
       $app_ = new Application();
       $app_ = $app;
       $sql = "UPDATE application SET 
          app_variable = '".$app_->getVariable()."',
          app_valor = '".$app_->getValor()."'
          WHERE app_id = ".$app_->getId().";
          ";
       return $this->daoConnection->consulta($sql);
    }
    
    function delete($id){
       $sql = "DELETE FROM application WHERE app_id = ".$id.";";
       return $this->daoConnection->consulta($sql);
    }
}
    

