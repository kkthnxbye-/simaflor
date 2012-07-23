<?php

class RevisionesDAO {

    public $daoConnection;

    function __construct() {
        $this->daoConnection = new DAO;
        $this->daoConnection->conectar();
    }

    function getRevisiones() {

        $sql = "SELECT * from RevisionPedidoPM";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros == 0) {
            return null;
        }

        $i = 0;
        $j = 0;
        $revisiones = new Revisiones();
        $revisiones->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $revisiones->setIdPedidoPm($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $revisiones->setIdTipoUnidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $revisiones->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $revisiones->setEstaBueno($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $revisiones->setDesechado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $revisiones->setIdCausaNacional($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $revisiones->setIdOperario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $revisiones->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
        $revisiones->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);

        return $revisiones;
    }

    function getRevisionesByIdPerdido($idPedido) {

        $sql = "SELECT * from RevisionPedidoPM WHERE IDPedidoPM = $idPedido";

        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        $lista = array();

        if ($numregistros == 0) {
            return $lista;
        }

        for ($i = 0; $i < $numregistros; $i++) {
            $j = 0;
            $revisiones = new Revisiones();
            $revisiones->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $revisiones->setIdPedidoPm($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $revisiones->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $revisiones->setEstaBueno($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $revisiones->setDesechado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $revisiones->setIdCausaNacional($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $revisiones->setIdOperario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $revisiones->setIdUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $revisiones->setHabilitado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $revisiones->setIdTipoUnidadPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $revisiones->setIdVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $revisiones->setIdGrado($this->daoConnection->ObjetoConsulta2[$i][$j++]);
            $revisiones->setIdInventarioPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);

            $lista[$i] = $revisiones;
        }
        return $lista;
    }

    function checkCode($no_remision) {
        $sql = "select * from remisionespm where noremision = '$no_remision'";
        $this->daoConnection->consulta($sql);
        $this->daoConnection->leerVarios();
        $numregistros = $this->daoConnection->numregistros();

        if ($numregistros > 0) {
            return 1; //bad
        } else {
            return 2; //good
        }
    }

    function save($objRevision) {

        $newRevision = new Revisiones();
        $newRevision = $objRevision;

        $sql = "INSERT INTO dbo.RevisionPedidoPM 
                (IDPedidoPM,Cantidad,EstaBueno,Desechado,IDCausaNacional,IDOperario,IDUsuario,Habilitado,IDTipoUnidadPM,IDVariedad,IDGrado,IDInventarioPM) 
                VALUES (
                " . $newRevision->getIdPedidoPm() . ",
                " . $newRevision->getCantidad() . ",
                " . $newRevision->getEstaBueno() . ",
                " . $newRevision->getDesechado() . ",
                " . $newRevision->getIdCausaNacional() . ",
                " . $newRevision->getIdOperario() . ",
                " . $newRevision->getIdUsuario() . ",
                " . $newRevision->getHabilitado() . ",
                " . $newRevision->getIdTipoUnidadPM() . ",
                " . $newRevision->getIdVariedad() . ",
                " . $newRevision->getIdGrado() . ",
                " . $newRevision->getIdInventarioPM() . "
                ) ";
        

        $result = $this->daoConnection->consulta($sql);

        if (!$result) {
            echo 'Ooops (saveRevision): ' . mssql_get_last_message() . '<br>' . $sql . '<br>';
            return false;
        }

        return true;
    }
    
    function update($revisiones) {
      $newRevisiones = new Revisiones();
      $newRevisiones = $revisiones;

      $sql = "UPDATE RevisionPedidoPM SET 
                   Cantidad = " . $newRevisiones->getCantidad() . ",
                   IDOperario = " . $newRevisiones->getIdOperario() . ",
                   EstaBueno = " . $newRevisiones->getEstaBueno() . ",
                   IDCausaNacional = " . $newRevisiones->getIdCausaNacional() . ",
                   Desechado = " . $newRevisiones->getDesechado() . ",
                   Habilitado = " . $newRevisiones->getHabilitado() . "
              WHERE ID = " . $newRevisiones->getId() . "";
      
      
      
      $result = $this->daoConnection->consulta($sql);
      
      if (!$result) {
         echo 'Ooops (update): ' .$sql;
         exit;
         return false;
      }

      return true;
   }

}

?>
