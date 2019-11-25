<?php

class Consejos {
	
	private $titulo;
    private $descripcion;
    private $imgcons;
	private $idConsejos;
	
 public function __construct($titulo,$descripcion,$imgcons=null,$idConsejos=null) {
       
		$this->Titulo = $titulo;
		$this->Descripcion = $descripcion;
        $this->Imgcons = $imgcons;
	    $this->idConsejos = $idConsejos;
    }

    function getTitulo() {
        return $this->Titulo;
    }
	
	function getDescripcion() {
        return $this->Descripcion;
    }
	
	function getImgcons() {
        return $this->Imgcons;
    }
	
	 function getIdConsejos() {
        return $this->idConsejos;
    }
	
    function setTitulo($titulo) {
        $this->Titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->Descripcion = $descripcion;
    }

	function setImgcons($imgcons) {
        $this->Imgcons = $imgcons;
    }
	
	function setIdConsejos($idConsejos) {
        $this->idConsejos = $idConsejos;
    }

 
}