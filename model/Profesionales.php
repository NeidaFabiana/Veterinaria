<?php

class Profesionales {
	
	private $nombre;
    private $formacion;
    private $imgprof;
    private $idProfesionales;
   
    public function __construct($nombre,$formacion,$imgprof,$idProfesionales=null) {
			$this->Nombre = $nombre;
			$this->Formacion= $formacion;
			$this->Imgprof= $imgprof;
			$this->idProfesionales = $idProfesionales;
	}

    function getNombre() {
        return $this->Nombre;
    }
	
	function getFormacion() {
        return $this->Formacion;
    }
	
	function getImgprof() {
        return $this->Imgprof;
    }
	
	function getIdProfesionales() {
        return $this->idProfesionales;
    }

    function setNombre($nombre) {
        $this->Nombre = $nombre;
    }

    function setFormacion($formacion) {
        $this->Formacion = $formacion;
    }
	
	function setImgprof($imgprof) {
		$this->Imgprof = $imgprof;
    }
	
	function setIdProfesionales($idProfesionales) {
        $this->idProfesionales = $idProfesionales;
    }


}