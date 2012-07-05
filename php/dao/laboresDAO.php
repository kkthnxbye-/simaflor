<?php

class LaboresDAO{
   public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }
    
    function save($labores){
             
       $sql = "INSERT INTO laboresPM (codigo,nombre,descripcion,foto,habilitado) 
          VALUES 
          (
            '". $labores->getCodigo() ."',
            '". $labores->getNombre() ."',
            '". $labores->getDescripcion() ."',
            '". $labores->getFoto() ."',
            ". $labores->getHabilitado() ."
            )";
       //echo $sql;
         $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (saveModulos): ' . mssql_get_last_message() .'<br>'.$sql;
            return false;
        }

        return true;
    }
    
    function getLastId() {
        $sql = 'SELECT MAX(ID) from laboresPM';

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        return $this->daoConnection->ObjetoConsulta2[0][0];
        
    }
    
    function getByCode($code){
         $sql = "SELECT * FROM laboresPM WHERE codigo = '$code'";
         $this->daoConnection->consulta($sql);
         $this->daoConnection->leerVarios();
         $numregistros = $this->daoConnection->numregistros();

         if ($numregistros == 0) {
               return null;
         }

         $i = 0;
         $j = 0;
         $new = new Labores();
         $new->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $new->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $new->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $new->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $new->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $new->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         return $new;
    }
    
    function getById($id){
         $sql = "SELECT * FROM laboresPM WHERE id = $id";
         $this->daoConnection->consulta($sql);
         $this->daoConnection->leerVarios();
         $numregistros = $this->daoConnection->numregistros();

         if ($numregistros == 0) {
               return null;
         }

         $i = 0;
         $j = 0;
         $new = new Labores();
         $new->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $new->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $new->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $new->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $new->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $new->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         return $new;
    }
    
    
    function get($campo,$busqueda,$valor){
         $sql = "SELECT * FROM laboresPM";
         $where = " WHERE 1=1 ";
         
         if($campo != ""){
            if($campo == "todos"){
               $where.= " AND (codigo like '%$valor%' OR nombre like '%$valor%' OR descripcion like '%$valor%' ) ";
            }else{
               $where.=" AND $campo like '%$valor%' ";
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
         $new = new Labores();
         $new->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $new->setCodigo($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $new->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $new->setDescripcion($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $new->setFoto($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $new->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $lista[$i] = $new;
        }
         return $lista;
    }
    
    function delete($id){
       
         $sql = 'Delete from laboresPM WHERE ID = ' . $id . ' ';
         return $this->daoConnection->consulta($sql);
    }
    
    function update($labores){
       
       $sql = "UPDATE laboresPM 
               SET 
               codigo = '".$labores->getCodigo()."',
               nombre = '".$labores->getNombre()."',
               descripcion = '".$labores->getDescripcion()."',
               foto = '".$labores->getFoto()."',
               habilitado = ".$labores->getHabilitado()."
               WHERE id = ". $labores->getId() ;
       //echo $sql;
       $result = $this->daoConnection->consulta($sql);
        if (!$result) {
            echo 'Ooops (saveModulos): ' . mssql_get_last_message() .'<br>'.$sql;
            return false;
        }

        return true;
       
    }
    
}

?>
