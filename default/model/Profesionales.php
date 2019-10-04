<?php

class Profesionales {
	
    private $idProfesionales;
	private $nombre;
    private $formacion;
    private $foto;
   
    function getIdProfesionales() {
        return $this->idProfesionales;
    }

    function getNombre() {
        return $this->nombre;
    }
	
	function getFormacion() {
        return $this->formacion;
    }
	
	function getFoto() {
        return $this->foto;
    }
	

    function setIdProfesionales($idProfesionales) {
        $this->idProfesionales = $idProfesionales;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFormacion($formacion) {
        $this->formacion = $formacion;
    }
	
	function setFoto($foto) {
		$this->foto = $foto;
    }

}