<?php

class Noticias {
	
    private $idNoticias;
	private $titulo;
    private $descripcion;
    private $imgnoti;
   
    function getIdNoticias() {
        return $this->idNoticias;
    }

    function getTitulo() {
        return $this->titulo;
    }
	
	function getDescripcion() {
        return $this->descripcion;
    }
	
	function getImgnoti() {
        return $this->imgnoti;
    }
	

    function setIdNoticias($idNoticias) {
        $this->idNoticias = $idNoticias;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
	
	function setImgnoti($imgnoti) {
		$this->imgnoti = $imgnoti;
    }

}