<?php

class Usuario {
	
	private $email;
    private $sena;
    private $contrasena;
    private $imgusua;
	private $idUsuario;
	
	public function __construct($email,$sena,$contrasena,$imgusua,$idUsuario=null) {
			$this->Email = $email;
			$this->Sena= $sena;
			$this->Contrasena= $contrasena;
			$this->Imgusua= $imgusua;
			$this->idUsuario = $idUsuario;
	}
   

    function getEmail() {
        return $this->Email;
    }
	
	function getSena() {
        return $this->Sena;
    }
	function getContrasena() {
        return $this->Contrasena;
    }
	
	function getImgusua() {
        return $this->Imgusua;
    }
	
	function getIdUsuario() {
        return $this->idUsuario;
    }

    function setEmail($email) {
        $this->Email = $email;
    }

    function setSena($sena) {
        $this->Sena = $sena;
    }

    function setContraseña($contraseña) {
        $this->Contraseña = $contraseña;
    }
	
	function setImgusua($imgusua) {
		$this->Imgusua = $imgusua;
    }
	
	function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

}