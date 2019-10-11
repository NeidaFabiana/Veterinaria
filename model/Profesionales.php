<?php

class Profesionales {
	
    private $idProfesionales;
	private $nombre;
    private $formacion;
    private $imgprof;
   
    function getIdProfesionales() {
        return $this->idProfesionales;
    }

    function getNombre() {
        return $this->nombre;
    }
	
	function getFormacion() {
        return $this->formacion;
    }
	
	function getImgprof() {
        return $this->imgprof;
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
	
	function setImgprof($imgprof) {
		$this->imgprof = $imgprof;
    }

}