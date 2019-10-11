<?php

class Consejos {
	
    private $idConsejos;
	private $titulo;
    private $descripcion;
    private $imgcons;
   
   
    function getIdConsejos() {
        return $this->idConsejos;
    }

    function getTitulo() {
        return $this->titulo;
    }
	
	function getDescripcion() {
        return $this->descripcion;
    }
	
	function getImgcons() {
        return $this->imgcons;
    }
	
    function setIdConsejos($idConsejos) {
        $this->idConsejos = $idConsejos;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

	function setImgcons($imgcons) {
        $this->imgcons = $imgcons;
    }
 
}