<?php

class ImagenCons {
	
	private $nombre;
    private $imagen;
	private $idImagen;
    
	public function __construct($nombre,$imagen=null,$idImagen=null) {
		$this->Nombre = $nombre;
		$this->Imagen = $imagen;
		$this->idImagen = $idImagen;

    }

    function getNombre() {
        return $this->Nombre;
    }
	
	function getImagen() {
        return $this->Imagen;
    }

	function getIdImagen() {
		return $this->idImagen;
	}

    function setNombre($nombre) {
        $this->Nombre = $nombre;
    }

    function setImagen($imagen) {
        $this->Imagen = $imagen;
    }
	
	function setIdImagen($idImagen) {
        $this->idImagen = $idImagen;
    }

}