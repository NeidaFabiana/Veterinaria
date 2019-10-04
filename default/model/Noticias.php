<?php

class Noticias {
	
    private $idNoticias;
	private $titulo;
    private $descripcion;
    private $img;
   
    function getIdNoticias() {
        return $this->idNoticias;
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
	

    function setIdNoticias($idNoticias) {
        $this->idNoticias = $idNoticias;
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