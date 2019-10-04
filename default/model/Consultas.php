<?php

class Consultas {

    private $idConsultas;
	private $nombre;
    private $fecha;
    private $horario;
    private $telefono;
    private $direccion;
   
    function getIdConsultas() {
        return $this->idConsultas;
    }

    function getNombre() {
        return $this->nombre;
    }
	
	function getFecha() {
        return $this->fecha;
    }
	
	function getHorario() {
        return $this->horario;
    }
	
	function getTelefono() {
        return $this->telefono;
    }
	
	function getDireccion() {
        return $this->direccion;
    }
	
	
    function setIdConsultas($idConsultas) {
        $this->idConsultas = $idConsultas;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }
	
	function setHorario($horario) {
		$this->horario = $horario;
    }
	
	function setTelefono($telefono) {
		$this->telefono = $telefono;
    }
	
	function setDireccion($direccion) {
		$this->direccion = $direccion;
    }

}