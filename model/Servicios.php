<?php

class Servicios {
	
    private $idServicios;
	private $servicio;
    private $descripcion;
    private $imgserv;
   
    function getIdServicios() {
        return $this->idServicios;
    }

    function getServicio() {
        return $this->servicio;
    }
	
	function getDescripcion() {
        return $this->descripcion;
    }
	
	function getImgserv() {
        return $this->imgserv;
    }
	

    function setIdServicios($idServicios) {
        $this->idServicios = $idServicios;
    }

    function setServicio($servicio) {
        $this->servicio = $servicio;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
	
	function setImgserv($imgserv) {
		$this->imgserv = $imgserv;
    }

}