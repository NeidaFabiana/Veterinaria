<?php

class Nosotros {
     
    private $descripcion;
	private $imagen;
	private $idNosotros; 
    
    public function __construct($descripcion,$imagen,$idNosotros=null) {
		$this->Descripcion = $descripcion;
		$this->Imagen = $imagen;
		$this->idNosotros = $idNosotros;
    }

    function getDescripcion() {
        return $this->Descripcion;
	}
	
	function getImagen() {
        return $this->Imagen;
    }
	
	function getIdNosotros() {
        return $this->idNosotros;
    }
	
	function setDescripcion($descripcion) {
        $this->Descripcion = $descripcion;
    }
	
	function setImagen($imagen) {
        $this->Imagen = $imagen;
    }
	
	function setIdNosotros($idNosotros) {
        $this->idNosotros = $idNosotros;
    }

}
