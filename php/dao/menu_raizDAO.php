<?php

class Menu_raizDAO{
   
   public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }
    
    function getByOrder(){
       $sql = "Select * from menu_raiz ORDER BY ordern";
       $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }
        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
        $newCiclo = new Menu_raiz();
        $newCiclo->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newCiclo->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
		$newCiclo->setOrden($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $newCiclo;
        }
        return $lista;
    }
    
    function getRaizByModulo($id){
       $sql = "Select * from menu_raiz where id = ".$id;
       $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();
        
        if($numregistros < 1){
           return false;
        }
        
        $i = 0;
        $j = 0;
        $newCiclo = new Menu_raiz();
        $newCiclo->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newCiclo->setNombre($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $newCiclo->setOrden($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        return $newCiclo;
    }
    
    
   
}

?>
