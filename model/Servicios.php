<?php

class Servicios {
	
	private $servicio;
    private $descripcion;
    private $imgserv;
	private $idServicios;
   
     public function __construct($servicio,$descripcion,$imgserv,$idServicios=null) {
			$this->Servicios = $servicios;
			$this->Descripcion= $descripcion;
			$this->Imgserv= $imgserv;
			$this->idServicios = $idServicios;
	}
   
    function getServicio() {
        return $this->Servicio;
    }
	
	function getDescripcion() {
        return $this->Descripcion;
    }
	
	function getImgserv() {
        return $this->Imgserv;
    }	
	
	 function getIdServicios() {
			return $this->idServicios;
		}

    function setServicio($servicio) {
        $this->Servicio = $servicio;
    }

    function setDescripcion($descripcion) {
        $this->Descripcion = $descripcion;
    }
	
	function setImgserv($imgserv) {
		$this->Imgserv = $imgserv;
    }

	function setIdServicios($idServicios) {
			$this->idServicios = $idServicios;
		}

}