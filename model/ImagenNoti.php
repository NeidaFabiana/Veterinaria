<?php

class ImagenNoti {
      
    private $nombre;
	private $imagen;
	private $idImagen;
    
    public function __construct($nombre,$imagen,$idImagen=null) {
        $this->idImagen = $idImagen;
		$this->Nombre = $nombre;
		$this->Imagen = $imagen;
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
