<?php
session_start();

include '../php/dao/daoConnection.php';
include '../php/dao/arqueoInventarioPMDAO.php';

foreach($_POST as $key => $value){
   $$key = $value;
}

$dao = new ArqueoInventarioPMDAO();

$dao->update('verificado','1','ID',$id);