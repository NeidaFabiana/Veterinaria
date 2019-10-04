<?php

class Usuario {
	
    private $idLogin;
	private $email;
    private $seña;
    private $contraseña;
    private $foto;
   
    function getIdLogin() {
        return $this->idLogin;
    }

    function getEmail() {
        return $this->email;
    }
	
	function getSeña() {
        return $this->seña;
    }
	function getContraseña() {
        return $this->contraseña;
    }
	
	function getFoto() {
        return $this->foto;
    }
	

    function setIdLogin($idLogin) {
        $this->idLogin = $idLogin;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSeña($seña) {
        $this->seña = $seña;
    }

    function setContraseña($contraseña) {
        $this->contraseña = $contraseña;
    }
	
	function setFoto($foto) {
		$this->foto = $foto;
    }

}