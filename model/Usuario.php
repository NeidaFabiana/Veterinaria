<?php

class Usuario {
	
    private $idUsuario;
	private $email;
    private $sena;
    private $contrasena;
    private $imgusua;
   
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getEmail() {
        return $this->email;
    }
	
	function getSena() {
        return $this->sena;
    }
	function getContrasena() {
        return $this->contrasena;
    }
	
	function getImgusua() {
        return $this->imgusua;
    }
	

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSena($sena) {
        $this->sena = $sena;
    }

    function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }
	
	function setImgusua($imgusua) {
		$this->imgusua = $imgusua;
    }

}