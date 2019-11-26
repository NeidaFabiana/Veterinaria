<?php


class ImagenServDAO extends Model {

    private $listImagem;

    public function __construct() {
        parent::__construct();
        $this->listaImagem = [];
    }
	
	
    public function getListImagenServ() {
        $sql = "SELECT * FROM imagenserv";
        $result = $this->ExecuteQuery($sql, []);

        foreach ($result as $linha) {
            $imagem = new ImagenServ( $linha['Imagen'],$linha['Nombre'], $linha['idImagenServ']);

            $this->listImagem[] = $imagem;
        }

        return $this->listImagem;
    }

	

    public function getImagenServById($img) {

            $sql = "SELECT * FROM imagenserv WHERE idImagenServ = :idImagenServ;";
            $result = $this->ExecuteQuery($sql, [':idImagenServ' => $img]);

    
 if ($result) {
            $imgl = $result[0];
            return new ImagenServ($imgl['Imagen'],$imgl['Nombre'],$imgl['idImagenServ']);
        } else {
            return null;
        }
    }

	
   
	 public function insereImagenServ($img) {
        $sql = "INSERT INTO imagenserv (Imagen,Nombre) VALUES(:Imagen,:Nombre)";
        $result = $this->ExecuteCommand($sql,
                [':Imagen' => $img->getImagen(),
            ':Nombre' => $img->getNombre()]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

	 public function atualizarImagenServ($img) {
        $sql = 'UPDATE imagenserv SET Imagen=:Imagen,'
                . ' Nombre = :Nombre  WHERE idImagenServ =:idImagenServ';
        $param = [':Imagen'=>$img->getImagen(),
            ':Nombre'=>$img->getNombre(),
			':idImagenServ'=>$img->getIdImagen()];
        if($this->ExecuteCommand($sql, $param)){
            return true;
        }else{
            return false;
        }
    }
    
	
    public function removeImagenServ($id) {
        $sql = "DELETE FROM imagenserv WHERE idImagenServ = :idImagenServ";
        if($this->ExecuteCommand($sql, [':idImagenServ'=>$id])){
            return true;
        }else{
            return false;
        }
    }

    }
