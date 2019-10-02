<?php

class Noticias {
    private $idNoticias;
	private $Titulo;
    private $Desc;
    private $Foto;
   
    function getIdNoticias() {
        return $this->idNoticias;
    }

    function getTitulo() {
        return $this->Titulo;
    }
	
	function getDesc() {
        return $this->Desc;
    }
	
	function getFoto() {
        return $this->Foto;
    }
	

    function setIdNoticias($idNoticias) {
        $this->idNoticias = $idNoticias;
    }

    function setTitulo($Titulo) {
        $this->Titulo = $Titulo;
    }

    function setDesc($Desc) {
        $this->Desc = $Desc;
    }
	
	function setFoto($Foto) {
		$this->Foto = $Foto;
    }

}