<?php

class Servicios {
	
    private $idServicios;
	private $titulo;
    private $descripcion;
    private $img;
   
    function getIdServicios() {
        return $this->idServicios;
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
	

    function setIdServicios($idServicios) {
        $this->idServicios = $idServicios;
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