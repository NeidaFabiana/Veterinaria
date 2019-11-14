<?php

class Noticias {
	
	private $titulo;
    private $descripcion;
    private $imgnoti;
    private $idNoticias;

	 public function __construct($titulo,$descripcion,$imgnoti,$idNoticias=null) {
			$this->Titulo = $titulo;
			$this->Descripcion= $descripcion;
			$this->Imgnoti= $imgnoti;
			$this->idNoticias = $idNoticias;
	}

    function getTitulo() {
        return $this->Titulo;
    }
	
	function getDescripcion() {
        return $this->Descripcion;
    }
	
	function getImgnoti() {
        return $this->Imgnoti;
    }
	
	function getIdNoticias() {
        return $this->idNoticias;
    }


    function setTitulo($titulo) {
        $this->Titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->Descripcion = $descripcion;
    }
	
	function setImgnoti($imgnoti) {
		$this->Imgnoti = $imgnoti;
    }

	function setIdNoticias($idNoticias) {
        $this->idNoticias = $idNoticias;
    }

}