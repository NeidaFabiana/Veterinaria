<?php

class Usuario {
    private $idLogin;
	private $Email;
    private $Seña;
    private $Contraseña;
    private $Foto;
   
    function getIdLogin() {
        return $this->idLogin;
    }

    function getEmail() {
        return $this->email;
    }
	
	function getSeña() {
        return $this->Seña;
    }
	function getContraseña() {
        return $this->Contraseña;
    }
	
	function getFoto() {
        return $this->Foto;
    }
	

    function setIdLogin($idLogin) {
        $this->idLogin = $idLogin;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setSeña($Seña) {
        $this->Seña = $Seña;
    }

    function setContraseña($Contraseña) {
        $this->Contraseña = $Contraseña;
    }
	
	function setFoto($Foto) {
		$this->Foto = $Foto;
    }

}