<?php

class usuarios {

    private $id;
    private $idgrupousuario;
    private $login;
    private $contrasena;
    private $nombre;
    private $email;
    private $telefono;
    private $habilitado;

    function __construct() {
        $this->id = 0;
        $this->idgrupousuario = 0;
        $this->login = "NULL";
        $this->contrasena = "NULL";
        $this->nombre = "NULL";
        $this->email = "NULL";
        $this->telefono = "NULL";
        $this->habilitado = 0;
    }

    //GET'S & SET'S
    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

    function setIdGrupoUsuario($idgrupousuario) {
        $this->idgrupousuario = $idgrupousuario;
    }

    function getIdGrupoUsuario() {
        return $this->idgrupousuario;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function getLogin() {
        return $this->login;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function getEmail() {
        return $this->email;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setHabilitado($habilitado) {
        $this->habilitado = $habilitado;
    }

    function getHabilitado() {
        return $this->habilitado;
    }

}

?>