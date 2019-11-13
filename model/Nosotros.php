<?php

class Nosotros {
    
    private $idNosotros;  
    private $descripcion;
	private $imagen;
    
    public function __construct($idNosotros=null,$descripcion,$imagen) {
        $this->idNosotros = $idNosotros;
		$this->descripcion = $descripcion;
		$this->imagen = $imagen;
    }
	
	function getIdNosotros() {
        return $this->idNosotros;
    }

    function getDescripcion() {
        return $this->descripcion;
	}
	
	function getImagen() {
        return $this->imagen;
    }
	
	
	function setIdNosotros($idNosotros) {
        $this->idNosotros = $idNosotros;
    }
	
	function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
	
	function setImagen($imagen) {
        $this->imagen = $imagen;
    }

}
