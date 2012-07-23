<?php
session_start();

include '../php/dao/daoConnection.php';
include '../php/dao/remisionesDAO.php';

$id = $_GET['id'];


$DAO = new remisionesDAO();
if($DAO->delete($id) == 1){
   echo "1";  
}else{
   echo "2";
}
