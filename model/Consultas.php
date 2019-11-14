<?php

class Consultas {

	private $nombre;
    private $fecha;
    private $horario;
    private $telefono;
    private $direccion;
	private $idConsultas;
	
	public function __construct($nombre,$fecha,$horario,$telefono,$direccion,$idConsultas=null) {
       
		$this->Nombre = $nombre;
		$this->Fecha = $fecha;
        $this->Horario = $horario;
	    $this->Telefono = $telefono;
	    $this->Direccion = $direccion;
	    $this->idConsultas = $idConsultas;
    }
   

    function getNombre() {
        return $this->Nombre;
    }
	
	function getFecha() {
        return $this->Fecha;
    }
	
	function getHorario() {
        return $this->Horario;
    }
	
	function getTelefono() {
        return $this->Telefono;
    }
	
	function getDireccion() {
        return $this->Direccion;
    }
	function getIdConsultas() {
        return $this->idConsultas;
    }
	

    function setNombre($nombre) {
        $this->Nombre = $nombre;
    }

    function setFecha($fecha) {
        $this->Fecha = $fecha;
    }
	
	function setHorario($horario) {
		$this->Horario = $horario;
    }
	
	function setTelefono($telefono) {
		$this->Telefono = $telefono;
    }
	
	function setDireccion($direccion) {
		$this->Direccion = $direccion;
    }
	
	function setIdConsultas($idConsultas) {
        $this->idConsultas = $idConsultas;
    }

}