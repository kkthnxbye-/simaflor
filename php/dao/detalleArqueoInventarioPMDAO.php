<?php
class detalleArqueoInventarioPMDAO{
   public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }
    
    function save($data){
       $data_ = new DetalleArqueoInventarioPM();
       $data_ = $data;
       
       $sql = "INSERT INTO DetalleArqueoInventarioM (IDArqueoInventarioPM,IDInventarioPM) VALUES 
          (
          ".$data_->getIdArqueoInventarioPM().",
          ".$data_->getIdInventarioPM()."
            )";
       
       return $this->daoConnection->consulta($sql);
    }
    
    function get($campo,$valor){
       $sql = "SELECT * FROM DetalleArqueoInventarioM WHERE $campo = $valor";
       $this->daoConnection->consulta($sql);
       $this->daoConnection->leerVarios();
       $numregistros = $this->daoConnection->numregistros();
       //echo $sql;
       $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $obj = new detalleArqueoInventarioPM();
            $obj->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setIdArqueoInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setIdInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $lista[$i] = $obj;
        }
        return $lista;
    }
    
    
    function getWithArqueo($campo,$valor,$finca){
       $sql = "SELECT * 
         FROM DetalleArqueoInventarioM as d, arqueoInventarioPM as a 
         WHERE d.$campo = $valor
         AND a.IDFinca = $finca
         AND a.id = d.IdArqueoInventarioPM";
       $this->daoConnection->consulta($sql);
       $this->daoConnection->leerVarios();
       $numregistros = $this->daoConnection->numregistros();
       //echo $sql;
       $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $obj = new detalleArquoeInventarioPMJOIN();
            $obj->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setIdArqueoInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setIdInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $obj->setId2($this->daoConnection->ObjetoConsulta2[$i][$j++]);
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
