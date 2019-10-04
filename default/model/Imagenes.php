<?php

class Imagenes {
    
    private $idImagenes;  
    private $nombre;
	private $fecha;
	private $img;
    
    public function __construct($idImagenes=null,$nombre,$fecha,$img) {
        $this->idImagenes = $idImagenes;
		$this->nombre = $nombre;
		$this->fecha = $fecha;
		$this->img = $img;
    }
	
	function getIdImagenes() {
        return $this->idImagenes;
    }

    function getNombre() {
        return $this->nombre;
	}
	
	function getFecha() {
        return $this->fecha;
    }
	
	function getImg() {
        return $this->img;
    }
	
	function setIdImagenes($idImagenes) {
        $this->idImagenes = $idImagenes;
    }
	
	function setNombre($nombre) {
        $this->nombre = $nombre;
    }
	
    function setFecha($fecha) {
        $this->fecha = $fecha;
    }
	
	function setImg($img) {
        $this->img = $img;
    }

}
