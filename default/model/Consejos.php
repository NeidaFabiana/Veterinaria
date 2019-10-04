<?php

class Consejos {
	
    private $idConsejos;
	private $titulo;
    private $descripcion;
    private $img;
   
   
    function getIdConsejos() {
        return $this->idConsejos;
    }

    function getTitulo() {
        return $this->titulo;
    }
	
	function getDescripcion() {
        return $this->descripcion;
    }
	
	function getImg() {
        return $this->img;
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

	function setImg($img) {
        $this->img = $img;
    }
 
}