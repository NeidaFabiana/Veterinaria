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

    private $nombre;
	private $imagen;
    private $idSlide;
    
    public function __construct($nombre,$imagen=null,$idSlide=null) {
		$this->Nombre = $nombre;
		$this->Imagen = $imagen;
		$this->idSlide = $idSlide;
    }
	
    function getNombre() {
        return $this->Nombre;
	 }
	
	 function getImagen() {
        return $this->Imagen;
    }
	
	function getIdSlide() {
        return $this->idSlide;
    }
	
	 function setNombre($nombre) {
        $this->Nombre = $nombre;
    }
	
    function setImagen($imagen) {
        $this->Imagen = $imagen;
    }
   
   function setIdSlide($idSlide) {
        $this->idSlide = $idSlide;
    }
   
}
