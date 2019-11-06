<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Imagen
 *
 * @author IFSul
 */
class Slide {
    //put your code here
    
    
	private $idSlide;
    private $nombre;
	private $imagen;
   
    
    public function __construct($idSlide=null,$nombre,$imagen) {
        $this->idSlide = $idSlide;
		$this->nombre = $nombre;
		$this->imagen = $imagen;
    }
	
	function getIdSlide() {
        return $this->idSlide;
    }

    function getNombre() {
        return $this->nombre;
	 }
	
	 function getImagen() {
        return $this->imagen;
   
    }

	function setIdSlide($idSlide) {
        $this->idSlide = $idSlide;
    }
	
	 function setNombre($nombre) {
        $this->nombre = $nombre;
    }
	
    function setImagen($imagen) {
        $this->imagen = $imagen;
    }
   
}
