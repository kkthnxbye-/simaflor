<?php

class remisionesDAO {

   public $daoConnection;

   function __construct() {
      $this->daoConnection = new DAO;
      $this->daoConnection->conectar();
   }
   
   function getLastId(){
      $sql = "SELECT MAX(id) FROM remisionesPM";
      $this->daoConnection->consulta($sql);
      $this->daoConnection->leerVarios();

      return $this->daoConnection->ObjetoConsulta2[0][0];
   }
   
   function save($remision) {
      $remision_ = new remisiones();
      $remision_ = $remision;

      $sql = "INSERT INTO remisionesPM (IDPedidoPM,IDUsuario,NoRemision,FechaRegistro,fechaRemision) 
          VALUES 
          (
          " . $remision_->getIDPedidoPM() . ",
          " . $remision_->getIDUsuario() . ",
          '" . $remision_->getNoRemision() . "',
          '" . $remision_->getFechaRegistro() . "',
          '" . $remision_->getFechaRemision() . "'
          )";
      $result = $this->daoConnection->consulta($sql);
      if (!$result) {
         echo 'Ooops (save):<br>' . $sql;
         exit;
         return false;
      }

      return true;
   }

   function saveDetalle($detalleRemision) {
      $detalleRemision_ = new detalleRemision();
      $detalleRemision_ = $detalleRemision;
      
      $sql = "INSERT INTO DetalleRemisionPM (IDRemisioPM,IDVariedad,Cantidad) 
          VALUES 
          (
          " . $detalleRemision_->getIDRemisionPM() . ",
          " . $detalleRemision_->getIDVariedad() . ",
          '" . $detalleRemision_->getCantidad() . "'
          )";
      $result = $this->daoConnection->consulta($sql);
      if (!$result) {
         echo 'Ooops (saveDetalle):<br>' . $sql;
         exit;
         return false;
      }

      return true;
      
   }

   function getAll($IDPedidoPM) {
      $sql = "SELECT * FROM remisionesPM WHERE IDPedidoPM = " . $IDPedidoPM;
      $this->daoConnection->consulta($sql);
      $this->daoConnection->leerVarios();
      $numregistros = $this->daoConnection->numregistros();

      $lista = array();

      if ($numregistros == 0) {
         return $lista;
      }

      for ($i = 0; $i < $numregistros; $i++) {
         $j = 0;
         $remision_ = new remisiones();
         $remision_->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $remision_->setIDPedidoPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $remision_->setIDUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $remision_->setNoRemision($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $remision_->setFechaRegistro($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $remision_->setFechaRemision($this->daoConnection->ObjetoConsulta2[$i][$j++]);

         $lista[$i] = $remision_;
      }
      return $lista;
   }
   
   function getAllDetalle($IDRemisioPM){
      $sql = "SELECT * FROM DetalleRemisionPM WHERE IDRemisioPM = " . $IDRemisioPM;
      $this->daoConnection->consulta($sql);
      $this->daoConnection->leerVarios();
      $numregistros = $this->daoConnection->numregistros();

      $lista = array();

      if ($numregistros == 0) {
         return $lista;
      }

      for ($i = 0; $i < $numregistros; $i++) {
         $j = 0;
         $detalleRemision_ = new detalleRemision();
         $detalleRemision_->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $detalleRemision_->setIDRemisionPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $detalleRemision_->setIDVariedad($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $detalleRemision_->setCantidad($this->daoConnection->ObjetoConsulta2[$i][$j++]);

         $lista[$i] = $detalleRemision_;
      }
      return $lista;
   }

   function getOne($ID) {
      $sql = "SELECT * FROM remisionesPM WHERE ID = " . $ID;
      $this->daoConnection->consulta($sql);
      $this->daoConnection->leerVarios();
      $numregistros = $this->daoConnection->numregistros();

      if ($numregistros == 0) {
         return null;
      } else {
         $j = 0;
         $i = 0;
         $remision_ = new remisiones();
         $remision_->setId($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $remision_->setIDPedidoPM($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $remision_->setIDUsuario($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $remision_->setNoRemision($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $remision_->setFechaRegistro($this->daoConnection->ObjetoConsulta2[$i][$j++]);
         $remision_->setFechaRemision($this->daoConnection->ObjetoConsulta2[$i][$j++]);

         return $remision_;
      }
   }

   function update($remision) {
      $remision_ = new remisiones();
      $remision_ = $remision;

      $sql = "UPDATE remisionesPM SET 
                   NoRemision = '" . $remision_->getNoRemision() . "',
                   fechaRemision = '" . $remision_->getFechaRemision() . "'
                   WHERE ID = " . $remision_->getId() . "   
                   ";
      $result = $this->daoConnection->consulta($sql);
      
      if (!$result) {
         echo 'Ooops (update): ' .$sql;
         exit;
         return false;
      }

      return true;
   }
   
   function delete($id){
      $sql = "DELETE FROM remisionesPM WHERE ID = ".$id;
      return $result = $this->daoConnection->consulta($sql);
   }
   
   function deleteDetalle($idDetalle){
      $sql = "DELETE FROM DetalleRemisionPM WHERE ID = ".$idDetalle;
      return $result = $this->daoConnection->consulta($sql);
      
   }
   
   function sumVariedades($pedidoID,$variedadID){
      $sql = "SELECT sum(d.cantidad) 
              FROM remisionesPM as r,detalleremisionPM as d 
              WHERE r.id = d.idremisiopm
              AND d.IDVariedad = ".$variedadID."
              AND r.IDPedidoPM = ".$pedidoID." ";
      
      $this->daoConnection->consulta($sql);
      $this->daoConnection->leerVarios();

      return $this->daoConnection->ObjetoConsulta2[0][0]; 
      
   }

}
