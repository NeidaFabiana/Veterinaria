<?php

class ImagenNoti {
    
    private $idImagen;  
    private $nombre;
	private $imagen;
    
    public function __construct($idImagen=null,$nombre,$imagen) {
        $this->idImagen = $idImagen;
		$this->nombre = $nombre;
		$this->imagen = $imagen;
    }
	
	function getIdImagen() {
        return $this->idImagen;
    }

    function getNombre() {
        return $this->nombre;
	}
	
	function getImagen() {
        return $this->imagen;
    }
	
	
	function setIdImagen($idImagen) {
        $this->idImagen = $idImagen;
    }
	
	function setNombre($nombre) {
        $this->nombre = $nombre;
    }
	
	function setImagen($imagen) {
        $this->imagen = $imagen;
    }

}
